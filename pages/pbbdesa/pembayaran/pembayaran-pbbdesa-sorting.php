<?php


$sort = @$_GET['sort'];
$kolom = @$_GET['kolom'];

if(isset($kolom)){
	display_header("PBB Desa");
	display_sidebar();
	display_content("PBB Desa");
	pbbdesa_bayar_header();
	pbbdesa_bayar_subheader();
	table_sorting_pbbdesa_bayar($kolom, $sort);
	display_footer();
}else{
	display_header("PBB Desa");
	display_sidebar();
	display_content("PBB Desa");
	pbbdesa_header_bayar();
	pbbdesa_subheader_bayar();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}
?>