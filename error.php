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
	<? include('error_header.php');?>

	<section id="main" class=" wowd fadeInDown blockwidth grid">
<div id="slider" class="blockwidth mcenter">
	<div id="faq" class=" center">
    <h2>ERROR!</h2>
    	<div style="text-align:center; line-height:50px;">
		<?
			if($_GET['error']==2){
				echo '
					If you are having trouble picking the correct color of the price field. 
					Please contact us <br/><a class="phone" href="tel:31371171" style="color:blue;">Ph:07 3137 1171</a>
				';
			}
			if($_GET['error']==1)
			{
				echo '
					You tried upload too many times, Please try again tomorrow.<br>
					Or contact us if the video files are oversize: Please contact us for any trouble<br/>
					<a class="phone" href="tel:31371171" style="color:blue;">Ph:07 3137 1171</a>
				';	
			}
			if($_GET['error']==3)
			{
				echo '
					Server Busy, Please try again!
				';	
			}
			if($_GET['error']==4)
			{
				echo '
					Order number cannot match our system. Please contact us for more details<br/>
					<a class="phone" href="tel:31371171" style="color:blue;">Ph:07 3137 1171</a>
				';	
			}
			if($_GET['error']==5)
			{
				echo '
					 Your Video file is over our upload limit, Please contact us for more option:<br/>
					<a class="phone" href="tel:31371171" style="color:blue;">Ph:07 3137 1171</a>
				';	
			}
			if($_GET['error']==6)
			{
				echo '
					Your Logo file is over our supported upload limit. Contact us for more option:<br/>
					<a class="phone" href="tel:31371171" style="color:blue;">Ph:07 3137 1171</a>
				';	
			}
		?>
        </div>
    </div>
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