<?php

$cari = @$_GET['search'];
if(isset($cari)){
	display_header("Pencarian Data F134");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.34");
	component_f134();
	table_cari_f134($cari);
	display_footer();
}else {
	display_header("Pencarian Data F134");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.34");
	component_f134();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}

?>