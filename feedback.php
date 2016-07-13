<?	
	include('db_connection_13r2fdfd34.php');
	$order_number = $_GET['order'];
	if($_POST['order']!=""){
		$order_number = $_POST['order'];
	}
	if($order_number!=""){
		$check_order = mysql_query("SELECT * FROM v5_order WHERE order_num LIKE '".$order_number."'");
		$check_order_num = mysql_num_rows($check_order);
		$check_order_row = mysql_fetch_array($check_order);
		if($_POST['feedback']!=""){
			$name = "V5 Surge Media- Feedback";
			$from = "cs@vid5.surgehost.com.au";
			$to .= "production@surgemedia.com.au" . ', ';
			$to .= "video@surgemedia.com.au";
			$subject = 'V5 Feedback: Order: '.$order_number;
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
    <td style="font-size: 13px; color: #213E4b; font-family: Verdana, Geneva, sans-serif; padding-bottom: 20px; padding-top: 20px; border-bottom-color: #16A4C3; border-top-color: #16A4C3; border-bottom-style: dotted; border-top-style: dotted; border-bottom-width: 1px; border-top-width: 1px;"><p>Problems of Video</p>
	<p>'.$_POST['feedback'].'</p>
      <p>Please help to contact client.</p>
	  <p>Client information:</p>
	  <p>Email: '.$check_order_row['email'].'</p>
	  <p>Contact number: '.$check_order_row['mobile'].'</p>
	  <p>Contact Person: '.$check_order_row['name'].'</p>
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
			
			if(mail($to, $subject, $message, $headers)){
				$errors_message = "<h2>Your feedback was sent. we will contact you as soon as possble. thank you.</h2>";
			}else{
				$errors_message = "<h2>Cannot send out your email, Please contact us by phone:  Ph:07 3137 1171 </h2>";
			}
			
		}
	}else{
		header('Location: http://vid5.surgehost.com.au/error.php?error=4');	//If have not this order number, just show the error message.
	}

?>
<!DOCTYPE html>
<html lang="">
	<? include('head.php');?>
	<body>
	<? include('confirm_header.php');?>
	<section id="main" class=" wowd fadeInDown blockwidth grid">
   	<div id="slider" class="blockwidth mcenter">
    	<form action="feedback.php" method="POST" enctype="multipart/form-data">
        <div id="faq" class=" center">
            <div>
            	<?=$errors_message;?>
                <h2>Comment and Feedback</h2>
            </div>
            <ul id="quote" class="form">
                <li>
                <label>Order number:</label>
                <input class="textbox" name="order" value="<?=$order_number;?>">
                </li>
                <li>
                <label>feedback:</label>
                <input class="textbox" name="feedback">
                </li>
                <li class="rslides_nav">
                <input type="submit" value="Send feedback">
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