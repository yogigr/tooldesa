<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 
$step = @$_GET['step'];


switch($step){
	case 1: 
		display_header("Formulir F-1.29");
		display_sidebar();
		display_content("Formulir", "?page1=formulir", "F-1.29");
		form_input_f129_step1();
		display_footer();
		break;
	case 2:
		# ambil nilai dari form step 1 dan isi session
		$no_form = @$_POST['no_form']; $_SESSION['no_form'] = $no_form;
		$no_kk = @$_POST['no_kk']; $_SESSION['no_kk'] = $no_kk;
		$nama_kepala_keluarga = @$_POST['nama_kepala_keluarga']; $_SESSION['nama_kepala_keluarga'] = $nama_kepala_keluarga;
		$alamat = @$_POST['alamat']; $_SESSION['alamat'] = $alamat;
		$rt = @$_POST['rt']; $_SESSION['rt'] = $rt;
		$rw = @$_POST['rw']; $_SESSION['rw'] = $rw;
		$dusun = @$_POST['dusun']; $_SESSION['dusun'] = $dusun;
		$desa = @$_POST['desa']; $_SESSION['desa'] = $desa;
		$kecamatan = @$_POST['kecamatan']; $_SESSION['kecamatan'] = $kecamatan;
		$kabupaten = @$_POST['kabupaten']; $_SESSION['kabupaten'] = $kabupaten;
		$provinsi = @$_POST['provinsi']; $_SESSION['provinsi'] = $provinsi;
		$kodepos = @$_POST['kodepos']; $_SESSION['kodepos'] = $kodepos;
		$telepon = @$_POST['telepon']; $_SESSION['telepon'] = $telepon;
		$nik_pemohon = @$_POST['nik_pemohon']; $_SESSION['nik_pemohon'] = $nik_pemohon;
		$nama_pemohon = @$_POST['nama_pemohon']; $_SESSION['nama_pemohon'] = $nama_pemohon;
		display_header("Formulir F-1.29");
		display_sidebar();
		display_content("Formulir", "?page1=formulir", "F-1.29");
		form_input_f129_step2();
		display_footer();
		break;
	case 3:
		# ambil nilai dari form step 2 dan isi session
		$alasan_pindah = $_POST['alasan_pindah']; $_SESSION['alasan_pindah'] = $alasan_pindah;
		$alamat_tujuan = $_POST['alamat_tujuan']; $_SESSION['alamat_tujuan'] = $alamat_tujuan;
		$rt_tujuan = $_POST['rt_tujuan']; $_SESSION['rt_tujuan'] = $rt_tujuan;
		$rw_tujuan = $_POST['rw_tujuan']; $_SESSION['rw_tujuan'] = $rw_tujuan;
		$dusun_tujuan = $_POST['dusun_tujuan']; $_SESSION['dusun_tujuan'] = $dusun_tujuan;
		$desa_tujuan = $_POST['desa_tujuan']; $_SESSION['desa_tujuan'] = $desa_tujuan;
		$kecamatan_tujuan = $_POST['kecamatan_tujuan']; $_SESSION['kecamatan_tujuan'] = $kecamatan_tujuan;
		$kabupaten_tujuan = $_POST['kabupaten_tujuan']; $_SESSION['kabupaten_tujuan'] = $kabupaten_tujuan;
		$provinsi_tujuan = $_POST['provinsi_tujuan']; $_SESSION['provinsi_tujuan'] = $provinsi_tujuan;
		$kodepos_tujuan = $_POST['kodepos_tujuan']; $_SESSION['kodepos_tujuan'] = $kodepos_tujuan;
		$telepon_tujuan = $_POST['telepon_tujuan']; $_SESSION['telepon_tujuan'] = $telepon_tujuan;
		$jenis_kepindahan = $_POST['jenis_kepindahan']; $_SESSION['jenis_kepindahan'] = $jenis_kepindahan;
		$status_kk_yang_tidak_pindah = $_POST['status_kk_yang_tidak_pindah']; $_SESSION['status_kk_yang_tidak_pindah'] = $status_kk_yang_tidak_pindah;
		$status_kk_yang_pindah = $_POST['status_kk_yang_pindah']; $_SESSION['status_kk_yang_pindah'] = $status_kk_yang_pindah;
		$jumlah_anggota_keluarga_yang_pindah = $_POST['jumlah_anggota_keluarga_yang_pindah']; $_SESSION['jumlah_anggota_keluarga_yang_pindah'] = $jumlah_anggota_keluarga_yang_pindah;
		try{
			if(!is_numeric($jumlah_anggota_keluarga_yang_pindah)){
				throw new Exception("Jumlah anggota keluarga harus berupa angka");
			}
			display_header("Formulir F-1.29");
			display_sidebar();
			display_content("Formulir", "?page1=formulir", "F-1.29");
			form_input_f129_step3($jumlah_anggota_keluarga_yang_pindah);
			display_footer();
		}catch(Exception $e){
			display_header("Formulir F-1.29");
			display_sidebar();
			display_content("Formulir", "?page1=formulir", "F-1.29");
			alert_gagal($e->getMessage());
			form_input_f129_step2();
			display_footer();
		}
		break;
	case 4:
		try {
			foreach($_SESSION as $kunci => $nilai){
				if($kunci != "loggedin"){
					if(!isset($_SESSION[$kunci])){
						throw new Exception("#errorCode 001, Proses input gagal, silahkan ulangi dari step 1");
					}
				}
			}
			# deklarasi semua isi session
			$no_form = $_SESSION['no_form'];
			$no_kk = $_SESSION['no_kk'];
			$nama_kepala_keluarga = $_SESSION['nama_kepala_keluarga'];
			$alamat = $_SESSION['alamat'];
			$rt = $_SESSION['rt'];
			$rw = $_SESSION['rw'];
			$dusun = $_SESSION['dusun'];
			$desa = $_SESSION['desa'];
			$kecamatan = $_SESSION['kecamatan'];
			$kabupaten = $_SESSION['kabupaten'];
			$provinsi = $_SESSION['provinsi'];
			$kodepos = $_SESSION['kodepos'];
			$telepon = $_SESSION['telepon'];
			$nik_pemohon = $_SESSION['nik_pemohon'];
			$nama_pemohon = $_SESSION['nama_pemohon'];
			$tipe_pindah = "antar kecamatan";
			$alasan_pindah = $_SESSION['alasan_pindah'];
			$alamat_tujuan = $_SESSION['alamat_tujuan'];
			$rt_tujuan = $_SESSION['rt_tujuan'];
			$rw_tujuan = $_SESSION['rw_tujuan'];
			$dusun_tujuan = $_SESSION['dusun_tujuan'];
			$desa_tujuan = $_SESSION['desa_tujuan'];
			$kecamatan_tujuan = $_SESSION['kecamatan_tujuan'];
			$kabupaten_tujuan = $_SESSION['kabupaten_tujuan'];
			$provinsi_tujuan = $_SESSION['provinsi_tujuan'];
			$kodepos_tujuan = $_SESSION['kodepos_tujuan'];
			$telepon_tujuan = $_SESSION['telepon_tujuan'];
			$jenis_kepindahan = $_SESSION['jenis_kepindahan'];
			$status_kk_yang_tidak_pindah = $_SESSION['status_kk_yang_tidak_pindah'];
			$status_kk_yang_pindah = $_SESSION['status_kk_yang_pindah'];
			$jumlah_anggota_keluarga_yang_pindah = $_SESSION['jumlah_anggota_keluarga_yang_pindah'];
			# hapus session 
			foreach($_SESSION as $kunci => $nilai){
				if($kunci != "loggedin"){
					unset($_SESSION[$kunci]);
				}
			}
			$koneksi = db_connect();
			# input pemohon_pindah
			$sql = "INSERT INTO `pemohon_pindah` (`no_form`, `no_kk`, `nama_kepala_keluarga`, `alamat`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`,
			`kabupaten`, `provinsi`, `kodepos`, `telepon`, `nik_pemohon`, `nama_pemohon`, `tipe_pindah`, `alasan_pindah`, `alamat_tujuan`, `rt_tujuan`,
			`rw_tujuan`, `dusun_tujuan`, `desa_tujuan`, `kecamatan_tujuan`, `kabupaten_tujuan`, `provinsi_tujuan`, `kodepos_tujuan`, `telepon_tujuan`,
			`jenis_kepindahan`, `status_kk_yang_tidak_pindah`, `status_kk_yang_pindah`, `jumlah_anggota_keluarga_yang_pindah`, `waktu_input`)
			VALUES ('".$no_form."', '".$no_kk."', '".$koneksi->real_escape_string($nama_kepala_keluarga)."', '".$alamat."', '".$rt."', '".$rw."', '".$dusun."', '".$desa."',
			'".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$kodepos."', '".$telepon."', '".$nik_pemohon."', '".$koneksi->real_escape_string($nama_pemohon)."', '".$tipe_pindah."',
			'".$alasan_pindah."', '".$alamat_tujuan."', '".$rt_tujuan."', '".$rw_tujuan."', '".$dusun_tujuan."', '".$desa_tujuan."','".$kecamatan_tujuan."',
			'".$kabupaten_tujuan."', '".$provinsi_tujuan."', '".$kodepos_tujuan."', '".$telepon_tujuan."', '".$jenis_kepindahan."',
			'".$status_kk_yang_tidak_pindah."', '".$status_kk_yang_pindah."', '".$jumlah_anggota_keluarga_yang_pindah."', CURRENT_TIMESTAMP)";
			$result = $koneksi->query($sql);
			if(!$result){
				throw new Exception("gagal input 1, silahkan coba lagi. ");
			}
			#input penduduk pindahan
			for($i = 1; $i <= $jumlah_anggota_keluarga_yang_pindah; $i++){
				$nik_anggota = $_POST['nik_anggota'.$i];
				$nama_anggota = $_POST['nama_anggota'.$i];
				$batas_berlaku_ktp = $_POST['batas_berlaku_ktp'.$i];
				$shdk = $_POST['shdk'.$i];
				$sql2 = "INSERT INTO `penduduk_pindahan` (`nik`, `nama`, `batas_berlaku_ktp`, `shdk`, `no_form`)
				VALUES ('".$nik_anggota."', '".$nama_anggota."', '".ubahformattanggal($batas_berlaku_ktp)."', '".$shdk."', '".$no_form."')" ;
				$result2 = $koneksi->query($sql2);
				if(!$result2){
					# jika gagal, hapus query pemohon pindah dan penduduk pindahan bersangkutan
					$koneksi->query("delete from pemohon_pindah where no_form = '".$no_form."'");
					$koneksi->query("delete from penduduk_pindahan where no_form = '".$no_form."'");
					throw new Exception("Gagal input 2, silahkan coba lagi");
				}
			}
			
			# jika berhasil
			display_header("Formulir F-1.29");
			display_sidebar();
			display_content("Formulir", "?page1=formulir", "F-1.29");
			alert_sukses("Berhasil input database");
			display_footer();
			header("refresh:2;url=?page1=f129");
		}catch(Exception $e){
			# hapus session 
			foreach($_SESSION as $kunci => $nilai){
				if($kunci != "loggedin"){
					unset($_SESSION[$kunci]);
				}
			}
			# apabila gagal
			display_header("Formulir F-1.29");
            display_sidebar();
            display_content("Formulir", "?page1=formulir", "F-1.29");
            alert_gagal($e->getMessage());
            display_footer();
			header("refresh:3;url=?page1=f129");
		}
		break;
}


?>