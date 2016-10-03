<?php

$sort = @$_GET['sort'];
$kolom = @$_GET['kolom'];

if(isset($kolom)){
	display_header("Formulir F-1.34");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.34");
	component_f134();
	table_sorting_f134($kolom, $sort);
	display_footer();
}else{
	display_header("Formulir F-1.34");
	display_sidebar();
	display_content("Formulir", "?page1=formulir", "F-1.34");
	component_f134();
	echo "<p>Apa sih yang kamu cari ? </p>";
	display_footer();
}

?>