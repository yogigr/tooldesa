<?php  


$id_bayi = @$_GET['id_bayi'] ;


try {
	$koneksi = db_connect();
	# hapus record di table bayi berdasasar id
	if (!$koneksi->query("delete from bayi where id_bayi=".$id_bayi)) {
		throw new Exception("Error bayi, gagal hapus record bayi dengan id_bayi=".$id_bayi);
	}
	# hapus record di table ibu berdasar id_bayi
	if (!$koneksi->query("delete from ibu where id_bayi=".$id_bayi)) {
		throw new Exception("error ibu, gagal hapus record ibu dengan id_bayi=".$id_bayi);
	}
	# hapus record di table ayah berdasar id_bayi
	if (!$koneksi->query("delete from ayah where id_bayi=".$id_bayi)) {
		throw new Exception("Error Ayah, gagal hapus record ayah dengan id_bayi=".$id_bayi);
	}
	# hapus record di table pelapor berdasar id_bayi
	if (!$koneksi->query("delete from pelapor where id_bayi=".$id_bayi)) {
		throw new Exception("Error pelapor, gagal hapus record pelapor dengan id_bayi=".$id_bayi);
	}
	# hapus record di table saksi1 berdasar id_bayi
	if (!$koneksi->query("delete from saksi1 where id_bayi=".$id_bayi)) {
		throw new Exception("Error saksi1, gagal hapus record saksi1 dengan id_bayi=".$id_bayi);
	}
	# hapus record di table saksi2 berdasar id_bayi
	if (!$koneksi->query("delete from saksi2 where id_bayi=".$id_bayi)) {
		throw new Exception("Error saksi2, gagal hapus record saksi2 dengan id_bayi=".$id_bayi);
	}
	$koneksi->close();
	# jika berhasil
	display_header("Formulir F-2.01");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-2.01 ( Surat Keterangan Kelahiran )");
	alert_sukses("Berhasil hapus data dengan id_bayi = ".$id_bayi);
	component_f201();
	table_f201();
	display_footer();
} catch (Exception $e) {
	$koneksi->close();
	# jika gagal
	display_header("Formulir F-2.01");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-2.01 ( Surat Keterangan Kelahiran )");
	alert_gagal($e->getMessage());
	component_f201();
	table_f201();
	display_footer();
}



?>