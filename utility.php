<?php

/**
* sendMailtoAdmin
* メール送信（管理者宛）
* @param $data     フォーム送信データ
*/
function sendMailtoAdmin ($data) {
	$result = false;

	// 文字コードをセット
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	// 送信先
	$to = ADMIN_MAIL;

	// 件名
	$subject = "ホームページから問い合わせがありました";

	// 本文作成
	$body  = "";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "　ホームページから問い合わせがありました\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "問い合わせ内容は以下のとおりです。\n";
	$body .= "受信から2営業日以内にお客様へ連絡してください。\n";
	$body .= "\n";
	$body .= "お名前：　" . $data["name"] . "\n";
	$body .= "メールアドレス：　" . $data["email"] . "\n";
	$body .= "\n";
	$body .= "お問い合わせ内容：\n";
	$body .= $data["message"] . "\n";
	$body .= "\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "　このメールは問い合わせフォームから送信されました。\n";

	// 送信処理
	if (mb_send_mail($to, $subject, $body)) {
		$result = true; // 送信成功
	}

	return $result;
}

