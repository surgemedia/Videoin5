<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include ('db_connection_13r2fdfd34.php');
include ('head.php'); ?>

<?php 
	require_once 'inc/aws/ses.class.php';
	$m = new SimpleEmailServiceMessage();
	$ses = new SimpleEmailService('AKIAIOH2AUGQJV3XLOEA', 'OoQW1hMMMeWJMb094RUyrBRKWQEQjfeMjTPkvd2+');

			$name = "V5 Surge Media";
			$from = "video@surgemedia.com.au";
			$to = 'alex@surgemedia.com.au';
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=utf-8\r\n";
      $headers .="From: ". $name . " <" . $frommail . ">\r\n";

			$subject = 'V5 Video completed, Order number: '.$check_order_row['order_num'];
			$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Invoice. Don\'t reply this message!</title>
</head>

<body style="padding: 0px; margin: 0px;">
			';
			$message .= '
<table width="600" border="0" cellspacing="20" cellpadding="0">
  <tr>
    <td style="font-size: 13px; color: #213E4b; font-family: Verdana, Geneva, sans-serif; padding-bottom: 20px; padding-top: 20px; border-bottom-color: #16A4C3; border-top-color: #16A4C3; border-bottom-style: dotted; border-top-style: dotted; border-bottom-width: 1px; border-top-width: 1px;"><p>Dear '.$check_order_row['name'].',</p>
      <p>Your video was completed, Please check the below link to download:</p>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span style="font-size:16px; font-weight:bold">INVOICE</span></td>
        </tr>
        <tr>
          <td width="200">Order Number:</td>
          <td>'.$check_order_row['order_num'].'</td>
        </tr>
        <tr>
          <td>Download Link:</td>
          <td>'.$_POST['video_linking'].'</td>
        </tr>
        <tr>
          <td>If you are not happy about this video, Please click below link to submit feedback, and we will contact you as soon as possble to fix your video.:</td>
          <td><a href="http://vid5.surgehost.com.au/feedback.php?order='.$check_order_row['order_num'].'">Feedback of my video.</a></td>
        </tr>
      </table>
      <p>Thank you very much to used our services. we are looking for serve you in next time.</p>
      <p>Kind regards</p>
            <img src="http://vid5.surgehost.com.au/V5_signature.jpg" /></td>
		</td>
  </tr>
</table>

</body>
</html>
			';

		 $m->setFrom('video@surgemedia.com.au');
     $m->addTo($to);
     $m->setSubject($subject);
     $m->setMessageFromString('',$message);
     $m->setMessageCharset('','UTF-8');
     $ses->sendEmail($m);
      ?>
        <?php include ('footer.php'); ?>
         
    </body>
</html>