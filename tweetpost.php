<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>tweet loading</title>
</head>
<body>
 
 
 
<?php
require_once("./twitteroauth.php");//twitteroauth�̌Ăяo��

session_start();
echo $_SESSION['oauthToken'];
echo $_SESSION['ouathTokenSecret'];//callback.php���̕ϐ����󂯎��
 
//TwitterAPI�J���҃y�[�W�ł��m�F�������B
//Consumer key�̒l���i�[
$sConsumerKey = "nH3G4N6PBwmjxJgV4aZsZg";
$sConsumerSecret = "2lFHwuiLT9XBjHOSIjFaMYWKjrX4StdVkiWuxZyfXw";
$sAccessToken = $_SESSION['oauthToken'];
$sAccessTokenSecret = $_SESSION['oauthTokenSecret'];

//OAuth�I�u�W�F�N�g�𐶐�����
$twObj = new TwitterOAuth($sConsumerKey,$sConsumerSecret,$sAccessToken,$sAccessTokenSecret);
 
//�ꂫ��POST����API
$sTweet = $_POST["tweettext"];
$vRequest = $twObj->OAuthRequest("https://api.twitter.com/1.1/statuses/update.json","POST",array("status" => $sTweet));
 
//Json�f�[�^���I�u�W�F�N�g�ɕύX
$oObj = json_decode($vRequest);
 
//�G���[
if(isset($oObj->{'errors'}) && $oObj->{'errors'} != ''){
    ?>
    error!<br/>
    caution�F<br/>
    <pre>
    <?php var_dump($oObj); ?>
    </pre>
<?php
//���e���e
}else{
?>
    <h3>tweeted by</h3>
    stweet ver1.0
 
    <h3>result</h3>
    <pre>
    <?php var_dump($oObj); ?>
    </pre>
    <?php
}
?>

<input type="button" value="back" onclick="location.href='timeline.php'">
 
 
 
</body>
</html>