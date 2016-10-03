<?php
require_once('library.php');
$cari = @$_GET['search'];
if(isset($cari)){
	display_header("Pencarian Data F115");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.15");
	component_f115();
	table_cari_f115($cari);
	display_footer();
}else {
	display_header("Pencarian Data F115");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.15");
	component_f115();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}
?>