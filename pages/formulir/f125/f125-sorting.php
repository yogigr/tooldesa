<?php

$sort = @$_GET['sort'];
$kolom = @$_GET['kolom'];

if(isset($kolom)){
	display_header("Formulir F-1.25");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.25");
	component_f125();
	table_sorting_f125($kolom, $sort);
	display_footer();
}else{
	display_header("Formulir F-1.25");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.25");
	component_f125();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}

?>