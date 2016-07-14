<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'inc/aws/ses.class.php';
$m = new SimpleEmailServiceMessage();
$ses = new SimpleEmailService('AKIAIOH2AUGQJV3XLOEA', 'OoQW1hMMMeWJMb094RUyrBRKWQEQjfeMjTPkvd2+');
?>