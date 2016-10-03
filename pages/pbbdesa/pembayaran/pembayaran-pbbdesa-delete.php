<?php


$nop = @$_GET['nop'];

try {
    $koneksi = db_connect();
    $sql = "Delete From pbbdesa_bayar where nop='".$nop."'";
    $result = $koneksi->query($sql);
    if(!$result){
        throw new Exception("Gagal batalkan pembayaran dengan nop = ".$nop);
    }
    
    # jika sukses 
    display_header("Pembayaran PBB DESA");
    display_sidebar();
    display_content("Pembayaran PBB DESA");
    alert_sukses("Sukses menghapus data nop = ".$nop);
    display_footer();
    header("refresh:1;url=?page1=pembayaran-pbbdesa");
} catch (Exception $e) {
    display_header("Pembayaran PBB DESA");
    display_sidebar();
    display_content("Pembayaran PBB DESA");
    alert_gagal($e->getMessage());
    display_footer();
    header("refresh:1;url=?page1=pembayaran-pbbdesa");
}

?>