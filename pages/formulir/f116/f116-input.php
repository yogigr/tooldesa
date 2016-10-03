<?php

$step = @$_GET['step'];

switch($step){
	case 1 : 
		display_header("Formulir F-1.16");
		display_sidebar();
		display_content("Formulir", "?page1=formulir", "F-1.16");
		form_input_f116_step1();
		display_footer();
		break;
	case 2 :
		# ambil nilai dari form step 2
		$jumlah_anggota_keluarga = $_POST['jumlah_anggota_keluarga'];
		try {
			if(!is_numeric($jumlah_anggota_keluarga)){
				throw new Exception ("Jumlah anggota keluarga harus berupa angka");
			}
			display_header("Formulir F-1.16");
            display_sidebar();
            display_content("Formulir", "?page1=formulir", "F-1.16");
            form_input_f116_step2($jumlah_anggota_keluarga);
            display_footer();
		} catch (Exception $e) {
			display_header("Formulir F-1.16");
            display_sidebar();
            display_content("Formulir", "?page1=formulir", "F-1.16");
            alert_gagal($e->getMessage());
            form_input_f116_step1();
            display_footer();
		}
		break;
	case 3 :
		# ambil nilai dari step 2
		$nik_pemohon = $_POST['nik_pemohon'];
		$nama_pemohon = $_POST['nama_pemohon'];
		$nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
		$no_kk = $_POST['no_kk'];
		$alamat = $_POST['alamat'];
		$rt = $_POST['rt'];
		$rw = $_POST['rw'];
		$desa = $_POST['desa'];
		$kecamatan = $_POST['kecamatan'];
		$kabupaten = $_POST['kabupaten'];
		$provinsi = $_POST['provinsi'];
		$kodepos = $_POST['kodepos'];
		$telepon = $_POST['telepon'];
		$nama_kepala_keluarga_lama = $_POST['nama_kepala_keluarga_lama'];
		$no_kk_lama = $_POST['no_kk_lama'];
		$alamat_lama = $_POST['alamat_lama'];
		$rt_lama = $_POST['rt_lama'];
		$rw_lama = $_POST['rw_lama'];
		$desa_lama = $_POST['desa_lama'];
		$kecamatan_lama = $_POST['kecamatan_lama'];
		$kabupaten_lama = $_POST['kabupaten_lama'];
		$provinsi_lama = $_POST['provinsi_lama'];
		$kodepos_lama = $_POST['kodepos_lama'];
		$telepon_lama = $_POST['telepon_lama'];
		$alasan_permohonan = $_POST['alasan_permohonan'];
		$jumlah_anggota_keluarga = $_POST['jumlah_anggota_keluarga'];
		
		try {
			if($alasan_permohonan == ""){
				Throw new Exception("Maaf, Alasan permohonan belum anda pilih.");
			}
			$koneksi = db_connect();
			$sql = "INSERT INTO `perubahan_kk` (`nik_pemohon`, `nama_pemohon`, `nama_kepala_keluarga`, `no_kk`, `alamat`, `rt`, `rw`, `desa`, 
			`kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `telepon`, `nama_kepala_keluarga_lama`, `no_kk_lama`, `alamat_lama`, `rt_lama`,
			`rw_lama`, `desa_lama`, `kecamatan_lama`, `kabupaten_lama`, `provinsi_lama`, `kodepos_lama`, `telepon_lama`, `alasan_permohonan`,
			`jumlah_anggota_keluarga`, `tanggal_input`) VALUES ('".$nik_pemohon."', '".$koneksi->real_escape_string($nama_pemohon)."',
			'".$koneksi->real_escape_string($nama_kepala_keluarga)."', '$no_kk', '$alamat','$rt', '$rw', '$desa', '$kecamatan',
			'$kabupaten', '$provinsi', '$kodepos', '$telepon', '".$koneksi->real_escape_string($nama_kepala_keluarga_lama)."', '$no_kk_lama',
			'$alamat_lama', '$rt_lama', '$rw_lama', '$desa_lama', '$kecamatan_lama', '$kabupaten_lama', '$provinsi_lama', '$kodepos_lama',
			'$telepon_lama', '$alasan_permohonan', '$jumlah_anggota_keluarga', CURRENT_TIMESTAMP)";
			$result = $koneksi->query($sql);
			if(!$result){
				throw new Exception("Gagal input Database");
			}
			# input anggota keluarga
			for($i = 1; $i <= $jumlah_anggota_keluarga; $i++){
				$nik_anggota = $_POST['nik_anggota'.$i];
				$nama_anggota = $_POST['nama_anggota'.$i];
				$shdk = $_POST['shdk'.$i];
				$sql2 = "INSERT INTO `daftar_anggota_pemohon_kk_2` (`nik_anggota`, `nama_anggota`, `shdk`, `nik_pemohon`) VALUES ('$nik_anggota',
				'".$koneksi->real_escape_string($nama_anggota)."', '$shdk', '$nik_pemohon')" ;
				$result2 = $koneksi->query($sql2);
				if(!$result){
					throw new Exception("Gagal input database 2");
				}
			}
			
			# jika berhasil semua
			display_header("Formulir F-1.16");
			display_sidebar();
			display_content("Formulir", "?page1=formulir", "F-1.16");
			alert_sukses("Berhasil input database");
			display_footer();
			header("refresh:2;url=?page1=f116");
		} catch(Exception $e) {
			# apabila gagal
			display_header("Formulir F-1.16");
            display_sidebar();
            display_content("Formulir", "?page1=formulir", "F-1.16");
            alert_gagal($e->getMessage());
            display_footer();
			header("refresh:3;url=?page1=f116");
		}
		break;
}

?>