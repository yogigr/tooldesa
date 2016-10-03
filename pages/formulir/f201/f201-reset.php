<?php  


# hapus semua record di tabel f201
try {
	$koneksi = db_connect();
	$result = $koneksi->query("select id_bayi from bayi");
	while ($bayi = $result->fetch_array()) {
		# hapus record saksi 2
		if (!$koneksi->query("delete from saksi2 where id_bayi='".$bayi['id_bayi']."'")) {
			throw new Exception("Error, gagal hapus record saksi2 dengan id_bayi = ".$bayi['id_bayi']);
		}
		# hapus record saksi 1
		if (!$koneksi->query("delete from saksi1 where id_bayi='".$bayi['id_bayi']."'")) {
			throw new Exception("Error, gagal hapus record saksi1 dengan id_bayi = ".$bayi['id_bayi']);
		}
		# hapus recor pelapor
		if (!$koneksi->query("delete from pelapor where id_bayi = '".$bayi['id_bayi']."'")) {
			throw new Exception("Error, gagal hapus record pelapor dengan id_bayi = ".$bayi['id_bayi']);
		}
		# hapus record ayah
		if (!$koneksi->query("delete from ayah where id_bayi = '".$bayi['id_bayi']."'")) {
			throw new Exception("error, gagal hapus record ayah dengan id_bayi = ".$bayi['id_bayi']);
		}
		# hapus record ibu
		if (!$koneksi->query("delete from ibu where id_bayi = '".$bayi['id_bayi']."'")) {
			throw new Exception("Error, gagal hapus record ibu dengan id_bayi = ".$bayi['id_bayi']);
		}
		#hapus record bayi
		if(!$koneksi->query("delete from bayi where id_bayi ='".$bayi['id_bayi']."'")){
			throw new Exception("Error, gagal hapus record bayi dengan id_bayi = ".$bayi['id_bayi']);
		}
	}
	$koneksi->close();
	# jika berhasil
	display_header("Formulir F-2.01");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-2.01 ( Surat Keterangan Kelahiran )");
	alert_sukses("Berhasil reset record bayi");
	component_f201();
	table_f201();
	display_footer();
} catch (Exception $e) {
	# jika gagal
	$koneksi->close();
	display_header("Formulir F-2.01");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-2.01 ( Surat Keterangan Kelahiran )");
	alert_gagal($e->getMessage());
	component_f201();
	table_f201();
	display_footer();
}


?>