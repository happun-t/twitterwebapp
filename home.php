<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>sTweet ver1.0</title>
</head>
<body>
 
 <input type="button" value="back" onclick="">
 
<?php //��������PHP
require_once("./twitteroauth.php");//twitteroauth.php��ǂݍ���

$sConsumerKey = "nH3G4N6PBwmjxJgV4aZsZg";
$sConsumerSecret = "2lFHwuiLT9XBjHOSIjFaMYWKjrX4StdVkiWuxZyfXw";
$sAccessToken = "1328813066-p3QZ9pV5u73SqYwjDbruTmtbgv2TbQa5y2c9Xza";
$sAccessTokenSecret = "MSFqYAI9hBTsLn11L28wIE8R9EpSdIjvLnrM9OettQyhO";
 
$twObj = new TwitterOAuth($sConsumerKey,$sConsumerSecret,$sAccessToken,$sAccessTokenSecret);
 
//home_timeline���擾����API�𗘗p�BTwitter����json�`���Ńf�[�^���Ԃ��Ă���
$vRequest = $twObj->OAuthRequest("https://api.twitter.com/1.1/statuses/home_timeline.json","GET",array("count"=>"10"));
 
//Json�f�[�^���I�u�W�F�N�g�ɕύX
$oObj = json_decode($vRequest);
 
 
//�I�u�W�F�N�g��W�J


if(isset($oObj->{'errors'}) && $oObj->{'errors'} != ''){
    ?>
    �擾�Ɏ��s���܂����B<br/>
    �G���[���e�F<br/>
    <pre>
    <?php var_dump($oObj); ?>
    </pre>
<?php
}else{
    //�I�u�W�F�N�g��W�J
    $iCount = sizeof($oObj);;
    for($iTweet = 0; $iTweet<$iCount; $iTweet++){
 
        $iTweetId =                 $oObj[$iTweet]->{'id'};
        $sIdStr =                   (string)$oObj[$iTweet]->{'id_str'};
        $sText=                     $oObj[$iTweet]->{'text'};
        $sName=                     $oObj[$iTweet]->{'user'}->{'name'};
        $sScreenName=               $oObj[$iTweet]->{'user'}->{'screen_name'};
        $sProfileImageUrl =         $oObj[$iTweet]->{'user'}->{'profile_image_url'};
        $sCreatedAt =               $oObj[$iTweet]->{'created_at'};
        $sStrtotime=                strtotime($sCreatedAt);
        $sCreatedAt =               date('Y-m-d H:i:s', $sStrtotime);
        ?>
        <hr/>
        <h4><?php echo $sName; ?></h4>
        <ul>
        <li>IDNO[id] : <?php echo $iTweetId; ?></li>
        <li>name[name] : <?php echo $sIdStr; ?></li>
        <li>ID[screen_name] : <?php echo $sScreenName; ?></li>
        <li>icon[profile_image_url] : <img src="<?php echo $sProfileImageUrl; ?>" /></li>
        <li>tweet[text] : <?php echo $sText; ?></li>
        <li>time[created_at] : <?php echo $sCreatedAt; ?></li>
        </ul>
<?php
    }//end for
}
?>
 
 
 
</body>
</html>