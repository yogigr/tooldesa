<?php  


# hapus semua record di tabel f229
try {
	$koneksi = db_connect();
	$result = $koneksi->query("select id_jenazah from jenazah");
	while ($jenazah = $result->fetch_array()) {
		# hapus record saksi 2
		if (!$koneksi->query("delete from saksi2 where id_jenazah='".$jenazah['id_jenazah']."'")) {
			throw new Exception("Error, gagal hapus record saksi2 dengan id_jenazah = ".$jenazah['id_jenazah']);
		}
		# hapus record saksi 1
		if (!$koneksi->query("delete from saksi1 where id_jenazah='".$jenazah['id_jenazah']."'")) {
			throw new Exception("Error, gagal hapus record saksi1 dengan id_jenazah = ".$jenazah['id_jenazah']);
		}
		# hapus recor pelapor
		if (!$koneksi->query("delete from pelapor where id_jenazah = '".$jenazah['id_jenazah']."'")) {
			throw new Exception("Error, gagal hapus record pelapor dengan id_jenazah = ".$jenazah['id_jenazah']);
		}
		# hapus record ayah
		if (!$koneksi->query("delete from ayah where id_jenazah = '".$jenazah['id_jenazah']."'")) {
			throw new Exception("error, gagal hapus record ayah dengan id_jenazah = ".$jenazah['id_jenazah']);
		}
		# hapus record ibu
		if (!$koneksi->query("delete from ibu where id_jenazah = '".$jenazah['id_jenazah']."'")) {
			throw new Exception("Error, gagal hapus record ibu dengan id_jenazah = ".$jenazah['id_jenazah']);
		}
		#hapus record jenazah
		if(!$koneksi->query("delete from jenazah where id_jenazah ='".$jenazah['id_jenazah']."'")){
			throw new Exception("Error, gagal hapus record jenazah dengan id_jenazah = ".$jenazah['id_jenazah']);
		}
	}
	$koneksi->close();
	# jika berhasil
	display_header("Formulir f-2.29");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "f-2.29 ( Surat Keterangan Kematian )");
	alert_sukses("Berhasil reset record jenazah");
	component_f229();
	table_f229();
	display_footer();
} catch (Exception $e) {
	# jika gagal
	$koneksi->close();
	display_header("Formulir f-2.29");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "f-2.29 ( Surat Keterangan Kematian )");
	alert_gagal($e->getMessage());
	component_f229();
	table_f229();
	display_footer();
}


?>