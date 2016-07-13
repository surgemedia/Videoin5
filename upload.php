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
	<? include('upload_header.php');?>

	<section id="main" class=" wowd fadeInDown blockwidth grid">
<div id="slider" class="blockwidth mcenter">
	<div id="faq" class=" center">
    <h2>Thank You.</h2>
    	<div style="line-height:50px; text-align:center;" class="terms">
			<p>Thanks for your purchase, your video has been uploading! <br>Please be Patient.</p>
            <p>Depend on the file size and network bandwidth, the upload maybe need to take a hour or longer.</p>
			<!-- <p><img src="/teamphoto.jpg" alt=""></p> -->
    	</div>
    </div>
    </div>

	</section>	
 <? include('footer.php');?>
	</body>
</html>