<?php 

date_default_timezone_set("Asia/Jakarta");
$namafile = date('YmdHis') . "_PBBDESA" ;

header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=".$namafile.".xls");
echo "<h3 style='text-align:center'>Daftar Pembayaran Pajak Desa Rajagaluhlor ".date('Y')."</h3>";
echo "<table border='1px solid #000'>"
   . "<thead><tr>";
echo "<th>No</th>"
   . "<th>N0P</th>"
   . "<th>Nama</th>"
   . "<th>Ls Tanah</th>"
   . "<th>Ls Bangunan</th>"
   . "<th>NJOP Tanah</th>"
   . "<th>NJOP Bangunan</th>"
   . "<th>Ketetapan</th>"
   . "<th>Keterangan</th></tr></thead>"
   . "<tbody>";

$koneksi = db_connect();
$sql = "Select nop from pbbdesa_bayar order by nop";
$result = $koneksi->query($sql);
$jmldata = $result->num_rows ;
if($jmldata > 0){
    $no = 1;
    while ($row = $result->fetch_array()){
    	$data = $koneksi->query("select * from pbbdesa where nop = '".$row['nop']."'")->fetch_array();
        echo "<tr><td style='text-align:center'>".$no."</td>";
        echo "<td>'".$data['nop']."</td>";
        echo "<td>".strtoupper($data['nama'])."</td>";
        echo "<td style='text-align:right'>".$data['luas_tanah']."</td>";
        echo "<td style='text-align:right'>".$data['luas_bangunan']."</td>";
        echo "<td style='text-align:right'>".number_format($data['njop_tanah'], 2)."</td>";
        echo "<td style='text-align:right'>".number_format($data['njop_bangunan'], 2)."</td>";
        echo "<td style='text-align:right'>".number_format($data['tagihan'], 2)."</td>";
        echo "<td>".$data['keterangan']."</td>";
        $no++;
    }
}else{
    echo "<tr><td colspan='9'>No record</td></tr>";
}
echo "</tbody>";
$sql2 = "select SUM(tagihan) as totpan from pbbdesa_bayar";
$result = $koneksi->query($sql2);
$row = $result->fetch_array();
echo "<tfoot>
        <tr class='success'>
            <td colspan='4'><b>Total NOP</b> : <b>$jmldata</b> data</td>
            <td colspan='5' class='text-right'><b>Total Ketetapan</b> : Rp. ".number_format($row['totpan'], 2)."</td>
        </tr>
     </tfoot>";  



echo "</table>";


?>