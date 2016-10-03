<?php


$nop = @$_GET['nop'];

try {
    $koneksi = db_connect();
    $sql = "Delete From pbbdesa where nop='".$nop."'";
    $result = $koneksi->query($sql);
    if(!$result){
        throw new Exception("Gagal menghapus data nop = ".$nop." dari database");
    }
    
    # jika sukses 
    display_header("PBB Desa");
    display_sidebar();
    display_content("PBB Desa", "?page1=pbbdesa", "Hapus NOP");
    alert_sukses("Sukses menghapus data nop = ".$nop);
    display_footer();
    header("refresh:1;url=?page1=pbbdesa");
} catch (Exception $e) {
    display_header("PBB Desa");
    display_sidebar();
    display_content("PBB Desa", "?page1=pbbdesa", "Hapus NOP");
    alert_gagal($e->getMessage());
    display_footer();
    header("refresh:1;url=?page1=pbbdesa");
}

?>
