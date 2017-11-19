<?php
session_start();

require_once('./twitteroauth.php');

$sConsumerKey = "nH3G4N6PBwmjxJgV4aZsZg";
$sConsumerSecret = "2lFHwuiLT9XBjHOSIjFaMYWKjrX4StdVkiWuxZyfXw";//ConsumerKeyとConsumerSecretを変数に代入

$sCallBackUrl = 'http://web.sfc.keio.ac.jp/~s16436ts/info2/final/twitteroauth/callback.php';//コールバックするURLを指定
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html;">
<title>login</title>
</head>
<body>
 
<?php
//セッションのアクセストークンのチェック
if((isset($_SESSION['oauthToken']) && $_SESSION['oauthToken'] !== NULL) && (isset($_SESSION['oauthTokenSecret']) && $_SESSION['oauthTokenSecret'] !== NULL)){
 
	//値の格納
	$sUserId = 			$_SESSION['userId'];
	$sScreenName = 		$_SESSION['screenName'];
 
	//表示
	?>
	login success!<br/>
	hello <?php echo $sScreenName; ?> <br/>
	user <?php echo $sUserId; ?><br/>
	<br/>
	<a href="./logout.php">logout</a></p>
    <input type="button" value="home" onclick="location.href='../index.html'">
 
<?php
}else{
 
	//OAuthオブジェクト生成
	$oOauth = new TwitterOAuth($sConsumerKey,$sConsumerSecret);
 
	//callback url を指定して request tokenを取得
	$oOauthToken = $oOauth->getRequestToken($sCallBackUrl);
 
	//セッション格納
	$_SESSION['requestToken'] = 			$sToken = $oOauthToken['oauth_token'];
	$_SESSION['requestTokenSecret'] = 		$oOauthToken['oauth_token_secret'];
 
	//認証URLの引数 falseの場合はtwitter側で認証確認表示
	if(isset($_GET['authorizeBoolean']) && $_GET['authorizeBoolean'] != '')
	$bAuthorizeBoolean = false;
	else
	$bAuthorizeBoolean = true;
 
	//Authorize url を取得
	$sUrl = $oOauth->getAuthorizeURL($sToken, $bAuthorizeBoolean);
	?>
	<a href="<?php echo $sUrl; ?>">login</a>
    <input type="button" value="home" onclick="location.href='../index.html'">
 
<?php } ?>
 
</body>
</html>