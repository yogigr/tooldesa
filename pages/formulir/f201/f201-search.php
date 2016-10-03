<?php  


$cari = @$_GET['search'];
if(isset($cari)){
	display_header("Pencarian Data F201");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-2.01");
	component_f201();
	table_cari_f201($cari);
	display_footer();
}else {
	display_header("Pencarian Data F201");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-2.01");
	component_f201();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}



?>