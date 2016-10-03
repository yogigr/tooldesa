<?php

$nik_pemohon = @$_GET['nik_pemohon'];

try {
    $koneksi = db_connect();
    $sql = "Delete From perubahan_kk where nik_pemohon='".$nik_pemohon."'";
    $result = $koneksi->query($sql);
    if(!$result){
        throw new Exception("Gagal menghapus data nik pemohon = ".$nik_pemohon." dari database");
    }
	
	# menghapus tabel daftar anggota pemohon kk
	$sql2 = "select * from daftar_anggota_pemohon_kk_2 where nik_pemohon='".$nik_pemohon."'";
	$result2 = $koneksi->query($sql2);
	if($result2->num_rows == 0){
		throw New Exception("Tidak ada data nik pemohon pada tabel daftar anggota pemohon kk");
	}
	while($row = $result2->fetch_array()){
		$sql3 = "delete from daftar_anggota_pemohon_kk_2 where nik_anggota ='".$row['nik_anggota']."'";
		$result3 = $koneksi->query($sql3);
		if(!$result3){
			throw new exception("Gagal Menghapus data tabel anggota pemohon kk");
		}
	}
    
    # jika sukses 
    display_header("Formulir F-1.16");
    display_sidebar();
    display_content("Formulir", "?page1=formulir", "F-1.16");
    alert_sukses("Sukses menghapus data nik pemohon = ".$nik_pemohon);
    display_footer();
    header("refresh:1;url=?page1=f116");
} catch (Exception $e) {
    display_header("Formulir F-1.16");
    display_sidebar();
    display_content("Formulir", "?page1=formulir", "F-1.16");
    alert_gagal($e->getMessage());
    display_footer();
    header("refresh:1;url=?page1=f116");
}

?>