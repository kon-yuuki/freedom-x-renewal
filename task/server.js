const config = require('./config');
const chalk = require('chalk');
const ip = require('ip');
const net = require('net');
const { exec, execSync } = require('child_process');
const compose = require('docker-compose');
const bs = require('browser-sync');
const path = require('path');
const chokidar = require('chokidar');
const fs = require('fs');

class Server {
	constructor(){
		this.ip = "localhost";
		// 固定ポート設定
		this.port = {
			bs: 3000,
			ui: 3001,
			apache: 3002,
			pma: 3003
		};
		this.browserSync = null;
		this.build();
	}

	async build(){
		if( config.server == 'true' ) {
			let isExit = false;
			let envOption = {
				PATH: process.env.PATH
			};
			try {
				console.log(chalk.cyan('Docker Starting...'));
				envOption.COMPOSE_PROJECT_NAME = config.name;
				envOption.NAME = config.name;
				envOption.WEB_PORT = this.port.apache;
				envOption.PMA_PORT = this.port.pma;
				envOption = {...envOption, ...process.env};
				await compose.v2.upAll({
					log: true,
					env: envOption
				});
				console.log(`App URL: ${chalk.magenta(`http://localhost:${this.port.apache}`)}`);
				console.log(`PMA: ${chalk.magenta(`http://localhost:${this.port.pma}`)}`);
				console.log(chalk.bold.greenBright('Docker Start!!'));
			} catch(error) {
				console.log(chalk.bold.red('Docker Error!!'));
				console.log(error);
			}
			process.on('SIGINT', async (e)=>{
				if( !isExit ) {
					isExit = true;
					console.log("\n"+chalk.cyan('Docker Stopping...'));
					try {
						await compose.v2.down({
							log: true,
							env: envOption
						});
						console.log(chalk.bold.greenBright('Docker Stop!!'));
					} catch(error) {
						console.log(chalk.bold.red('Docker Error!!'));
					}
					process.exit();
				}
			});
		}
		this.browseSync();
	}

	browseSync(){
		const baseDir = `${config.public}/`;
		
		// BrowserSyncの設定
		const bsOptions = {
			port: 3000,
			ui: {
				port: 3001
			},
			proxy: "localhost:3002",
			host: 'localhost',
			open: 'local',
			ghostMode: false,
			injectChanges: true,
			reloadDelay: 0,
			reloadDebounce: 300,
			notify: true,
			// インライン実行スクリプト
			snippetOptions: {
				rule: {
					match: /<\/body>/i,
					fn: function(snippet, match) {
						return `
						<!-- BrowserSync CSS Reload Helper -->
						<script>
							// CSSを強制的にリロードする関数
							function forceReloadCSS() {
								console.log('[CSS Reload] Refreshing stylesheets...');
								const links = document.getElementsByTagName('link');
								for (let i = 0; i < links.length; i++) {
									const link = links[i];
									if (link.rel === 'stylesheet') {
										const href = link.href.split('?')[0];
										link.href = href + '?forcereload=' + new Date().getTime();
										console.log('[CSS Reload] Refreshed: ' + href);
									}
								}
							}
							
							// イベントリスナー設定
							document.addEventListener('DOMContentLoaded', function() {
								if (typeof window.___browserSync___ !== 'undefined' && 
									window.___browserSync___.socket) {
									console.log('[CSS Reload] BrowserSync detected, setting up event listeners');
									window.___browserSync___.socket.on('styles:reload', function() {
										console.log('[CSS Reload] Event received');
										forceReloadCSS();
									});
								}
							});
						</script>
						` + snippet + match;
					}
				}
			}
		};
		
		console.log(chalk.yellow('=== Browsersync Setup ==='));
		console.log(chalk.green('Initializing BrowserSync...'));
		console.log(chalk.cyan(`- Development URL: http://localhost:${bsOptions.port}`));
		console.log(chalk.cyan(`- WordPress server: http://localhost:${this.port.apache}`));
		
		// BrowserSyncを初期化
		this.browserSync = bs.create('freedom-x');
		this.browserSync.init(bsOptions, (err, bs) => {
			if (err) {
				console.log(chalk.red('BrowserSync initialization error:'));
				console.error(err);
				return;
			}
			
			console.log(chalk.green('BrowserSync initialized successfully!'));
			
			// CSSファイルの変更を監視
			const cssPattern = `${config.public}/**/*.css`;
			console.log(chalk.cyan(`Setting up watcher for CSS files: ${cssPattern}`));
			
			// chokidarを使用してCSSファイルを監視
			const cssWatcher = chokidar.watch(cssPattern, {
				ignored: [
					`${config.public}/**/wp-admin/**/*.css`,
					`${config.public}/**/wp-includes/**/*.css`
				],
				ignoreInitial: true,
				persistent: true,
				awaitWriteFinish: true
			});
			
			// CSSファイル変更時の処理
			cssWatcher.on('change', (filePath) => {
				console.log(chalk.green(`[CSS Changed]: ${filePath}`));
				
				// 標準的なCSS変更のリロード
				this.browserSync.reload("*.css");
				
				// 直接クライアントにカスタムイベントも送信
				this.browserSync.sockets.emit('styles:reload');
				
				console.log(chalk.green('[CSS Reload] Events sent to browser'));
			});
			
			// HTMLやPHPファイルの変更を監視（完全リロード）
			const pageWatcher = chokidar.watch([
				`${config.public}/**/*.html`,
				`${config.public}/**/*.php`,
				`${config.public}/**/*.js`
			], {
				ignored: [
					`${config.public}/**/wp-*.php`,
					`${config.public}/**/wp-admin/**/*`,
					`${config.public}/**/wp-includes/**/*`,
					`${config.public}/**/wp-content/!(themes)/**/*`,
					`${config.public}/**/uploads/**/*`
				],
				ignoreInitial: true,
				persistent: true,
				awaitWriteFinish: true
			});
			
			// ページファイル変更時の処理（完全リロード）
			pageWatcher.on('change', (filePath) => {
				console.log(chalk.blue(`[Page Changed]: ${filePath}`));
				this.browserSync.reload();
			});
			
			console.log(chalk.green('File watchers initialized'));
		});
		
		console.log(chalk.yellow('=== Browsersync Setup End ==='));
	}
}

module.exports = new Server();