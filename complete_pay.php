<?php
// Send an empty HTTP 200 OK response to acknowledge receipt of the notification 
   header('HTTP/1.1 200 OK'); 
   
@ $db = mysql_connect("localhost","vid5surg_user","P@ssw0rd!VID");
if (!$db)
{
	echo "Database connection error! Please try again.";
	exit;
}
mysql_query("SET NAMES 'utf8'"); 
mysql_select_db("vid5surg_db");
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}

// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

// assign posted variables to local variables
$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];

if($item_number == 'v51117'){
	$updateofferalreadyused = 'offer_usage = 1,';
}

$updateinvoice = "UPDATE v5_order SET payment_statue = 1, ".$updateofferalreadyused." paytime = NULL, amount = ".$payment_amount." WHERE order_num LIKE '".$item_name."'";	
$updateinvoice_result = mysql_query($updateinvoice);

			$takeorderinformation = mysql_query("SELECT * FROM v5_order WHERE order_num LIKE '".$item_name."'");
			$takeorderinformation_row = mysql_fetch_array($takeorderinformation);
			
			if($takeorderinformation_row['font_style']!=""){
				$fstyle = "font-family:".$takeorderinformation_row['font_style']."; ";
			}
			if($takeorderinformation_row['font_style2']!=""){
				$fstyle2 = "font-family:".$takeorderinformation_row['font_style2']."; ";
			}
			if($takeorderinformation_row['font_style3']!=""){
				$fstyle3 = "font-family:".$takeorderinformation_row['font_style3']."; ";
			}
			if($takeorderinformation_row['font_size']=='50px'){
				$showtoscfontsize = "34px";
			}
			if($takeorderinformation_row['font_size']=='100px'){
				$showtoscfontsize = "44px";
			}
			if($takeorderinformation_row['font_size']=='150px'){
				$showtoscfontsize = "54px";
			}
			if($takeorderinformation_row['font_size']=='200px'){
				$showtoscfontsize = "64px";
			}
			if($takeorderinformation_row['font_size2']=='50px'){
				$showtoscfontsize2 = "34px";
			}
			if($takeorderinformation_row['font_size2']=='100px'){
				$showtoscfontsize2 = "44px";
			}
			if($takeorderinformation_row['font_size2']=='150px'){
				$showtoscfontsize2 = "54px";
			}
			if($takeorderinformation_row['font_size2']=='200px'){
				$showtoscfontsize2 = "64px";
			}
			if($takeorderinformation_row['font_size3']=='50px'){
				$showtoscfontsize3 = "34px";
			}
			if($takeorderinformation_row['font_size3']=='100px'){
				$showtoscfontsize3 = "44px";
			}
			if($takeorderinformation_row['font_size3']=='150px'){
				$showtoscfontsize3 = "54px";
			}
			if($takeorderinformation_row['font_size3']=='200px'){
				$showtoscfontsize3 = "64px";
			}
	
			if($takeorderinformation_row['font_size']!=""){
				$fsize = "font-size:".$showtoscfontsize."; ";
				$fsty = "font-size:".$takeorderinformation_row['font_size']."; ";
			}
			if($takeorderinformation_row['font_size2']!=""){
				$fsize2 = "font-size:".$showtoscfontsize2."; ";
				$fsty2 = "font-size:".$takeorderinformation_row['font_size2']."; ";
			}
			if($takeorderinformation_row['font_size3']!=""){
				$fsize3 = "font-size:".$showtoscfontsize3."; ";
				$fsty3 = "font-size:".$takeorderinformation_row['font_size3']."; ";
			}
			if($takeorderinformation_row['font_tran']!=""){
				$fsize .= " text-transform:".$takeorderinformation_row['font_tran']."; ";
				$fsty .= " text-transform:".$takeorderinformation_row['font_tran']."; ";
			}
			if($takeorderinformation_row['font_tran2']!=""){
				$fsize2 .= " text-transform:".$takeorderinformation_row['font_tran2']."; ";
				$fsty2 .= " text-transform:".$takeorderinformation_row['font_tran2']."; ";
			}
			if($takeorderinformation_row['font_tran3']!=""){
				$fsize3 .= " text-transform:".$takeorderinformation_row['font_tran3']."; ";
				$fsty3 .= " text-transform:".$takeorderinformation_row['font_tran3']."; ";
			}
			
			$name = "V5 Surge Media";
			$from = "cs@vid5.surgehost.com.au";
			$to = $takeorderinformation_row['email'];
			$to2 = "production@surgemedia.com.au" . ', ';
			$to2 .= "video@surgemedia.com.au";
			$subject = 'V5 Invoice: Order: '.$item_name;
			$subject2 = 'Thanks for your purchase V5.';
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
    <td style="font-size: 13px; color: #213E4b; font-family: Verdana, Geneva, sans-serif; padding-bottom: 20px; padding-top: 20px; border-bottom-color: #16A4C3; border-top-color: #16A4C3; border-bottom-style: dotted; border-top-style: dotted; border-bottom-width: 1px; border-top-width: 1px;"><p>Dear '.$takeorderinformation_row['name'].',</p>
      <p>Below is the invoice about your Video:</p>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span style="font-size:16px; font-weight:bold">TAX INVOICE from Surge Media PTY LTD.</span><br />
<br />
<br />
</td>
        </tr>
        <tr>
          <td align="left"><span style="font-size:12px; font-weight:bold">Date: '.substr($takeorderinformation_row['paytime'], 0, 10).'</span></td>
          <td align="right"><span style="font-size:12px; font-weight:bold">ABN: 34 159 387 765</span></td>
        </tr>
        <tr>
          <td width="200" valign="top">Order Number:</td>
          <td valign="top">'.$item_name.'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">Item:</td>
          <td valign="top">1x V5 Branded Video File.<br/><br/></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><span style="font-size:14px; font-weight:bold">Order Details:</span></td>
        </tr>
        <tr>
          <td valign="top">Logo style:</td>
          <td valign="top">'.$takeorderinformation_row['style'].'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">Message:</td>
          <td valign="top">
		  <div style="border:1px solid #d1d1d1; padding:10px;">
		  <div style="'.$fstyle.$fsize.'">'.$takeorderinformation_row['upper_message'].'</div>
		  <div style="'.$fstyle2.$fsize2.'">'.$takeorderinformation_row['middle_message'].'</div>
		  <div style="'.$fstyle3.$fsize3.'">'.$takeorderinformation_row['bottom_message'].'</div>
		  </div>
		  <div>upper:'.$fsty.'</div>
		  <div>middle:'.$fsty2.'</div>
		  <div>bottom:'.$fsty3.'</div><br/><br/>
		  </td>
        </tr>
        <tr>
          <td valign="top">Message font style:</td>
          <td valign="top">
		  <div>upper: '.$takeorderinformation_row['font_style'].'</div>
		  <div>middle: '.$takeorderinformation_row['font_style2'].'</div>
		  <div>bottom: '.$takeorderinformation_row['font_style3'].'<br/><br/></div>
		  </td>
        </tr>
        <tr>
          <td valign="top">Background Color:</td>
          <td valign="top">'.$takeorderinformation_row['backgroup_color'].'</td>
        </tr>
        <tr>
          <td valign="top">Notes:</td>
          <td valign="top">'.$takeorderinformation_row['notes'].'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">Show the company name if Without Logo:</td>
          <td valign="top">'.$takeorderinformation_row['company_name'].'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">Price:</td>
          <td valign="top">AU$ '.($payment_amount*0.9).'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">GST:</td>
          <td valign="top">AU$ '.($payment_amount*0.1).'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">Amount of Payment:</td>
          <td valign="top">AU$ '.$payment_amount.'<br/><br/></td>
        </tr>
      </table>
      <p>Thank you very much. we are checking the output quality and will send you the file when completed.</p>
      <p>Kind regards</p>
      <img src="http://vid5.surgehost.com.au/V5_signature.jpg" /></td>
	  </td>
  </tr>
</table>

</body>
</html>
			';
			$message2 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<style>
body {
    font-family: \'Raleway\',sans-serif;
	color:#9999a6;
}
.thanksmail ul{
	width:590px; background: url("http://videoin5.com.au/img/photography.png") repeat scroll 0 0 rgba(0, 0, 0, 0); padding:5px; border-radius:5px;
}
.thanksmail h3{
	color:white;
	font-size:40px;
	text-align:center;
	font-weight:100;
	font-style:italic;	
}
.thanksmail img{
	margin-left:230px;
	margin-bottom:30px;
}
li{
	list-style-type: none;
}
.message{
	background-color:white;
	padding:10px 30px 10px 30px; border-radius:5px;
	text-align:center;
	line-height:25px;
	font-size:18px;
	font-style:italic;	
	colorv
}
.coupon {
    background-image: url("http://videoin5.com.au/img/coupon.jpg");
    border: 2px dashed green;
    border-radius: 0.5em;
    color: #fff;
    font-size: 40px;
    margin: 0 auto;
	margin-top:20px;
	margin-bottom:20px;
    padding: 2em 0;
    text-shadow: 2px 2px green;
    width: 70%;
	text-align:center;
}
.logo ul{
	width:250px; background: url("http://videoin5.com.au/img/photography.png") repeat scroll 0 0 rgba(0, 0, 0, 0); padding:30px 10px 30px 200px; position:relative;
}
.logo ul div{
	width:100px; height:80px; background:no-repeat url("http://videoin5.com.au/img/v5logo.png"); position:absolute; left:60px; top:35px;
}
.logo li{
	color:#2c8cad;
	margin: 10px;
}
.logo span{
	color:white;
}
a{
	text-decoration:none;
	color:#9999a6;
}
a:hover{
	color:#07b6dc;
}
.large{
	font-size:20px;
	margin-top:-15px;
}
</style>

<body>
<div class="thanksmail">
<h2>Hello '.$takeorderinformation_row['name'].',</h2>
Thanks for your purchase, your video in the pipeline. <br/>
Please be Patient. All videos are reviewed by a technician to insure quality.<br />
<h4>Your video will be delivered to you with in </h4>
<h4 class="large">1 business day.</h4>
We will email you a link to download your video when its ready.
    <ul>
    <li><h3>Horray!</h3></li>
    <li><img src="http://videoin5.com.au/img/happy.png" /></li>
    <li><div class="message">We know you will enjoy the power of video, <br />
		and hope to see you again. <br /><br />
		V5 would like to offer you a 10% discount on your next V5 video. To redeem your discount please enter the code below on your next purchase.   </div>
    <div class="coupon"><strong>v512455</strong></div>
    </li>
    </ul>
</div>
<a href="mailto:help@videoin5.com.au">If you have any problems or issues using this offer, please let us know. We are here to help</a>
<div class="logo">
<ul>
<div></div>
<li><span>The V5 Wizards</span></li>
<li>Phone: 3137 1171</li>
<li>URL: videoinfive.com.au</li>
</ul>
</div>
</body>
</html>
			
			';
			
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			
			$headers .="From: ". $name . " <" . $from . ">\r\n";
			
			mail($to, $subject, $message, $headers);										
			mail($to2, $subject, $message, $headers);	
			$offerusedcheck = mysql_query("SELECT * FROM v5_order WHERE email LIKE '".$_POST['email']."' AND offer_usage = 1 AND payment_statue = 1");
			$offerusedcheck_num = mysql_num_rows($offerusedcheck);
			if($offerusedcheck_num<=5)
			{
				mail($to, $subject2, $message2, $headers);										
			}

if (!$fp) {
// HTTP ERROR
} else {
fputs ($fp, $header . $req);
while (!feof($fp)) {
$res = fgets ($fp, 1024);
if (strcmp ($res, "VERIFIED") == 0) {
// check the payment_status is Completed
// check that txn_id has not been previously processed
// check that receiver_email is your Primary PayPal email 	
// check that payment_amount/payment_currency are correct
// process payment
}
else if (strcmp ($res, "INVALID") == 0) {
// log for manual investigation
}
}
fclose ($fp);
}	


?>
