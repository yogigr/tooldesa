<?php

$step = @$_GET['step'];

switch ($step) {
	case 'bayi':
			# hapus data bayi bila id bayi tidak terdaftar di table yg lain (yg bersangkutan)
			$koneksi = db_connect();
			# cari id bayi terakhir dari table bayi
			$id_bayi = $koneksi->query("select id_bayi from bayi order by id_bayi desc limit 1")->fetch_array();
			# cek apakah id bayi tersebur terdaftar pada table lainnya
			$id_bayi = $id_bayi['id_bayi'];
			$result = $koneksi->query("select id_bayi from saksi2 where id_bayi = '$id_bayi'");
			if ($result->num_rows == 0) {
				$koneksi->query("delete from bayi where id_bayi = '$id_bayi'"); # hapus data di tabel bayi
				$koneksi->query("delete from ibu where id_bayi = '$id_bayi'"); # hapus data dari table ibu
				$koneksi->query("delete from ayah where id_bayi = '$id_bayi'"); # hapus data dari table ayah
				$koneksi->query("delete from pelapor where id_bayi = '$id_bayi'"); # hapus data dari table pelapor
				$koneksi->query("delete from saksi1 where id_bayi = '$id_bayi'"); # hapus data dari table saksi 1
			}

			display_header("Formulir F-2.01");
			display_sidebar();
			display_content("Formulir", "?page1=formulir", "F-2.01");
			form_input_f201_bayi();
			display_footer();
			$koneksi->close();
			break;
	case 'ibu':
			if (isset($_POST['submit'])) {
				# ambil nilai dari form bayi
				$nama_bayi = $_POST['nama_bayi'];
				$jenis_kelamin = $_POST['jenis_kelamin'];
				$tempat_dilahirkan = $_POST['tempat_dilahirkan'];
				$tempat_kelahiran = $_POST['tempat_kelahiran'];
				$hari_lahir = $_POST['hari_lahir'];
				$tanggal_lahir = $_POST['tanggal_lahir'];
				$waktu_lahir = $_POST['waktu_lahir'];
				$jenis_kelahiran = $_POST['jenis_kelahiran'];
				$kelahiran_ke = $_POST['kelahiran_ke'];
				$penolong_kelahiran = $_POST['penolong_kelahiran'];
				$berat_bayi = $_POST['berat_bayi'];
				$panjang_bayi = $_POST['panjang_bayi'];

				try {
					$koneksi = db_connect();
					$sql = "INSERT INTO `bayi` (`nama_bayi`, `jenis_kelamin`, `tempat_dilahirkan`, `tempat_kelahiran`, `hari_lahir`, `tanggal_lahir`, `waktu_lahir`, `jenis_kelahiran`, `kelahiran_ke`, `penolong_kelahiran`, `berat_bayi`, `panjang_bayi`) VALUES ('".$koneksi->real_escape_string($nama_bayi)."', '".$jenis_kelamin."', '".$tempat_dilahirkan."', '".$tempat_kelahiran."', '".$hari_lahir."', '".ubahformattanggal($tanggal_lahir)."', '".$waktu_lahir."', '".$jenis_kelahiran."', '".$kelahiran_ke."', '".$penolong_kelahiran."', '".$berat_bayi."', '".$panjang_bayi."')";
					$result = $koneksi->query($sql);
					if (!$result) {
						throw new Exception("Error 1, Silahkan Ulangi dari awal!");
					}
					# jika berhasil
					display_header("Formulir F-2.01");
					display_sidebar();
					display_content("Formulir", "?page1=formulir", "F-2.01");
					form_input_f201_ibu();
					display_footer();
					break;
				} catch (Exception $e) {
					# jika gagal
					display_header("Formulir F-2.01");
					display_sidebar();
					display_content("Formulir", "?page1=formulir", "F-2.01");
					alert_gagal($e->getMessage());
					form_input_f201_bayi();
					display_footer();
					break;
				}
			}
			
			break;

	case 'ayah':
		if (isset($_POST['submit'])) {
			# ambil nilai dari form ibu
			$nik = $_POST['nik_ibu'];
			$nama = $_POST['nama_ibu'];
			$umur = $_POST['umur'];
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$bulan_lahir = $_POST['bulan_lahir'];
			$tahun_lahir = $_POST['tahun_lahir'];
			$pekerjaan = $_POST['pekerjaan'];
			$alamat = $_POST['alamat'];
			$desa = $_POST['desa'];
			$kecamatan = $_POST['kecamatan'];
			$kabupaten = $_POST['kabupaten'];
			$provinsi = $_POST['provinsi'];
			$kewarganegaraan = $_POST['kewarganegaraan'];
			$kebangsaan = $_POST['kebangsaan'];
			$tanggal_kawin = $_POST['tanggal_kawin'];
		
			# id bayi
			$koneksi = db_connect();
			$id_bayi_sql = "select id_bayi from bayi order by id_bayi desc limit 1";
			$id_bayi = $koneksi->query($id_bayi_sql)->fetch_array();
			$id_bayi = $id_bayi['id_bayi']; 

			try {
				$sql = "INSERT INTO `ibu` (`nik_ibu`, `nama_ibu`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kewarganegaraan`, `kebangsaan`, `tgl_pencatatan_kawin`, `id_bayi`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$tanggal_lahir."', '".$bulan_lahir."', '".$tahun_lahir."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$kewarganegaraan."', '".$kebangsaan."', '".ubahformattanggal($tanggal_kawin)."', '".$id_bayi."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan bayi
					$koneksi->query("delete from bayi where id_bayi='$id_bayi'");
					throw new Exception("Error 2, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				form_input_f201_ayah();
				display_footer();
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				alert_gagal($e->getMessage());
				form_input_f201_ibu();
				display_footer();
				break;
			}
		}
		break;
	case 'pelapor':
		if (isset($_POST['submit'])) {
			# ambil nilai dari form ayah
			$no_kk = $_POST['no_kk'];
			$nik = $_POST['nik_ayah'];
			$nama = $_POST['nama_ayah'];
			$umur = $_POST['umur'];
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$bulan_lahir = $_POST['bulan_lahir'];
			$tahun_lahir = $_POST['tahun_lahir'];
			$pekerjaan = $_POST['pekerjaan'];
			$alamat = $_POST['alamat'];
			$desa = $_POST['desa'];
			$kecamatan = $_POST['kecamatan'];
			$kabupaten = $_POST['kabupaten'];
			$provinsi = $_POST['provinsi'];
			$kewarganegaraan = $_POST['kewarganegaraan'];
			$kebangsaan = $_POST['kebangsaan'];

			# id bayi
			$koneksi = db_connect();
			$id_bayi_sql = "select id_bayi from bayi order by id_bayi desc limit 1";
			$id_bayi = $koneksi->query($id_bayi_sql)->fetch_array();
			$id_bayi = $id_bayi['id_bayi']; 

			try {
				$sql = "INSERT INTO `ayah` (`nik`, `no_kk`, `nama_ayah`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kewarganegaraan`, `kebangsaan`, `id_bayi`) VALUES ('".$nik."', '".$no_kk."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$tanggal_lahir."', '".$bulan_lahir."', '".$tahun_lahir."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$kewarganegaraan."', '".$kebangsaan."', '".$id_bayi."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan bayi dan ibu
					$koneksi->query("delete from bayi where id_bayi='$id_bayi'");
					$koneksi->query("delete from ibu where id_bayi='$id_bayi'");
					throw new Exception("Error 3, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				form_input_f201_pelapor();
				display_footer();
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				alert_gagal($e->getMessage());
				form_input_f201_ayah();
				display_footer();
				break;
			}
		}
		break;
	case 'saksi1':
		if (isset($_POST['submit'])) {
			# ambil nilai dari form pelapor
			$nik = $_POST['nik'];
			$nama = $_POST['nama'];
			$umur = $_POST['umur'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$pekerjaan = $_POST['pekerjaan'];
			$alamat = $_POST['alamat'];
			$desa = $_POST['desa'];
			$kecamatan = $_POST['kecamatan'];
			$kabupaten = $_POST['kabupaten'];
			$provinsi = $_POST['provinsi'];

			# id bayi
			$koneksi = db_connect();
			$id_bayi_sql = "select id_bayi from bayi order by id_bayi desc limit 1";
			$id_bayi = $koneksi->query($id_bayi_sql)->fetch_array();
			$id_bayi = $id_bayi['id_bayi']; 

			try {
				$sql = "INSERT INTO `pelapor` (`nik`, `nama`, `umur`, `jenis_kelamin`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_bayi`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$jenis_kelamin."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$id_bayi."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan bayi, ibu, dan ayah
					$koneksi->query("delete from bayi where id_bayi='$id_bayi'");
					$koneksi->query("delete from ibu where id_bayi='$id_bayi'");
					$koneksi->query("delete from ayah where id_bayi='$id_bayi'");
					throw new Exception("Error 4, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				form_input_f201_saksi1();
				display_footer();
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				alert_gagal($e->getMessage());
				form_input_f201_pelapor();
				display_footer();
				break;
			}
		}
		break;
	case 'saksi2':
		if (isset($_POST['submit'])) {
			# ambil nilai dari form saksi 1
			$nik = $_POST['nik'];
			$nama = $_POST['nama'];
			$umur = $_POST['umur'];
			$pekerjaan = $_POST['pekerjaan'];
			$alamat = $_POST['alamat'];
			$desa = $_POST['desa'];
			$kecamatan = $_POST['kecamatan'];
			$kabupaten = $_POST['kabupaten'];
			$provinsi = $_POST['provinsi'];

			# id bayi
			$koneksi = db_connect();
			$id_bayi_sql = "select id_bayi from bayi order by id_bayi desc limit 1";
			$id_bayi = $koneksi->query($id_bayi_sql)->fetch_array();
			$id_bayi = $id_bayi['id_bayi']; 

			try {
				$sql = "INSERT INTO `saksi1` (`nik`, `nama`, `umur`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_bayi`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$id_bayi."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan bayi, ibu, ayah, dan pelapor
					$koneksi->query("delete from bayi where id_bayi='$id_bayi'");
					$koneksi->query("delete from ibu where id_bayi='$id_bayi'");
					$koneksi->query("delete from ayah where id_bayi='$id_bayi'");
					$koneksi->query("delete from pelapor where id_bayi='$id_bayi'");
					throw new Exception("Error 5, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				form_input_f201_saksi2();
				display_footer();
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				alert_gagal($e->getMessage());
				form_input_f201_saksi1();
				display_footer();
				break;
			}
		}
		break;
	case 'proses':
		if (isset($_POST['submit'])) {
			# ambil nilai dari form saksi 1
			$nik = $_POST['nik'];
			$nama = $_POST['nama'];
			$umur = $_POST['umur'];
			$pekerjaan = $_POST['pekerjaan'];
			$alamat = $_POST['alamat'];
			$desa = $_POST['desa'];
			$kecamatan = $_POST['kecamatan'];
			$kabupaten = $_POST['kabupaten'];
			$provinsi = $_POST['provinsi'];

			# id bayi
			$koneksi = db_connect();
			$id_bayi_sql = "select id_bayi from bayi order by id_bayi desc limit 1";
			$id_bayi = $koneksi->query($id_bayi_sql)->fetch_array();
			$id_bayi = $id_bayi['id_bayi']; 

			try {
				$sql = "INSERT INTO `saksi2` (`nik`, `nama`, `umur`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_bayi`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$id_bayi."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan bayi, ibu, ayah, pelapor dan saksi 1
					$koneksi->query("delete from bayi where id_bayi='$id_bayi'");
					$koneksi->query("delete from ibu where id_bayi='$id_bayi'");
					$koneksi->query("delete from ayah where id_bayi='$id_bayi'");
					$koneksi->query("delete from pelapor where id_bayi='$id_bayi'");
					$koneksi->query("delete from saksi1 where id_bayi='$id_bayi'");
					throw new Exception("Error 6, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				alert_sukses("Input Data Kelahiran Bayi Sukses Penuh");
				display_footer();
				header("refresh:2;url=?page1=f201");
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir F-2.01");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "F-2.01");
				alert_gagal($e->getMessage());
				form_input_f201_saksi2();
				display_footer();
				break;
			}
		}
		break;
}

?>