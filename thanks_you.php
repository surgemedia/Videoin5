<?
	include('db_connection_13r2fdfd34.php');

	 require_once 'inc/aws/ses.class.php';
	$ses = new SimpleEmailService('AKIAIOH2AUGQJV3XLOEA', 'OoQW1hMMMeWJMb094RUyrBRKWQEQjfeMjTPkvd2+');
	
	$globel_data = mysql_query("SELECT * FROM global_datas ORDER BY id");//if can insert order information to database, allow php to take paypal account
	$globel_data_num = mysql_num_rows($globel_data);
	for($i=0; $i<$globel_data_num; $i++){
		$globel_data_row = 	mysql_fetch_array($globel_data);
		$globel_data_values[$globel_data_row['type_name']] = $globel_data_row['values'];
	}
	session_start();
	 $_SESSION['mailout'] = $_SESSION['mailout'] + 1;

	$body_contents = '
		<section id="main" class=" wowd fadeInDown blockwidth grid">
	<div id="slider" class="blockwidth mcenter">
		<div id="faq" class=" center">
		<h2>Sorry</h2>
			<div style="line-height:50px; text-align:center;" class="terms">
				<p>Please try again, your payment details is not correct.</p>
				<!-- <p><img src="/teamphoto.jpg" alt=""></p> -->
			</div>
		</div>
		</div>
	
		</section>	
	';
	$body_contents2 = '';
/* -----------------------------------------------------------------------------

 Version 3.1

------------------ Disclaimer --------------------------------------------------

Copyright 2004 Dialect Solutions Holdings.  All rights reserved.

This document is provided by Dialect Holdings on the basis that you will treat
it as confidential.

No part of this document may be reproduced or copied in any form by any means
without the written permission of Dialect Holdings.  Unless otherwise expressly
agreed in writing, the information contained in this document is subject to
change without notice and Dialect Holdings assumes no responsibility for any
alteration to, or any error or other deficiency, in this document.

All intellectual property rights in the Document and in all extracts and things
derived from any part of the Document are owned by Dialect and will be assigned
to Dialect on their creation. You will protect all the intellectual property
rights relating to the Document in a manner that is equal to the protection
you provide your own intellectual property.  You will notify Dialect
immediately, and in writing where you become aware of a breach of Dialect's
intellectual property rights in relation to the Document.

The names "Dialect", "QSI Payments" and all similar words are trademarks of
Dialect Holdings and you must not use that name or any similar name.

Dialect may at its sole discretion terminate the rights granted in this
document with immediate effect by notifying you in writing and you will
thereupon return (or destroy and certify that destruction to Dialect) all
copies and extracts of the Document in its possession or control.

Dialect does not warrant the accuracy or completeness of the Document or its
content or its usefulness to you or your merchant customers.   To the extent
permitted by law, all conditions and warranties implied by law (whether as to
fitness for any particular purpose or otherwise) are excluded.  Where the
exclusion is not effective, Dialect limits its liability to $100 or the
resupply of the Document (at Dialect's option).

Data used in examples and sample data files are intended to be fictional and
any resemblance to real persons or companies is entirely coincidental.

Dialect does not indemnify you or any third party in relation to the content or
any use of the content as contemplated in these terms and conditions.

Mention of any product not owned by Dialect does not constitute an endorsement
of that product.

This document is governed by the laws of New South Wales, Australia and is
intended to be legally binding.

-------------------------------------------------------------------------------

Following is a copy of the disclaimer / license agreement provided by RSA:

Copyright (C) 1991-2, RSA Data Security, Inc. Created 1991. All rights reserved.

License to copy and use this software is granted provided that it is identified
as the "RSA Data Security, Inc. MD5 Message-Digest Algorithm" in all material 
mentioning or referencing this software or this function.

License is also granted to make and use derivative works provided that such 
works are identified as "derived from the RSA Data Security, Inc. MD5 
Message-Digest Algorithm" in all material mentioning or referencing the 
derived work.

RSA Data Security, Inc. makes no representations concerning either the 
merchantability of this software or the suitability of this software for any 
particular purpose. It is provided "as is" without express or implied warranty 
of any kind.

These notices must be retained in any copies of any part of this documentation 
and/or software.

-------------------------------------------------------------------------------- 
 
This example assumes that a form has been sent to this example with the
required fields. The example then processes the command and displays the
receipt or error to a HTML page in the users web browser.

NOTE:
=====
  You may have installed the libeay32.dll and ssleay32.dll libraries 
  into your x:\WINNT\system32 directory to run this example.

--------------------------------------------------------------------------------

 @author Dialect Payment Solutions Pty Ltd Group 

------------------------------------------------------------------------------*/

// *********************
// START OF MAIN PROGRAM
// *********************

// Define Constants
// ----------------
// This is secret for encoding the MD5 hash
// This secret will vary from merchant to merchant
// To not create a secure hash, let SECURE_SECRET be an empty string - ""
// $SECURE_SECRET = "secure-hash-secret";
$SECURE_SECRET = "A610E8A1488136510FE2F79405EBBC5E";

// If there has been a merchant secret set then sort and loop through all the
// data in the Virtual Payment Client response. While we have the data, we can
// append all the fields that contain values (except the secure hash) so that
// we can create a hash and validate it against the secure hash in the Virtual
// Payment Client response.

// NOTE: If the vpc_TxnResponseCode in not a single character then
// there was a Virtual Payment Client error and we cannot accurately validate
// the incoming data from the secure hash. */

// get and remove the vpc_TxnResponseCode code from the response fields as we
// do not want to include this field in the hash calculation
$vpc_Txn_Secure_Hash = $_GET["vpc_SecureHash"];
unset($_GET["vpc_SecureHash"]); 

// set a flag to indicate if hash has been validated
$errorExists = false;

if (strlen($SECURE_SECRET) > 0 && $_GET["vpc_TxnResponseCode"] != "7" && $_GET["vpc_TxnResponseCode"] != "No Value Returned") {

    $md5HashData = $SECURE_SECRET;

    // sort all the incoming vpc response fields and leave out any with no value
    foreach($_GET as $key => $value) {
        if ($key != "vpc_Secure_Hash" or strlen($value) > 0) {
            $md5HashData .= $value;
        }
    }
    
    // Validate the Secure Hash (remember MD5 hashes are not case sensitive)
	// This is just one way of displaying the result of checking the hash.
	// In production, you would work out your own way of presenting the result.
	// The hash check is all about detecting if the data has changed in transit.
    if (strtoupper($vpc_Txn_Secure_Hash) == strtoupper(md5($md5HashData))) {
        // Secure Hash validation succeeded, add a data field to be displayed
        // later.
        $hashValidated = "<FONT color='#00AA00'><strong>CORRECT</strong></FONT>";
    } else {
        // Secure Hash validation failed, add a data field to be displayed
        // later.
        $hashValidated = "<FONT color='#FF0066'><strong>INVALID HASH</strong></FONT>";
        $errorExists = true;
    }
} else {
    // Secure Hash was not validated, add a data field to be displayed later.
    $hashValidated = "<FONT color='orange'><strong>Not Calculated - No 'SECURE_SECRET' present.</strong></FONT>";
}

// Define Variables
// ----------------
// Extract the available receipt fields from the VPC Response
// If not present then let the value be equal to 'No Value Returned'

// Standard Receipt Data
$amount          = null2unknown($_GET["vpc_Amount"]);
$locale          = null2unknown($_GET["vpc_Locale"]);
$command         = null2unknown($_GET["vpc_Command"]);
$message         = null2unknown($_GET["vpc_Message"]);
$version         = null2unknown($_GET["vpc_Version"]);
$orderInfo       = null2unknown($_GET["vpc_OrderInfo"]);
$merchantID      = null2unknown($_GET["vpc_Merchant"]);
$txnResponseCode = null2unknown($_GET["vpc_TxnResponseCode"]);

$batchNo         = array_key_exists("vpc_BatchNo", $_GET)          ? $_GET["vpc_BatchNo"]          : "No Value Returned";//IMPROTANT
$cardType        = array_key_exists("vpc_Card", $_GET)             ? $_GET["vpc_Card"]             : "No Value Returned";//IMPROTANT
$receiptNo       = array_key_exists("vpc_ReceiptNo", $_GET)        ? $_GET["vpc_ReceiptNo"]        : "No Value Returned";//IMPROTANT
$authorizeID     = array_key_exists("vpc_AuthorizeId", $_GET)      ? $_GET["vpc_AuthorizeId"]      : "No Value Returned";//IMPROTANT
$merchTxnRef     = array_key_exists("vpc_MerchTxnRef", $_GET)      ? $_GET["vpc_MerchTxnRef"]      : "No Value Returned";
$transactionNo   = array_key_exists("vpc_TransactionNo", $_GET)    ? $_GET["vpc_TransactionNo"]    : "No Value Returned";//IMPROTANT
$acqResponseCode = array_key_exists("vpc_AcqResponseCode", $_GET)  ? $_GET["vpc_AcqResponseCode"]  : "No Value Returned";//IMPROTANT

// CSC Receipt Data
$cscResultCode   = array_key_exists("vpc_CSCResultCode", $_GET)    ? $_GET["vpc_CSCResultCode"]    : "No Value Returned";
$cscACQRespCode  = array_key_exists("vpc_AcqCSCRespCode", $_GET)   ? $_GET["vpc_AcqCSCRespCode"]   : "No Value Returned";

// AVS Receipt Data
$avs_City        = array_key_exists("vpc_AVS_City", $_GET)         ? $_GET["vpc_AVS_City"]         : "No Value Returned";
$avs_Country     = array_key_exists("vpc_AVS_Country", $_GET)      ? $_GET["vpc_AVS_Country"]      : "No Value Returned";
$avs_Street01    = array_key_exists("vpc_AVS_Street01", $_GET)     ? $_GET["vpc_AVS_Street01"]     : "No Value Returned";
$avs_PostCode    = array_key_exists("vpc_AVS_PostCode", $_GET)     ? $_GET["vpc_AVS_PostCode"]     : "No Value Returned";
$avs_StateProv   = array_key_exists("vpc_AVS_StateProv", $_GET)    ? $_GET["vpc_AVS_StateProv"]    : "No Value Returned";
$avsRequestCode  = array_key_exists("vpc_AVSRequestCode", $_GET)   ? $_GET["vpc_AVSRequestCode"]   : "No Value Returned";
$avsResultCode   = array_key_exists("vpc_AVSResultCode", $_GET)    ? $_GET["vpc_AVSResultCode"]    : "No Value Returned";
$vACQAVSRespCode = array_key_exists("vpc_AcqAVSRespCode", $_GET)   ? $_GET["vpc_AcqAVSRespCode"]   : "No Value Returned";

// 3-D Secure Data
$verType         = array_key_exists("vpc_VerType", $_GET)          ? $_GET["vpc_VerType"]          : "No Value Returned";
$verStatus       = array_key_exists("vpc_VerStatus", $_GET)        ? $_GET["vpc_VerStatus"]        : "No Value Returned";
$token           = array_key_exists("vpc_VerToken", $_GET)         ? $_GET["vpc_VerToken"]         : "No Value Returned";
$verSecurLevel   = array_key_exists("vpc_VerSecurityLevel", $_GET) ? $_GET["vpc_VerSecurityLevel"] : "No Value Returned";
$enrolled        = array_key_exists("vpc_3DSenrolled", $_GET)      ? $_GET["vpc_3DSenrolled"]      : "No Value Returned";
$xid             = array_key_exists("vpc_3DSXID", $_GET)           ? $_GET["vpc_3DSXID"]           : "No Value Returned";
$acqECI          = array_key_exists("vpc_3DSECI", $_GET)           ? $_GET["vpc_3DSECI"]           : "No Value Returned";
$authStatus      = array_key_exists("vpc_3DSstatus", $_GET)        ? $_GET["vpc_3DSstatus"]        : "No Value Returned";

// *******************
// END OF MAIN PROGRAM
// *******************

// FINISH TRANSACTION - Process the VPC Response Data
// =====================================================
// For the purposes of demonstration, we simply display the Result fields on a
// web page.

// Show 'Error' in title if an error condition
$errorTxt = "";

// Show this page as an error page if vpc_TxnResponseCode equals '7'
if ($txnResponseCode == "7" || $txnResponseCode == "No Value Returned" || $errorExists) {
    $errorTxt = "Error ";
}
    
// This is the display title for 'Receipt' page 
$title = $_GET["Title"];

// The URL link for the receipt to do another transaction.
// Note: This is ONLY used for this example and is not required for 
// production code. You would hard code your own URL into your application
// to allow customers to try another transaction.
$againLink = URLDecode($_GET["AgainLink"]);

if(getResponseDescription($txnResponseCode) == "Transaction Successful" && $message == "Approved"){
	
	$checkofferusaged = "SELECT * FROM global_datas WHERE id = 1";
	$checkofferresult = mysql_query($checkofferusaged);
	$checkofferrow = mysql_fetch_array($checkofferresult);
	
	$payment_amount = $amount/100;
	if($payment_amount < $checkofferrow['global_values']){
		$updateofferalreadyused = 'offer_usage = 1,';
	}
	$item_name = $merchTxnRef;
	$updateinvoice = "UPDATE v5_order_new_live SET payment_statue = 1, ".$updateofferalreadyused." paytime = NULL, amount = ".$payment_amount." WHERE order_num LIKE '".$item_name."'";	
	$updateinvoice_result = mysql_query($updateinvoice);

	$takeorderinformation = mysql_query("SELECT * FROM v5_order_new_live WHERE order_num LIKE '".$item_name."'");
	$takeorderinformation_row = mysql_fetch_array($takeorderinformation);
			if($takeorderinformation_row['font_style']!=""){
				$fstyle = "font-family:".$takeorderinformation_row['font_style']."; ";
			}
			if($takeorderinformation_row['font_style2']!=""){
				$fstyle2 = "font-family:".$takeorderinformation_row['font_style2']."; ";
			}
			if($takeorderinformation_row['font_style3']!=""){
				$fstyle3 = "font-family:".$takeorderinformation_row['font_style3']."; ";
			}
			if($takeorderinformation_row['font_size']=='50px'){
				$showtoscfontsize = "34px";
			}
			if($takeorderinformation_row['font_size']=='100px'){
				$showtoscfontsize = "44px";
			}
			if($takeorderinformation_row['font_size']=='150px'){
				$showtoscfontsize = "54px";
			}
			if($takeorderinformation_row['font_size']=='200px'){
				$showtoscfontsize = "64px";
			}
			if($takeorderinformation_row['font_size2']=='50px'){
				$showtoscfontsize2 = "34px";
			}
			if($takeorderinformation_row['font_size2']=='100px'){
				$showtoscfontsize2 = "44px";
			}
			if($takeorderinformation_row['font_size2']=='150px'){
				$showtoscfontsize2 = "54px";
			}
			if($takeorderinformation_row['font_size2']=='200px'){
				$showtoscfontsize2 = "64px";
			}
			if($takeorderinformation_row['font_size3']=='50px'){
				$showtoscfontsize3 = "34px";
			}
			if($takeorderinformation_row['font_size3']=='100px'){
				$showtoscfontsize3 = "44px";
			}
			if($takeorderinformation_row['font_size3']=='150px'){
				$showtoscfontsize3 = "54px";
			}
			if($takeorderinformation_row['font_size3']=='200px'){
				$showtoscfontsize3 = "64px";
			}
	
			if($takeorderinformation_row['font_size']!=""){
				$fsize = "font-size:".$showtoscfontsize."; ";
				$fsty = "font-size:".$takeorderinformation_row['font_size']."; ";
			}
			if($takeorderinformation_row['font_size2']!=""){
				$fsize2 = "font-size:".$showtoscfontsize2."; ";
				$fsty2 = "font-size:".$takeorderinformation_row['font_size2']."; ";
			}
			if($takeorderinformation_row['font_size3']!=""){
				$fsize3 = "font-size:".$showtoscfontsize3."; ";
				$fsty3 = "font-size:".$takeorderinformation_row['font_size3']."; ";
			}
			if($takeorderinformation_row['font_tran']!=""){
				$fsize .= " text-transform:".$takeorderinformation_row['font_tran']."; ";
				$fsty .= " text-transform:".$takeorderinformation_row['font_tran']."; ";
			}
			if($takeorderinformation_row['font_tran2']!=""){
				$fsize2 .= " text-transform:".$takeorderinformation_row['font_tran2']."; ";
				$fsty2 .= " text-transform:".$takeorderinformation_row['font_tran2']."; ";
			}
			if($takeorderinformation_row['font_tran3']!=""){
				$fsize3 .= " text-transform:".$takeorderinformation_row['font_tran3']."; ";
				$fsty3 .= " text-transform:".$takeorderinformation_row['font_tran3']."; ";
			}


			if($takeorderinformation_row['cfont_style']!=""){
				$cfstyle = "font-family:".$takeorderinformation_row['cfont_style']."; ";
			}
			if($takeorderinformation_row['cfont_style2']!=""){
				$cfstyle2 = "font-family:".$takeorderinformation_row['cfont_style2']."; ";
			}
			if($takeorderinformation_row['cfont_style3']!=""){
				$cfstyle3 = "font-family:".$takeorderinformation_row['cfont_style3']."; ";
			}
			if($takeorderinformation_row['cfont_size']=='50px'){
				$cshowtoscfontsize = "34px";
			}
			if($takeorderinformation_row['cfont_size']=='100px'){
				$cshowtoscfontsize = "44px";
			}
			if($takeorderinformation_row['cfont_size']=='150px'){
				$cshowtoscfontsize = "54px";
			}
			if($takeorderinformation_row['cfont_size']=='200px'){
				$cshowtoscfontsize = "64px";
			}
			if($takeorderinformation_row['cfont_size2']=='50px'){
				$cshowtoscfontsize2 = "34px";
			}
			if($takeorderinformation_row['cfont_size2']=='100px'){
				$cshowtoscfontsize2 = "44px";
			}
			if($takeorderinformation_row['cfont_size2']=='150px'){
				$cshowtoscfontsize2 = "54px";
			}
			if($takeorderinformation_row['cfont_size2']=='200px'){
				$cshowtoscfontsize2 = "64px";
			}
			if($takeorderinformation_row['cfont_size3']=='50px'){
				$cshowtoscfontsize3 = "34px";
			}
			if($takeorderinformation_row['cfont_size3']=='100px'){
				$cshowtoscfontsize3 = "44px";
			}
			if($takeorderinformation_row['cfont_size3']=='150px'){
				$cshowtoscfontsize3 = "54px";
			}
			if($takeorderinformation_row['cfont_size3']=='200px'){
				$cshowtoscfontsize3 = "64px";
			}
	
			if($takeorderinformation_row['cfont_size']!=""){
				$cfsize = "font-size:".$showtoscfontsize."; ";
				$cfsty = "font-size:".$takeorderinformation_row['cfont_size']."; ";
			}
			if($takeorderinformation_row['cfont_size2']!=""){
				$cfsize2 = "font-size:".$showtoscfontsize2."; ";
				$cfsty2 = "font-size:".$takeorderinformation_row['cfont_size2']."; ";
			}
			if($takeorderinformation_row['cfont_size3']!=""){
				$cfsize3 = "font-size:".$showtoscfontsize3."; ";
				$cfsty3 = "font-size:".$takeorderinformation_row['cfont_size3']."; ";
			}
			if($takeorderinformation_row['cfont_tran']!=""){
				$cfsize .= " text-transform:".$takeorderinformation_row['font_tran']."; ";
				$cfsty .= " text-transform:".$takeorderinformation_row['font_tran']."; ";
			}
			if($takeorderinformation_row['cfont_tran2']!=""){
				$cfsize2 .= " text-transform:".$takeorderinformation_row['cfont_tran2']."; ";
				$cfsty2 .= " text-transform:".$takeorderinformation_row['cfont_tran2']."; ";
			}
			if($takeorderinformation_row['cfont_tran3']!=""){
				$cfsize3 .= " text-transform:".$takeorderinformation_row['cfont_tran3']."; ";
				$cfsty3 .= " text-transform:".$takeorderinformation_row['cfont_tran3']."; ";
			}


			
			$name = "V5 Surge Media";
			$from = "cs@videoin5.com.au";
			$to = $takeorderinformation_row['email'];
			$to2 = "production@surgemedia.com.au" . ', ';
			$to2 .= "video@surgemedia.com.au";
			$subject = 'V5 Invoice: Order: '.$item_name;
			$subject2 = 'Thanks for your purchase V5.';
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
    <td style="font-size: 13px; color: #213E4b; font-family: Verdana, Geneva, sans-serif; padding-bottom: 20px; padding-top: 20px; border-bottom-color: #16A4C3; border-top-color: #16A4C3; border-bottom-style: dotted; border-top-style: dotted; border-bottom-width: 1px; border-top-width: 1px;"><p>Dear '.$takeorderinformation_row['name'].',</p>
      <p>Below is the invoice about your Video:</p>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center"><span style="font-size:16px; font-weight:bold">TAX INVOICE from Surge Media PTY LTD.</span><br />
<br />
<br />
</td>
        </tr>
        <tr>
          <td align="left"><span style="font-size:12px; font-weight:bold">Date: '.substr($takeorderinformation_row['paytime'], 0, 10).'</span></td>
          <td align="right"><span style="font-size:12px; font-weight:bold">ABN: 34 159 387 765</span></td>
        </tr>
        <tr>
          <td width="200" valign="top">Order Number:</td>
          <td valign="top">'.$item_name.'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">Item:</td>
          <td valign="top">1x V5 Branded Video File.<br/><br/></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><span style="font-size:14px; font-weight:bold">Order Details:</span></td>
        </tr>
        <tr>
          <td valign="top">Logo style:</td>
          <td valign="top">'.$takeorderinformation_row['style'].'<br/><br/></td>
        </tr>
		';
		if($takeorderinformation_row['upper_message']!="" || $takeorderinformation_row['middle_message']!="" || $takeorderinformation_row['bottom_message']!=""){
		$message .= '
        <tr>
          <td valign="top">Message:</td>
          <td valign="top">
		  <div style="border:1px solid #d1d1d1; padding:10px;">
		  <div style="'.$fstyle.$fsize.'">upper: '.$takeorderinformation_row['upper_message'].'</div>
		  <div style="'.$fstyle2.$fsize2.'">middle: '.$takeorderinformation_row['middle_message'].'</div>
		  <div style="'.$fstyle3.$fsize3.'">bottom: '.$takeorderinformation_row['bottom_message'].'</div>
		  </div>
		  <div>upper:'.$fsty.'(text-transform:'.$takeorderinformation_row['font_tran'].')</div>
		  <div>middle:'.$fsty2.'(text-transform:'.$takeorderinformation_row['font_tran2'].')</div>
		  <div>bottom:'.$fsty3.'(text-transform:'.$takeorderinformation_row['font_tran3'].')</div><br/><br/>
		  </td>
        </tr>
        <tr>
          <td valign="top">Message font style:</td>
          <td valign="top">
		  <div>upper: '.$takeorderinformation_row['font_style'].'</div>
		  <div>middle: '.$takeorderinformation_row['font_style2'].'</div>
		  <div>bottom: '.$takeorderinformation_row['font_style3'].'<br/><br/></div>
		  </td>
        </tr>
		';
		}
		$message .= '
        <tr>
          <td valign="top">Background Color:</td>
          <td valign="top">'.$takeorderinformation_row['backgroup_color'].'</td>
        </tr>
        <tr>
          <td valign="top">Notes:</td>
          <td valign="top">'.$takeorderinformation_row['notes'].'<br/><br/></td>
        </tr>
		';
		if($takeorderinformation_row['upper_cname']!="" || $takeorderinformation_row['middle_cname']!="" || $takeorderinformation_row['bottom_cname']!=""){
		$message .= '
        <tr>
          <td valign="top">Company Name or Word logo:</td>
          <td valign="top">
		  <div style="border:1px solid #d1d1d1; padding:10px;">
		  <div style="'.$cfstyle.$cfsize.'">upper: '.$takeorderinformation_row['upper_cname'].'</div>
		  <div style="'.$cfstyle2.$cfsize2.'">middle: '.$takeorderinformation_row['middle_cname'].'</div>
		  <div style="'.$cfstyle3.$cfsize3.'">bottom: '.$takeorderinformation_row['bottom_cname'].'</div>
		  </div>
		  <div>upper:'.$cfsty.'(text-transform:'.$takeorderinformation_row['cfont_tran'].')</div>
		  <div>middle:'.$cfsty2.'(text-transform:'.$takeorderinformation_row['cfont_tran2'].')</div>
		  <div>bottom:'.$cfsty3.'(text-transform:'.$takeorderinformation_row['cfont_tran3'].')</div><br/><br/>
		  </td>
        </tr>
        <tr>
          <td valign="top">Message font style:</td>
          <td valign="top">
		  <div>upper: '.$takeorderinformation_row['cfont_style'].'</div>
		  <div>middle: '.$takeorderinformation_row['cfont_style2'].'</div>
		  <div>bottom: '.$takeorderinformation_row['cfont_style3'].'<br/><br/></div>
		  </td>
        </tr>
		';
		}
		$message .= '
        <tr>
          <td valign="top">Price:</td>
          <td valign="top">AU$ '.($payment_amount*0.9).'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">GST:</td>
          <td valign="top">AU$ '.($payment_amount*0.1).'<br/><br/></td>
        </tr>
        <tr>
          <td valign="top">Amount of Payment:</td>
          <td valign="top">AU$ '.$payment_amount.'<br/><br/></td>
        </tr>
      </table>
      <p>Thank you very much. we are checking the output quality and will send you the file when completed.</p>
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
			if($_SESSION['mailout']<3){

		 $m = new SimpleEmailServiceMessage();
		 $m->setFrom('video@surgemedia.com.au');
     $m->addTo($to);
     $m->setSubject($subject);
     $m->setMessageFromString('',$message);
     $m->setMessageCharset('','UTF-8');
     $ses->sendEmail($m);
     unset($m);

     $internal_m = new SimpleEmailServiceMessage();
     $internal_m->setFrom('video@surgemedia.com.au');
     $internal_m->addTo($to2);
     $internal_m->setSubject( $subject);
     $internal_m->setMessageFromString('',$message);
     $internal_m->setMessageCharset('','UTF-8');
     $ses->sendEmail($internal_m);
     unset($internal_m);

				// mail($to, $subject, $message, $headers);										
				// mail($to2, $subject, $message, $headers);
			}
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
	width:590px; background: url("http://v5.surgemedia.com.au/img/photography.png") repeat scroll 0 0 rgba(0, 0, 0, 0); padding:5px; border-radius:5px;
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
    background-image: url("http://v5.surgemedia.com.au/img/coupon.jpg");
    border: 2px dashed green;
    border-radius: 0.5em;
    color: #fff;
    font-size: 40px;
    margin: 0 auto;
	margin-top:20px;
	margin-bottom:20px;
    padding: 2em 0;
    text-shadow: 2px 2px green;
    width: 70%;
	text-align:center;
}
.logo ul{
	width:250px; background: url("http://v5.surgemedia.com.au/img/photography.png") repeat scroll 0 0 rgba(0, 0, 0, 0); padding:30px 10px 30px 200px; position:relative;
}
.logo ul div{
	width:100px; height:80px; background:no-repeat url("http://v5.surgemedia.com.au/img/v5logo.png"); position:absolute; left:60px; top:35px;
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
.large{
	font-size:20px;
	margin-top:-15px;
}
</style>

<body>
<div class="thanksmail">
<h2>Hello '.$takeorderinformation_row['name'].',</h2>
Thanks for your purchase, your video in the pipeline. <br/>
Please be Patient. All videos are reviewed by a technician to insure quality.<br />
<h4>Your video will be delivered to you with in </h4>
<h4 class="large">1 business day.</h4>
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
				$body_contents = '
				<section id="main" class=" wowd fadeInDown blockwidth grid">
			<div id="slider" class="blockwidth mcenter">
				<div id="faq" class=" center">
				<h2>Thank You.</h2>
					<div style="line-height:50px; text-align:center;" class="terms">
						<p>Thanks for your purchase, your video in the pipeline. <br>Please be Patient, All videos reviewed by a technique to insure quaility</p>
						<p>Your Video will be delivered to you with in 1 busisness day</p>
						<p>You will receive a link to download your video by email when its ready.</p>
					</div>
				</div>
				</div>
			
				</section>	
				';
				$body_contents2 ='<input type="button" onclick="location.reload()" class="ghost_button" style="margin:20px auto;" value="Resend E-mail" />';			
			
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			
			$headers .="From: ". $name . " <" . $from . ">\r\n";
			if($_SESSION['mailout']<3){
				$m = new SimpleEmailServiceMessage();
				 $m->setFrom('video@surgemedia.com.au');
		     $m->addTo($to);
		     $m->setSubject($subject);
		     $m->setMessageFromString('',$message);
		     $m->setMessageCharset('','UTF-8');
		     $ses->sendEmail($m);
		     unset($m);

		     $internal_m = new SimpleEmailServiceMessage();
		     $internal_m->setFrom('video@surgemedia.com.au');
		     $internal_m->addTo($to2);
		     $internal_m->setSubject( $subject);
		     $internal_m->setMessageFromString('',$message);
		     $internal_m->setMessageCharset('','UTF-8');
		     $ses->sendEmail($internal_m);
		     unset($internal_m);

				// mail($to, $subject, $message, $headers);										
				// mail($to2, $subject, $message, $headers);
			}
			$offerusedcheck = mysql_query("SELECT * FROM v5_order_new_live WHERE email LIKE '".$to."' AND offer_usage = 1 AND payment_statue = 1");
			$offerusedcheck_num = mysql_num_rows($offerusedcheck);
			if($offerusedcheck_num<=5)
			{
				if($_SESSION['mailout']<3){	
				 $m = new SimpleEmailServiceMessage();
				 $m->setFrom('video@surgemedia.com.au');
		     $m->addTo($to);
		     $m->setSubject($subject2);
		     $m->setMessageFromString('',$message2);
		     $m->setMessageCharset('','UTF-8');
		     $ses->sendEmail($m);
		     unset($m);
				}
				$body_contents = '
				<section id="main" class=" wowd fadeInDown blockwidth grid">
			<div id="slider" class="blockwidth mcenter">
				<div id="faq" class=" center">
				<h2>Thank You.</h2>
					<div style="line-height:50px; text-align:center;" class="terms">
						<p>Thanks for your purchase, your video in the pipeline. <br>Please be Patient, All videos reviewed by a technique to insure quaility</p>
						<p>Your Video will be delivered to you with in 1 busisness day</p>
						<p>You will receive a link to download your video by email when its ready.</p>
						<p><i style="font-style:italic">Horray!</i></p>
						<p>We know you will enjoy the power of video, and hope to see you again. <br>
						V5 would like to offer you a 10% discount on your new v5 video please enter the code below.
						</p>
						<div class="coupon"><strong>v512455</strong></div>
						<!-- <p><img src="/teamphoto.jpg" alt=""></p> -->
					</div>
				</div>
				</div>
			
				</section>	
				';					
			}
			$check_mailchimp =  mysql_query("SELECT * FROM v5_order_new_live WHERE email LIKE '".$to."'");
			$check_mailchimp_num = mysql_num_rows($check_mailchimp);
			if($check_mailchimp_num<2){
				$api_key = "e7b75d533ca2f90478f1545424fbaabe-us7";
				$list_id = "97489b8646";
			 
				$email = $to; //replace with a test email
			 
				require_once 'inc/MCAPI.class.php';
				require_once 'inc/config.inc.php'; //contains apikey
				
				$api = new MCAPI($api_key);
				
				/** 
				Note that if you are not passing merge_vars, you will still need to
				pass a "blank" array. That should be either:
					$merge_vars = array('');
					   - or -
					$merge_vars = '';
				
				Specifically, this will fail:
					$merge_vars = array();
				
				Or pass the proper data as below...
				*/
				$merge_vars = array('FNAME'=>$takeorderinformation_row['name'], 'LNAME'=>'', 
									'INTERESTS'=>'V5');
				// By default this sends a confirmation email - you will not see new members
				// until the link contained in it is clicked!
				$retval = $api->listSubscribe( $list_id, $email, $merge_vars );
				
				if ($api->errorCode){
					echo "Unable to load listSubscribe()!\n";
					echo "\tCode=".$api->errorCode."\n";
					echo "\tMsg=".$api->errorMessage."\n";
				} else {
					echo "";
				}

			}
}

?>
<!DOCTYPE html>
<html lang="">
	<? include('head.php');?>
	<body>
	<? include('content_header.php');?>

	<?=$body_contents;
	if( $_SESSION['mailout']<3){
		echo $body_contents2;
	}
	?>
    
 <? include('footer.php');?>
	</body>
</html>
<?
// End Processing

// This method uses the QSI Response code retrieved from the Digital
// Receipt and returns an appropriate description for the QSI Response Code
//
// @param $responseCode String containing the QSI Response Code
//
// @return String containing the appropriate description
//
function getResponseDescription($responseCode) {

    switch ($responseCode) {
        case "0" : $result = "Transaction Successful"; break;
        case "?" : $result = "Transaction status is unknown"; break;
        case "1" : $result = "Unknown Error"; break;
        case "2" : $result = "Bank Declined Transaction"; break;
        case "3" : $result = "No Reply from Bank"; break;
        case "4" : $result = "Expired Card"; break;
        case "5" : $result = "Insufficient funds"; break;
        case "6" : $result = "Error Communicating with Bank"; break;
        case "7" : $result = "Payment Server System Error"; break;
        case "8" : $result = "Transaction Type Not Supported"; break;
        case "9" : $result = "Bank declined transaction (Do not contact Bank)"; break;
        case "A" : $result = "Transaction Aborted"; break;
        case "C" : $result = "Transaction Cancelled"; break;
        case "D" : $result = "Deferred transaction has been received and is awaiting processing"; break;
        case "F" : $result = "3D Secure Authentication failed"; break;
        case "I" : $result = "Card Security Code verification failed"; break;
        case "L" : $result = "Shopping Transaction Locked (Please try the transaction again later)"; break;
        case "N" : $result = "Cardholder is not enrolled in Authentication scheme"; break;
        case "P" : $result = "Transaction has been received by the Payment Adaptor and is being processed"; break;
        case "R" : $result = "Transaction was not processed - Reached limit of retry attempts allowed"; break;
        case "S" : $result = "Duplicate SessionID (OrderInfo)"; break;
        case "T" : $result = "Address Verification Failed"; break;
        case "U" : $result = "Card Security Code Failed"; break;
        case "V" : $result = "Address Verification and Card Security Code Failed"; break;
        default  : $result = "Unable to be determined"; 
    }
    return $result;
}

//  ----------------------------------------------------------------------------

// This function uses the QSI AVS Result Code retrieved from the Digital
// Receipt and returns an appropriate description for this code.

// @param vAVSResultCode String containing the QSI AVS Result Code
// @return description String containing the appropriate description

function displayAVSResponse($avsResultCode) {
    
    if ($avsResultCode != "") { 
        switch ($avsResultCode) {
            Case "Unsupported" : $result = "AVS not supported or there was no AVS data provided"; break;
            Case "X"  : $result = "Exact match - address and 9 digit ZIP/postal code"; break;
            Case "Y"  : $result = "Exact match - address and 5 digit ZIP/postal code"; break;
            Case "S"  : $result = "Service not supported or address not verified (international transaction)"; break;
            Case "G"  : $result = "Issuer does not participate in AVS (international transaction)"; break;
            Case "A"  : $result = "Address match only"; break;
            Case "W"  : $result = "9 digit ZIP/postal code matched, Address not Matched"; break;
            Case "Z"  : $result = "5 digit ZIP/postal code matched, Address not Matched"; break;
            Case "R"  : $result = "Issuer system is unavailable"; break;
            Case "U"  : $result = "Address unavailable or not verified"; break;
            Case "E"  : $result = "Address and ZIP/postal code not provided"; break;
            Case "N"  : $result = "Address and ZIP/postal code not matched"; break;
            Case "0"  : $result = "AVS not requested"; break;
            default   : $result = "Unable to be determined"; 
        }
    } else {
        $result = "null response";
    }
    return $result;
}

//  ----------------------------------------------------------------------------

// This function uses the QSI CSC Result Code retrieved from the Digital
// Receipt and returns an appropriate description for this code.

// @param vCSCResultCode String containing the QSI CSC Result Code
// @return description String containing the appropriate description

function displayCSCResponse($cscResultCode) {
    
    if ($cscResultCode != "") {
        switch ($cscResultCode) {
            Case "Unsupported" : $result = "CSC not supported or there was no CSC data provided"; break;
            Case "M"  : $result = "Exact code match"; break;
            Case "S"  : $result = "Merchant has indicated that CSC is not present on the card (MOTO situation)"; break;
            Case "P"  : $result = "Code not processed"; break;
            Case "U"  : $result = "Card issuer is not registered and/or certified"; break;
            Case "N"  : $result = "Code invalid or not matched"; break;
            default   : $result = "Unable to be determined"; break;
        }
    } else {
        $result = "null response";
    }
    return $result;
}

//  -----------------------------------------------------------------------------

// This method uses the verRes status code retrieved from the Digital
// Receipt and returns an appropriate description for the QSI Response Code

// @param statusResponse String containing the 3DS Authentication Status Code
// @return String containing the appropriate description

function getStatusDescription($statusResponse) {
    if ($statusResponse == "" || $statusResponse == "No Value Returned") {
        $result = "3DS not supported or there was no 3DS data provided";
    } else {
        switch ($statusResponse) {
            Case "Y"  : $result = "The cardholder was successfully authenticated."; break;
            Case "E"  : $result = "The cardholder is not enrolled."; break;
            Case "N"  : $result = "The cardholder was not verified."; break;
            Case "U"  : $result = "The cardholder's Issuer was unable to authenticate due to some system error at the Issuer."; break;
            Case "F"  : $result = "There was an error in the format of the request from the merchant."; break;
            Case "A"  : $result = "Authentication of your Merchant ID and Password to the ACS Directory Failed."; break;
            Case "D"  : $result = "Error communicating with the Directory Server."; break;
            Case "C"  : $result = "The card type is not supported for authentication."; break;
            Case "S"  : $result = "The signature on the response received from the Issuer could not be validated."; break;
            Case "P"  : $result = "Error parsing input from Issuer."; break;
            Case "I"  : $result = "Internal Payment Server system error."; break;
            default   : $result = "Unable to be determined"; break;
        }
    }
    return $result;
}

//  -----------------------------------------------------------------------------
   
// If input is null, returns string "No Value Returned", else returns input
function null2unknown($data) {
    if ($data == "") {
        return "No Value Returned";
    } else {
        return $data;
    }
} 
    
//  ----------------------------------------------------------------------------

?>