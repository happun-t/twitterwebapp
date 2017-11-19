<?php
//セッションスタート
session_start();
//セッション破棄
session_destroy();
//セッション変数初期化
$_SESSION[''] = array();
//ログインページへリダイレクト
header("Location: login.php?authorizeBoolean=2");
?>