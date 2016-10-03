<?php

$no_form = @$_GET['no_form'];

try {
    $koneksi = db_connect();
    $sql = "Delete From pemohon_pindah where no_form='".$no_form."'";
    $result = $koneksi->query($sql);
    if(!$result){
        throw new Exception("Gagal menghapus data dengan nomor formulir = ".$nik_pemohon." dari database");
	}
	
	# menghapus tabel daftar anggota pemohon kk
	$sql2 = "delete from penduduk_pindahan where no_form ='".$no_form."'";
	$result2 = $koneksi->query($sql2);
	if(!$result2){
		throw new exception("Gagal Menghapus data tabel anggota pemohon kk");
	}
	
    # jika sukses 
    display_header("Formulir F-1.34");
    display_sidebar();
    display_content("Formulir", "?page1=formulir", "F-1.34");
    alert_sukses("Sukses menghapus data nomor formulir = ".$no_form);
    display_footer();
    header("refresh:1;url=?page1=f134");
} catch (Exception $e) {
    display_header("Formulir F-1.34");
    display_sidebar();
    display_content("Formulir", "?page1=formulir", "F-1.34");
    alert_gagal($e->getMessage());
    display_footer();
    header("refresh:1;url=?page1=f134");
}

?>