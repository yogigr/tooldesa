<?php  

require_once("assets/fpdf/fpdf.php");
require_once('library/formulir/kumpulan_fungsi.php');
#bayi
$id_bayi = @$_GET['id_bayi'];
$koneksi = db_connect();
$bayi = $koneksi->query("select * from bayi where id_bayi='".$id_bayi."'")->fetch_array();
#ayah 
$ayah = $koneksi->query("select * from ayah where id_bayi = '".$id_bayi."'")->fetch_array();
#ibu
$ibu = $koneksi->query("select * from ibu where id_bayi = '".$id_bayi."'")->fetch_array();
#pelaopr
$pelapor = $koneksi->query("select * from pelapor where id_bayi = '".$id_bayi."'")->fetch_array();
#saksi 1
$saksi1 = $koneksi->query("select * from saksi1 where id_bayi = '".$id_bayi."'")->fetch_array();
# saksi 2
$saksi2 = $koneksi->query("select * from saksi2 where id_bayi = '".$id_bayi."'")->fetch_array();


$pdf = new FPDF('P', 'cm', array(21.59, 33));
$pdf->addPage();
$pdf->setTitle(strtoupper($bayi['nama_bayi']));

#header
$pdf->setFont('Arial', 'B', '14');
$pdf->setX(15.5);
$pdf->cell(5, 1, "Kode . F-2.01", 1, 1, "C");

# desa, kecmatan, kabupaten, kodewilayah
$desa = "rajagaluhlor";
$kecamatan = "rajagaluh";
$kabupaten = "majalengka";
$kodewilayah = "10092010" ;
$pdf->setFont("Arial", "", 7);
	#desa
$pdf->setY(2.3);
$pdf->cell(0, 0, "Pemerintah Desa / Kelurahan", 0, 0, "L");
$pdf->setX(5);
$pdf->cell(0,0,":");
$pdf->setX(5.5);
$pdf->cell(0, 0, strtoupper($desa), 0, 1, "L");
	#kecamatan
$pdf->setY(2.65);
$pdf->cell(0, 0, "Kecamatan", 0, 0, "L");
$pdf->setX(5);
$pdf->cell(0,0,":");
$pdf->setX(5.5);
$pdf->cell(0,0,strtoupper($kecamatan));
	#kabupaten
$pdf->setY(3);
$pdf->Cell(0,0,"Kabupaten / Kota");
$pdf->setX(5);
$pdf->cell(0,0,":");
$pdf->setX(5.5);
$pdf->cell(0, 0, strtoupper($kabupaten));
	#kode wilayah
$pdf->setY(3.35);
$pdf->cell(0,0.5,"Kode Wilayah");
$pdf->setX(5);
$pdf->cell(0, 0.5, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($kodewilayah); $i++) { 
	if ($i == strlen($kodewilayah)-1) {
		$pdf->cell(0.35, 0.35, $kodewilayah[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.35, 0.35, $kodewilayah[$i], "TLB", 0, "C");
}

# keterangan
$pdf->setXY(15.5, 2.3);
$pdf->cell(0, 0, "Ket : Lembar 1 : UPTD/Instansi Pelaksana");
$pdf->setXY(16.08, 2.65);
$pdf->cell(0, 0, "Lembar 2 : Untuk yang bersangkutan");
$pdf->setXY(16.08, 3);
$pdf->Cell(0, 0, "Lembar 3 : Desa/Kelurahan");
$pdf->setXY(16.08, 3.35);
$pdf->cell(0, 0, "Lembar 4 : Kecamatan");

# judul formulir
$pdf->setFont("Arial", "B", 11);
$pdf->setY(3.7);
$pdf->cell(0, 1, "SURAT KETERANGAN KELAHIRAN", 0, 0, "C");

# nama kepala keluarga
$pdf->setFont("Arial", "", "7");
$pdf->setY(4.6);
$pdf->cell(0, 0.35, "Nama Kepala Keluarga");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ayah['nama_ayah']) ; $i++) { 
	if ($i == strlen($ayah['nama_ayah'])-1) {
		$pdf->cell(0.35, 0.35, strtoupper($ayah['nama_ayah'][$i]), 1, 0, "C");
		break;
	}
	$pdf->cell(0.35, 0.35, strtoupper($ayah['nama_ayah'][$i]), "TLB", 0, "C");
	 
}
# nomor kk
$pdf->setY(4.95);
$pdf->cell(0, 0.35, "Nomor Kartu Keluarga");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ayah['no_kk']); $i++) { 
	if ($i <= strlen($ayah['nama_ayah'])-1) {
		$pdf->cell(0.35, 0.35, $ayah['no_kk'][$i], "LB", 0, "C");
	} else {
		$pdf->cell(0.35, 0.35, $ayah['no_kk'][$i], "TLB", 0, "C");
	}
}
$pdf->cell(0.35, 0.35, "", "L", 0, "C");

# bayi / anak
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 5.30);
$pdf->cell(0, 1, "BAYI / ANAK", 0, 1, "L");
$pdf->setFont("Arial", "", 7);
	# nama
$pdf->setXY(1.3, 6);
$pdf->cell(0.35, 0.35, "1. Nama");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($bayi['nama_bayi']) ; $i++) { 
	if ($i == strlen($bayi['nama_bayi'])-1) {
		$pdf->cell(0.35, 0.35, strtoupper($bayi['nama_bayi'][$i]), 1, 0, "C");
		break;
	}
	$pdf->cell(0.35, 0.35, strtoupper($bayi['nama_bayi'][$i]), "TLB", 0, "C");
}
	# jenis kelamin
$pdf->setXY(1.3, 6.35);
$pdf->Cell(0.35, 0.35, "2. Jenis Kelamin");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $bayi['jenis_kelamin'], "LBR", 0, "C");
$pdf->setX(5.95);
$pdf->cell(0.35, 0.35, "1. Laki-laki        2. Perempuan");
	# tempat dilahirkan
$pdf->setXY(1.3, 6.70);
$pdf->cell(0.35, 0.35, "3. Tempat dilahirkan");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $bayi['tempat_dilahirkan'], "LBR", 0, "C");
$pdf->setX(5.95);
$pdf->cell(0.35, 0.35, "1. RS/RB     2. Puskesmas     3. Polindes    4. Rumah      5. Lainnya");
	# tempat kelahiran
$pdf->setXY(1.3, 7.05);
$pdf->cell(0.35, 0.35, "4. Tempat kelahiran");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ':');
$pdf->setX(5.6);
for ($i=0; $i < strlen($bayi['tempat_kelahiran']) ; $i++) { 
	if ($i == 0) {
		$pdf->cell(0.35, 0.35, strtoupper($bayi['tempat_kelahiran'][$i]), "LB", 0, "C");
	}else{
		$pdf->cell(0.35, 0.35, strtoupper($bayi['tempat_kelahiran'][$i]), "TLB", 0, "C");
	}
}

$pdf->cell(0.35, 0.35, "", "L", 0, "C");
	# hari dan tanggal lahir
$pdf->setXY(1.3, 7.40);
$pdf->cell(0.35, 0.35, "5. Hari dan Tanggal Lahir");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
	# hari lahir
$pdf->cell(0.7, 0.35, "Hari", 0, 0, "C");
for ($i=0; $i < strlen($bayi['hari_lahir']) ; $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($bayi['hari_lahir'][$i]), 1, 0, "C");
}
	# tanggal lahir
$pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
$tanggal_lahir = explode("-", $bayi['tanggal_lahir']);
$tgl = $tanggal_lahir[2];
$bln = $tanggal_lahir[1];
$thn = $tanggal_lahir[0];
for ($i=0; $i < strlen($tgl) ; $i++) { 
	$pdf->cell(0.35, 0.35, $tgl[$i], 1, 0, "C");
}
	#bulan
$pdf->cell(0.70, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($bln); $i++) { 
	$pdf->cell(0.35, 0.35, $bln[$i], 1, 0, "C");
}
	#tahun
$pdf->cell(0.70, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($thn); $i++) { 
	$pdf->cell(0.35, 0.35, $thn[$i], 1, 0, "C");
}
# jam lahir
$pdf->setXY(1.3, 7.75);
$pdf->cell(0, 0.35, "6. Pukul");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$jam = $bayi['waktu_lahir'];
$jam = explode(".", $jam);
$jam = $jam[0].$jam[1];
for ($i=0; $i < strlen($jam); $i++) { 
	$pdf->cell(0.35, 0.35, $jam[$i], 1, 0, "C");
}
# jenis kelahiran
$pdf->setXY(1.3, 8.1);
$pdf->Cell(0, 0.35, "7. Jenis Kelahiran" );
$pdf->setX(5);
$pdf->cell(0, 0.5, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $bayi['jenis_kelahiran'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. Tunggal       2. Kembar 2         3. Kembar 3        4. Kembar 4         5. Lainnya");
# kelahiran ke
$pdf->setXY(1.3, 8.45);
$pdf->Cell(0, 0.35, "8. Kelahiran Ke");
$pdf->SetX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $bayi['kelahiran_ke'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. 2. 3. 4.     ..............");
# penolong kelahiran
$pdf->setXY(1.3, 8.80);
$pdf->cell(0, 0.35, "9. Penolong Kelahiran");
$pdf->SetX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $bayi['penolong_kelahiran'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. Dokter      2. Bidan/Perawat        3. Dukun       4. Lainnya");
# berat bayi
$pdf->setXY(1.3,  9.15);
$pdf->Cell(0, 0.35, "10. Berat Bayi");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.70, 0.35, $bayi['berat_bayi'], 1, 0, "C");
$pdf->cell(0, 0.35, "Kg");
# panjang bayi
$pdf->setXY(1.3, 9.50);
$pdf->Cell(0, 0.35, "11. Panjang Bayi");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($bayi['panjang_bayi']); $i++) { 
	$pdf->cell(0.35, 0.35, $bayi['panjang_bayi'][$i], 1, 0, "C");
}
$pdf->cell(0, 0.35, "Cm");
#garis garis
$pdf->Line(1, 5.4, 20.58, 5.4); # atas
$pdf->Line(1, 5.4, 1, 10); # kiri
$pdf->LIne(1, 10, 20.58, 10); # bawah
$pdf->Line(20.58, 5.4, 20.58, 10); # kanan

# ibu
$pdf->setXY(1.3, 10);
$pdf->setFont("Arial", "B", 7);
$pdf->cell(0, 0.8, "IBU");
# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 10.60);
$pdf->Cell(0, 0.35, "1. NIK");
$pdf->SetX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ibu['nik_ibu']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['nik_ibu'][$i], 1, 0, "C");
}
# nama lengkap
$pdf->setXY(1.3, 10.95);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ibu['nama_ibu']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($ibu['nama_ibu'][$i]), 1, 0, "C");
}
# tanggal lahir
$pdf->setXY(1.3, 11.3);
$pdf->cell(0, 0.35, "3. Tanggal Lahir");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($ibu['tanggal_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['tanggal_lahir'][$i], 1, 0, "C");
}
$pdf->Cell(0.70, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($ibu['bulan_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['bulan_lahir'][$i], 1, 0, "C");
}
$pdf->Cell(0.70, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($ibu['tahun_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['tahun_lahir'][$i], 1, 0, "C");
}
$pdf->cell(1.05, 0.35, "Umur", 0, 0, "C");
for ($i=0; $i < strlen($ibu['umur']); $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['umur'][$i], 1, 0, "C");
}
# pekerjaan
$pdf->setXY(1.3, 11.65);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ibu['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 12);
$pdf->Cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($ibu['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 12.35);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($ibu['desa']), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($ibu['kabupaten']), 1, 0, "L");
# kec
$pdf->setXY(5, 12.7);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($ibu['kecamatan']), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($ibu['provinsi']), 1, 0, "L");
# kewarganegaraan
$pdf->setXY(1.3, 13.05);
$pdf->cell(0, 0.35, "6. Kewarganegaraan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(0.35, 0.35, $ibu['kewarganegaraan'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. WNI     2. WNA");
# kebangsaan
$pdf->setXY(1.3, 13.4);
$pdf->cell(0, 0.35, "7. Kebangsaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(3.15, 0.35, $ibu['kebangsaan'], 1, 0, "L");
# tgl pencatatan perkawinan
$pdf->setXY(1.3, 13.75);
$pdf->cell(0, 0.35, "8. Tgl Pencatatan Perkawinan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.7, 0.35, "Tgl", 0, 0, "C");
$tanggal_kawin = explode("-", $ibu['tgl_pencatatan_kawin']);
for ($i=0; $i < strlen($tanggal_kawin[2]); $i++) { 
	$pdf->cell(0.35, 0.35, $tanggal_kawin[2][$i], 1, 0, "C");
}
$pdf->cell(0.7, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($tanggal_kawin[1]); $i++) { 
	$pdf->cell(0.35, 0.35, $tanggal_kawin[1][$i], 1, 0, "C");
}
$pdf->cell(0.7, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($tanggal_kawin[0]) ; $i++) { 
	$pdf->cell(0.35, 0.35, $tanggal_kawin[0][$i], 1, 0, "C");
}
#garis garis
$pdf->Line(1, 10, 1, 14.2); # kiri
$pdf->LIne(1, 14.2, 20.58, 14.2); # bawah
$pdf->Line(20.58, 10, 20.58, 14.2); # kanan

# ayah
$pdf->setXY(1.3, 14.15);
$pdf->setFont("Arial", "B", 7);
$pdf->Cell(0, 0.8, "AYAH");

# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 14.70);
$pdf->Cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ayah['nik']); $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['nik'][$i], 1, 0, "C") ;
}
# nama lengkap
$pdf->setXY(1.3, 15.05);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ayah['nama_ayah']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($ayah['nama_ayah'][$i]), 1, 0, "C");
}
# tanggal lahir
$pdf->setXY(1.3, 15.40);
$pdf->cell(0, 0.35, "3. Tanggal Lahir");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($ayah['tanggal_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['tanggal_lahir'][$i], 1, 0, "C");
}
$pdf->Cell(0.70, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($ayah['bulan_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['bulan_lahir'][$i], 1, 0, "C");
}
$pdf->Cell(0.70, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($ayah['tahun_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['tahun_lahir'][$i], 1, 0, "C");
}
$pdf->cell(1.05, 0.35, "Umur", 0, 0, "C");
for ($i=0; $i < strlen($ayah['umur']); $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['umur'][$i], 1, 0, "C");
}
# pekerjaan
$pdf->setXY(1.3, 15.75);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ayah['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 16.10);
$pdf->Cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($ayah['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 16.45);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($ayah['desa']), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($ayah['kabupaten']), 1, 0, "L");
# kec
$pdf->setXY(5, 16.80);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($ayah['kecamatan']), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($ayah['provinsi']), 1, 0, "L");
# kewarganegaraan
$pdf->setXY(1.3, 17.15);
$pdf->cell(0, 0.35, "6. Kewarganegaraan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(0.35, 0.35, $ayah['kewarganegaraan'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. WNI     2. WNA");
# kebangsaan
$pdf->setXY(1.3, 17.50);
$pdf->cell(0, 0.35, "7. Kebangsaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(3.15, 0.35, $ayah['kebangsaan'], 1, 0, "L");
#garis garis
$pdf->Line(1, 14.2, 1, 18); # kiri
$pdf->LIne(1, 18, 20.58, 18); # bawah
$pdf->Line(20.58, 14.2, 20.58, 18); # kanan

# pelapor
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 17.9);
$pdf->cell(0, 0.8, "PELAPOR");
# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 18.45);
$pdf->Cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['nik']); $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['nik'][$i], 1, 0, "C") ;
}
# nama lengkap
$pdf->setXY(1.3, 18.80);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['nama']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($pelapor['nama'][$i]), 1, 0, "C");
}
# umur
$pdf->setXY(1.3, 19.15);
$pdf->cell(0, 0.35, "3. Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.70, 0.35, $pelapor['umur'], 1, 0, "C");
$pdf->cell(0, 0.35, "Tahun");
# jenis kelamin
$pdf->setXY(1.3, 19.5);
$pdf->cell(0, 0.35, "4. Jenis Kelamin");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $pelapor['jenis_kelamin'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. Laki-laki      2. Perempuan");
# pekerjaan
$pdf->setXY(1.3, 19.85);
$pdf->cell(0, 0.35, "5. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 20.2);
$pdf->Cell(0, 0.35, "6. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($pelapor['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 20.55);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($pelapor['desa']), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($pelapor['kabupaten']), 1, 0, "L");
# kec
$pdf->setXY(5, 20.90);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($pelapor['kecamatan']), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($pelapor['provinsi']), 1, 0, "L");
#garis garis
$pdf->Line(1, 18, 1, 21.4); # kiri
$pdf->LIne(1, 21.4, 20.58, 21.4); # bawah
$pdf->Line(20.58, 18, 20.58, 21.4); # kanan

# saksi 1
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 21.5);
$pdf->cell(0, 0.35, "SAKSI I");

# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 21.85);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['nik']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['nik'][$i], 1, 0, "C");
}
# nama lengkap
$pdf->setXY(1.3, 22.2);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['nama']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($saksi1['nama'][$i]), 1, 0, "C");
}
# umur
$pdf->setXY(1.3, 22.55);
$pdf->cell(0, 0.35, "3. Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.70, 0.35, $saksi1['umur'], 1, 0, "C");
$pdf->cell(0, 0.35, "Tahun");
# pekerjaan
$pdf->setXY(1.3, 22.90);
$pdf->cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 23.25);
$pdf->Cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($saksi1['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 23.60);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($saksi1['desa']), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($saksi1['kabupaten']), 1, 0, "L");
# kec
$pdf->setXY(5, 23.95);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($saksi1['kecamatan']), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($saksi1['provinsi']), 1, 0, "L");
#garis garis
$pdf->Line(1, 21.4, 1, 24.5); # kiri
$pdf->LIne(1, 24.5, 20.58, 24.5); # bawah
$pdf->Line(20.58, 21.4, 20.58, 24.5); # kanan

# saksi 2
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 24.65);
$pdf->cell(0, 0.35, "SAKSI 2");
# nik
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1.3, 25);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['nik']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['nik'][$i], 1, 0, "C");
}
# nama lengkap
$pdf->setXY(1.3, 25.35);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->Cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['nama']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($saksi2['nama'][$i]), 1, 0, "C");
}
# umur
$pdf->setXY(1.3, 25.70);
$pdf->cell(0, 0.35, "3. Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.70, 0.35, $saksi2['umur'], 1, 0, "C");
$pdf->cell(0, 0.35, "Tahun");
# pekerjaan
$pdf->setXY(1.3, 26.05);
$pdf->cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['pekerjaan'][$i], 1, 0, "C");
}
# alamat
$pdf->setXY(1.3, 26.40);
$pdf->Cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($saksi2['alamat']), 1, 0, "L");
# desa
$pdf->setXY(5, 26.75);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($saksi2['desa']), 1, 0, "L");
# kab
$pdf->cell(1.75, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($saksi2['kabupaten']), 1, 0, "L");
# kec
$pdf->setXY(5, 27.1);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->Cell(2.45,0.35, strtoupper($saksi2['kecamatan']), 1, 0, "L");
# prov
$pdf->cell(1.75, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($saksi2['provinsi']), 1, 0, "L");
#garis garis
$pdf->Line(1, 24.5, 1, 27.7); # kiri
$pdf->LIne(1, 27.7, 20.58, 27.7); # bawah
$pdf->Line(20.58, 24.5, 20.58, 27.7); # kanan

# tanda tangan
$pdf->setY(28.5);
$pdf->cell(0, 0.35, "Rajagaluhlor, ".tanggalTitimangsa(date('d'), date('m'), date('Y')), 0, 0, "R");
$pdf->setY(29);
$pdf->cell(0, 0.35, "Mengetahui :");
$pdf->setY(29.5);
$pdf->cell(5, 0.35, "Kepala Desa/Lurah", 0, 0, "C");
$pdf->setX(15);
$pdf->cell(5, 0.35, "Pelapor", 0, 0, "C");
$pdf->setY(30.64);
$pdf->cell(5, 0.35, "(   H. R I S A N   )", 0, 0, "C");
$pdf->setX(15);
$pdf->cell(5, 0.35, "(..................................................)", 0, 0, "C");

$pdf->output('I', strtoupper($bayi['nama_bayi']).".pdf");
$koneksi->close();
?>