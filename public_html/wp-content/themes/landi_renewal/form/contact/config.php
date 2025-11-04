<?php
//==========================================================
// 基本設定
//==========================================================

// 　管理者宛メール受信アドレス(複数指定する場合は「,」で区切る)
const ADMIN_MAIL = 'info@freedom.co.jp';
// 管理者宛メールタイトル
const ADMIN_SUBJECT = '【お問い合わせ】ウェブサイトからのお問い合わせがありました';
// ユーザー宛メールタイトル
const USER_SUBJECT = 'お問い合わせを受け付けました';
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
	
	'inquiry-type' => array(
		'label' => '問い合わせ種別',
		'validate' => array(
			'require' => true
		)
	),
	'service-name' => array(
		'label' => 'サービス名',
		'validate' => array(
			'require' => false // 条件により切り替え
		)
	),
	'service-category' => array(
		'label' => '聞きたいカテゴリ',
		'validate' => array(
			'require' => false // 条件により切り替え
		)
	),
	'company' => array(
		'label' => '法人名',
		'validate' => array(
			'require' => false
		)
	),
	'contact_name' => array(
		'label' => 'お名前',
		'validate' => array(
			'require' => true
		)
	),
	'email' => array(
		'label' => 'メールアドレス',
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
	'source' => array(
		'label' => '最初に弊社を知ったきっかけ',
		'validate' => array(
			'require' => true
		),
		'separator' => '、'
	),
	'message' => array(
		'label' => 'お問い合わせ詳細',
		'validate' => array(
			'require' => true
		)
	),
	
	'privacy-agree' => array(
		'label' => '個人情報の取り扱い',
		'validate' => array(
			'require' => true
		)
	)
);