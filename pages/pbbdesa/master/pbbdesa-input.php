<?php


$page = $_GET['page2'];

if($page == "form"){
	display_header("PBB Desa");
	display_sidebar();
	display_content("PBB Desa", "index.php?page1=pbbdesa", "Input Form");
	pbbdesa_header();
	pbbdesa_subheader();
	form_input_wajib_pajak();
	display_footer();
}else{
	$nop = $_POST['nop'];
	$nama = $_POST['nama'];
	$luas_tanah = $_POST['luas_tanah'];
	$luas_bangunan = $_POST['luas_bangunan'];
	$njop_tanah = $_POST['njop_tanah'];
	$njop_bangunan = $_POST['njop_bangunan'];
	$tagihan = $_POST['tagihan'];
	$keterangan = $_POST['keterangan'];
	
	# buat inisial variable yg kosong jadi zero integer
	if($luas_tanah == ""){
		$luas_tanah = 0;
	}
	if($luas_bangunan == ""){
		$luas_bangunan = 0;
	}
	if($njop_tanah == ""){
		$njop_tanah = 0;
	}
	if($njop_bangunan == ""){
		$njop_bangunan = 0;
	}
	if ($tagihan == "") {
		$tagihan = 0;
	}
	
	try{
		cek_validasi_angka($nop, $luas_tanah, $luas_bangunan, $njop_tanah, $njop_bangunan, $tagihan);
		
		proses_input_pbbdesa($nop, $nama, $luas_tanah, $luas_bangunan, $njop_tanah, $njop_bangunan, $tagihan, $keterangan);
		
		display_header("PBB Desa");
		display_sidebar();
		display_content("PBB Desa", "index.php?page1=pbbdesa", "Input Form");
		alert_sukses("input sukses");
		display_footer();
		header("refresh:1;url=?page1=pbbdesa");
	}
	catch(Exception $e){
		display_header("PBB Desa");
		display_sidebar();
		display_content("PBB Desa", "index.php?page1=pbbdesa", "Input Form");
		alert_gagal($e->getMessage());
		form_input_wajib_pajak();
		display_footer();
	}
	
}



?>