<?php

function proses_input_pbbdesa($nop, $nama, $luas_tanah, $luas_bangunan, $njop_tanah, $njop_bangunan, $tagihan, $keterangan)
{
	#buka koneksi
	$koneksi = db_connect();
	if(!$koneksi){
		throw new Exception("Gagal terhubung database");
	}
	# check nop is unique
	$result = $koneksi->query("select * from pbbdesa where nop='".$nop."'");
	if($result && $result->num_rows > 0){
		throw new exception("Data yang anda input barusan telah anda input sebelumnya");
	}
	# input data
	$sql = "INSERT INTO `pbbdesa` (`nop`, `nama`, `luas_tanah`, `luas_bangunan`, `njop_tanah`, `njop_bangunan`, `tagihan`, `keterangan`, `tanggal_input`) VALUES ('".$nop."', '".$koneksi->real_escape_string($nama)."', '".$luas_tanah."', '".$luas_bangunan."', '".$njop_tanah."', '".$njop_bangunan."', '".$tagihan."', '".$keterangan."', CURRENT_TIMESTAMP)";
	if(!$koneksi->query($sql)){
		throw new Exception("Gagal input Database. Silahkan coba beberapa saat lagi.");
	}
	#tutup koneksi
	$koneksi->close();
}
function proses_edit_pbbdesa($nop, $nama, $luas_tanah, $luas_bangunan, $njop_tanah, $njop_bangunan, $tagihan, $keterangan)
{
	#buka koneksi
	$koneksi = db_connect();
	if(!$koneksi){
		throw new Exception("Gagal terhubung database");
	}
	# edit data data
	$sql = "UPDATE pbbdesa SET nama = '".$koneksi->real_escape_string($nama)."', luas_tanah = '".$luas_tanah."', luas_bangunan = '".$luas_bangunan."', njop_tanah = '".$njop_tanah."', njop_bangunan = '".$njop_bangunan."', tagihan = '".$tagihan."', keterangan = '".$keterangan."' WHERE nop = '$nop'";
	if(!$koneksi->query($sql)){
		throw new Exception("Gagal Edit Data Database. Silahkan coba beberapa saat lagi.");
	}
	#tutup koneksi
	$koneksi->close();
}

?>