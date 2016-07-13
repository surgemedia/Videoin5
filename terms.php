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
    <h2>Terms and Conditions</h2>
    	<div style="line-height:50px;" class="terms">
<p>The use of this site is governed by the terms and conditions below. Please read them carefully. Your use of this site indicates your acceptance of these terms and conditions. Your placement of an order indicates your acceptance of these terms and conditions. Video in Five (V5) reserves the right to make changes to this site and these terms and conditions at any time.  In regards to privacy concerns, please review our <a href="privacy.php">Privacy Policy</a>.</p>
<p>By ordering or registering with V5  you grant us the right to add your contact details to our database. From time to time we may contact you about offers and new products. You can easily be removed by contacting us at info@videoinfive.com.au and we will remove you from any marketing communications.</p>
<h3>Australia Sales</h3>
<p>We only sell and offer out V5 products within Australia. We will not making of offering V5 outside of Australia. </p>
<h3>Order Acceptance Policy</h3>
<p>Your receipt of an electronic or other form of order confirmation does not signify our acceptance of your order, nor does it constitute confirmation of our offer to sell. V5  reserves the right at any time after receipt of your order to accept or decline your order for any reason. All orders placed must obtain pre-approval with an acceptable method of payment, as established by our credit and fraud avoidance department. We may require additional verifications or information before accepting any order.
</p>
<h3>Pricing</h3>
<p>Prices are subject to change without notice. All credit cards are charged in Australian Dollars.</p>
<h3>Typographical Errors</h3>
<p>V5 makes every reasonable effort to present accurate information on our website however, in the event a product is listed at an incorrect price or with incorrect information due to typographical error or error in pricing or product information received from our suppliers, V5 shall have the right to refuse or cancel any orders placed for product listed at the incorrect price.</p>
<p>V5 shall have the right to refuse or cancel any such orders whether or not the order has been confirmed and your credit card charged. If your credit card has already been charged for the purchase and your order is cancelled, V5 shall immediately issue a credit to your credit card account in the amount of the charge.
</p>
<h3>Colours</h3>
<p>We have done our best to display as accurately as possible the colours and video style of the products shown on this website.</p>
<h3>Video upload.</h3>
<p>V5 are not responsible for corrupt files that are uploaded to our website. V5 may ask you to upload your file again.
</p>
<h3>Logos upload</h3>
<p>V5 asks you to upload the best quality logo so when rendered out your logo colour remains the best quality when we deliver our product. We can not guarantee the colour will match exactly the same. And we do reserve the right to refuses your job because of an insufficient logo and or file. V5 shall immediately issue a credit to your credit card account in the amount of the charge.</p>
<p> We are not responsible for your video quality that you upload to our V5 site. V5 will do it best to enhance the picture and sound quality. But reserves the right to refuse your perchance due to poor video quality and where V5 can't assist. V5 shall immediately issue a credit to your credit card account in the amount of the charge.</p>
<p> On completion of your video file product We will keep your video on file for 3 three months after this time it will be deleted from our system.<br>
</p>
<h3>Delivery</h3>
      <p>We use an online drop box service for all deliveries of our video file product.</p>
      <p>Please allow 1 to 2 working days for delivery of your order. A technical safe is required to review the product to assure the best quality is delivered.
        The delivery times provided by V5 are estimates only. V5 will not be held accountable for late deliveries or corrupt files being delivered. </p>
      <p>All reasonable attempts to notify you will be made using the details you provide. Please ensure you enter the correct delivery and email address. V5 cannot be held responsible for incorrectly entered delivery addresses.<br>
      </p>
<h3>Change of Address</h3>

<p>V5 cannot be held responsible for an incorrect address being entered on your order. Address Confirmation is given on the review & buy page in the checkout section of the site. If this is not noticed until after your order is finalised, please contact V5 immediately. We will attempt to update any incorrect order details.
</p>
<h3>Refunds & Returns</h3>

<p>V5 is committed to customer satisfaction and would like your online shopping experience with us to be as simple as possible. If you receive any video file that you are unhappy with for any reason, simply return it to us via drop box along with the invoice and a detailed description on what you are unhappy with within 4 days of purchase, and we will be happy to re-edit or refund.</p>
<p> Upon return of faulty files, we will assess and forward on to our technicians. If the video requires to be repaired we will inform of the estimated date of completion via email. The repaired video file will then be emailed back to you free of charge. If the file cannot be repaired or replaced, you will be refunded as soon as possible after the assessment.</p>
<h3>Liability</h3>

<p>V5 is not liable for any losses or damages caused by this website or any website linked to or from this website. We reserve the right to refuse any order without giving reason. Upon cancellation of an order we will make all reasonable attempts to contact you using the details provided. All received monies will be refunded using the method received.<br>
</p>
<h3>Copyright</h3>

<p>This site is owned and operated by <a href="http://www.surgemedia.com.au" target="_blank">Surge Media</a>. Unless otherwise specified, all materials appearing on this site, including the text, site design, logos, graphics, icons, and images, as well as the selection, assembly and arrangement thereof, are the sole property of Surge media. All software used on the site is the sole property of Surge Media or those supplying the software. You may use the content of this site only for the purpose of uploading your material or placing an order on this site and for no other purpose. No materials from this site may be copied, reproduced, modified, republished, uploaded, posted, transmitted, or distributed in any form or by any means without Surge Medias prior written permission. All rights not expressly granted herein are reserved. Any unauthorised use of the materials appearing on this site may violate copyright, trademark and other applicable laws and could result in criminal or civil penalties. </p>
    	</div>
    </div>
    </div>

	</section>	
 <? include('footer.php');?>
	</body>
</html>