<?php 
$auth=Yii::app()->authManager;
$bizRule='return Yii::app()->user->rol === "admin";';
$auth->createRole('admin', 'admin user', $bizRule);

$bizRule='return Yii::app()->user->rol === "superadmin";';
$auth->createRole('superadmin', 'superadmin user', $bizRule);
?>