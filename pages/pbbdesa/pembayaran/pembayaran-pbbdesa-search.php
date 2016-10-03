<?php

$cari = $_GET['search'];
if(isset($cari)){
	display_header("Pembayaran PBB DESA");
	display_sidebar();
	display_content("Pembayaran PBB DESA");
	pbbdesa_bayar_header();
	pbbdesa_bayar_subheader();
	table_cari_pbbdesa_bayar($cari);
	display_footer();
}else {
	display_header("Pembayaran PBB DESA");
	display_sidebar();
	display_content("Pembayaran PBB DESA");
	pbbdesa_bayar_header();
	pbbdesa_bayar_subheader();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}



?>