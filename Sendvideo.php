<?	
	include('db_connection_13r2fdfd34.php');
	if($_POST['order_number']!=""){
		$check_order = mysql_query("SELECT * FROM v5_order_new_live WHERE order_num LIKE '".$_POST['order_number']."'");
		$check_order_num = mysql_num_rows($check_order);
		$check_order_row = mysql_fetch_array($check_order);
		
		if($check_order_num!=0){
			$name = "V5 Surge Media";
			$from = "cs@vid5.surgehost.com.au";
			$to = $check_order_row['email'];
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
          <td>Downlaod Link:</td>
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
			
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			
			$headers .="From: ". $name . " <" . $from . ">\r\n";
			
			mail($to, $subject, $message, $headers);										
			
		}else{
			$errors_message = '<h2 style="color:red;">Have not this order number. please double check again.</h2>';
		}
	}
?>
<!DOCTYPE html>
<html lang="">
	<? include('head.php');?>
	<body>
	<? include('confirm_header.php');?>
	<section id="main" class=" wowd fadeInDown blockwidth grid">
   	<div id="slider" class="blockwidth mcenter">
    	<form action="#" method="post" enctype="multipart/form-data">
        <div id="faq" class=" center">
            <div>
            	<?=$errors_message;?>
                <h2>Completed Video</h2>
            </div>
            <ul id="quote" class="form">
                <li>
                <label>Order number:</label>
                <input id="order_number" class="textbox" name="order_number">
                </li>
                <li>
                <label>Video link:</label>
                <input id="video_linking" class="textbox" name="video_linking">
                </li>
                <li class="rslides_nav">
                <input type="submit" value="Send Completed video">
                </li>
            </ul>
        </div>
        </form>
	</div>

	</section>	
    

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		<script src="js/wow.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.backgroundvideo.min.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>