<?php 

$sort = @$_GET['sort'];
$kolom = @$_GET['kolom'];

if(isset($kolom)){
	display_header("Formulir F-1.16");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.16");
	component_f115();
	table_sorting_f116($kolom, $sort);
	display_footer();
}else{
	display_header("Formulir F-1.16");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.16");
	component_f115();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}

?>