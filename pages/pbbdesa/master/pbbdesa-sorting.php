<?php

require_once('library.php');
$sort = @$_GET['sort'];
$kolom = @$_GET['kolom'];

if(isset($kolom)){
	display_header("PBB Desa");
	display_sidebar();
	display_content("PBB Desa");
	pbbdesa_header();
	pbbdesa_subheader();
	table_sorting_pbbdesa($kolom, $sort);
	display_footer();
}else{
	display_header("PBB Desa");
	display_sidebar();
	display_content("PBB Desa");
	pbbdesa_header();
	pbbdesa_subheader();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}
?>


