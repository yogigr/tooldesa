
<?php 

require_once('library.php');
session_start();
date_default_timezone_set("Asia/Jakarta");


if(!isset($_SESSION['loggedin'])){
	$username = @$_POST['username'];
	$password = @$_POST['password'];

	if(($username == "kasipem")&&($password == "rajagaluhlor")){
		$_SESSION['loggedin'] = 1;
		include "loader.php";
	} else {
		header("Location:login.php");
	}
}else{
	include "loader.php";
}



?>

