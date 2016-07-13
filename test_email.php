<?
@ $db = mysql_connect("localhost","vid5surg_user","P@ssw0rd!VID");
if (!$db)
{
	echo "Database connection error! Please try again.";
	exit;
}
mysql_query("SET NAMES 'utf8'"); 
mysql_select_db("vid5surg_db");
			$takeorderinformation = mysql_query("SELECT * FROM v5_order WHERE order_num LIKE 'v5-1406877192'");
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
    <td style="font-size: 13px; color: #213E4b; font-family: Verdana, Geneva, sans-serif; padding-bottom: 20px; padding-top: 20px; border-bottom-color: #16A4C3; border-top-color: #16A4C3; border-bottom-style: dotted; border-top-style: dotted; border-bottom-width: 1px; border-top-width: 1px;"><p>Dear '.$_POST['name'].',</p>
      <p>Below is the invoice about your Video:</p>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span style="font-size:16px; font-weight:bold">INVOICE</span></td>
        </tr>
        <tr>
          <td width="200" valign="top">Order Number:</td>
          <td valign="top">'.$item_name.'<br/><br/></td>
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
          <td valign="top"><br/><br/>Background Color:</td>
          <td valign="top">'.$takeorderinformation_row['backgroup_color'].'</td>
        </tr>
        <tr>
          <td valign="top">Notes:</td>
          <td valign="top">'.$takeorderinformation_row['notes'].'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">Amount of Payment:</td>
          <td valign="top">'.$payment_amount.'<br/><br/></td>
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
			echo $message;
?>