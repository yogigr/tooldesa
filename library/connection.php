<?php

function db_connect()
{
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "tooldesa";
	
	$koneksi = new mysqli($host, $user, $pass, $db);
	if(!$koneksi){
		throw new Exception("Gagal terhubung server database");
	} else {
		return $koneksi;
	}
	
}



?>