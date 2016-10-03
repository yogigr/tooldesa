<?php  


$cari = @$_GET['search'];
if(isset($cari)){
	display_header("Pencarian Data f229");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "f-2.29");
	component_f229();
	table_cari_f229($cari);
	display_footer();
}else {
	display_header("Pencarian Data f229");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "f-2.29");
	component_f229();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}



?>