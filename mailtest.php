<?
			$name = "V5 Surge Media";
			$from = "cs@vid5.surgehost.com.au";
			$to = 'web-TDeAZU@mail-tester.com';
			$subject2 = 'Thanks for your purchase V5.';
			$message2 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<style>
body {
    font-family: \'Raleway\',sans-serif;
	color:#9999a6;
}
.thanksmail ul{
	width:590px; background: url("http://videoin5.com.au/img/photography.png") repeat scroll 0 0 rgba(0, 0, 0, 0); padding:5px; border-radius:5px;
}
.thanksmail h3{
	color:white;
	font-size:40px;
	text-align:center;
	font-weight:100;
	font-style:italic;	
}
.thanksmail img{
	margin-left:230px;
	margin-bottom:30px;
}
li{
	list-style-type: none;
}
.message{
	background-color:white;
	padding:10px 30px 10px 30px; border-radius:5px;
	text-align:center;
	line-height:25px;
	font-size:18px;
	font-style:italic;	
	colorv
}
.coupon {
    background-image: url("http://videoin5.com.au/img/coupon.jpg");
    border: 2px dashed green;
    border-radius: 0.5em;
    color: #fff;
    font-size: 40px;
    margin: 0 auto;
	margin-top:20px;
	margin-bottom:20px;
    padding: 1em 0;
    text-shadow: 2px 2px green;
    width: 70%;
	text-align:center;
}
.logo ul{
	width:250px; background: url("http://videoin5.com.au/img/photography.png") repeat scroll 0 0 rgba(0, 0, 0, 0); padding:30px 10px 30px 200px; position:relative;
}
.logo ul div{
	width:100px; height:80px; background:no-repeat url("http://videoin5.com.au/img/v5logo.png"); position:absolute; left:60px; top:35px;
}
.logo li{
	color:#2c8cad;
	margin: 10px;
}
.logo span{
	color:white;
}
a{
	text-decoration:none;
	color:#9999a6;
}
a:hover{
	color:#07b6dc;
}
</style>

<body>
<div class="thanksmail">
<h2>Hello '.$takeorderinformation_row['name'].',</h2>
Thanks for your purchase, your video in the pipeline. <br/>
Please be Patient. All videos are reviewed by a technician to insure quality.<br />
<h4>Your video will be delivered to you with in 1 business day.</h4>
We will email you a link to download your video when its ready.
    <ul>
    <li><h3>Horray!</h3></li>
    <li><img src="http://videoin5.com.au/img/happy.png" /></li>
    <li><div class="message">We know you will enjoy the power of video, <br />
		and hope to see you again. <br /><br />
		V5 would like to offer you a 10% discount on your next V5 video. To redeem your discount please enter the code below on your next purchase.   </div>
    <div class="coupon"><strong>v512455</strong></div>
    </li>
    </ul>
</div>
<a href="mailto:help@videoin5.com.au">If you have any problems or issues using this offer, please let us know. We are here to help</a>
<div class="logo">
<ul>
<div></div>
<li><span>The V5 Wizards</span></li>
<li>Phone: 3137 1171</li>
<li>URL: videoinfive.com.au</li>
</ul>
</div>
</body>
</html>
			
			';
			
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			
			$headers .="From: ". $name . " <" . $from . ">\r\n";
			
				mail($to, $subject2, $message2, $headers);										

?>