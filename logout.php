<?php 

session_start();

unset($_SESSION['loggedin']);
if(session_destroy()){
	date_default_timezone_set("Asia/Jakarta");
	$waktu = "Tanggal ".date('d')." ".date('M')." ".date('Y')." Pukul ".date("H:i:s");
	setcookie('login_terakhir', $waktu);
	header("Location:login.php");
}

?>