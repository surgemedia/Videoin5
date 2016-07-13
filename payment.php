<?
	if($_POST['check_bot-2']!=$_POST['color_match-2']){
		header('Location: http://vid5.surgehost.com.au/error.php?error=2');	//If cannot connect to the database, just redirectly back to font page
		exit;
	}
	
	include('db_connection_13r2fdfd34.php');
	if($_POST['font_size-2']=="34px"){$insert_font_size = "50px";}
	if($_POST['font_size-2']=="44px"){$insert_font_size = "100px";}
	if($_POST['font_size-2']=="54px"){$insert_font_size = "150px";}
	if($_POST['font_size-2']=="64px"){$insert_font_size = "200px";}
	if($_POST['font_size2-2']=="34px"){$insert_font_size2 = "50px";}
	if($_POST['font_size2-2']=="44px"){$insert_font_size2 = "100px";}
	if($_POST['font_size2-2']=="54px"){$insert_font_size2 = "150px";}
	if($_POST['font_size2-2']=="64px"){$insert_font_size2 = "200px";}
	if($_POST['font_size3-2']=="34px"){$insert_font_size3 = "50px";}
	if($_POST['font_size3-2']=="44px"){$insert_font_size3 = "100px";}
	if($_POST['font_size3-2']=="54px"){$insert_font_size3 = "150px";}
	if($_POST['font_size3-2']=="64px"){$insert_font_size3 = "200px";}
	
	$client_ipaddress = $_SERVER['REMOTE_ADDR'];
	$order_num = 'v5-'.time();
	
	if($_POST['fname-2']!="" && $_POST['email-2']!="" && $_POST['mobile-2']!=""){
		$insert_order = mysql_query("INSERT INTO v5_order VALUE("
		."NULL, '"
		.$order_num."', '', '', '"
		.$_POST['group-2']."', '"
		.$_POST['notes-2']."', '"
		.$_POST['upper_message-2']."', '"
		.$_POST['middle_message-2']."', '"
		.$_POST['bottom_message-2']."', '"
		.$_POST['font_tran-2']."', '"
		.$_POST['font_tran2-2']."', '"
		.$_POST['font_tran3-2']."', '"
		.$_POST['fname-2']."', '"
		.$_POST['email-2']."', '"
		.$_POST['mobile-2']."', '"
		.$_POST['font_style-2']."', '"
		.$_POST['font_style2-2']."', '"
		.$_POST['font_style3-2']."', '"
		.$insert_font_size."', '"
		.$insert_font_size2."', '"
		.$insert_font_size3."', '"
		.$_POST['backgroup_color-2']."', "
		."0, "
		."0, "
		."NULL, "
		."0, '"
		.$client_ipaddress."', '"
		.$_POST['company_name-2']
		."')");
		
		if(!$insert_order){
			header('Location: http://vid5.surgehost.com.au/error.php?error=3');	//If cannot connect to the database, just redirectly back to font page
		}else{
			$globel_data = mysql_query("SELECT * FROM global_datas ORDER BY id");//if can insert order information to database, allow php to take paypal account
			$globel_data_num = mysql_num_rows($globel_data);
			for($i=0; $i<$globel_data_num; $i++){
				$globel_data_row = 	mysql_fetch_array($globel_data);
				$globel_data_values[$globel_data_row['type_name']] = $globel_data_row['global_values'];
			}
		}
	}else{
		//header('Location: http://vid5.surgehost.com.au');	// if without any request information, just redirectly back to font page
	}
	$today = date(Y).'-'.date(m).'-'.date(d);
	$check_dupc = "SELECT * FROM v5_order WHERE ipaddress LIKE '".$client_ipaddress."' AND LEFT(paytime, 10) LIKE '".$today."'";
	$check_dupc_result = mysql_query($check_dupc);
	$check_dupc_num = mysql_num_rows($check_dupc_result);
	if($check_dupc_num>10){
		header('Location: http://vid5.surgehost.com.au/error.php?error=1');	//If cannot connect to the database, just redirectly back to font page
		exit;
	}
?>
<!DOCTYPE html>
<html lang="">
	<? include('head.php');?>
	<body>
	<? include('confirm_header.php');?>
	<section id="main" class=" wowd fadeInDown blockwidth grid">
   	<div id="slider" class="blockwidth mcenter">
   	<p>Your Video is uploading now, please confirm your order below and proceed to payment after complete file upload.<? echo $globel_data_values['PayPalAccount'];?></p>
        <div id="faq" class=" center">
    	<? 
			if($globel_data_values['PayPalAccount']!=""){ //if without Database connection, stop load the confirmation form.
				//check discount whether avaliable  --- Start
				$showpaymantamount = $globel_data_values['ChargeAmount'];
				if($globel_data_values['discount_percentage']!=""){
					$showofficalprice = '<del style="font-size:14px;">AU$ '.$globel_data_values['ChargeAmount'].'</del>';
					$showpaymantamount = $globel_data_values['ChargeAmount'] - ($globel_data_values['ChargeAmount'] * $globel_data_values['discount_percentage'] /100);
				}
				if(strtolower($_POST['pcode-2'])==$globel_data_values['discount_code']){
					//check the email whether already used this offer --- start
					$offerusedcheck = mysql_query("SELECT * FROM v5_order WHERE email LIKE '".$_POST['email-2']."' AND offer_usage = 1 AND payment_statue = 1");
					$offerusedcheck_num = mysql_num_rows($offerusedcheck);
					if($offerusedcheck_num==0){
						$showpaymantamount = $globel_data_values['ChargeAmount'] - $globel_data_values['Special_offer'];
						$showofficalprice = '<del style="font-size:14px;">AU$ '.$globel_data_values['ChargeAmount'].'</del>';
						$paypal_checkitemnumber = '<input type="hidden" name="item_number" value="v51117">'; //if user using offr code, it will send to paypal and update the payment have used the special offer.
					}else{
						$showofficalprice = '<span style="font-size:14px;">Your offer already used.</span>';
					}
				}
				if(strtolower($_POST['pcode-2'])==$globel_data_values['discount_code2']){
					//check the email whether already used this offer --- start
					$offerusedcheck = mysql_query("SELECT * FROM v5_order WHERE email LIKE '".$_POST['email-2']."' AND offer_usage = 1 AND payment_statue = 1");
					$offerusedcheck_num = mysql_num_rows($offerusedcheck);
					if($offerusedcheck_num==0){
						$showpaymantamount = $globel_data_values['ChargeAmount'] - $globel_data_values['Special_offer2'];
						$showofficalprice = '<del style="font-size:14px;">AU$ '.$globel_data_values['ChargeAmount'].'</del>';
						$paypal_checkitemnumber = '<input type="hidden" name="item_number" value="v51117">'; //if user using offr code, it will send to paypal and update the payment have used the special offer.
					}else{
						$showofficalprice = '<span style="font-size:14px;">Your offer already used.</span>';
					}
				}
				if(strtolower($_POST['pcode-2'])==$globel_data_values['discount_code3']){
					//check the email whether already used this offer --- start
					$offerusedcheck = mysql_query("SELECT * FROM v5_order WHERE email LIKE '".$_POST['email-2']."' AND offer_usage = 1 AND payment_statue = 1");
					$offerusedcheck_num = mysql_num_rows($offerusedcheck);
					if($offerusedcheck_num==0){
						$showpaymantamount = $globel_data_values['ChargeAmount'] - $globel_data_values['Special_offer3'];
						$showofficalprice = '<del style="font-size:14px;">AU$ '.$globel_data_values['ChargeAmount'].'</del>';
						$paypal_checkitemnumber = '<input type="hidden" name="item_number" value="v51117">'; //if user using offr code, it will send to paypal and update the payment have used the special offer.
					}else{
						$showofficalprice = '<span style="font-size:14px;">Your offer already used.</span>';
					}
				}
				//check discount whether avaliable  --- end
		?>
        <div>
        <h2>Order Confirm</h2>
        <h3>Please confirm your information:</h3>
            <div class="confirm_box">
            	<div class="price2"><?=$showofficalprice;?> AU$ <?=$showpaymantamount;?> <br>
					<span>included GST</span>
            	</div>
            	<div class="table_div">
                    <div class="table_div_tr">
                        <div class="table_div_td td_first_width">
                        <strong>Name:</strong>
                        </div>
                        <div class="table_div_td">
                        <?=$_POST['fname-2'];?>
                        </div>
                    </div>
                    <div class="table_div_tr tr_color">
                        <div class="table_div_td">
                        <strong>E-mail:</strong>
                        </div>
                        <div class="table_div_td">
                        <?=$_POST['email-2'];?>
                        </div>
                    </div>
                    <div class="table_div_tr">
                        <div class="table_div_td">
                        <strong>Contact Number:</strong>
                        </div>
                        <div class="table_div_td">
                        <?=$_POST['mobile-2'];?>
                        </div>
                    </div>
                    <div class="table_div_tr tr_color">
                        <div class="table_div_td">
                        <strong>Selected Logo style:</strong>
                        </div>
                        <div class="table_div_td">
                        <?=$_POST['group-2'];?>
                        </div>
                    </div>
                    <div class="table_div_tr">
                        <div class="table_div_td">
                        <strong>Message:</strong>
                        </div>
                        <div class="table_div_td">
                        <p><?=$_POST['upper_message-2'];?></p>
                        <p><?=$_POST['middle_message-2'];?></p>
                        <p><?=$_POST['bottom_message-2'];?></p>
                        </div>
                    </div>
                    <div class="table_div_tr tr_color">
                        <div class="table_div_td">
                        <strong>Message Font style:</strong>
                        </div>
                        <div class="table_div_td">
                        <p>upper:<?=$_POST['font_style-2'];?></p>
                        <p>middle:<?=$_POST['font_style2-2'];?></p>
                        <p>bottom:<?=$_POST['font_style3-2'];?></p>
                        </div>
                    </div>
                    <div class="table_div_tr">
                        <div class="table_div_td">
                        <strong>Message Font size:</strong>
                        </div>
                        <div class="table_div_td">
                        <p>upper: <?=$insert_font_size;?></p>
                        <p>middle: <?=$insert_font_size2;?></p>
                        <p>bottom: <?=$insert_font_size3;?></p>
                        </div>
                    </div>
                    <div class="table_div_tr tr_color">
                        <div class="table_div_td">
                        <strong>Background Color:</strong>
                        </div>
                        <div class="table_div_td">
                        <?=$_POST['backgroup_color-2'];?>
                        </div>
                    </div>
                    <div class="table_div_tr">
                        <div class="table_div_td">
                        <strong>Notes:</strong>
                        </div>
                        <div class="table_div_td">
                        <?=$_POST['notes-2'];?>
                        </div>
                    </div>
                    <div class="table_div_tr">
                        <div class="table_div_td">
                        <strong>Company Name:</strong>
                        </div>
                        <div class="table_div_td">
                        <?=$_POST['company_name-2'];?>
                        </div>
                    </div>
                </div>

                <form action="https://www.paypal.com/cgi-bin/webscr" method="post"><!--https://www.paypal.com/row/cgi-bin/webscr-->
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="<?=$globel_data_values['PayPalAccount'];?>"><!--Paypal Account-->
                <input type="hidden" name="item_name" value="<?=$order_num;?>"><!--order number-->
                <?=$paypal_checkitemnumber;?>
                <input type="hidden" name="currency_code" value="AUD">
                <input type="hidden" name="amount" value="<?=$showpaymantamount;?>">
                <input type="hidden" name="return" value="http://vid5.surgehost.com.au/thanks.php"><!--return Page-->
                <input type="hidden" name="no_shipping" value="1">
                <input type="submit" value="Confirm">
                </form>
                </div>
                <?
                    }else{
                        echo '<h1>Sorry! Please complete our video upload form!</h1>';	
						echo "INSERT INTO v5_order VALUE("
		."NULL, '"
		.$order_num."', '', '', '"
		.$_POST['group-2']."', '"
		.$_POST['notes-2']."', '"
		.$_POST['upper_message-2']."', '"
		.$_POST['middle_message-2']."', '"
		.$_POST['bottom_message-2']."', '"
		.$_POST['font_tran-2']."', '"
		.$_POST['font_tran2-2']."', '"
		.$_POST['font_tran3-2']."', '"
		.$_POST['fname-2']."', '"
		.$_POST['email-2']."', '"
		.$_POST['mobile-2']."', '"
		.$_POST['font_style-2']."', '"
		.$_POST['font_style2-2']."', '"
		.$_POST['font_style3-2']."', '"
		.$insert_font_size."', '"
		.$insert_font_size2."', '"
		.$insert_font_size3."', '"
		.$_POST['backgroup_color-2']."', "
		."0, "
		."0, "
		."NULL, "
		."0, '"
		.$client_ipaddress."', '"
		.$_POST['company_name-2']
		."')";
                    }
                ?>
            </div>
        </div>
	</div>

	</section>	
 <? include('footer.php');?>
	</body>
</html>