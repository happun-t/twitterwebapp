<?php
//�Z�b�V�����X�^�[�g
session_start();
//�Z�b�V�����j��
session_destroy();
//�Z�b�V�����ϐ�������
$_SESSION[''] = array();
//���O�C���y�[�W�փ��_�C���N�g
header("Location: login.php?authorizeBoolean=2");
?>