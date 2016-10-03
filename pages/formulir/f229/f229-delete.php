<?php  


$id_jenazah = @$_GET['id_jenazah'] ;


try {
	$koneksi = db_connect();
	# hapus record di table jenazah berdasasar id
	if (!$koneksi->query("delete from jenazah where id_jenazah=".$id_jenazah)) {
		throw new Exception("Error jenazah, gagal hapus record jenazah dengan id_jenazah=".$id_jenazah);
	}
	# hapus record di table ibu berdasar id_jenazah
	if (!$koneksi->query("delete from ibu where id_jenazah=".$id_jenazah)) {
		throw new Exception("error ibu, gagal hapus record ibu dengan id_jenazah=".$id_jenazah);
	}
	# hapus record di table ayah berdasar id_jenazah
	if (!$koneksi->query("delete from ayah where id_jenazah=".$id_jenazah)) {
		throw new Exception("Error Ayah, gagal hapus record ayah dengan id_jenazah=".$id_jenazah);
	}
	# hapus record di table pelapor berdasar id_jenazah
	if (!$koneksi->query("delete from pelapor where id_jenazah=".$id_jenazah)) {
		throw new Exception("Error pelapor, gagal hapus record pelapor dengan id_jenazah=".$id_jenazah);
	}
	# hapus record di table saksi1 berdasar id_jenazah
	if (!$koneksi->query("delete from saksi1 where id_jenazah=".$id_jenazah)) {
		throw new Exception("Error saksi1, gagal hapus record saksi1 dengan id_jenazah=".$id_jenazah);
	}
	# hapus record di table saksi2 berdasar id_jenazah
	if (!$koneksi->query("delete from saksi2 where id_jenazah=".$id_jenazah)) {
		throw new Exception("Error saksi2, gagal hapus record saksi2 dengan id_jenazah=".$id_jenazah);
	}
	$koneksi->close();
	# jika berhasil
	display_header("Formulir f-2.29");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "f-2.29 ( Surat Keterangan Kematian )");
	alert_sukses("Berhasil hapus data dengan id_jenazah = ".$id_jenazah);
	component_f229();
	table_f229();
	display_footer();
} catch (Exception $e) {
	$koneksi->close();
	# jika gagal
	display_header("Formulir f-2.29");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "f-2.29 ( Surat Keterangan Kematian )");
	alert_gagal($e->getMessage());
	component_f229();
	table_f229();
	display_footer();
}



?>