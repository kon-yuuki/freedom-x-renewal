class DeviceCheck {
  constructor() {
    //スマホの時はmp4を使う
    this.render();
  }
  
  render() {
    if (innerWidth < 1024 && document.body.classList.contains('top')) {
      this.handleMatchSize();
    }
  }

  handleMatchSize() {
    // video要素を取得
    const video = document.querySelector('.js-fvVideo');
    if (!video) return;

    // source要素を全て取得
    const sources = video.querySelectorAll('source');
    
    sources.forEach(source => {
      // 現在のsrcパスを取得
      const currentSrc = source.getAttribute('src');
      const currentType = source.getAttribute('type');
      if (!currentSrc || !currentType) return;

      // mp4をwebmに置換した新しいパスを作成
      const newSrc = currentSrc.replace('.webm', '.mp4');
      const newType = currentType.replace('webm', 'mp4');
      
      // 新しいパスをセット
      source.setAttribute('src', newSrc);
      source.setAttribute('type', newType);
    });

    // 変更を反映するためにvideoをリロード
    video.load();
  }
}


class Loading {
  constructor(options = {}) {
    if (!document.body.classList.contains('top')) {
      document.body.classList.add('is-loaded')
      return
    }
    this.options = {
      progressSelector: ".p-top-loading__progress",
      coverSelector: ".p-top-loading",
      minLoadingDuration: 500,
      debug: false,
      waitForElementOnRevisit: null,
      waitForContentOnRevisit: false,
      iframeTimeout: 10000,
      videoSelector: ".p-top-loading video",
      topPagePaths: ['/', '/index.html'],
      expirationDays: 7,
      storageKey: 'visitData',
      ...options
    };

    this.progress = document.querySelector(this.options.progressSelector);
    this.cover = document.querySelector(this.options.coverSelector);
    this.loadingTasks = [];
    this.loadingComplete = false;
    this.startTime = null;
    this.finishTimeout = null;
    this.progressAnimationFrame = null;
    this.video = document.querySelector(this.options.videoSelector);
    this.currentProgress = 0;
    this.targetProgress = 0;
    this.videoStartTime = null;  // 動画開始時間を追跡

    this.log('Loading class initialized');
    
    if (this.shouldSkipLoading()) {
      this.handleExistingSession();
    } else {
      this.handleNewSession();
    }
  }

  shouldSkipLoading() {
    // デバッグモードの場合は常にローディングを実行
    if (this.options.debug) {
      return false;
    }
    const visitData = this.getVisitData();
    return (visitData && !this.isExpired(visitData.timestamp)) || !this.isTopPage();
  }

  isTopPage() {
    // return this.options.topPagePaths.includes(location.pathname);
    return document.body.classList.contains('top');
  }

  getVisitData() {
    const data = localStorage.getItem(this.options.storageKey);
    return data ? JSON.parse(data) : null;
  }

  setVisitData() {
    const data = {
      visited: true,
      timestamp: Date.now()
    };
    localStorage.setItem(this.options.storageKey, JSON.stringify(data));
  }

  isExpired(timestamp) {
    const now = Date.now();
    const expirationTime = this.options.expirationDays * 24 * 60 * 60 * 1000;
    return now - timestamp > expirationTime;
  }

  handleExistingSession() {
    this.log('Handling existing user or non-top page');

    // 1. まずローディング要素を削除
    this.removeCoverElement();
    
    // 2. ローディングタスクを実行し、完了後にbodyクラスを付与
    Promise.all(this.loadingTasks.map(task => task()))
      .then(() => {
        // 3. タスク完了後にbodyクラスを付与
        document.body.classList.add("is-loaded");
        this.log('All tasks completed, body class "is-loaded" added');
      })
      .catch(error => {
        this.log(`Error in loading tasks: ${error}`);
        // エラー時もbodyクラスは付与
        document.body.classList.add("is-loaded");
      });

    // トップページの場合は訪問データを更新
    if (this.isTopPage()) {
      this.setVisitData();
      this.log('Visit data updated for existing session');
    }
  }

  removeCoverElement() {
    if (this.cover) {
      setTimeout(() => {
        this.cover.remove();
      }, 5000);
    }
  }

  checkElementAndFinish(selector) {
    const elements = document.querySelectorAll(selector);
    this.log(`Checking for elements: ${selector}, found: ${elements.length}`);

    if (elements.length > 0 && this.options.waitForContentOnRevisit) {
      Promise.all(Array.from(elements).map(el => this.waitForElement(el)))
        .then(() => this.finishLoading());
    } else {
      this.finishLoading();
    }
  }

  handleNewSession() {
    if (!this.isTopPage()) {
      this.log('Not top page, skipping loading animation');
      this.removeCoverElement();
      this.finishLoading();
      return;
    }
  
    this.log('Handling new or expired session on top page');
    document.body.classList.add("is-loading");
    this.log('Body class "is-loading" added');
    
    if (this.video) {
      this.waitForVideoStart();
    } else {
      this.startTimer();
    }
  }

  // waitForVideoStart() {
  //   this.log('Waiting for video to start');
  //   const startVideo = () => {
  //     this.video.play().then(() => {
  //       this.videoStartTime = Date.now();
  //       this.log('Video started playing - Timer start');
  //       this.startTimer();
  //     }).catch(error => {
  //       this.log(`Error playing video: ${error}`);
  //       this.startTimer();
  //     });
  //   };
  
  //   if (this.video.readyState >= 2) {
  //     startVideo();
  //   } else {
  //     this.video.addEventListener('canplay', startVideo, { once: true });
  //   }
  // }

  waitForVideoStart() {
    this.log('Waiting for video to start');
    const startVideo = () => {
      // ビデオの自動再生に失敗した場合のフォールバック処理を追加
      this.video.play().then(() => {
        this.videoStartTime = Date.now();
        this.log('Video started playing - Timer start');
        this.startTimer();
      }).catch(error => {
        this.log(`Video autoplay failed: ${error} - Starting timer without video`);
        // ビデオを無視してタイマーを開始
        this.videoStartTime = Date.now(); // これを追加
        this.startTimer();
        // オプションでビデオを非表示にするか、別の表示に切り替える
        if (this.video) {
          this.video.style.display = 'none';
        }
      });
    };
  
    if (this.video.readyState >= 2) {
      startVideo();
    } else {
      this.video.addEventListener('canplay', startVideo, { once: true });
      // タイムアウトを設定
      setTimeout(() => {
        if (!this.startTime) {
          this.log('Video load timeout - Starting timer without video');
          this.videoStartTime = Date.now();
          this.startTimer();
        }
      }, 3000); // 3秒後にタイムアウト
    }
  }

  startTimer() {
    this.startTime = Date.now();
    this.log(`Timer started at ${this.startTime}`);
    this.updateProgress();
    this.executeLoadingTasks();
  }

  updateProgress() {
    const update = () => {
      if (!this.startTime) {
        this.progressAnimationFrame = requestAnimationFrame(update);
        return;
      }
  
      const elapsedTime = Date.now() - this.startTime;
      // 1秒ごとに経過時間をログ出力
      if (Math.floor(elapsedTime/1000) > Math.floor((elapsedTime-16)/1000)) {
        this.log(`Timer: ${(elapsedTime/1000).toFixed(1)}s`);
      }
  
      const totalDuration = this.video ? 
        Math.max(this.options.minLoadingDuration, elapsedTime) : 
        this.options.minLoadingDuration;
      
      const progressRatio = Math.min(elapsedTime / totalDuration, 1);
      this.targetProgress = this.loadingComplete ? 1 : progressRatio * 0.98;
      
      const animationSpeed = this.loadingComplete ? 0.1 : 0.05;
      this.currentProgress += (this.targetProgress - this.currentProgress) * animationSpeed;
  
      if (this.progress) {
        const displayProgress = Math.min(Math.round(this.currentProgress * 100), 100);
        this.progress.style.scale = `${displayProgress}% 100%`;
      }
  
      // ビデオの再生時間をチェック
      const videoElapsedTime = this.videoStartTime ? Date.now() - this.videoStartTime : 0;
      const isVideoComplete = !this.video || videoElapsedTime >= this.options.minLoadingDuration;
  
      // 完了条件の確認
      if (this.loadingComplete && this.currentProgress >= 0.995 && isVideoComplete) {
        if (this.progress) {
          this.progress.style.scale = "100% 100%";
        }
        cancelAnimationFrame(this.progressAnimationFrame);
        const finalTime = Date.now() - this.startTime;
        this.log(`Final loading time: ${(finalTime/1000).toFixed(1)}s`);
        this.completeLoading();
      } else {
        this.progressAnimationFrame = requestAnimationFrame(update);
      }
    };
  
    this.progressAnimationFrame = requestAnimationFrame(update);
  }

  addLoadingTask(task) {
    if (this.shouldSkipLoading()) {
      task();
      return;
    }

    if (typeof task === 'function') {
      this.loadingTasks.push(task);
    } else if (task instanceof Promise) {
      this.loadingTasks.push(() => task);
    } else {
      console.warn('Invalid loading task. Must be a function or a Promise.');
    }
    this.log(`Loading task added. Total tasks: ${this.loadingTasks.length}`);
  }

  executeLoadingTasks() {
    Promise.all(this.loadingTasks.map(task => task()))
      .then(() => {
        this.loadingComplete = true;
        this.log('All loading tasks completed');
        this.checkAndFinishLoading();
      })
      .catch(error => {
        this.log(`Error in loading tasks: ${error}`);
        this.loadingComplete = true;
        this.checkAndFinishLoading();
      });
  }

  checkAndFinishLoading() {
    if (!this.startTime) {
      this.log('Start time not set yet, cannot finish loading');
      return;
    }
  
    // ビデオの再生時間をチェック
    if (this.video && this.videoStartTime) {
      const videoElapsedTime = Date.now() - this.videoStartTime;
      const elapsedSeconds = (videoElapsedTime / 1000).toFixed(1);
      this.log(`Current video playing time: ${elapsedSeconds}s / ${this.options.minLoadingDuration/1000}s`);
  
      if (videoElapsedTime < this.options.minLoadingDuration) {
        // 最小再生時間に達していない場合は待機
        const remainingTime = this.options.minLoadingDuration - videoElapsedTime;
        const remainingSeconds = (remainingTime / 1000).toFixed(1);
        this.log(`Waiting additional ${remainingSeconds}s for video minimum duration`);
        
        if (this.finishTimeout) clearTimeout(this.finishTimeout);
        this.finishTimeout = setTimeout(() => {
          this.checkAndFinishLoading();
        }, remainingTime);
        return;
      }
    }
  
    // タスクの完了状態をログ
    this.log(`Loading tasks completed: ${this.loadingComplete}`);
  
    // タスクが完了していない場合は待機
    if (!this.loadingComplete) {
      return;
    }
  
    // 最終的な完了時間をログ
    const totalElapsedTime = Date.now() - (this.videoStartTime || this.startTime);
    this.log(`Total loading time: ${(totalElapsedTime/1000).toFixed(1)}s`);
  
    // ビデオの最小再生時間とタスクの両方が完了したら終了
    this.finishLoading();
  }

   // 新しいメソッド: ローディング完了時の処理を分離
   completeLoading() {
    document.body.classList.remove("is-loading");
    document.body.classList.add("is-loaded");
    this.log('Body class changed from "is-loading" to "is-loaded"');

    this.removeCoverElement();
    this.log('Loading finished');
  }

  finishLoading() {
    this.log('Finishing loading');
    if (this.finishTimeout) clearTimeout(this.finishTimeout);
    
    // プログレスバーのアニメーションをトリガー
    this.loadingComplete = true;
    
    if (this.isTopPage()) {
      this.setVisitData();
      this.log('Local storage updated with visit data and timestamp');
    }
  }

  waitForElement(element) {
    if (element instanceof HTMLIFrameElement) {
      return this.waitForIframe(element);
    } else {
      return this.waitForImagesAndVideos(element);
    }
  }

  waitForImagesAndVideos(element) {
    return new Promise(resolve => {
      const images = Array.from(element.getElementsByTagName('img'));
      const videos = Array.from(element.getElementsByTagName('video'));
      
      const totalItems = images.length + videos.length;
      let loadedItems = 0;

      const checkAllLoaded = () => {
        loadedItems++;
        if (loadedItems === totalItems) {
          resolve();
        }
      };

      images.forEach(img => {
        if (img.complete) {
          checkAllLoaded();
        } else {
          img.onload = checkAllLoaded;
          img.onerror = checkAllLoaded;
        }
      });

      videos.forEach(video => {
        if (video.readyState >= 4) {
          checkAllLoaded();
        } else {
          video.oncanplaythrough = checkAllLoaded;
          video.onerror = checkAllLoaded;
        }
      });

      if (totalItems === 0) {
        resolve();
      }
    });
  }

  waitForIframe(iframe) {
    return new Promise(resolve => {
      const timeoutId = setTimeout(() => {
        this.log(`Iframe load timed out: ${iframe.src}`);
        resolve();
      }, this.options.iframeTimeout);

      if (iframe.contentDocument && iframe.contentDocument.readyState === 'complete') {
        clearTimeout(timeoutId);
        this.log(`Iframe already loaded: ${iframe.src}`);
        resolve();
      } else {
        iframe.onload = () => {
          clearTimeout(timeoutId);
          this.log(`Iframe loaded: ${iframe.src}`);
          resolve();
        };
        iframe.onerror = () => {
          clearTimeout(timeoutId);
          this.log(`Iframe load error: ${iframe.src}`);
          resolve();
        };
      }
    });
  }

  log(message) {
    if (this.options.debug) {
      console.log(`[Loading] ${message}`);
    }
  }
}

window.addEventListener('DOMContentLoaded', () => {
  // new DeviceCheck();
  const loader = new Loading({
    minLoadingDuration: 1500,
    debug: false,
    waitForElementOnRevisit: ".c-service-fv,.c-image-fv-img",
    waitForContentOnRevisit: true
  });   
})