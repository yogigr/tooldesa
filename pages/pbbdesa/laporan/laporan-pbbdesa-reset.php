<?php  


try {
	$koneksi = db_connect();
	$sql = "delete from pbbdesa_bayar";
	$result = $koneksi->query($sql);
	if (!$result) {
		throw new Exception("Gagal reset laporan Pembayaran");
	}
	# jika berhasil
	display_header("Laporan PBB DESA");
	display_Sidebar();
	display_content("Laporan PBB DESA");
	alert_sukses("Berhasil Reset Laporan Pembayaran");
	display_footer();
	header("refresh:1;url=?page1=laporan-pbbdesa");
} catch (Exception $e) {
	# jika gagal
	display_header("Laporan PBB DESA");
	display_Sidebar();
	display_content("Laporan PBB DESA");
	alert_gagal($e->getMessage());
	display_footer();
}


?>