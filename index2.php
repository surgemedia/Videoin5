<?
	include('db_connection_13r2fdfd34.php');
	
	$globel_data = mysql_query("SELECT * FROM global_datas ORDER BY id");//if can insert order information to database, allow php to take paypal account
	$globel_data_num = mysql_num_rows($globel_data);
	for($i=0; $i<$globel_data_num; $i++){
		$globel_data_row = 	mysql_fetch_array($globel_data);
		$globel_data_values[$globel_data_row['type_name']] = $globel_data_row['global_values'];
	}
	$order_num = 'v5-'.time();
?>
<!DOCTYPE html>
<html lang="">
	<? include('head.php');?>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	 <script src="loadingbar.js"></script>  
	<script>
		$(document).ready(function() {
	
			// $('#submitbutton').addClass('hide');
			$("#helper_text").hide();
			$('input').change(function(e) {
				if ($('#fname').val() && $('#mobile').val() && $('#email').val() && $('#logo').val() && $('#video').val()) {

					$('.rslides_nav.rslides1_nav.next').hide();
					$("#helper_text").show();
				}
			});
		});
		function validateForm2()
		{
			var x=document.forms["apply_form"]["email"].value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				alert("E-mail must be a valid email address");
				return false;
			}else{
				$( ".dialog" ).addClass("display");
			}
		} 
    </script>
 <style>  
 .progress { position:relative; width:330px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }  
 .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }  
 .percent { position:absolute; display:inline-block; top:3px; left:48%; }  
 </style>  
	<body>
	<? include('header.php');?>

	<section id="main" class=" wowd fadeInDown blockwidth grid">
	<div id="how_it_works">
		<ul class="blockwidth mcenter" >
			<li>
			<a href="#slider">
            	<div class="icon_border">
                    <i class="thin upload"></i>
				</div>
            </a>
				<h3>Upload your content</h3>
				<p>
					Upload your logo and video to make awesome and professional videos.
				</p>
			</li>
			<li>
			<a href="#slider">
				<div class="icon_border">
                	<i class="thin create"></i>
				</div>
            </a>
				<h3>Choose your style</h3>
				<p>
					Select the background color for your logo, as well as font style and color. 
				</p>
			</li>
			<li>
			<a href="#slider">
            	<div class="icon_border">
                    <i class="thin message"></i>
				</div>
            </a>
				<h3>Add your message</h3>
				<p>
					add your message in the end of video like your contact information or a thanks message.
				</p>
			</li>
			<li>
			<a href="#slider">
            	<div class="icon_border">
					<i class="thin wait"></i>
				</div>
            </a>
				<h3>Play the waiting game</h3>
				<p>We take quality seriously thats why all our V5 Videos are checked by our staff before they are delivered.</p>
			</li>
		</ul>
	</div>

		<!--<form action="process.php" method="post" enctype="multipart/form-data" onsubmit="
        	if(this.name.value==''){ alert('Please input your full name'); this.name.focus(); return false} 
        	if(this.email.value==''){ alert('You need your email to send the completed video'); this.email.focus(); return false} 
        	if(this.mobile.value==''){ alert('Your contact number can help u to check with you!'); this.mobile.focus(); return false} 
        ">-->
		<div id="slider" class="blockwidth mcenter" >
			<ul class="rslides" >
			<li  class="slide">
				<div id="faq" class=" mcenter">
				<div class="col-1-2">
					<h2>What Is V5?</h2>
                    <iframe class="" width="100%" height="240" src="//www.youtube.com/embed/LpCB5FLnGKE?showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                  <div class="col-1-2">
                  <h2>V5 Explained</h2>
                    <iframe class="" width="100%" height="240" src="//www.youtube.com/embed/wa6sp6jNxko?showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="clear pad-top">
					<p class="text_center">Use the Number in the circle below to jump between the steps. If you have missed a step, you can quicly jump back to it using these numbers</p>
				</div>
			</div>
			</li>
				<li class="upload slide">
            <form action="video_upload.php" method="post" id="form1" enctype="multipart/form-data" name="apply_form" onsubmit="
                if(this.name.value==''){ alert('Name cannot empty!'); this.name.focus(); $('#full_name').addClass('error'); return false} 
                if(this.email.value==''){ alert('E-mail cannot empty!'); this.email.focus(); $('#email').addClass('error'); return false} 
                if(this.mobile.value==''){ alert('Contact number cannot empty!'); this.mobile.focus(); $('#contact_number').addClass('error'); return false} 
                if(this.video.value==''){ alert('Please upload your video!'); this.video_file.focus(); return false}
                if(this.check_bot.value!=this.color_match.value){ alert('Looks like you missed a step. This is to prove your a human not a robot. What is the color of the price box? Please answer this question by choosing the color from the dropdown under the price box '); this.color_match.focus(); $('#captcha').addClass('error'); return false}else{
                    }
                return validateForm2();
             ">
			    
				<h2>Upload Content</h2>
				<div class="col-1-2">
				<h3>Upload your <strong>Logo</strong><br></h3>
					<div class="square_wrapper" id="icon_square_wrapper">
                    	<i class="thin upload" id="logo_icon"><input type="file" name="logo_file" id="logo_file"/><input name="logo_file2" id="logo_file2"/></i>
					</div>
					<div class="uploader">
						<!-- <iframe src="http://dbinbox.com/foolishfox" frameborder="0"></iframe> -->
                        <input id="logo" disabled="disabled" class="disable_input">
					</div>
				</div>
				<div class="col-1-2">
				<h3>Upload your <strong>Video</strong></h3>
					<div class="square_wrapper">
                    	<i class="thin upload"><input type="file" name="video_file" id="video_file"/></i>
					</div>
					<div class="uploader">
						<!-- <iframe src="http://dbinbox.com/foolishfox" frameborder="0"></iframe> -->
                        <input id="video" disabled="disabled" class="disable_input">
					</div>
				</div>
                <input type="button" value="I have not any company Logo" id="mission_logo">
                <ul class="form disappear"  id="companyname">
					<li class="col-1-2 video_message companyname">
						<h3>Don't have a Logo? Type your name or company here to show in video.</h3>
                        <input name="upper_cname" class="textarea2 message_style top_message" id="realtime_tcname"/>
                        <input name="middle_cname" class="textarea2 message_style middle_message" id="realtime_mcname"/>
                        <input name="bottom_cname" class="textarea2 message_style bottom_message" id="realtime_bcname"/>
					</li>
                    <div id="cselect_option1">				
                        <li class="col-1-2 video_message_options video_message_options_first display">
                        <h3>Choose font </h3>
                        <div class="select">
                        <select name="cfont_style" id="cfont_style">
                            <option value="Arial">Arial</option>
                            <option value="Open Sans">Open Sans</option>
                            <option value="Raleway">Raleway</option>
                            <option value="Montserrat">Montserrat</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose font size</h3>
                        <div class="select">
                        <select name="cfont_size" id="cfont_size">
                            <option value="34px">50px</option>
                            <option value="44px">100px</option>
                            <option value="54px">150px</option>
                            <option value="64px">200px</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose Uppercase or Lowercase</h3>
                        <div class="select">
                        <select name="cfont_tran" id="cfont_tran">
                            <option value="none">Normal</option>
                            <option value="uppercase">uppercase</option>
                            <option value="lowercase">lowercase</option>
                        </select>
                        </div>
                    </li>
                     </div>
                    <div id="cselect_option2" class="disappear">				
                        <li class="col-1-2 video_message_options video_message_options_first display">
                        <h3>Choose font </h3>
                        <div class="select">
                        <select name="cfont_style2" id="cfont_style2">
                            <option value="Arial">Arial</option>
                            <option value="Open Sans">Open Sans</option>
                            <option value="Raleway">Raleway</option>
                            <option value="Montserrat">Montserrat</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose font size</h3>
                        <div class="select">
                        <select name="cfont_size2" id="cfont_size2">
                            <option value="34px">50px</option>
                            <option value="44px">100px</option>
                            <option value="54px">150px</option>
                            <option value="64px">200px</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose Uppercase or Lowercase</h3>
                        <div class="select">
                        <select name="cfont_tran2" id="cfont_tran2">
                            <option value="none">normal</option>
                            <option value="uppercase">uppercase</option>
                            <option value="lowercase">lowercase</option>
                        </select>
                        </div>
                    </li>
                     </div>
                    <div id="cselect_option3" class="disappear">						
                        <li class="col-1-2 video_message_options video_message_options_first display">
                        <h3>Choose font </h3>
                        <div class="select">
                        <select name="cfont_style3" id="cfont_style3">
                            <option value="Arial">Arial</option>
                            <option value="Open Sans">Open Sans</option>
                            <option value="Raleway">Raleway</option>
                            <option value="Montserrat">Montserrat</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose font size</h3>
                        <div class="select">
                        <select name="cfont_size3" id="cfont_size3">
                            <option value="34px">50px</option>
                            <option value="44px">100px</option>
                            <option value="54px">150px</option>
                            <option value="64px">200px</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose Uppercase or Lowercase</h3>
                        <div class="select">
                        <select name="cfont_tran3" id="cfont_tran3">
                            <option value="none">Normal</option>
                            <option value="uppercase">uppercase</option>
                            <option value="lowercase">lowercase</option>
                        </select>
                        </div>
                    </li>
                     </div>
                       <!--  <li class="col-1-2">
                            <h4>Add your notes or request of message.</h4>
                            <textarea class="textarea" name="notes_bumsg"></textarea>
                        </li> -->
                    <li class="col-1-2">
                        <h3>Color of Company name</h3>
                         <div class="select">
                         <input type="color" name="cbackgroup_color"  id="cbackgroup_color">
                        </div>
                    </li>
                    <li class="col-1-2">
                        <h3>Background Color of Message and Logo(the text will be other)</h3>
                         <div class="select">
                        <select name="backgroup_color"  id="backgroup_color">
                            <option value="white">White</option>
                            <option value="black">Black</option>
                        </select>
                        </div>
                    </li>
                </ul>
				<p class="pad-top">V5 is the web app providing for quick and short video, If your file is over 300 MB, please contact us: Ph:07 3137 1171</p>

				</li>
				<li class="slide">
					<h2>Choose your style</h2>
					
					<ul id="animations">
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="PUSH" checked="checked"/> <img src="img/V5-PUSH.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="PUSH-AND-FLARE"><img src="img/V5-PUSH-AND-FLARE.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="FAST-PUSH"><img src="img/V5-FAST-PUSH.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="FALL-IN"><img src="img/V5-FALL-IN.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="RUSH-IN"><img src="img/V5-RUSH-IN.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="FADE-PUSH"><img src="img/V5-FADE-PUSH.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="SWEEP-PUSH"><img src="img/V5-SWEEP-PUSH.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="SPIN-IN"><img src="img/V5-SPIN-IN.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
						<li class="options">
                            <label>
                            <input name="group" type="radio" value="FADE-SWEEP-PUSH"><img src="img/V5-FADE-SWEEP-PUSH.gif" alt="">
						<p class="name"></p>

                            </label>
                        </li>
					</ul>
				</li>
				<!--<li class="slide">
					<h2>Choose your Logo display in Video</h2>
					
					<ul id="animations">
						<li class="options">
                        	<label><input name="group2" type="radio" value="upper-left" checked="checked"/> <img src="img/upper-left.jpg" alt=""></label>
                        </li>
						<li class="options">
                        	<label><input name="group2" type="radio" value="upper-central"><img src="img/upper-central.jpg" alt=""></label>
                        </li>
						<li class="options">
                        	<label><input name="group2" type="radio" value="upper-right"><img src="img/upper-right.jpg" alt=""></label>
                        </li>
						<li class="options">
                        	<label><input name="group2" type="radio" value="central-left"><img src="img/central-left.jpg" alt=""></label>
                        </li>
						<li class="options">
                        	<label><input name="group2" type="radio" value="non-logo"><img src="img/non-logo.jpg" alt=""></label>
                        </li>
						<li class="options">
                        	<label><input name="group2" type="radio" value="central-right.jpg"><img src="img/central-right.jpg" alt=""></label>
                        </li>
						<li class="options">
                        	<label><input name="group2" type="radio" value="bottom-left"><img src="img/bottom-left.jpg" alt=""></label>
                        </li>
						<li class="options">
                        	<label><input name="group2" type="radio" value="bottom-central"><img src="img/bottom-central.jpg" alt=""></label>
                        </li>
						<li class="options">
                        	<label><input name="group2" type="radio" value="bottom-right"><img src="img/bottom-right.jpg" alt=""></label>
                        </li>
					</ul>
				</li>-->
				<li class="slide">
				<h2>Add you message</h2>
                <p>This message will display at the end of your video before your logo animation. <br>
					Perfect for contact details or your company's message.
                </p>
				<ul class="form">
					<li class="col-1-2 video_message">
                    <input name="invoice_number" value="<?=$order_num;?>">
						<h3>Enter Message Below</h3>
                        <input name="upper_message" class="textarea2 message_style top_message" id="realtime_upmsg"/>
                        <input name="middle_message" class="textarea2 message_style middle_message" id="realtime_mdmsg"/>
                        <input name="bottom_message" class="textarea2 message_style bottom_message" id="realtime_bumsg"/>
					</li>
                    <div id="select_option1">				
                        <li class="col-1-2 video_message_options video_message_options_first display">
                        <h3>Choose font </h3>
                        <div class="select">
                        <select name="font_style" id="font_style">
                            <option value="Arial">Arial</option>
                            <option value="Open Sans">Open Sans</option>
                            <option value="Raleway">Raleway</option>
                            <option value="Montserrat">Montserrat</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose font size</h3>
                        <div class="select">
                        <select name="font_size" id="font_size">
                            <option value="34px">50px</option>
                            <option value="44px">100px</option>
                            <option value="54px">150px</option>
                            <option value="64px">200px</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose Uppercase or Lowercase</h3>
                        <div class="select">
                        <select name="font_tran" id="font_tran">
                            <option value="none">Normal</option>
                            <option value="uppercase">uppercase</option>
                            <option value="lowercase">lowercase</option>
                        </select>
                        </div>
                    </li>
                     </div>
                    <div id="select_option2" class="disappear">				
                        <li class="col-1-2 video_message_options video_message_options_first display">
                        <h3>Choose font </h3>
                        <div class="select">
                        <select name="font_style2" id="font_style2">
                            <option value="Arial">Arial</option>
                            <option value="Open Sans">Open Sans</option>
                            <option value="Raleway">Raleway</option>
                            <option value="Montserrat">Montserrat</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose font size</h3>
                        <div class="select">
                        <select name="font_size2" id="font_size2">
                            <option value="34px">50px</option>
                            <option value="44px">100px</option>
                            <option value="54px">150px</option>
                            <option value="64px">200px</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose Uppercase or Lowercase</h3>
                        <div class="select">
                        <select name="font_tran2" id="font_tran2">
                            <option value="none">Normal</option>
                            <option value="uppercase">uppercase</option>
                            <option value="lowercase">lowercase</option>
                        </select>
                        </div>
                    </li>
                     </div>
                    <div id="select_option3" class="disappear">						
                        <li class="col-1-2 video_message_options video_message_options_first display">
                        <h3>Choose font </h3>
                        <div class="select">
                        <select name="font_style3" id="font_style3">
                            <option value="Arial">Arial</option>
                            <option value="Open Sans">Open Sans</option>
                            <option value="Raleway">Raleway</option>
                            <option value="Montserrat">Montserrat</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose font size</h3>
                        <div class="select">
                        <select name="font_size3" id="font_size3">
                            <option value="34px">50px</option>
                            <option value="44px">100px</option>
                            <option value="54px">150px</option>
                            <option value="64px">200px</option>
                        </select>
                        </div>
                        </li>
                        <li class="col-1-2 video_message_options display">
                        <h3>Choose Uppercase or Lowercase</h3>
                        <div class="select">
                        <select name="font_tran3" id="font_tran3">
                            <option value="none">Normal</option>
                            <option value="uppercase">uppercase</option>
                            <option value="lowercase">lowercase</option>
                        </select>
                        </div>
                    </li>
                     </div>
                       <!--  <li class="col-1-2">
                            <h4>Add your notes or request of message.</h4>
                            <textarea class="textarea" name="notes_bumsg"></textarea>
                        </li> -->
				</ul>
				
                	
                </li>
				<li class="slide">
					<h2>Your Video Quote</h2>
                    <div name="checker" class="price" disabled="disabled" style="background-color:
					<?
						$CAPCHA_colors = mysql_query("SELECT * FROM CAPCHA_colors ORDER BY id");//get all colors from database.
						$CAPCHA_colors_num = mysql_num_rows($CAPCHA_colors);//checking how many color in database.
						for($i=0; $i<$CAPCHA_colors_num; $i++){
							$CAPCHA_colors_row = 	mysql_fetch_array($CAPCHA_colors);
							$CAPCHA_colors_id = $CAPCHA_colors_row['id'];
							$CAPCHA_colors_name[$CAPCHA_colors_id] = $CAPCHA_colors_row['color_code'];
						}
						$rand_color = (rand(1,$CAPCHA_colors_num));
						echo '#'.$CAPCHA_colors_name[$rand_color].';';
					?>
                    ">
                    <?
						$show_price = 'AU$ '.$globel_data_values['ChargeAmount'];
						if($globel_data_values['discount_percentage']!=""){
							$delshow1 = '<del style="font-size:14px;">AU$ '.$globel_data_values['ChargeAmount'].'</del>';
							$show_price_edit = $globel_data_values['ChargeAmount'] - ($globel_data_values['ChargeAmount'] * $globel_data_values['discount_percentage'] /100);
							$show_price = 'AU$ '.$show_price_edit;
						}
					?>
                    <?=$delshow1.$show_price;?> <br>
					<span style="font-size:14px;">included GST</span></div>
                    <input name="check_bot" type="hidden" value="<?=$rand_color;?>">
                    <ul id="quote" class="form">
                         <li id="captcha">
                            <h3>To proceed with your quote please select the color of the box above?</h3>
                             <div class="select">
                            <select name="color_match">
                            	<option value="0">White</option>
							<?
                                $colors_for_check = mysql_query("SELECT * FROM CAPCHA_colors ORDER BY id");//get all colors from database.
                                $colors_for_check_num = mysql_num_rows($colors_for_check);
                                for($i=0; $i<$colors_for_check_num; $i++){
                                    $colors_for_check_row = mysql_fetch_array($colors_for_check);
									echo '<option value="'.$colors_for_check_row['id'].'">'.$colors_for_check_row['color'].'</option>';
                                }
                            ?>
                            </select>
                            </div>
                        </li>
                        <li id="full_name">
                            <label>Your full name</label><input id="fname" name="name" class="textbox">
                    	</li>
                    	<li id="your_email">
                            <label>E-mail</label><input id="email" name="email" class="textbox">
                    	</li>
                    	<li id="contact_number">
                            <label>Contact number</label><input id="mobile" name="mobile" class="textbox" maxlength="10" onchange="if(/\D/.test(this.value)){alert('Support Digial Only');this.value='';}"><br>
                    	</li>
                    	<li id="promo_code">
                            <label>Promotion Code</label><input name="pcode" class="textbox"><br>
                    	</li>
                        <li class="col-1-2"><h3>Any addition notes about your video?</h3>
                            <textarea name="notes" class="textarea"></textarea>
                        </li>
                    </ul>
					<input type="button" value="Generate your Video" id="submitbutton">
                    
                        
				</li>
			</ul>
			
                    </form>
		</div>
        
		<p id="helper_text">You can jump between steps by pressing the numbers</p>
        <!--</form>-->
        
	</section>	
    <form action="process2.php" method="post" id="form2" >
    <input id="logo-2" name="logo-2">
    <input id="video-2" name="video-2">
    <input name="invoice_number-2" value="<?=$order_num;?>">
    <input name="upper_cname-2" id="upper_cname-2">
    <input name="middle_cname-2" id="middle_cname-2">
    <input name="bottom_cname-2" id="bottom_cname-2">
    <input name="cfont_style-2" id="cfont_style-2" value="Arial">
    <input name="cfont_size-2" id="cfont_size-2" value="34px">
    <input name="cfont_tran-2" id="cfont_tran-2" value="none">
    <input name="cfont_style2-2" id="cfont_style2-2" value="Arial">
    <input name="cfont_size2-2" id="cfont_size2-2" value="34px">
    <input name="cfont_tran2-2" id="cfont_tran2-2" value="none">
    <input name="cfont_style3-2" id="cfont_style3-2" value="Arial">
    <input name="cfont_size3-2" id="cfont_size3-2" value="34px">
    <input name="cfont_tran3-2" id="cfont_tran3-2" value="none">
    <input name="cbackgroup_color-2" id="cbackgroup_color-2" value="#fff">
    <input name="backgroup_color-2" id="backgroup_color-2" value="white">
    <input name="upper_message-2" id="upper_message-2">
    <input name="middle_message-2" id="middle_message-2">
    <input name="bottom_message-2" id="bottom_message-2">
    <input name="font_style-2" id="font_style-2" value="Arial">
    <input name="font_size-2" id="font_size-2" value="34px">
    <input name="font_tran-2" id="font_tran-2" value="none">
    <input name="font_style2-2" id="font_style2-2" value="Arial">
    <input name="font_size2-2" id="font_size2-2" value="34px">
    <input name="font_tran2-2" id="font_tran2-2" value="none">
    <input name="font_style3-2" id="font_style3-2" value="Arial">
    <input name="font_size3-2" id="font_size3-2" value="34px">
    <input name="font_tran3-2" id="font_tran3-2" value="none">
    <input name="fname-2" id="fname-2">
    <input name="email-2" id="email-2">
    <input name="mobile-2" id="mobile-2">
    <input name="group-2" id="group-2" value="PUSH">
    <input name="pcode-2" id="pcode-2">
    <input name="color_match-2" id="color_match-2">
    <input name="check_bot-2" value="<?=$rand_color;?>">
    <input name="notes-2" id="notes-2">
    </form>
    <div class="dialog">
    	<p>Thanks for your purchase, your video has been uploading! <br>Please be Patient.</p>
        <p>Depend on the file size and network bandwidth, the upload maybe need to take a hour or longer.</p>
       <div class="progress">  
         <div class="bar"></div >  
         <div class="percent">0%</div >  
       </div>  
    </div>
    <? include('footer.php');?>
    
		<script>
			$('#realtime_tcname').change(function(){ $('#upper_cname-2').val($(this).val()); });		
			$('#realtime_mcname').change(function(){ $('#middle_cname-2').val($(this).val()); });		
			$('#realtime_bcname').change(function(){ $('#bottom_cname-2').val($(this).val()); });		
			$('#cfont_style').change(function(){ $('#cfont_style-2').val($(this).val()); });		
			$('#cfont_size').change(function(){ $('#cfont_size-2').val($(this).val()); });		
			$('#cfont_tran').change(function(){ $('#cfont_tran-2').val($(this).val()); });		
			$('#cfont_style2').change(function(){ $('#cfont_style2-2').val($(this).val()); });		
			$('#cfont_size2').change(function(){ $('#cfont_size2-2').val($(this).val()); });		
			$('#cfont_tran2').change(function(){ $('#cfont_tran2-2').val($(this).val()); });		
			$('#cfont_style3').change(function(){ $('#cfont_style3-2').val($(this).val()); });		
			$('#cfont_size3').change(function(){ $('#cfont_size3-2').val($(this).val()); });		
			$('#cfont_tran3').change(function(){ $('#cfont_tran3-2').val($(this).val()); });		
			$('#cbackgroup_color').change(function(){ $('#cbackgroup_color-2').val($(this).val()); });		
			$('#backgroup_color').change(function(){ $('#backgroup_color-2').val($(this).val()); });		
			$('#realtime_upmsg').change(function(){ $('#upper_message-2').val($(this).val()); });		
			$('#realtime_mdmsg').change(function(){ $('#middle_message-2').val($(this).val()); });		
			$('#realtime_bumsg').change(function(){ $('#bottom_message-2').val($(this).val()); });		
			$('#font_style').change(function(){ $('#font_style-2').val($(this).val()); });		
			$('#font_size').change(function(){ $('#font_size-2').val($(this).val()); });		
			$('#font_tran').change(function(){ $('#font_tran-2').val($(this).val()); });		
			$('#font_style2').change(function(){ $('#font_style2-2').val($(this).val()); });		
			$('#font_size2').change(function(){ $('#font_size2-2').val($(this).val()); });		
			$('#font_tran2').change(function(){ $('#font_tran2-2').val($(this).val()); });		
			$('#font_style3').change(function(){ $('#font_style3-2').val($(this).val()); });		
			$('#font_size3').change(function(){ $('#font_size3-2').val($(this).val()); });		
			$('#font_tran3').change(function(){ $('#font_tran3-2').val($(this).val()); });		
			$('#fname').change(function(){ $('#fname-2').val($(this).val()); });		
			$('#email').change(function(){ $('#email-2').val($(this).val()); });		
			$('#mobile').change(function(){ $('#mobile-2').val($(this).val()); });		
			$('input[name=group]').change(function(){ $('#group-2').val($(this).val()); });		
			$('input[name=pcode]').change(function(){ $('#pcode-2').val($(this).val()); });		
			$('select[name=color_match]').change(function(){ $('#color_match-2').val($(this).val()); });		
			$('textarea[name=notes]').change(function(){ $('#notes-2').val($(this).val()); });		
			$('#logo_file').change(function(){
				  $('#logo').val(this.files && this.files.length ? this.files[0].name : this.value.replace(/^C:\\fakepath\\/i, ''));
				  $('#logo-2').val(this.files && this.files.length ? this.files[0].name : this.value.replace(/^C:\\fakepath\\/i, ''));
				  $( "#companyname" ).addClass("disappear");
				  $( "#mission_logo" ).removeClass("disappear");
			});		
			$('#video_file').change(function(){
				  $('#video').val(this.files && this.files.length ? this.files[0].name : this.value.replace(/^C:\\fakepath\\/i, ''));
				  $('#video-2').val(this.files && this.files.length ? this.files[0].name : this.value.replace(/^C:\\fakepath\\/i, ''));
			});
			$('#font_style').change(function(){
				var jq_style1 = $(this).val();
				$('#realtime_upmsg').css('font-family', jq_style1), 'important';
			});
			$('#font_size').change(function(){
				var jq_style2 = $(this).val();
				$('#realtime_upmsg').css('font-size', jq_style2, 'important');
			});
			$('#font_tran').change(function(){
				var jq_style3 = $(this).val();
				$('#realtime_upmsg').css('text-transform', jq_style3, 'important');
			});
			$('#cfont_style').change(function(){
				var jq_style11 = $(this).val();
				$('#realtime_tcname').css('font-family', jq_style11), 'important';
			});
			$('#cfont_size').change(function(){
				var jq_style12 = $(this).val();
				$('#realtime_tcname').css('font-size', jq_style12, 'important');
			});
			$('#cfont_tran').change(function(){
				var jq_style13 = $(this).val();
				$('#realtime_tcname').css('text-transform', jq_style13, 'important');
			});
			$('#font_style2').change(function(){
				var jq_style4 = $(this).val();
				$('#realtime_mdmsg').css('font-family', jq_style4), 'important';
			});
			$('#font_size2').change(function(){
				var jq_style5 = $(this).val();
				$('#realtime_mdmsg').css('font-size', jq_style5, 'important');
			});
			$('#font_tran2').change(function(){
				var jq_style6 = $(this).val();
				$('#realtime_mdmsg').css('text-transform', jq_style6, 'important');
			});
			$('#cfont_style2').change(function(){
				var jq_style14 = $(this).val();
				$('#realtime_mcname').css('font-family', jq_style14), 'important';
			});
			$('#cfont_size2').change(function(){
				var jq_style15 = $(this).val();
				$('#realtime_mcname').css('font-size', jq_style15, 'important');
			});
			$('#cfont_tran2').change(function(){
				var jq_style16 = $(this).val();
				$('#realtime_mcname').css('text-transform', jq_style16, 'important');
			});
			$('#font_style3').change(function(){
				var jq_style7 = $(this).val();
				$('#realtime_bumsg').css('font-family', jq_style7), 'important';
			});
			$('#font_size3').change(function(){
				var jq_style8 = $(this).val();
				$('#realtime_bumsg').css('font-size', jq_style8, 'important');
			});
			$('#font_tran3').change(function(){
				var jq_style9 = $(this).val();
				$('#realtime_bumsg').css('text-transform', jq_style9, 'important');
			});
			$('#cfont_style3').change(function(){
				var jq_style17 = $(this).val();
				$('#realtime_bcname').css('font-family', jq_style17), 'important';
			});
			$('#cfont_size3').change(function(){
				var jq_style18 = $(this).val();
				$('#realtime_bcname').css('font-size', jq_style18, 'important');
			});
			$('#cfont_tran3').change(function(){
				var jq_style19 = $(this).val();
				$('#realtime_bcname').css('text-transform', jq_style19, 'important');
			});
			$( "#backgroup_color" ).change(function () {
				$( "#realtime_upmsg" ).removeClass("bg_White bg_Black");
				$( "#realtime_mdmsg" ).removeClass("bg_White bg_Black");
				$( "#realtime_bumsg" ).removeClass("bg_White bg_Black");
				$( "#realtime_tcname" ).removeClass("bg_White bg_Black");
				$( "#realtime_mcname" ).removeClass("bg_White bg_Black");
				$( "#realtime_bcname" ).removeClass("bg_White bg_Black");
				var colorclass = "";
				$( "#backgroup_color option:selected" ).each(function() {
					colorclass += "bg_"+$( this ).text() + " ";
				});
				$( "#realtime_upmsg" ).addClass(colorclass);
				$( "#realtime_mdmsg" ).addClass(colorclass);
				$( "#realtime_bumsg" ).addClass(colorclass);
				$( "#realtime_tcname" ).addClass(colorclass);
				$( "#realtime_mcname" ).addClass(colorclass);
				$( "#realtime_bcname" ).addClass(colorclass);
			})
			$( "#cbackgroup_color" ).change(function () {
				var jq_style20 = $(this).val();
				$( "#realtime_tcname" ).css('color', jq_style20);
				$( "#realtime_mcname" ).css('color', jq_style20);
				$( "#realtime_bcname" ).css('color', jq_style20);
			})
			.change();
			$('#realtime_upmsg').focus(function() {
				$( "#select_option1" ).removeClass("display disappear");
				$( "#select_option2" ).removeClass("display disappear");
				$( "#select_option3" ).removeClass("display disappear");
				$( "#select_option1" ).addClass("display");
				$( "#select_option2" ).addClass("disappear");
				$( "#select_option3" ).addClass("disappear");
			});
			$('#realtime_mdmsg').focus(function() {
				$( "#select_option1" ).removeClass("display disappear");
				$( "#select_option2" ).removeClass("display disappear");
				$( "#select_option3" ).removeClass("display disappear");
				$( "#select_option1" ).addClass("disappear");
				$( "#select_option2" ).addClass("display");
				$( "#select_option3" ).addClass("disappear");
			});
			$('#realtime_bumsg').focus(function() {
				$( "#select_option1" ).removeClass("display disappear");
				$( "#select_option2" ).removeClass("display disappear");
				$( "#select_option3" ).removeClass("display disappear");
				$( "#select_option1" ).addClass("disappear");
				$( "#select_option2" ).addClass("disappear");
				$( "#select_option3" ).addClass("display");
			});
			$('#realtime_tcname').focus(function() {
				$( "#logo_file" ).addClass("disappear diable_bg_style");
				$( "#logo_file2" ).addClass("display");
				$( "#icon_square_wrapper").addClass("diable_bg_style");
				$( "#logo_icon").addClass("thin_del");
				$( "#logo_icon").removeClass("thin");
				$('#logo').val("");
				$( "#cselect_option1" ).removeClass("display disappear");
				$( "#cselect_option2" ).removeClass("display disappear");
				$( "#cselect_option3" ).removeClass("display disappear");
				$( "#cselect_option1" ).addClass("display");
				$( "#cselect_option2" ).addClass("disappear");
				$( "#cselect_option3" ).addClass("disappear");
			});
			$('#realtime_mcname').focus(function() {
				$( "#logo_file" ).addClass("disappear diable_bg_style");
				$( "#logo_file2" ).addClass("display");
				$( "#icon_square_wrapper").addClass("diable_bg_style");
				$( "#logo_icon").addClass("thin_del");
				$( "#logo_icon").removeClass("thin");
				$('#logo').val("");
				$('#logo-2').val("");
				$( "#cselect_option1" ).removeClass("display disappear");
				$( "#cselect_option2" ).removeClass("display disappear");
				$( "#cselect_option3" ).removeClass("display disappear");
				$( "#cselect_option1" ).addClass("disappear");
				$( "#cselect_option2" ).addClass("display");
				$( "#cselect_option3" ).addClass("disappear");
			});
			$('#realtime_bcname').focus(function() {
				$( "#logo_file" ).addClass("disappear diable_bg_style");
				$( "#logo_file2" ).addClass("display");
				$( "#icon_square_wrapper").addClass("diable_bg_style");
				$( "#logo_icon").addClass("thin_del");
				$( "#logo_icon").removeClass("thin");
				$('#logo').val("");
				$( "#cselect_option1" ).removeClass("display disappear");
				$( "#cselect_option2" ).removeClass("display disappear");
				$( "#cselect_option3" ).removeClass("display disappear");
				$( "#cselect_option1" ).addClass("disappear");
				$( "#cselect_option2" ).addClass("disappear");
				$( "#cselect_option3" ).addClass("display");
			});
			$( "#logo_file2" ).click(function() {
				$( "#logo_file" ).removeClass("disappear diable_bg_style");
				$( "#logo_file2" ).removeClass("display");
				$( "#icon_square_wrapper").removeClass("diable_bg_style");
				$( "#logo_icon").removeClass("thin_del");
				$( "#logo_icon").addClass("thin");
			});
			$( "#mission_logo" ).click(function() {
				  $( "#companyname" ).removeClass("disappear");
				  $( "#mission_logo" ).addClass("disappear");
			});
			$("#submitbutton").click(function() {
				$( "#form1" ).submit();
			});
		</script>
	 <script src="loadingbar.js"></script>  
     <script>  
     (function() { 
     var bar = $('.bar');  
     var percent = $('.percent');  
     var status = $('#status');  
     $('#form1').ajaxForm({  
      urls: "video_upload.php",
       beforeSend: function() {  
         status.empty();  
         var percentVal = '0%';  
         bar.width(percentVal)  
         percent.html(percentVal);  
       },  
       uploadProgress: function(event, position, total, percentComplete) {  
         var percentVal = percentComplete + '%';  
         bar.width(percentVal)  
         percent.html(percentVal);  
       },  
       complete: function(xhr) {  
         bar.width("100%");  
         percent.html("100%"); 
         $( "#form2" ).submit();
       }  
     });   
     })();      
     </script>  
	</body>
</html>