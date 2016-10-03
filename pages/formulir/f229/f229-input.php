<?php

$step = @$_GET['step'];

switch ($step) {
	case 'jenazah':
			# hapus data jenazah bila id jenazah tidak terdaftar di table yg lain (yg bersangkutan)
			$koneksi = db_connect();
			# cari id jenazah terakhir dari table jenazah
			$id_jenazah = $koneksi->query("select id_jenazah from jenazah order by id_jenazah desc limit 1")->fetch_array();
			# cek apakah id jenazah tersebur terdaftar pada table lainnya
			$id_jenazah = $id_jenazah['id_jenazah'];
			$result = $koneksi->query("select id_jenazah from saksi2 where id_jenazah = '$id_jenazah'");
			if ($result->num_rows == 0) {
				$koneksi->query("delete from jenazah where id_jenazah = '$id_jenazah'"); # hapus data di tabel jenazah
				$koneksi->query("delete from ibu where id_jenazah = '$id_jenazah'"); # hapus data dari table ibu
				$koneksi->query("delete from ayah where id_jenazah = '$id_jenazah'"); # hapus data dari table ayah
				$koneksi->query("delete from pelapor where id_jenazah = '$id_jenazah'"); # hapus data dari table pelapor
				$koneksi->query("delete from saksi1 where id_jenazah = '$id_jenazah'"); # hapus data dari table saksi 1
			}

			display_header("Formulir F-2.29");
			display_sidebar();
			display_content("Formulir", "?page1=formulir", "F-2.29");
			form_input_f229_jenazah();
			display_footer();
			$koneksi->close();
			break;
	case 'ibu':
			if (isset($_POST['submit'])) {
				# ambil nilai dari form jenazah
				$nik_jenazah = $_POST['nik_jenazah'];
				$nama_jenazah = $_POST['nama_jenazah'];
				$no_kk = $_POST['no_kk'];
				$nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
				$jenis_kelamin = $_POST['jenis_kelamin'];
				$umur = $_POST['umur'];
				$tanggal_lahir = $_POST['tanggal_lahir'];
				$bulan_lahir = $_POST['bulan_lahir'];
				$tahun_lahir = $_POST['tahun_lahir'];
				$tempat_kelahiran = $_POST['tempat_kelahiran'];
				$kode_prov = $_POST['kode_prov'];
				$kode_kab = $_POST['kode_kab'];
				$agama = $_POST['agama'];
				$pekerjaan = $_POST['pekerjaan'];
				$alamat = $_POST['alamat'];
				$desa = $_POST['desa'];
				$kecamatan = $_POST['kecamatan'];
				$kabupaten = $_POST['kabupaten'];
				$provinsi = $_POST['provinsi'];
				$anak_ke = $_POST['anak_ke'];
				$tanggal_kematian = ubahformattanggal($_POST['tanggal_kematian']);
				$pukul_kematian = $_POST['pukul_kematian'];
				$sebab_kematian = $_POST['sebab_kematian'];
				$tempat_kematian = $_POST['tempat_kematian'];
				$yang_menerangkan = $_POST['yang_menerangkan'];

				try {
					$koneksi = db_connect();
					$sql = "INSERT INTO `jenazah` (`id_jenazah`, `nik_jenazah`, `nama_jenazah`, `no_kk`, `nama_kepala_keluarga`, `jenis_kelamin`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `umur`, `tempat_lahir`, `kode_prov`, `kode_kab`, `agama`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `anak_ke`, `tanggal_kematian`, `pukul_kematian`, `sebab_kematian`, `tempat_kematian`, `yang_menerangkan`) VALUES (NULL, '".$nik_jenazah."', '".$koneksi->real_escape_string($nama_jenazah)."', '".$no_kk."', '".$koneksi->real_escape_string($nama_kepala_keluarga)."', '".$jenis_kelamin."', '".$tanggal_lahir."', '".$bulan_lahir."', '".$tahun_lahir."', '".$umur."', '".$tempat_kelahiran."', '".$kode_prov."', '".$kode_kab."', '".$agama."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$anak_ke."', '".$tanggal_kematian."', '".$pukul_kematian."', '".$sebab_kematian."', '".$tempat_kematian."', '".$yang_menerangkan."')" ;
					$result = $koneksi->query($sql);
					if (!$result) {
						throw new Exception("Error 1, Silahkan Ulangi dari awal!");
					}
					# jika berhasil
					display_header("Formulir f-2.29");
					display_sidebar();
					display_content("Formulir", "?page1=formulir", "f-2.29");
					form_input_f229_ibu();
					display_footer();
					break;
				} catch (Exception $e) {
					# jika gagal
					display_header("Formulir f-2.29");
					display_sidebar();
					display_content("Formulir", "?page1=formulir", "f-2.29");
					alert_gagal($e->getMessage());
					form_input_f229_jenazah();
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
		
			# id jenazah
			$koneksi = db_connect();
			$id_jenazah_sql = "select id_jenazah from jenazah order by id_jenazah desc limit 1";
			$id_jenazah = $koneksi->query($id_jenazah_sql)->fetch_array();
			$id_jenazah = $id_jenazah['id_jenazah']; 

			try {
				$sql = "INSERT INTO `ibu` (`nik_ibu`, `nama_ibu`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_jenazah`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$tanggal_lahir."', '".$bulan_lahir."', '".$tahun_lahir."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$id_jenazah."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan jenazah
					$koneksi->query("delete from jenazah where id_jenazah='$id_jenazah'");
					throw new Exception("Error 2, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				form_input_f229_ayah();
				display_footer();
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				alert_gagal($e->getMessage());
				form_input_f229_ibu();
				display_footer();
				break;
			}
		}
		break;
	case 'pelapor':
		if (isset($_POST['submit'])) {
			# ambil nilai dari form ayah
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

			# id jenazah
			$koneksi = db_connect();
			$id_jenazah_sql = "select id_jenazah from jenazah order by id_jenazah desc limit 1";
			$id_jenazah = $koneksi->query($id_jenazah_sql)->fetch_array();
			$id_jenazah = $id_jenazah['id_jenazah']; 

			try {
				$sql = "INSERT INTO `ayah` (`nik`, `nama_ayah`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_jenazah`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$tanggal_lahir."', '".$bulan_lahir."', '".$tahun_lahir."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$id_jenazah."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan jenazah dan ibu
					$koneksi->query("delete from jenazah where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from ibu where id_jenazah='$id_jenazah'");
					throw new Exception("Error 3, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				form_input_f229_pelapor();
				display_footer();
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				alert_gagal($e->getMessage());
				form_input_f229_ayah();
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
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$bulan_lahir = $_POST['bulan_lahir'];
			$tahun_lahir = $_POST['tahun_lahir'];
			$pekerjaan = $_POST['pekerjaan'];
			$alamat = $_POST['alamat'];
			$desa = $_POST['desa'];
			$kecamatan = $_POST['kecamatan'];
			$kabupaten = $_POST['kabupaten'];
			$provinsi = $_POST['provinsi'];

			# id jenazah
			$koneksi = db_connect();
			$id_jenazah_sql = "select id_jenazah from jenazah order by id_jenazah desc limit 1";
			$id_jenazah = $koneksi->query($id_jenazah_sql)->fetch_array();
			$id_jenazah = $id_jenazah['id_jenazah']; 

			try {
				$sql = "INSERT INTO `pelapor` (`nik`, `nama`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_jenazah`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$tanggal_lahir."', '".$bulan_lahir."', '".$tahun_lahir."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$id_jenazah."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan jenazah, ibu, dan ayah
					$koneksi->query("delete from jenazah where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from ibu where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from ayah where id_jenazah='$id_jenazah'");
					throw new Exception("Error 4, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				form_input_f229_saksi1();
				display_footer();
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				alert_gagal($e->getMessage());
				form_input_f229_pelapor();
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
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$bulan_lahir = $_POST['bulan_lahir'];
			$tahun_lahir = $_POST['tahun_lahir'];
			$pekerjaan = $_POST['pekerjaan'];
			$alamat = $_POST['alamat'];
			$desa = $_POST['desa'];
			$kecamatan = $_POST['kecamatan'];
			$kabupaten = $_POST['kabupaten'];
			$provinsi = $_POST['provinsi'];

			# id jenazah
			$koneksi = db_connect();
			$id_jenazah_sql = "select id_jenazah from jenazah order by id_jenazah desc limit 1";
			$id_jenazah = $koneksi->query($id_jenazah_sql)->fetch_array();
			$id_jenazah = $id_jenazah['id_jenazah']; 
			try {
				$sql = "INSERT INTO `saksi1` (`nik`, `nama`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_jenazah`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$tanggal_lahir."', '".$bulan_lahir."', '".$tahun_lahir."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$id_jenazah."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan jenazah, ibu, ayah, dan pelapor
					$koneksi->query("delete from jenazah where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from ibu where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from ayah where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from pelapor where id_jenazah='$id_jenazah'");
					throw new Exception("Error 5, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				form_input_f229_saksi2();
				display_footer();
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				alert_gagal($e->getMessage());
				form_input_f229_saksi1();
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
			$tanggal_lahir = $_POST['tanggal_lahir'];
			$bulan_lahir = $_POST['bulan_lahir'];
			$tahun_lahir = $_POST['tahun_lahir'];
			$pekerjaan = $_POST['pekerjaan'];
			$alamat = $_POST['alamat'];
			$desa = $_POST['desa'];
			$kecamatan = $_POST['kecamatan'];
			$kabupaten = $_POST['kabupaten'];
			$provinsi = $_POST['provinsi'];

			# id jenazah
			$koneksi = db_connect();
			$id_jenazah_sql = "select id_jenazah from jenazah order by id_jenazah desc limit 1";
			$id_jenazah = $koneksi->query($id_jenazah_sql)->fetch_array();
			$id_jenazah = $id_jenazah['id_jenazah']; 

			try {
				$sql = "INSERT INTO `saksi2` (`nik`, `nama`, `umur`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `pekerjaan`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `id_jenazah`) VALUES ('".$nik."', '".$koneksi->real_escape_string($nama)."', '".$umur."', '".$tanggal_lahir."', '".$bulan_lahir."', '".$tahun_lahir."', '".$pekerjaan."', '".$alamat."', '".$desa."', '".$kecamatan."', '".$kabupaten."', '".$provinsi."', '".$id_jenazah."')" ;
				$result = $koneksi->query($sql);
				if (!$result) {
					# jika gagal hapus inputan jenazah, ibu, ayah, pelapor dan saksi 1
					$koneksi->query("delete from jenazah where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from ibu where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from ayah where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from pelapor where id_jenazah='$id_jenazah'");
					$koneksi->query("delete from saksi1 where id_jenazah='$id_jenazah'");
					throw new Exception("Error 6, silahkan ulangi dari awal");
				}
				# jika berhasil
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				alert_sukses("Input Data Kelahiran jenazah Sukses Penuh");
				display_footer();
				header("refresh:2;url=?page1=f229");
				break;
			} catch (Exception $e) {
				# jika gagal
				display_header("Formulir f-2.29");
				display_sidebar();
				display_content("Formulir", "?page1=formulir", "f-2.29");
				alert_gagal($e->getMessage());
				form_input_f229_saksi2();
				display_footer();
				break;
			}
		}
		break;
}

?>