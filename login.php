<?php
session_start();

require_once('./twitteroauth.php');

$sConsumerKey = "nH3G4N6PBwmjxJgV4aZsZg";
$sConsumerSecret = "2lFHwuiLT9XBjHOSIjFaMYWKjrX4StdVkiWuxZyfXw";//ConsumerKey��ConsumerSecret��ϐ��ɑ��

$sCallBackUrl = 'http://web.sfc.keio.ac.jp/~s16436ts/info2/final/twitteroauth/callback.php';//�R�[���o�b�N����URL���w��
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
//�Z�b�V�����̃A�N�Z�X�g�[�N���̃`�F�b�N
if((isset($_SESSION['oauthToken']) && $_SESSION['oauthToken'] !== NULL) && (isset($_SESSION['oauthTokenSecret']) && $_SESSION['oauthTokenSecret'] !== NULL)){
 
	//�l�̊i�[
	$sUserId = 			$_SESSION['userId'];
	$sScreenName = 		$_SESSION['screenName'];
 
	//�\��
	?>
	login success!<br/>
	hello <?php echo $sScreenName; ?> <br/>
	user <?php echo $sUserId; ?><br/>
	<br/>
	<a href="./logout.php">logout</a></p>
    <input type="button" value="home" onclick="location.href='../index.html'">
 
<?php
}else{
 
	//OAuth�I�u�W�F�N�g����
	$oOauth = new TwitterOAuth($sConsumerKey,$sConsumerSecret);
 
	//callback url ���w�肵�� request token���擾
	$oOauthToken = $oOauth->getRequestToken($sCallBackUrl);
 
	//�Z�b�V�����i�[
	$_SESSION['requestToken'] = 			$sToken = $oOauthToken['oauth_token'];
	$_SESSION['requestTokenSecret'] = 		$oOauthToken['oauth_token_secret'];
 
	//�F��URL�̈��� false�̏ꍇ��twitter���ŔF�؊m�F�\��
	if(isset($_GET['authorizeBoolean']) && $_GET['authorizeBoolean'] != '')
	$bAuthorizeBoolean = false;
	else
	$bAuthorizeBoolean = true;
 
	//Authorize url ���擾
	$sUrl = $oOauth->getAuthorizeURL($sToken, $bAuthorizeBoolean);
	?>
	<a href="<?php echo $sUrl; ?>">login</a>
    <input type="button" value="home" onclick="location.href='../index.html'">
 
<?php } ?>
 
</body>
</html>