<?php
//SESSION�J�n
session_start();
//�C���N���[�h
require_once('./twitteroauth.php');

$sConsumerKey = "nH3G4N6PBwmjxJgV4aZsZg";
$sConsumerSecret = "2lFHwuiLT9XBjHOSIjFaMYWKjrX4StdVkiWuxZyfXw";
 
//URL�p�����[�^����oauth_verifier���擾
if(isset($_GET['oauth_verifier']) && $_GET['oauth_verifier'] != ''){
	$sVerifier = $_GET['oauth_verifier'];
}else{
	echo 'oauth_verifier error!';
	exit;
}
 
//���N�G�X�g�g�[�N����OAuth�I�u�W�F�N�g����
$oOauth = new TwitterOAuth($sConsumerKey,$sConsumerSecret,$_SESSION['requestToken'],$_SESSION['requestTokenSecret']);
 
//oauth_verifier���g����Access token���擾
$oAccessToken = $oOauth->getAccessToken($sVerifier);
 
//�擾�����l��SESSION�Ɋi�[
$_SESSION['oauthToken'] = 			$oAccessToken['oauth_token'];
$_SESSION['oauthTokenSecret'] = 	$oAccessToken['oauth_token_secret'];
$_SESSION['userId'] = 				$oAccessToken['user_id'];
$_SESSION['screenName'] = 			$oAccessToken['screen_name'];


 
//login�y�[�W�փ��_�C���N�g//session�ϐ���timeline.php�֓n��
header("Location: timeline.php");
?>