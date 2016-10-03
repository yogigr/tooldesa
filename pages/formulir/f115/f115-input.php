<?php
require_once('library.php');
$step = @$_GET['step'];
if($step == 1){
    display_header("Formulir F-1.15");
    display_sidebar();
    display_content("Formulir", "?page1=formulir", "F-1.15");
    form_input_f115_step1();
    display_footer(); 
}elseif($step == 2){
      
        # ambil nilai dari form step 1
        $jumlah_anggota_keluarga = $_POST['jumlah_anggota_keluarga'];
        try {
            if(!is_numeric($jumlah_anggota_keluarga)){
                throw new Exception("Jumlah Anggota Keluarga Harus berupa angka");
            }
            display_header("Formulir F-1.15");
            display_sidebar();
            display_content("Formulir", "?page1=formulir", "F-1.15");
            form_input_f115_step2($jumlah_anggota_keluarga);
            display_footer();
        } catch (Exception $e) {
            display_header("Formulir F-1.15");
            display_sidebar();
            display_content("Formulir", "?page1=formulir", "F-1.15");
            alert_gagal($e->getMessage());
            form_input_f115_step1();
            display_footer();
        }

        
} else if($step == 3){
        # ambil nilai dari step 2
        $nik_pemohon = $_POST['nik_pemohon'];
        $nama_pemohon = $_POST['nama_pemohon'];
        $no_kk_semula = $_POST['no_kk_semula'];
        $alamat_pemohon = $_POST['alamat_pemohon'];
        $rt = $_POST['rt'];
        $rw = $_POST['rw'];
        $desa = $_POST['desa'];
        $kec = $_POST['kecamatan'];
        $kab = $_POST['kabupaten'];
        $prop = $_POST['propinsi'];
        $kodepos = $_POST['kodepos'];
        $telp = $_POST['telepon'];
        $alasan = $_POST['alasan_permohonan'];
        $jumlah_anggota_keluarga = $_POST['jumlah_anggota_keluarga'];
        try {
           $koneksi = db_connect();
           $sql = "INSERT INTO `pemohon_kk` (`nik_pemohon`, `nama_pemohon`, `no_kk_semula`, `alamat_pemohon`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `propinsi`, `kodepos`, `telepon`, `alasan_permohonan`, `jumlah_anggota_keluarga`) "
                . "VALUES ('$nik_pemohon', '".$koneksi->real_escape_string($nama_pemohon)."', '$no_kk_semula', '$alamat_pemohon', '$rt', '$rw', '$desa', '$kec', '$kab', '$prop', '$kodepos', '$telp', '$alasan', '$jumlah_anggota_keluarga')";
           $result = $koneksi->query($sql);
           if(!$result){
               throw new Exception("Gagal input database");
           }
           
           #input anggota keluarga
           $count = 1;
           while($count <= $jumlah_anggota_keluarga){
               $nik_anggota = $_POST['nik_anggota'.$count];
               $nama_anggota = $_POST['nama_anggota'.$count];
               $shdk = $_POST['shdk'.$count];
               $sql = "INSERT INTO `daftar_anggota_pemohon_kk` (`nik_anggota`, `nama_anggota`, `shdk`, `nik_pemohon`) VALUES ('$nik_anggota', '".$koneksi->real_escape_string($nama_anggota)."', '$shdk', '$nik_pemohon')";
               $result = $koneksi->query($sql);
               if(!$result){
                   throw new Exception("Gagal input Database");
               }
               $count++;
           }
         
     
           display_header("Formulir F-1.15");
           display_sidebar();
           display_content("Formulir", "?page1=formulir", "F-1.15");
           alert_sukses("Berhasil input database");
           display_footer();
           header("refresh:2;url=?page1=f115");
        } catch (Exception $e) {
            display_header("Formulir F-1.15");
            display_sidebar();
            display_content("Formulir", "?page1=formulir", "F-1.15");
            alert_gagal($e->getMessage());
            display_footer();
        }
                    
}   

    
    

    

