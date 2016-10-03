<?php


$page = $_GET['page2'];


if($page == "form"){
	$nop = $_GET['nop'];
    display_header("PBB Desa");
    display_sidebar();
    display_content("PBB Desa", "?page1=pbbdesa", "Form Edit");
    pbbdesa_header();
    pbbdesa_subheader();    
    form_edit_wajib_pajak($nop);
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
    
    try {
        cek_validasi_angka($nop, $luas_tanah, $luas_bangunan, $njop_tanah, $njop_bangunan, $tagihan);
        proses_edit_pbbdesa($nop, $nama, $luas_tanah, $luas_bangunan, $njop_tanah, $njop_bangunan, $tagihan, $keterangan);
        display_header("PBB Desa");
        display_sidebar();
        display_content("PBB Desa", "?page1=pbbdesa", "Form Edit");
        alert_sukses("Edit sukses");
        display_footer();
        header("refresh:1;url=?page1=pbbdesa");
    } catch (Exception $e) {
       display_header("PBB Desa");
        display_sidebar();
        display_content("PBB Desa", "?page1=pbbdesa", "Form Edit");
        alert_gagal($e->getMessage());
        form_edit_wajib_pajak($nop);
        display_footer();
    }

}



?>