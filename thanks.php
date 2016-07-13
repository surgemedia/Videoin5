<?
	include('db_connection_13r2fdfd34.php');
	
	$globel_data = mysql_query("SELECT * FROM global_datas ORDER BY id");//if can insert order information to database, allow php to take paypal account
	$globel_data_num = mysql_num_rows($globel_data);
	for($i=0; $i<$globel_data_num; $i++){
		$globel_data_row = 	mysql_fetch_array($globel_data);
		$globel_data_values[$globel_data_row['type_name']] = $globel_data_row['values'];
	}
?>
<!DOCTYPE html>
<html lang="">
	<? include('head.php');?>
	<body>
	<? include('content_header.php');?>

	<section id="main" class=" wowd fadeInDown blockwidth grid">
<div id="slider" class="blockwidth mcenter">
	<div id="faq" class=" center">
    <h2>Thank You.</h2>
    	<div style="line-height:50px; text-align:center;" class="terms">
			<p>Thanks for your purchase, your video in the pipeline. <br>
				Please be Patient. All videos are reviewed by a technician to insure quality.</p>
			<p><strong>Your video will be delivered to you with in 1 business day.</strong></p>
			<p>We will email you a link to download your video when its ready.</p>
			<p><i style="font-style:italic">Horray!</i></p>
			<p>We know you will enjoy the power of video, and hope to see you again. </p>
            <?
			$offerusedcheck = mysql_query("SELECT * FROM v5_order WHERE email LIKE '".$_POST['email']."' AND offer_usage = 1 AND payment_statue = 1");
			$offerusedcheck_num = mysql_num_rows($offerusedcheck);
			if($offerusedcheck_num<=5)// Check offer usage time, if total more than 5 times will stop any discount.
			{
			?>
			<p>
            	V5 would like to offer you a 10% discount on your next V5 video. To redeem your discount please enter the code below on your next purchase.
			</p>
			<div class="coupon"><strong>v512455</strong></div>
			<!-- <p><img src="/teamphoto.jpg" alt=""></p> -->
            <?
			}
			?>
    	</div>
    </div>
    </div>

	</section>	
 <? include('footer.php');?>
	</body>
</html>