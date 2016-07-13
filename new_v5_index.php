<?php
include ('db_connection_13r2fdfd34.php');
$globel_data = mysql_query("SELECT * FROM global_datas ORDER BY id");

//if can insert order information to database, allow php to take paypal account
$globel_data_num = mysql_num_rows($globel_data);
for ($i = 0; $i < $globel_data_num; $i++) {
    $globel_data_row = mysql_fetch_array($globel_data);
    $globel_data_values[$globel_data_row['type_name']] = $globel_data_row['global_values'];
	$order_num = 'v5-'.time();
}
?>
<!DOCTYPE html>
<html lang="">
	<?php
include ('head.php'); ?>
	<!-- <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> -->
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
					$( ".dislog_bg" ).addClass("display");
				}
			}
		</script>
		<body>
			<header id='vidbg'>
				
				
				<!-- nav>li*3>a -->
				<div class="center">
					<h1 class="logo fadeInDown wow" data-wow-duration="2s">
					<img src="img/logov5.svg" alt="Video in 5">
					</h1>
					<small class="cred">
					<span class="darkblue clear">Video in 5</span>
					<span ><a href="http://www.surgemedia.com.au" target="_blank">by Surge Media</a></span> <i class="surgelogo"></i>
					</small>
					<ul id="simplemessage">
						<li class="wow flipInX" data-wow-duration="2s">
							<i class="video "></i>
							<small>You Shot it,</small>
						</li>
						<li class="wow flipInX" data-wow-delay="1s" data-wow-duration="2s" >
							<i class="brand "></i>
							<small>We Brand it.</small>
						</li>
						
					</ul>
					<a class="ghost_button" href="#app">Get Started</a>
					<?php
if ($_GET['error'] == 2) {
    echo '  <br />
										<br />
										<br />
									<span class="darkblue clear" style="color:brown;">If you are having trouble picking the correct color of the price field.</a></span><br />
									<span class="darkblue clear" style="color:brown;">Please contact us <a class="phone" href="tel:31371171" style="color:blue;">Ph:07 3137 1171</a></span>';
}
?>
			</div>
		</header>
		<header id="small_header" class="hide">
			
			<nav class="container">
			<div class="logo two columns"><img src="img/logov5.svg" alt="Video in 5"></div>
				<ul class="ten columns">
					<li><a href="/">Home</a></li>
					<li onclick="goBackTab(master_tab_index-1);  $('.errors p').remove();  $('.errors').removeClass('show');" >Go Back a step <i class="fa fa-mail-reply"></i></li>
					<li><a href="/">Reset all steps <i class="fa fa-refresh"></i></a></li>
				</ul>
			</nav>
		</header>
		<section id="main" class=" wowd fadeInDown blockwidth grid">
			
			<div id="faq" class="container mcenter">
				
				
				<div class="columns sixteen">
					<h2>V5 Explained</h2>
					<iframe class="" width="100%" height="480" src="//www.youtube.com/embed/wa6sp6jNxko?showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
				</div>
				
				
			</div>
			<div id="how_it_works">
				<ul class="container mcenter" >
				<li class="three columns">
						<a href="#slider">
							<div class="icon_border">
								<i class="thin shootit"></i>
							</div>
						</a>
						<h3>1.) You Shoot it</h3>
						<p>
						Shoot your video on a smartphone or camera.
						</p>
					</li>

				<li class="three columns">
											<a href="#slider">
							<div class="icon_border">
								<i class="thin  upload"></i>
							</div>
						</a>
						<h3>2.) Upload your content</h3>
						<p>
						Upload your logo and video.
						</p>
					</li>
				<li class="three columns">
					
						<a href="#slider">
							<div class="icon_border">
								<i class="thin  create"></i>
							</div>
						</a>
						<h3>3.) Choose your style</h3>
						<p>
						Select the animation style for your logo.
						</p>
					</li>
				<li class="three columns">
					
						<a href="#slider">
							<div class="icon_border">
								<i class="thin message"></i>
							</div>
						</a>
						<h3>4.) Add your message</h3>
						<p>
						Like Contact infomation or a Thank your message.
						</p>
					</li>
				<li class="three columns">
					
						<a href="#slider">
							<div class="icon_border">
								<i class="thin brandit"></i>
							</div>
						</a>
						<h3>5.) We Brand it</h3>
						<p>Your video is added to our video queue.</p>
					</li>
				</ul>
			</div>
			<div id="app" class="container">
				<form action="video_upload.php" method="post" id="form1" enctype="multipart/form-data" name="apply_form" onsubmit="
					
					
					if(this.check_bot.value!=this.color_match.value){ postError('This is to prove your a human not a robot. What is the color of the price box? Please answer this question by choosing the color from the dropdown under the price box '); this.color_match.focus(); return false}else{
					}
					return validateForm2();
					">
					<ul >
						<li id="step_1" class="container form_step current">
							<!-- <div class="extra_info"><i class="fa fa-info-circle"></i></div> -->

							
							<div class="header">
								<i class="thin_blue shoot_it"></i>
								<h3 class="title">You Shoot it</h3>
								<p class="content">We transform your videos into a perfect! First we need a video though, If you haven’t already go shoot your video, like right now… Once you have press the NEXT button.</p>
							</div>
							<div class="errors">
							</div>

							<p class="text_center content">
							First you need to shoot your video!
							</p>
							<p id="landscape_help"><img src="img/landscape.gif" alt="Shoot your video landscape" /></p>

							<div class="extra_info text_center"><i class="fa fa-info-circle"></i> Make sure you shoot your video Landscape (on its side)</div>

							<p class="green_com text_center"><i class="fa fa-thumbs-up"></i> If you already have, Great! <strong>Press the big'ol NEXT button below</strong></p>
							
									<ul class="position">
										<li class="hide status"><div class="complete">Complete</div><i class="fa fa-thumbs-o-up"></i></li>

										<li><div class="next button_trigger">Next</div></li>
										
									</ul>
								</li>
								<li id="step_2" class="container form_step">
								<div class="header">
								<i class="thin_blue upload"></i>
								<h3 class="title">Upload your Content</h3>
								<p class="content">
								In this step you give us the logo you want to use and the video we need to transform! If you don’t want to use a logo simply press “No”.
								</p>
								</div>
									<div class="extra_info"><i class="fa fa-info-circle"></i> V5 is designed for quick and short video, If your file is over 300 MB, please contact us: Ph:07 3137 1171</div>
									<div class="errors">
									</div>
									<div class="controls">
								<div id="have_logo">
									<p>Do you want to use a logo? </p>
									<button id="logo_yes" type="button" onclick="notRequired('#logo_text_input'); reveal('#companyname','#upload_box_logo'); unhide('#upload_box_video'); $(this).addClass('active'); $('#logo_no').removeClass('active');" >Yes</button>
									<button id="logo_no" type="button" onclick="notRequired('#logo'); $('#logo_yes').removeClass('active'); $(this).addClass('active'); reveal('#upload_box_logo','#companyname'); unhide('#upload_box_video'); $('#companyname').removeClass('disappear');  " >No</button>
									<div>
								</div>
							</div>
								<div class="reveal">
									
									
									<div id="upload_box_logo" class="hide columns eight alpha">
										<h3>Upload your <strong>Logo</strong></h3>
										<div class="square_wrapper" id="icon_square_wrapper">
											<i class="thin upload" id="logo_icon">
												<input type="file" name="logo_file" id="logo_file" onchange="checkExt(this,'jpeg','jpg','png','svg','eps','ai','gif','tiff','psd');" />
												<input name="logo_file2" id="logo_file2" /></i>
										</div>
										<div class="uploader">
											<input id="logo" disabled="disabled" class="disable_input required" >
										</div>
										
									</div>
									<div id="upload_box_video" class="hide columns eight alpha">
										<h3 >Upload your <strong>Video</strong></h3>
										<div class="square_wrapper">
											<i class="thin upload">
												<input type="file" name="video_file" id="video_file" onchange="checkExt(this,'mkv','mov','mp4','avi','flv');"/></i>
										</div>
										<div class="uploader">
											<input id="video" disabled="disabled" class="disable_input required" >
										</div>
										
									</div>
									<!-- <input type="button" value="No Logo? Click Here" id="mission_logo"> -->
									<ul class="hide form columns eight omega"  id="companyname">
										<li class=" video_message companyname">
											<h3>Type here <strong>instead of a logo</strong></h3>
											<input name="upper_cname" class="textarea2 message_style top_message" id="realtime_tcname"/>
											<input name="middle_cname" class="textarea2 message_style middle_message" id="realtime_mcname"/>
											<input name="bottom_cname" class="textarea2 message_style bottom_message" id="realtime_bcname"/>
										</li>
										<li class="text_controls">
										<div id="cselect_option1">
										<ul>
										<li class="title"><h3>Start typing then choose an option</h3></li>
											<li class=" video_message_options video_message_options_first display">
												<h3>Set Font</h3>
												<div class="select">
													<select name="cfont_style" id="cfont_style" onChange="return realtimechange('#cfont_style', '#realtime_tcname', 'text-transform')">
														<option value="Arial">Arial</option>
														<option value="Open Sans">Open Sans</option>
														<option value="Raleway">Raleway</option>
														<option value="Montserrat">Montserrat</option>
													</select>

												</div>
											</li>

											<li class=" video_message_options display">
												<h3>Set Font size</h3>
												<div class="select">
													<select name="cfont_size" id="cfont_size">
														<option value="34px">50px</option>
														<option value="44px">100px</option>
														<option value="54px">150px</option>
														<option value="64px">200px</option>
													</select>
												</div>
											</li>
											<li class=" video_message_options display">
												<h3>Set Uppercase</h3>
												<div class="select">
													<select name="cfont_tran" id="cfont_tran">
														<option value="none">Normal</option>
														<option value="uppercase">uppercase</option>
														<option value="lowercase">lowercase</option>
													</select>
												</div>
											</li>
											</ul>
										</div>
										<div id="cselect_option2" class="disappear">
										<ul>
										<li class="title"><h3>Start typing then choose an option</h3></li>
											<li class=" video_message_options video_message_options_first">
												<h3>Set Font</h3>
												<div class="select">
                                                    <select name="cfont_style2" id="cfont_style2">
														<option value="Arial">Arial</option>
														<option value="Open Sans">Open Sans</option>
														<option value="Raleway">Raleway</option>
														<option value="Montserrat">Montserrat</option>
													</select>

												</div>
											</li>

											<li class=" video_message_options">
												<h3>Set Font size</h3>
												<div class="select">
                                                    <select name="cfont_size2" id="cfont_size2">
														<option value="34px">50px</option>
														<option value="44px">100px</option>
														<option value="54px">150px</option>
														<option value="64px">200px</option>
													</select>
												</div>
											</li>
											<li class=" video_message_options">
													<h3>Set Uppercase</h3>
												<div class="select">
                                                    <select name="cfont_tran2" id="cfont_tran2">
														<option value="none">Normal</option>
														<option value="uppercase">uppercase</option>
														<option value="lowercase">lowercase</option>
													</select>
												</div>
											</li>
											</ul>
										</div>
										<div id="cselect_option3" class="disappear">
										<ul>
										<li class="title"><h3>Start typing then choose an option</h3></li>
											<li class=" video_message_options video_message_options_first">
												<h3>Set Font</h3>
												<div class="select">
                                                    <select name="cfont_style3" id="cfont_style3">
														<option value="Arial">Arial</option>
														<option value="Open Sans">Open Sans</option>
														<option value="Raleway">Raleway</option>
														<option value="Montserrat">Montserrat</option>
													</select>

												</div>
											</li>

											<li class=" video_message_options">
												<h3>Set Font size</h3>
												<div class="select">
                                                    <select name="cfont_size3" id="cfont_size3">
														<option value="34px">50px</option>
														<option value="44px">100px</option>
														<option value="54px">150px</option>
														<option value="64px">200px</option>
													</select>
												</div>
											</li>
											<li class=" video_message_options">
													<h3>Set Uppercase</h3>
												<div class="select">
                                                    <select name="cfont_tran3" id="cfont_tran3">
														<option value="none">Normal</option>
														<option value="uppercase">uppercase</option>
														<option value="lowercase">lowercase</option>
													</select>
												</div>
											</li>
											</ul>
										</div>
										</li>
									</ul>
									
									
									<ul class="position">

										<li><div class="next button_trigger">Next</div></li>
										
									</ul>
								</li>
								<li id="step_3" class="container form_step">
								<div class="header">
								<i class="thin_blue create"></i>
								<h3 class="title">Choose your Style</h3>
								<p class="content">

								Here is the fun part you get to choose the animation you want on your logo or text logo(if you don’t have a logo). This animation can say a lot about your company so take your time. To continue just click the animation your like and Press Next.


								</p>
								</div>
									<div class="errors"></div>
									<div class="controls">
										
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
										<input type="text" id="animation_style" class="required textbox" value="PUSH" />
									</div>
									
									<ul class="position">
										<li><div class="next button_trigger">Next</div></li>
										
									</ul>
								</li>

	<li id="step_4" class="container form_step">
							
							<div class="header">
								<i class="thin_blue message"></i>
								<h3 class="title">Add Your End Message</h3>
								<p class="content">

								Click the below area and start typing! Imagine you are typing straight on the screen. Text in the top row will be displayed at the top of the screen etc. Once you have typed something you can change the look with the options on the side.

								</p>
							</div>
							<div class="extra_info"><i class="fa fa-info-circle"></i>Only Text marked with a <strong>Tick</strong> will be used.</div>
							<div class="extra_info"><i class="fa fa-info-circle"></i>Uncheck the tickbox if you don't want the text to show</div>

							<div class="errors">
								
							</div>
							<ul class="form">
					<li class="col-1-2 video_message">
                    <input name="invoice_number" value="<?=$order_num;?>" type="hidden">
						<h3>Enter Message Below</h3>
						<input id="upper_message_check" class="checkbox" value="1" type="checkbox" onchange="CheckRequired('#upper_message_check','#realtime_upmsg')"  />
						<input id="middle_message_check" class="checkbox" value="1"  type="checkbox" onchange="CheckRequired('#middle_message_check','#realtime_mdmsg')" />
						<input id="bottom_message_check" class="checkbox" value="1"  type="checkbox" onchange="CheckRequired('#bottom_message_check','#realtime_bumsg')" />

                        <input name="upper_message" class="textarea2 message_style top_message required" id="realtime_upmsg" value="" placeholder="Imagine this is a screen, type here for text at the top"/>
                        <input name="middle_message" class="textarea2 message_style middle_message required" id="realtime_mdmsg" value="" placeholder="Type here for text at the Middle" />
                        <input name="bottom_message" class="textarea2 message_style bottom_message required" id="realtime_bumsg" value="" placeholder="Type here for text at the Bottom" />
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
                       
				</ul>

							<!-- <div class="extra_info text_center"><i class="fa fa-info-circle"></i>P</div> -->

							
							
									<ul class="position">
										<li><div class="next button_trigger">Next</div></li>
										
									</ul>
								</li>
				<li id="step_5" class="container form_step">
							<!-- <div class="extra_info"><i class="fa fa-info-circle"></i></div> -->

							
							<div class="header">
								<i class="thin_blue brand_it"></i>
								<h3 class="title">Brand it</h3>
								<p class="content">This is the last step! Finally right?. Enter your details below in case we need to contact you about your video.</p>
							</div>
							<div class="extra_info"><p><i class="fa fa-info-circle"></i>To proceed with your quote please select the color of the box below?</p>
                            
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
                            </div></div>
                            
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
					<span id="gst">included GST</span></div>
                    <input name="check_bot" type="hidden" value="<?=$rand_color;?>">
                     <div class="errors">
								
							</div>
                    <ul id="quote" class="form">
                         
                        <li id="full_name">
                            <label>Your full name</label><input id="fname" name="name"  class="textbox required">
                    	</li>
                    	<li id="your_email">
                            <label>E-mail</label><input id="email" name="email" class="textbox required">
                    	</li>
                    	<li id="contact_number">
                            <label>Contact number</label><input id="mobile" name="mobile" class="textbox required" maxlength="10"   onchange="if(/\D/.test(this.value)){ postError('Support Digial Only'); this.value='';}"><br>
                    	</li>
                    	<li id="promo_code">
                            <label>Promotion Code</label><input name="pcode" class="textbox"><br>
                    	</li>
                        <li class="col-1-2"><h3>Any addition notes about your video?</h3>
                            <textarea name="notes" class="textarea"></textarea>
                        </li>
                    </ul>
					<input type="button" value="Generate your Video" id="submitbutton" onmouseover="contactInfomation();">
                    
                        
				</li>
			</ul>
			</section>
                    </form>
		</div>

        <form action="process2.php" method="post" id="form2" >
        <input id="logo-2" name="logo-2" type="hidden">
        <input id="video-2" name="video-2" type="hidden">
        <input name="invoice_number-2" value="<?=$order_num;?>" type="hidden">
        <input name="upper_cname-2" id="upper_cname-2" type="hidden">
        <input name="middle_cname-2" id="middle_cname-2" type="hidden">
        <input name="bottom_cname-2" id="bottom_cname-2" type="hidden">
        <input name="cfont_style-2" id="cfont_style-2" value="Arial" type="hidden">
        <input name="cfont_size-2" id="cfont_size-2" value="34px" type="hidden">
        <input name="cfont_tran-2" id="cfont_tran-2" value="none" type="hidden">
        <input name="cfont_style2-2" id="cfont_style2-2" value="Arial" type="hidden">
        <input name="cfont_size2-2" id="cfont_size2-2" value="34px" type="hidden">
        <input name="cfont_tran2-2" id="cfont_tran2-2" value="none" type="hidden">
        <input name="cfont_style3-2" id="cfont_style3-2" value="Arial" type="hidden">
        <input name="cfont_size3-2" id="cfont_size3-2" value="34px" type="hidden">
        <input name="cfont_tran3-2" id="cfont_tran3-2" value="none" type="hidden">
        <input name="cbackgroup_color-2" id="cbackgroup_color-2" value="#fff" type="hidden">
        <input name="backgroup_color-2" id="backgroup_color-2" value="white" type="hidden">
        <input name="upper_message-2" id="upper_message-2" type="hidden">
        <input name="middle_message-2" id="middle_message-2" type="hidden">
        <input name="bottom_message-2" id="bottom_message-2" type="hidden">
        <input name="font_style-2" id="font_style-2" value="Arial" type="hidden">
        <input name="font_size-2" id="font_size-2" value="34px" type="hidden">
        <input name="font_tran-2" id="font_tran-2" value="none" type="hidden">
        <input name="font_style2-2" id="font_style2-2" value="Arial" type="hidden">
        <input name="font_size2-2" id="font_size2-2" value="34px" type="hidden">
        <input name="font_tran2-2" id="font_tran2-2" value="none" type="hidden">
        <input name="font_style3-2" id="font_style3-2" value="Arial" type="hidden">
        <input name="font_size3-2" id="font_size3-2" value="34px" type="hidden">
        <input name="font_tran3-2" id="font_tran3-2" value="none" type="hidden">
        <input name="fname-2" id="fname-2" type="hidden">
        <input name="email-2" id="email-2" type="hidden">
        <input name="mobile-2" id="mobile-2" type="hidden">
        <input name="group-2" id="group-2" value="PUSH" type="hidden">
        <input name="pcode-2" id="pcode-2" type="hidden">
        <input name="color_match-2" id="color_match-2" type="hidden">
        <input name="check_bot-2" value="<?=$rand_color;?>" type="hidden">
        <input name="notes-2" id="notes-2" type="hidden">
        </form>
        <div class="dislog_bg">
        <div class="dialog2">
        	
            <p><i class="fa fa-info-circle"></i> Thanks for your purchase, your video has been uploading! <br>Please be Patient.</p>
            <p>Depend on the file size and network bandwidth, the upload maybe need to take a hour or longer.</p>
           <div class="progress">  
             <div class="bar"></div >  
             <div class="percent">0%</div >  
           </div>  
           <div class="processing_load">Processing Now...</div>
        </div>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>