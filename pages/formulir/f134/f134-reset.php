<?php

try {
   $koneksi = db_connect();
   $sql = "select no_form from pemohon_pindah where tipe_pindah = 'antar kabupaten'";
   $result = $koneksi->query($sql);
   if($result->num_rows == 0){
       throw new Exception("Data Kosong, tidak ada data yang bisa dihapus");
   }
   while ($row=$result->fetch_array()){
		$sql2 = "delete from pemohon_pindah where no_form ='".$row['no_form']."'";
		$result2 = $koneksi->query($sql2);
		if(!$result2){
           throw new Exception("gagal menghapus data dengan no_form = ".$row['no_form']);
		}
		# menghapus daftar anggota pemohon kk
		$sql3 = "delete from penduduk_pindahan where no_form ='".$row['no_form']."'";
		$result3 = $koneksi->query($sql3);
		if(!$result3){
			throw new exception("Gagal menghapus nik anggota ");
		}
	}
  
   # apabila berhasil
   display_header("Formulir F-1.34");
   display_sidebar();
   display_content("Formulir", "?page1=formulir", "F-1.34");
   alert_sukses("Berhasil reset database f134");
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