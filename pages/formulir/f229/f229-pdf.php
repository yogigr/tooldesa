<?php  

require_once("assets/fpdf/fpdf.php");
require_once('library/formulir/kumpulan_fungsi.php');
#jenazah
$id_jenazah = @$_GET['id_jenazah'];
$koneksi = db_connect();
$jenazah = $koneksi->query("select * from jenazah where id_jenazah='".$id_jenazah."'")->fetch_array();
#ayah 
$ayah = $koneksi->query("select * from ayah where id_jenazah = '".$id_jenazah."'")->fetch_array();
#ibu
$ibu = $koneksi->query("select * from ibu where id_jenazah = '".$id_jenazah."'")->fetch_array();
#pelaopr
$pelapor = $koneksi->query("select * from pelapor where id_jenazah = '".$id_jenazah."'")->fetch_array();
#saksi 1
$saksi1 = $koneksi->query("select * from saksi1 where id_jenazah = '".$id_jenazah."'")->fetch_array();
# saksi 2
$saksi2 = $koneksi->query("select * from saksi2 where id_jenazah = '".$id_jenazah."'")->fetch_array();


$pdf = new FPDF('P', 'cm', array(21.59, 33));
$pdf->addPage();
$pdf->setTitle(strtoupper($jenazah['nama_jenazah']));

#header
$pdf->setFont('Arial', 'B', '14');
$pdf->setX(15.5);
$pdf->cell(5, 1, "Kode . F-2.29", 1, 1, "C");

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
$pdf->cell(0, 0, "Ket : Lembar 1 : Untuk yang bersangkutan");
$pdf->setXY(16.08, 2.65);
$pdf->cell(0, 0, "Lembar 2 : UPTD/Instansi Pelaksana");
$pdf->setXY(16.08, 3);
$pdf->Cell(0, 0, "Lembar 3 : Desa/Kelurahan");
$pdf->setXY(16.08, 3.35);
$pdf->cell(0, 0, "Lembar 4 : Kecamatan");

# judul formulir
$pdf->setFont("Arial", "B", 11);
$pdf->setY(3.7);
$pdf->cell(0, 1, "SURAT KETERANGAN KEMATIAN", 0, 0, "C");

# nama kepala keluarga 
$pdf->setFont("Arial", "", 7);
$pdf->setY(4.5);
$pdf->cell(0, 0.35, "Nama Kepala Keluarga");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($jenazah['nama_kepala_keluarga']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($jenazah['nama_kepala_keluarga'][$i]), 1, 0, "C");
}

#  no kk
$pdf->setY(4.85);
$pdf->cell(0, 0.35, "Nomor Kartu Keluarga");
$pdf->setX(5);
$pdf->cell(0.35, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($jenazah['no_kk']); $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['no_kk'][$i], 1, 0, "C");
}

# data jenazah
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 5.6);
$pdf->cell(0, 0.35, "JENAZAH");
$pdf->setFont("Arial", "", 7);
	# nik
$pdf->setXY(1.3, 5.95);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($jenazah['nik_jenazah']); $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['nik_jenazah'][$i], 1, 0, "C");
}
	# nama jenazah
$pdf->setXY(1.3, 6.3);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($jenazah['nama_jenazah']); $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($jenazah['nama_jenazah'][$i]), 1, 0, "C");
}
	# jenis kelamin
$pdf->setXY(1.3, 6.65);
$pdf->cell(0, 0.35, "3. Jenis Kelamin");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(0.35, 0.35, $jenazah['jenis_kelamin'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. Laki-laki       2. Perempuan");
	# tanggal, bulan, tahun lahir dan umur
$pdf->setXY(1.3, 7);
$pdf->cell(0, 0.35, "4. Tanggal Lahir/Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.70, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($jenazah['tanggal_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['tanggal_lahir'][$i], 1, 0, "C");
}
$pdf->cell(0.70, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($jenazah['bulan_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['bulan_lahir'][$i], 1, 0, "C");
}
$pdf->cell(0.70, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($jenazah['tahun_lahir']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['tahun_lahir'][$i], 1, 0, "C");
}
$pdf->cell(1.05, 0.35, "Umur", 0, 0, "C");
for ($i=0; $i < strlen($jenazah['umur']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['umur'][$i], 1, 0, "C");
}
	# tempat lahir
$pdf->setXY(1.3, 7.35);
$pdf->cell(0, 0.35, "5. Tempat Lahir");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($jenazah['tempat_lahir']); $i++) { 
	$pdf->Cell(0.35, 0.35, strtoupper($jenazah['tempat_lahir'][$i]), 1, 0, "C");
}
	# kode prov
$pdf->cell(1.4, 0.35, "Kode Prov.", 0, 0, "C");
for ($i=0; $i < strlen($jenazah['kode_prov']); $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['kode_prov'][$i], 1, 0, "C");
}
	# kode kab.
$pdf->cell(1.4, 0.35, "Kode Kab.", 0, 0, "C");
for ($i=0; $i < strlen($jenazah['kode_kab']); $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['kode_kab'][$i], 1, 0, "C");
}
	# agama
$pdf->setXY(1.3, 7.7);
$pdf->Cell(0, 0.35, "6. Agama");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $jenazah['agama'], 1, 0, "C");
$pdf->Cell(0, 0.35, "1. Islam        2. Kristen       3. Katolik      4. Hindu          5. Budha       6. Lainnya");
	# pekerjaan
$pdf->setXY(1.3, 8.05);
$pdf->cell(0, 0.35, "7. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($jenazah['pekerjaan']); $i++) { 
	$pdf->cell(0.35, 0.35, $jenazah['pekerjaan'][$i], 1, 0, "C");
}
	# alamat
$pdf->setXY(1.3, 8.4);
$pdf->cell(0, 0.35, "8. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(14, 0.35, strtoupper($jenazah['alamat']), 1, 0, "L");
	#desa
$pdf->setXY(5.6, 8.75);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($jenazah['desa']), 1, 0, "L");
	# kab
$pdf->cell(2.1, 0.35, "c. Kab/Kota", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($jenazah['kabupaten']), 1, 0, "L");
	# kec
$pdf->setXY(5.6, 9.1);
$pdf->cell(2.45, 0.35, "b. Kecamatan", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($jenazah['kecamatan']), 1, 0, "L");
$pdf->cell(2.1, 0.35, "d. Provinsi", 0, 0, "L");
$pdf->cell(2.45, 0.35, strtoupper($jenazah['provinsi']), 1, 0, "L");
	# anak ke
$pdf->setXY(1.3, 9.45);
$pdf->cell(0, 0.35, "9. Anak Ke");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(0.70, 0.35, $jenazah['anak_ke'], 1, 0, "C");
$pdf->cell(0, 0.35, "   1,  2,  3,  4,  .......");
	# tanggal kematian
$pdf->setXY(1.3, 9.80);
$pdf->cell(0, 0.35, "10. Tanggal Kematian");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$tanggal_kematian = explode("-", $jenazah['tanggal_kematian']);
$tgl = $tanggal_kematian[2];
$bln = $tanggal_kematian[1];
$thn = $tanggal_kematian[0];
	# tgl
$pdf->Cell(0.7, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($tgl); $i++) { 
	$pdf->cell(0.35, 0.35, $tgl[$i], 1, 0, "C");
}
	# bln
$pdf->cell(0.7, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($bln); $i++) { 
	$pdf->cell(0.35, 0.35, $bln[$i], 1, 0, "C");
}
	# tahun
$pdf->cell(0.7, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($thn) ; $i++) { 
	$pdf->Cell(0.35, 0.34, $thn[$i], 1, 0, "C");
}
#jam kematina
$pdf->setXY(1.3, 10.15);
$pdf->cell(0, 0.35, "11. Pukul");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
	# jam
$jam = explode(".", $jenazah['pukul_kematian']);
$jam = $jam[0].$jam[1];
for ($i=0; $i < strlen($jam); $i++) { 
	$pdf->cell(0.35, 0.35, $jam[$i], 1, 0, "C");
}
# sebab kematian
$pdf->setXY(1.3, 10.5);
$pdf->cell(0, 0.35, "12. Sebab Kematian");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $jenazah['sebab_kematian'], 1, 0, "C");
$pdf->setX(5.95);
$pdf->cell(0, 0.35, "1. Sakit Biasa/Tua          2. Wabah Penyakit          3. Kecelakaan");
$pdf->setXY(5.95, 10.85);
$pdf->cell(0, 0.35, "4. Kriminalitas                 5. Bunuh Diri                   6. Lainnya");
#tempat kematian
$pdf->setXY(1.3, 11.2);
$pdf->cell(0, 0.35, "13. Tempat Kematian");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($jenazah['tempat_kematian']) ; $i++) { 
	$pdf->cell(0.35, 0.34, strtoupper($jenazah['tempat_kematian'][$i]), 1, 0, "C");
}
# yang menerangkan
$pdf->setXY(1.3, 11.55);
$pdf->cell(0, 0.35, "14. Yang Menerangkan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->cell(0.35, 0.35, $jenazah['yang_menerangkan'], 1, 0, "C");
$pdf->cell(0, 0.35, "1. Dokter          2. Tenaga Kesehatan          3. Kepolisian            4. Lainnya");

#garis-garis
$pdf->line(1, 5.4, 20.58, 5.4 ); # atas
$pdf->Line(1, 5.4, 1, 12); # kiri
$pdf->Line(20.58, 5.4, 20.58, 12); # kanan
$pdf->Line(1, 12, 20.58, 12); # bawah

# AYAH
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 12.2);
$pdf->cell(0, 0.35, "AYAH");
$pdf->setFont("Arial", "", 7);
 # nik
$pdf->setXY(1.3, 12.55);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ayah['nik']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['nik'][$i], 1, 0, "C");
}
	# nama
$pdf->setXY(1.3, 12.9);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ayah['nama_ayah']) ; $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($ayah['nama_ayah'][$i]), 1, 0, "C");
}
	# tanggal lahir
$pdf->setXY(1.3, 13.25);
$pdf->cell(0, 0.35, "3. Tanggal Lahir/Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
	# tgl
$pdf->cell(0.7, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($ayah['tanggal_lahir']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['tanggal_lahir'][$i], 1, 0, "C");
}
	#bln
$pdf->cell(0.7, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($ayah['bulan_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['bulan_lahir'][$i], 1, 0, "C");
}
	# thn
$pdf->cell(0.7, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($ayah['tahun_lahir']); $i++) { 
	$pdf->Cell(0.35, 0.35, $ayah['tahun_lahir'][$i], 1, 0, "C");
}
	# umur
$pdf->Cell(1.05, 0.35, "Umur", 0, 0, "C");
for ($i=0; $i < strlen($ayah['umur']); $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['umur'][$i], 1, 0, "C");
}
	# pekrjaan
$pdf->setXY(1.3, 13.60);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ayah['pekerjaan']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $ayah['pekerjaan'][$i], 1, 0, "C");
}
	# alamat
$pdf->setXY(1.3, 13.95);
$pdf->cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($ayah['alamat']), 1, 0, "L");
	# desa
$pdf->setXY(5.6, 14.3);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan");
$pdf->cell(2.45, 0.35, strtoupper($ayah['desa']), 1, 0, "L");
	# kabupaten
$pdf->Cell(2.1, 0.35, "c. Kab/Kota");
$pdf->cell(2.45, 0.35, strtoupper($ayah['kabupaten']), 1, 0, "L");
	# kecamatan
$pdf->setXY(5.6, 14.65);
$pdf->Cell(2.45, 0.35, "b. Kecamatan");
$pdf->cell(2.45, 0.35, strtoupper($ayah['kecamatan']), 1, 0, "L");
	# provinsi
$pdf->cell(2.1, 0.35, "d. Provinsi");
$pdf->cell(2.45, 0.35, strtoupper($ayah['provinsi']), 1, 0, "L");
# garis-garis
$pdf->Line(1, 12, 1, 15.3); # kiri
$pdf->Line(20.58, 12, 20.58, 15.3); # kanan
$pdf->Line(1, 15.3, 20.58, 15.3); # bawah

# IBU
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 15.5);
$pdf->cell(0, 0.35, "IBU");
$pdf->setFont("Arial", "", 7);
 # nik
$pdf->setXY(1.3, 15.85);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ibu['nik_ibu']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['nik_ibu'][$i], 1, 0, "C");
}
	# nama
$pdf->setXY(1.3, 16.2);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ibu['nama_ibu']) ; $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($ibu['nama_ibu'][$i]), 1, 0, "C");
}
	# tanggal lahir
$pdf->setXY(1.3, 16.55);
$pdf->cell(0, 0.35, "3. Tanggal Lahir/Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
	# tgl
$pdf->cell(0.7, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($ibu['tanggal_lahir']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['tanggal_lahir'][$i], 1, 0, "C");
}
	#bln
$pdf->cell(0.7, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($ibu['bulan_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['bulan_lahir'][$i], 1, 0, "C");
}
	# thn
$pdf->cell(0.7, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($ibu['tahun_lahir']); $i++) { 
	$pdf->Cell(0.35, 0.35, $ibu['tahun_lahir'][$i], 1, 0, "C");
}
	# umur
$pdf->Cell(1.05, 0.35, "Umur", 0, 0, "C");
for ($i=0; $i < strlen($ibu['umur']); $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['umur'][$i], 1, 0, "C");
}
	# pekrjaan
$pdf->setXY(1.3, 16.90);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($ibu['pekerjaan']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $ibu['pekerjaan'][$i], 1, 0, "C");
}
	# alamat
$pdf->setXY(1.3, 17.25);
$pdf->cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($ibu['alamat']), 1, 0, "L");
	# desa
$pdf->setXY(5.6, 17.60);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan");
$pdf->cell(2.45, 0.35, strtoupper($ibu['desa']), 1, 0, "L");
	# kabupaten
$pdf->Cell(2.1, 0.35, "c. Kab/Kota");
$pdf->cell(2.45, 0.35, strtoupper($ibu['kabupaten']), 1, 0, "L");
	# kecamatan
$pdf->setXY(5.6, 17.95);
$pdf->Cell(2.45, 0.35, "b. Kecamatan");
$pdf->cell(2.45, 0.35, strtoupper($ibu['kecamatan']), 1, 0, "L");
	# provinsi
$pdf->cell(2.1, 0.35, "d. Provinsi");
$pdf->cell(2.45, 0.35, strtoupper($ibu['provinsi']), 1, 0, "L");
# garis-garis
$pdf->Line(1, 15.3, 1, 18.6); # kiri
$pdf->Line(20.58, 15.3, 20.58, 18.6); # kanan
$pdf->Line(1, 18.6, 20.58, 18.6); # bawah

# PELAPOR
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 18.8);
$pdf->cell(0, 0.35, "PELAPOR");
$pdf->setFont("Arial", "", 7);
 # nik
$pdf->setXY(1.3, 19.15);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['nik']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['nik'][$i], 1, 0, "C");
}
	# nama
$pdf->setXY(1.3, 19.50);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['nama']) ; $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($pelapor['nama'][$i]), 1, 0, "C");
}
	# tanggal lahir
$pdf->setXY(1.3, 19.85);
$pdf->cell(0, 0.35, "3. Tanggal Lahir/Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
	# tgl
$pdf->cell(0.7, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($pelapor['tanggal_lahir']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['tanggal_lahir'][$i], 1, 0, "C");
}
	#bln
$pdf->cell(0.7, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($pelapor['bulan_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['bulan_lahir'][$i], 1, 0, "C");
}
	# thn
$pdf->cell(0.7, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($pelapor['tahun_lahir']); $i++) { 
	$pdf->Cell(0.35, 0.35, $pelapor['tahun_lahir'][$i], 1, 0, "C");
}
	# umur
$pdf->Cell(1.05, 0.35, "Umur", 0, 0, "C");
for ($i=0; $i < strlen($pelapor['umur']); $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['umur'][$i], 1, 0, "C");
}
	# pekrjaan
$pdf->setXY(1.3, 20.2);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($pelapor['pekerjaan']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $pelapor['pekerjaan'][$i], 1, 0, "C");
}
	# alamat
$pdf->setXY(1.3, 20.55);
$pdf->cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($pelapor['alamat']), 1, 0, "L");
	# desa
$pdf->setXY(5.6, 20.90);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan");
$pdf->cell(2.45, 0.35, strtoupper($pelapor['desa']), 1, 0, "L");
	# kabupaten
$pdf->Cell(2.1, 0.35, "c. Kab/Kota");
$pdf->cell(2.45, 0.35, strtoupper($pelapor['kabupaten']), 1, 0, "L");
	# kecamatan
$pdf->setXY(5.6, 21.25);
$pdf->Cell(2.45, 0.35, "b. Kecamatan");
$pdf->cell(2.45, 0.35, strtoupper($pelapor['kecamatan']), 1, 0, "L");
	# provinsi
$pdf->cell(2.1, 0.35, "d. Provinsi");
$pdf->cell(2.45, 0.35, strtoupper($pelapor['provinsi']), 1, 0, "L");
# garis-garis
$pdf->Line(1, 18.6, 1, 21.9); # kiri
$pdf->Line(20.58, 18.6, 20.58, 21.9); # kanan
$pdf->Line(1, 21.9, 20.58, 21.9); # bawah

# Saksi 1
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 22.1);
$pdf->cell(0, 0.35, "SAKSI I");
$pdf->setFont("Arial", "", 7);
 # nik
$pdf->setXY(1.3, 22.45);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['nik']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['nik'][$i], 1, 0, "C");
}
	# nama
$pdf->setXY(1.3, 22.80);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['nama']) ; $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($saksi1['nama'][$i]), 1, 0, "C");
}
	# tanggal lahir
$pdf->setXY(1.3, 23.15);
$pdf->cell(0, 0.35, "3. Tanggal Lahir/Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
	# tgl
$pdf->cell(0.7, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($saksi1['tanggal_lahir']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['tanggal_lahir'][$i], 1, 0, "C");
}
	#bln
$pdf->cell(0.7, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($saksi1['bulan_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['bulan_lahir'][$i], 1, 0, "C");
}
	# thn
$pdf->cell(0.7, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($saksi1['tahun_lahir']); $i++) { 
	$pdf->Cell(0.35, 0.35, $saksi1['tahun_lahir'][$i], 1, 0, "C");
}
	# umur
$pdf->Cell(1.05, 0.35, "Umur", 0, 0, "C");
for ($i=0; $i < strlen($saksi1['umur']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['umur'][$i], 1, 0, "C");
}
	# pekrjaan
$pdf->setXY(1.3, 23.50);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi1['pekerjaan']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $saksi1['pekerjaan'][$i], 1, 0, "C");
}
	# alamat
$pdf->setXY(1.3, 23.85);
$pdf->cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($saksi1['alamat']), 1, 0, "L");
	# desa
$pdf->setXY(5.6, 24.2);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan");
$pdf->cell(2.45, 0.35, strtoupper($saksi1['desa']), 1, 0, "L");
	# kabupaten
$pdf->Cell(2.1, 0.35, "c. Kab/Kota");
$pdf->cell(2.45, 0.35, strtoupper($saksi1['kabupaten']), 1, 0, "L");
	# kecamatan
$pdf->setXY(5.6, 24.55);
$pdf->Cell(2.45, 0.35, "b. Kecamatan");
$pdf->cell(2.45, 0.35, strtoupper($saksi1['kecamatan']), 1, 0, "L");
	# provinsi
$pdf->cell(2.1, 0.35, "d. Provinsi");
$pdf->cell(2.45, 0.35, strtoupper($saksi1['provinsi']), 1, 0, "L");
# garis-garis
$pdf->Line(1, 21.9, 1, 25.2); # kiri
$pdf->Line(20.58, 21.9, 20.58, 25.2); # kanan
$pdf->Line(1, 25.2, 20.58, 25.2); # bawah

# Saksi 2
$pdf->setFont("Arial", "B", 7);
$pdf->setXY(1.3, 25.4);
$pdf->cell(0, 0.35, "SAKSI II");
$pdf->setFont("Arial", "", 7);
 # nik
$pdf->setXY(1.3, 25.75);
$pdf->cell(0, 0.35, "1. NIK");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['nik']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['nik'][$i], 1, 0, "C");
}
	# nama
$pdf->setXY(1.3, 26.1);
$pdf->cell(0, 0.35, "2. Nama Lengkap");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['nama']) ; $i++) { 
	$pdf->cell(0.35, 0.35, strtoupper($saksi2['nama'][$i]), 1, 0, "C");
}
	# tanggal lahir
$pdf->setXY(1.3, 26.45);
$pdf->cell(0, 0.35, "3. Tanggal Lahir/Umur");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
	# tgl
$pdf->cell(0.7, 0.35, "Tgl", 0, 0, "C");
for ($i=0; $i < strlen($saksi2['tanggal_lahir']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['tanggal_lahir'][$i], 1, 0, "C");
}
	#bln
$pdf->cell(0.7, 0.35, "Bln", 0, 0, "C");
for ($i=0; $i < strlen($saksi2['bulan_lahir']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['bulan_lahir'][$i], 1, 0, "C");
}
	# thn
$pdf->cell(0.7, 0.35, "Thn", 0, 0, "C");
for ($i=0; $i < strlen($saksi2['tahun_lahir']); $i++) { 
	$pdf->Cell(0.35, 0.35, $saksi2['tahun_lahir'][$i], 1, 0, "C");
}
	# umur
$pdf->Cell(1.05, 0.35, "Umur", 0, 0, "C");
for ($i=0; $i < strlen($saksi2['umur']); $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['umur'][$i], 1, 0, "C");
}
	# pekrjaan
$pdf->setXY(1.3, 26.80);
$pdf->Cell(0, 0.35, "4. Pekerjaan");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
for ($i=0; $i < strlen($saksi2['pekerjaan']) ; $i++) { 
	$pdf->cell(0.35, 0.35, $saksi2['pekerjaan'][$i], 1, 0, "C");
}
	# alamat
$pdf->setXY(1.3, 27.15);
$pdf->cell(0, 0.35, "5. Alamat");
$pdf->setX(5);
$pdf->cell(0, 0.35, ":");
$pdf->setX(5.6);
$pdf->Cell(14, 0.35, strtoupper($saksi2['alamat']), 1, 0, "L");
	# desa
$pdf->setXY(5.6, 27.50);
$pdf->cell(2.45, 0.35, "a. Desa/Kelurahan");
$pdf->cell(2.45, 0.35, strtoupper($saksi2['desa']), 1, 0, "L");
	# kabupaten
$pdf->Cell(2.1, 0.35, "c. Kab/Kota");
$pdf->cell(2.45, 0.35, strtoupper($saksi2['kabupaten']), 1, 0, "L");
	# kecamatan
$pdf->setXY(5.6, 27.85);
$pdf->Cell(2.45, 0.35, "b. Kecamatan");
$pdf->cell(2.45, 0.35, strtoupper($saksi2['kecamatan']), 1, 0, "L");
	# provinsi
$pdf->cell(2.1, 0.35, "d. Provinsi");
$pdf->cell(2.45, 0.35, strtoupper($saksi2['provinsi']), 1, 0, "L");
# garis-garis
$pdf->Line(1, 25.2, 1, 28.5); # kiri
$pdf->Line(20.58, 25.2, 20.58, 28.5); # kanan
$pdf->Line(1, 28.5, 20.58, 28.5); # bawah

# tanda tangan
$pdf->setXY(17, 28.8);
$pdf->cell(2, 0.35, "Rajagaluhlor, ".tanggalTitimangsa(date('d'), date('m'), date('Y')), 0, 0, "C");
$pdf->SetXY(17, 29.15);
$pdf->cell(2, 0.35, "Kepala Desa / Lurah", 0, 0, "C");
$pdf->setXY(17, 30.5);
$pdf->cell(2, 0.35, "(   H. R I S A N    )", 0, 0, "C");

$pdf->output('I', strtoupper($jenazah['nama_jenazah']).".pdf");
$koneksi->close();
?>