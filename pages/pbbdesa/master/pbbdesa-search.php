<?php

$cari = $_GET['search'];
if(isset($cari)){
	display_header("Pencarian Data PBB Desa");
	display_sidebar();
	display_content("PBB Desa", "index.php?page1=pbbdesa", "Pencarian");
	pbbdesa_header();
	pbbdesa_subheader();
	table_cari_pbbdesa($cari);
	display_footer();
}else {
	display_header("Pencarian Data PBB Desa");
	display_sidebar();
	display_content("PBB Desa", "index.php?page1=pbbdesa", "Pencarian");
	pbbdesa_header();
	pbbdesa_subheader();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}



?>