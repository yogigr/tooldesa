<?php 
# fungsi ubah format tangggal

function ubahformattanggal($tanggal)
{
	$pisahkan = explode('/', $tanggal);
	$susunan = array($pisahkan[2], $pisahkan[0], $pisahkan[1]);
	$satukan = implode('-', $susunan);
	return $satukan;
}

function formattanggalindo($tanggal)
{
	$pisahkan = explode('-', $tanggal);
	$susunan = array($pisahkan[2], $pisahkan[1], $pisahkan[0]);
	$satukan = implode(' - ', $susunan);
	return $satukan;
}


# check valid angka
function cek_validasi_angka($nop, $luas_tanah, $luas_bangunan, $njop_tanah, $njop_bangunan, $tagihan)
{
	if(!is_numeric($nop)){
			throw new Exception("Format NOP harus Angka.");
		}
		if(!is_numeric($luas_tanah)){
			throw new Exception("Format Luas Tanah harus Angka");
		}
		if(!is_numeric($luas_bangunan)){
			throw new Exception("Format Luas Bangunan harus Angka");
		}
		if(!is_numeric($njop_tanah)){
			throw new Exception("Format NJOP Tanah harus Angka");
		}
		if(!is_numeric($njop_bangunan)){
			throw new Exception("Format NJOP Bangunan harus Angka");
		}
    if(!is_numeric($tagihan)){
      throw new Exception("Format Tagihan harus Angka");
    }
}

function export_pbbdesa_proses($daritanggal, $sampaitanggal, $namafile){
    header("Content-type: application/xls");
    header("Content-Disposition: attachment; filename=".$namafile.".xls");
    echo "<h3 style='text-align:center'>Daftar Pembayaran Pajak Desa Rajagaluhlor 2017</h3>";
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
    $sql = "Select * from pbbdesa where tanggal_input between '".$daritanggal."' and '".$sampaitanggal."' order by nop";
    $result = $koneksi->query($sql);
    $jmldata = $result->num_rows ;
    if($jmldata > 0){
        $no = 1;
        while ($row = $result->fetch_array()){
            echo "<tr><td style='text-align:center'>".$no."</td>";
            echo "<td>'".$row['nop']."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['luas_tanah']."</td>";
            echo "<td>".$row['luas_bangunan']."</td>";
            echo "<td>".$row['njop_tanah']."</td>";
            echo "<td>".$row['njop_bangunan']."</td>";
            echo "<td style='text-align:right'>".number_format($row['ketetapan'], 2)."</td>";
            echo "<td>".$row['keterangan']."</td>";
            $no++;
        }
    }else{
        echo "<tr><td colspan='9'>No record</td></tr>";
    }
    echo "</tbody>";
    $sql2 = "select SUM(ketetapan) as totpan from pbbdesa where tanggal_input between '".$daritanggal."' and '".$sampaitanggal."'";
    $result = $koneksi->query($sql2);
    $row = $result->fetch_array();
    echo "<tfoot>
            <tr class='success'>
                <td colspan='4'><b>Total NOP</b> : <b>$jmldata</b> data</td>
                <td colspan='5' class='text-right'><b>Total Ketetapan</b> : Rp. ".number_format($row['totpan'], 2)."</td>
            </tr>
         </tfoot>";  
    
    
    echo "</table>";
}



?>