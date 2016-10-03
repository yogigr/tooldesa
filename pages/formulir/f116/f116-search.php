<?php

$cari = @$_GET['search'];
if(isset($cari)){
	display_header("Pencarian Data F116");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.16");
	component_f116();
	table_cari_f116($cari);
	display_footer();
}else {
	display_header("Pencarian Data F116");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.16");
	component_f116();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}
?>

