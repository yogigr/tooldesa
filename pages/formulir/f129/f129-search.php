<?php

$cari = @$_GET['search'];
if(isset($cari)){
	display_header("Pencarian Data F129");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.29");
	component_f129();
	table_cari_f129($cari);
	display_footer();
}else {
	display_header("Pencarian Data F129");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.29");
	component_f129();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}

?>