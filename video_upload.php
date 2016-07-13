<?
	include('db_connection_13r2fdfd34.php');
	
	$client_ipaddress = $_SERVER['REMOTE_ADDR'];
	$order_num = $_POST['invoice_number'];
	$today = date(Y).'-'.date(m).'-'.date(d);
	require_once "dropbox-sdk/Dropbox/autoload.php";
	use \Dropbox as dbx;
	
	$dbxClient = new dbx\Client("9pbTUE6jyycAAAAAAAABFTOwjE0TFwiHBBRrU-kvtuNgZQrmzwJiZQYgwwbwoFuY", "PHP-Example/1.0");
	if($_FILES['logo_file']['name'] != ""){
		if ($_FILES['logo_file']['error'] !== UPLOAD_ERR_OK){
			echo 'File was not successfully uploaded from your computer.';
		}
		if ($_FILES['logo_file']['name'] === ""){
			echo 'File name not supplied by the browser.';
		}
	}
	if ($_FILES['video_file']['error'] !== UPLOAD_ERR_OK){
		echo 'File was not successfully uploaded from your computer.';
	}
	if ($_FILES['video_file']['name'] === ""){
		echo 'File name not supplied by the browser.';
	}
		if($_FILES['video_file']['size'] >= 314572800){
			header('Location: http://vid5.surgehost.com.au/error.php?error=5');	//If cannot connect to the database, just redirectly back to font page
			exit;
		}
	if($_FILES['logo_file']['name'] != ""){
		if($_FILES['logo_file']['size'] >= 20971520){
			header('Location: http://vid5.surgehost.com.au/error.php?error=6');	//If cannot connect to the database, just redirectly back to font page
			exit;
		}
	}
	// Upload
	if($_FILES['logo_file']['name'] != ""){
		$fp = fopen($_FILES['logo_file']['tmp_name'], "rb");
		$result = $dbxClient->uploadFile("/".$order_num."/".$_FILES['logo_file']['name'], dbx\WriteMode::add(), $fp);
		fclose($fp);
	}
	
	$fp2 = fopen($_FILES['video_file']['tmp_name'], "rb");
	$result = $dbxClient->uploadFile("/".$order_num."/".$_FILES['video_file']['name'], dbx\WriteMode::add(), $fp2);
	fclose($fp2);
	
?>
