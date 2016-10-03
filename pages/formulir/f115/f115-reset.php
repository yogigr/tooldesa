<?php


try {
   $koneksi = db_connect();
   $sql = "select nik_pemohon from pemohon_kk";
   $result = $koneksi->query($sql);
   if($result->num_rows == 0){
       throw new Exception("Data Kosong, tidak ada data yang bisa dihapus");
   }
   while ($row=$result->fetch_array()){
       $sql2 = "delete from pemohon_kk where nik_pemohon='".$row['nik_pemohon']."'";
       $result2 = $koneksi->query($sql2);
       if(!$result2){
           throw new Exception("gagal menghapus data dengan nik_pemohon = ".$row['nik_pemohon']);
       }
	   # menghapus daftar anggota pemohon kk
	   $sql3 = "select * from daftar_anggota_pemohon_kk where nik_pemohon='".$row['nik_pemohon']."'";
	   $result3 = $koneksi->query($sql3);
	   while($row2 = $result3->fetch_array()){
		   $sql4 = "delete from daftar_anggota_pemohon_kk where nik_anggota='".$row2['nik_anggota']."'";
		   $result4 = $koneksi->query($sql4);
		   if(!$result4){
			   throw new exception("Gagal menghapus nik anggota ".$row['nik_anggota']);
		   }
	   }
   }
   
   # apabila berhasil
   display_header("Formulir F-1.15");
   display_sidebar();
   display_content("Formulir", "?page1=formulir", "F-1.15");
   alert_sukses("Berhasil reset database f115");
   display_footer();
   header("refresh:1;url=?page1=f115");
} catch (Exception $e) {
   display_header("Formulir F-1.15");
   display_sidebar();
   display_content("Formulir", "?page1=formulir", "F-1.15");
   alert_gagal($e->getMessage());
   display_footer();
   header("refresh:1;url=?page1=f115");
}


?>

