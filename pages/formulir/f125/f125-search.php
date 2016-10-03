<?php

$cari = @$_GET['search'];
if(isset($cari)){
	display_header("Pencarian Data F125");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.25");
	component_f125();
	table_cari_f125($cari);
	display_footer();
}else {
	display_header("Pencarian Data F125");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.25");
	component_f125();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}

?>