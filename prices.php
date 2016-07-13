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
    <h2>PRICES</h2>
    	<div style="line-height:50px;" class="terms"> 
    	  <p>Our pricing is very straight forward. We charge a flat fee of <strong>only $66 i</strong>nc gst per video as long as it is under 300MB. Please contact us is you want to use V5 for larger videos on<strong> 07 3137 1171 or info@videoinfive.com.au </strong></p>
    	</div>
	</div>
</div>

	</section>	

 <? include('footer.php');?>
	</body>
</html>