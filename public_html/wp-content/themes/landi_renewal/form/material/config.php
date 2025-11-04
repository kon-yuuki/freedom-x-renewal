<?php
//==========================================================
// 基本設定
//==========================================================

// 　管理者宛メール受信アドレス(複数指定する場合は「,」で区切る)
const ADMIN_MAIL = 'supportcenter@freedom.co.jp,info@freedom-x.co.jp,press_fx@freedom.co.jp,info@landi.jp';
// 管理者宛メールタイトル
const ADMIN_SUBJECT = '【{資料カテゴリ(サービス名)}】資料ダウンロードを受け付けました。';
// ユーザー宛メールタイトル
const USER_SUBJECT = '【FREEDOM X】資料ダウンロードのご請求ありがとうございます。';
// メールID（メールID項目名、falseでメールID非表示）
const MAIL_ID = false;
// user本文内容表示（trueで送信内容表示）
const USER_MAIL_BODY = true;

// formData
$formData = array(
/*
	配列の書き方
	'name値' => array(
		'label' => '項目名',
		'prefix' => '接頭語',
		'suffix' => '接尾語',
		'separator' => '区切り文字', // 配列の場合有効
		'file' => 'boolean', // ファイルアップロードの場合true
		'group' => array( // 配列をグループ化したい場合に記述
			'要素名' => array(
				'prefix' => '接頭語',
				'suffix' => '接尾語',
				'separate' => '区切り文字'
			),
		),
		'join' => array( // その他などの入力項目を追加する場合に記述
			'name' => '要素名',
			'value' => 'その他', // この値に繋げる
			'prefix' => '：'
		),
		'validate' => array(
			'require' => boolean // 必須項目の場合true
			'email' => boolean // メールの場合true
			'equal' => '対象となるname値', // 同じ文字列を判定する
			'file' => boolean // ファイルの場合true
		),
	)
*/
	'company' => array(
		'label' => '法人名',
		'validate' => array(
			'require' => false
		)
	),
	'department' => array(
		'label' => '所属部署名',
		'validate' => array(
			'require' => false
		)
	),
	'position' => array(
		'label' => '役職',
		'validate' => array(
			'require' => true
		)
	),
	'name' => array(
		'label' => '担当者名',
		'validate' => array(
			'require' => true
		)
	),
	'email' => array(
		'label' => '会社用メールアドレス',
		'validate' => array(
			'require' => true,
			'email' => true
		)
	),
	'phone' => array(
		'label' => '電話番号',
		'validate' => array(
			'require' => true
		)
	),
	'message' => array(
		'label' => 'ご質問・ご要望など',
		'validate' => array(
			'require' => false
		)
	),
	'privacy-agree' => array(
		'label' => '個人情報の取り扱い',
		'validate' => array(
			'require' => true
		)
	),
	'notice-agree' => array(
		'label' => 'ご注意',
		'validate' => array(
			'require' => true
		)
	)
);