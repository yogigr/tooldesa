<?php
if(!isset($_GET['page1'])){
	display_header("Dashboard");
	display_sidebar();
	display_content("Dashboard");
	beranda();
	display_footer();
} else {
	switch($_GET['page1']){
		# pbbdesa

			# master
		case "pbbdesa" : include "pages/pbbdesa/master/pbbdesa-master.php"; break;
		case "pbbdesa-input": include "pages/pbbdesa/master/pbbdesa-input.php"; break;
		case "pbbdesa-search": include "pages/pbbdesa/master/pbbdesa-search.php"; break; 
		case "pbbdesa-sorting" : include "pages/pbbdesa/master/pbbdesa-sorting.php"; break;
		case "pbbdesa-edit" : include "pages/pbbdesa/master/pbbdesa-edit.php"; break;
		case "pbbdesa-delete" : include "pages/pbbdesa/master/pbbdesa-delete.php"; break;
			# pembayaran
		case "pembayaran-pbbdesa" : include "pages/pbbdesa/pembayaran/pembayaran-pbbdesa.php"; break;
		case "pembayaran-pbbdesa-input" : include "pages/pbbdesa/pembayaran/pembayaran-pbbdesa-input.php"; break;
		case "pembayaran-pbbdesa-search" : include "pages/pbbdesa/pembayaran/pembayaran-pbbdesa-search.php"; break;
		case "pembayaran-pbbdesa-sorting" : include "pages/pbbdesa/pembayaran/pembayaran-pbbdesa-sorting.php"; break;
		case "pembayaran-pbbdesa-delete" : include "pages/pbbdesa/pembayaran/pembayaran-pbbdesa-delete.php"; break; 
			# laporan
		case "laporan-pbbdesa" : include "pages/pbbdesa/laporan/laporan-pbbdesa.php"; break;
		case "laporan-pbbdesa-cetak" : include "pages/pbbdesa/laporan/laporan-pbbdesa-cetak.php"; break;
		case "laporan-pbbdesa-reset" : include "pages/pbbdesa/laporan/laporan-pbbdesa-reset.php"; break;

		# formulir
		case "formulir" : include "pages/formulir/formulir.php"; break;
		
		# formulir f115
		case "f115" : include "pages/formulir/f115/f115.php"; break;
		case "f115-input" : include "pages/formulir/f115/f115-input.php"; break;
		case "f115-reset" : include "pages/formulir/f115/f115-reset.php" ; break; 
		case "f115-search" : include "pages/formulir/f115/f115-search.php"; break; 
		case "f115-sorting" : include "pages/formulir/f115/f115-sorting.php"; break;
		case "f115-delete" : include "pages/formulir/f115/f115-delete.php"; break;
		case "f115-pdf" : include "pages/formulir/f115/f115-pdf.php"; break;
		
		# formulir f116
		case "f116" : include "pages/formulir/f116/f116.php"; break;
		case "f116-input" : include "pages/formulir/f116/f116-input.php"; break;
		case "f116-search" : include "pages/formulir/f116/f116-search.php"; break;
		case "f116-sorting" : include "pages/formulir/f116/f116-sorting.php"; break;
		case "f116-delete" : include "pages/formulir/f116/f116-delete.php"; break;
		case "f116-reset" : include "pages/formulir/f116/f116-reset.php" ; break;
		case "f116-pdf" : include "pages/formulir/f116/f116-pdf.php"; break;
		
		#formulir f125
		case "f125" : include "pages/formulir/f125/f125.php"; break;
		case "f125-input" : include "pages/formulir/f125/f125-input.php"; break;
		case "f125-search" : include "pages/formulir/f125/f125-search.php"; break;
		case "f125-sorting" : include "pages/formulir/f125/f125-sorting.php"; break;
		case "f125-delete" : include "pages/formulir/f125/f125-delete.php"; break;
		case "f125-reset": include "pages/formulir/f125/f125-reset.php"; break;
		case "f125-pdf": include "pages/formulir/f125/f125-pdf.php"; break;
		
		#formulir f129
		case "f129" : include "pages/formulir/f129/f129.php"; break;
		case "f129-input" : include "pages/formulir/f129/f129-input.php"; break;
		case "f129-reset" : include "pages/formulir/f129/f129-reset.php"; break;
		case "f129-search" : include "pages/formulir/f129/f129-search.php"; break;
		case "f129-sorting" : include "pages/formulir/f129/f129-sorting.php"; break;
		case "f129-delete" : include "pages/formulir/f129/f129-delete.php"; break;
		case "f129-pdf" : include "pages/formulir/f129/f129-pdf.php"; break;
		
		# formulir f134
		case "f134" : include "pages/formulir/f134/f134.php"; break;
		case "f134-input" : include "pages/formulir/f134/f134-input.php"; break;
		case "f134-reset" : include "pages/formulir/f134/f134-reset.php"; break;
		case "f134-search" : include "pages/formulir/f134/f134-search.php"; break;
		case "f134-sorting" : include "pages/formulir/f134/f134-sorting.php"; break;
  		case "f134-delete" : include "pages/formulir/f134/f134-delete.php"; break;
		case "f134-pdf" : include "pages/formulir/f134/f134-pdf.php"; break;

		# formulir f201
		case "f201" : include "pages/formulir/f201/f201.php"; break;
		case "f201-input": include "pages/formulir/f201/f201-input.php"; break;
		case "f201-reset" : include "pages/formulir/f201/f201-reset.php"; break;
		case "f201-search" : include "pages/formulir/f201/f201-search.php"; break;
		case "f201-delete" : include "pages/formulir/f201/f201-delete.php"; break;
		case "f201-pdf" : include "pages/formulir/f201/f201-pdf.php"; break;

		# formulir f229
		case "f229" : include "pages/formulir/f229/f229.php"; break;
		case "f229-input" : include "pages/formulir/f229/f229-input.php"; break;
		case "f229-reset" : include "pages/formulir/f229/f229-reset.php"; break; 
		case "f229-search" : include "pages/formulir/f229/f229-search.php"; break;
		case "f229-delete" : include "pages/formulir/f229/f229-delete.php"; break;
		case "f229-pdf" : include "pages/formulir/f229/f229-pdf.php"; break;

		case "info" : include "pages/info.php";
	}
	
}

?>