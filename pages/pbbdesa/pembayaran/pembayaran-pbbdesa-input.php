<?php

$step = $_GET['step'];

switch ($step) {
	case 1 :
		display_header("Pembayaran PBB DESA");
		display_Sidebar();
		display_content("Pembayaran PBB DESA");
		pbbdesa_bayar_header();
		pbbdesa_bayar_subheader();
		form_input_bayar_pajak1();
		display_footer();
		break;
	case 2:
		$nop = $_GET['nop'];
		try {
			$koneksi = db_connect();
			$datanop = $koneksi->query("select * from pbbdesa where nop = '".$nop."'")->num_rows ;
			# apabila nop blm terdaftar di master
			if($datanop < 1){
                throw new Exception("Data berdasarkan nop = ".$nop." belum terdaftar di master, <br> Silahkan tambah data di halaman master.");
			}
			# dan apabila ada di master
			display_header("Pembayaran PBB DESA");
			display_Sidebar();
			display_content("Pembayaran PBB DESA");
			pbbdesa_bayar_header();
			pbbdesa_bayar_subheader();
			form_input_bayar_pajak2($nop);
			display_footer();
		} catch (Exception $e) {
			display_header("Pembayaran PBB DESA");
			display_Sidebar();
			display_content("Pembayaran PBB DESA");
			alert_gagal($e->getMessage());
			display_footer();
			header("refresh:3;url=?page1=pbbdesa");	
		}
		
		break;
	case 'proses':
		if (isset($_POST['submit'])) {
			$nop = $_POST['nop'];
			$nama = $_POST['nama'];
			$tagihan = $_POST['tagihan'];

			try {
				$koneksi = db_connect();
				# cek uniq nop
				$datanop = $koneksi->query("select * from pbbdesa_bayar where nop = '".$nop."'")->num_rows; 
				if ($datanop > 0) {
					throw new Exception("Error, NOP tersebut sudah melakukan pembayaran");
				}
				# jika nop unik
				$sql = "INSERT INTO `pbbdesa_bayar` (`nop`, `nama`, `tagihan`) VALUES ('".$nop."', '".$koneksi->real_escape_string($nama)."', '".$tagihan."')";
				$result = $koneksi->query($sql);
				if(!$result){
					throw new Exception("Error, Tidak dapat melakukan pembayaran");
				}
				$koneksi->close();
				# jika berhasil
				display_header("Pembayaran PBB Desa");
				display_sidebar();
				display_content("Pembayaran PBB DESA");
				alert_sukses("Pembayaran Berhasil");
				display_footer();
				header("refresh:1;url=?page1=pembayaran-pbbdesa");
			} catch (Exception $e) {
				# jika gagal
				$koneksi->close();
				display_header("Pembayaran PBB Desa");
				display_sidebar();
				display_content("Pembayaran PBB DESA");
				alert_gagal($e->getMessage());
				display_footer();
				header("refresh:3;url=?page1=pembayaran-pbbdesa");
			}
		}
		break;
}


?>