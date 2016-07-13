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
    <h2>PRIVACY POLICY</h2>
    	<div style="line-height:50px;" class="terms">
    	  <p>This web site is owned and operated by Surge Media and will be referred to as "We", "our" and "us" in this Internet Privacy Policy. By using this site, you agree to the Internet Privacy Policy of this web site ("the web site"), which is set out on this web site page. The Internet Privacy Policy relates to the collection and use of personal information you may supply to us through your conduct on the web site. </p>
          <p>We reserve the right, at our discretion, to modify or remove portions of this Internet Privacy Policy at any time. This Internet Privacy Policy is in addition to any other terms and conditions applicable to the web site. We do not make any representations about third party web sites that may be linked to the web site. </p>
          <p>We recognise the importance of protecting the privacy of information collected about visitors to our web site, in particular information that is capable of identifying an individual ("personal information"). This Internet Privacy Policy governs the manner in which your personal information, obtained through the web site, will be dealt with. This Internet Privacy Policy should be reviewed periodically so that you are updated on any changes. We welcome your comments and feedback. </p>
          <h3>Personal Information</h3>
          <p>Personal information about visitors to our site is collected only when knowingly and voluntarily submitted. For example, we may need to collect such information to provide you with further services or to answer or forward any requests or enquiries. It is our intention that this policy will protect your personal information from being dealt with in any way that is inconsistent with applicable privacy laws in Australia. </p>
          <h3>Use of Information</h3>
          <p>Personal information that visitors submit to our site is used only for the purpose for which it is submitted or for such other secondary purposes that are related to the primary purpose, unless we disclose other uses in this Internet Privacy Policy or at the time of collection. Copies of correspondence sent from the web site, that may contain personal information, are stored as archives for record-keeping and back-up purposes only. </p>
          <h3>Disclosure </h3>
          <p>Apart from where you have consented or disclosure is necessary to achieve the purpose for which it was submitted, personal information may be disclosed in special situations where we have reason to believe that doing so is necessary to identify, contact or bring legal action against anyone damaging, injuring, or interfering (intentionally or unintentionally) with our rights or property, users, or anyone else who could be harmed by such activities. Also, we may disclose personal information when we believe in good faith that the law requires disclosure. </p>
          <p>We may engage third parties to provide you with goods or services on our behalf. In that circumstance, we may disclose your personal information to those third parties in order to meet your request for goods or services. </p>
          <h3>Security</h3>
          <p>We strive to ensure the security, integrity and privacy of personal information submitted to our sites, and we review and update our security measures in light of current technologies. Unfortunately, no data transmission over the Internet can be guaranteed to be totally secure. </p>
          <p>However, we will endeavour to take all reasonable steps to protect the personal information you may transmit to us or from our online products and services. Once we do receive your transmission, we will also make our best efforts to ensure its security on our systems. </p>
          <p>In addition, our employees and the contractors who provide services related to our information systems are obliged to respect the confidentiality of any personal information held by us. However, we will not be held responsible for events arising from unauthorised access to your personal information. </p>
          <h3>Cookies </h3>
          <p>Cookies are data that a Web site transfers to an individual's hard drive for record-keeping purposes. Cookies, which are industry standard and are used by most Web sites, including those operated by us, can facilitate a user's ongoing access to and use of a site. They allow us to customise the web site to your needs. If you do not want information collected through the use of Cookies, there is a simple procedure in most browsers that allows you to deny or accept the Cookie feature. But you should note that Cookies may be necessary to provide you with some features of our on-line services. </p>
          <h3>Access to Information</h3>
          <p>We will endeavour to take all reasonable steps to keep secure any information which we hold about you, and to keep this information accurate and up to date. If, at any time, you discover that information held about you is incorrect, you may contact us to have the information corrected. </p>
          <p>In addition, our employees and the contractors who provide services related to our information systems are obliged to respect the confidentiality of any personal information held by us. </p>
          <h3>Links to other sites</h3>
          <p>We provide links to Web sites outside of our web sites, as well as to third party Web sites. These linked sites are not under our control, and we cannot accept responsibility for the conduct of companies linked to our website. Before disclosing your personal information on any other website, we advise you to examine the terms and conditions of using that Web site and its privacy statement. </p>
          <h3>Problems or questions</h3>
          <p>If we become aware of any ongoing concerns or problems with our web sites, we will take these issues seriously and work to address these concerns. If you have any further queries relating to our Privacy Policy, or you have a problem or complaint, please contact us. Further Privacy Information </p>
          <p>For more information about privacy issues in Australia and protecting your privacy, visit the Australian Federal Privacy Commissioner's web site. <a href="http://www.privacy.gov.au/">http://www.privacy.gov.au/</a></p>
    	</div>
    </div>
    </div>

	</section>	
 <? include('footer.php');?>
	</body>
</html>