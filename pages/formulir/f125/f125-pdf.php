<?php

require_once("assets/fpdf/fpdf.php");
require_once('library/formulir/kumpulan_fungsi.php');

$no_form = $_GET['no_form'];

# akses database
$koneksi = db_connect();
$sql = "select * from pemohon_pindah where no_form ='".$no_form."'";
$result = $koneksi->query($sql);
$row = $result->fetch_array();

$no_kk = $row['no_kk'];
$nama_kepala_keluarga = $row['nama_kepala_keluarga'];
$alamat = $row['alamat'];
$rt = $row['rt'];
$rw = $row['rw'];
$dusun = $row['dusun'];
$desa = $row['desa'];
$kecamatan = $row['kecamatan'];
$kabupaten = $row['kabupaten'];
$provinsi = $row['provinsi'];
$kodepos = $row['kodepos'];
$telepon = $row['telepon'];
$nik_pemohon = $row['nik_pemohon'];
$nama_pemohon = $row['nama_pemohon'];
$alasan_pindah = $row['alasan_pindah'];
$alamat_tujuan = $row['alamat_tujuan'];
$rt_tujuan = $row['rt_tujuan'];
$rw_tujuan = $row['rw_tujuan'];
$dusun_tujuan = $row['dusun_tujuan'];
$desa_tujuan = $row['desa_tujuan'];
$kecamatan_tujuan = $row['kecamatan_tujuan'];
$kabupaten_tujuan = $row['kabupaten_tujuan'];
$provinsi_tujuan = $row['provinsi_tujuan'];
$kodepos_tujuan = $row['kodepos_tujuan'];
$telepon_tujuan = $row['telepon_tujuan'];
$jenis_kepindahan = $row['jenis_kepindahan'];
$status_kk_yang_tidak_pindah = $row['status_kk_yang_tidak_pindah'];
$status_kk_yang_pindah = $row['status_kk_yang_pindah'];
$jumlah_anggota_keluarga_yang_pindah = $row['jumlah_anggota_keluarga_yang_pindah']; 

$pdf = new FPDF('P', 'cm', array(21.59, 33));
$pdf->addPage();
$pdf->SetTitle($nama_pemohon);

# header
$pdf->setFont('Arial', 'B', 14);
$pdf->cell(14.5);
$pdf->cell(5, 1, 'F-1.25', 1, 1, 'C');

#garis-garis
$pdf->setLineWidth(0.03);
$pdf->line(1, 2.5, 20.5, 2.5);
$pdf->setLineWidth(0.08);
$pdf->line(1, 2.6, 20.5, 2.6);

# propinsi, kab, kec, desa
$kd_prop = '32';
$nama_prop = 'Jawa Barat';
$kd_kab = '10';
$nama_kab = 'Majalengka';
$kd_kec = '09';
$nama_kec = 'Rajagaluh';
$kd_des = '2010';
$nama_des = 'Rajagaluhlor';

$pdf->setLineWidth(0.02);

#propinsi
$pdf->setXY(1, 3);
$pdf->setFont('Arial', '', 7);
$pdf->cell(0.5,0.5, "PEMERINTAH PROPINSI");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
# kode prop
for($i=0; $i<strlen($kd_prop); $i++){
	if($i == strlen($kd_prop)-1){
		$pdf->cell(0.5, 0.5, $kd_prop[$i], 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.5, 0.5, $kd_prop[$i], 'LTB', 0, 'C');
}
$pdf->setX(8.6);
# nama prop
$pdf->cell(0, 0.5, strtoupper($nama_prop), 1, 0, 'L');
# kabupaten
$pdf->setXY(1, 3.6);
$pdf->cell(0.5,0.5, "PEMERINTAH KABUPATEN / KOTA");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
	#kode kab
for($i=0; $i<strlen($kd_kab); $i++){
	if($i == strlen($kd_kab)-1){
		$pdf->cell(0.5, 0.5, $kd_kab[$i], 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.5, 0.5, $kd_kab[$i], 'LTB', 0, 'C');
}
	#nama kab
$pdf->setX(8.6);
$pdf->cell(0, 0.5, strtoupper($nama_kab), 1, 0, 'L');
# kecamatan
$pdf->setXY(1, 4.2);
$pdf->setFont('Arial', '', 7);
$pdf->cell(0.5,0.5, "KECAMATAN");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
#kode kec
for($i=0; $i<strlen($kd_kec); $i++){
	if($i == strlen($kd_kec)-1){
		$pdf->cell(0.5, 0.5, $kd_kec[$i], 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.5, 0.5, $kd_kec[$i], 'LTB', 0, 'C');
}
	#nama kec
$pdf->setX(8.6);
$pdf->cell(0, 0.5, strtoupper($nama_kec), 1, 0, 'L');
# desa
$pdf->setXY(1, 4.8);
$pdf->setFont('Arial', '', 7);
$pdf->cell(0.5,0.5, "KELURAHAN / DESA");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
#kode desa
for($i=0; $i<strlen($kd_des); $i++){
	if($i == strlen($kd_des)-1){
		$pdf->cell(0.5, 0.5, $kd_des[$i], 1, 0, 'C');
		break;
	} 
	$pdf->cell(0.5, 0.5, $kd_des[$i], 'LTB', 0, 'C');
}
	#nama desa
$pdf->setX(8.6);
$pdf->cell(0, 0.5, strtoupper($nama_des), 1, 0, 'L');
# dusun
$pdf->setXY(1, 5.4);
$pdf->setFont('Arial', '', 7);
$pdf->cell(0.5,0.5, "DUSUN/DUKUH/KAMPUNG");
$pdf->setX(6);
$pdf->cell(0.5,0.5,':');
$pdf->setX(6.3);
	#nama dUSUN
$pdf->cell(0, 0.5, strtoupper($dusun), 1, 0, 'L');

# title
$pdf->setFont('Arial', 'B', 11);
$pdf->setXY(1, 6);
$pdf->cell(0, 0.5, "FORMULIR PERMOHONAN PINDAH WNI", 0, 0, 'C');
$pdf->setFont('Arial', 'B', 9);
$pdf->setXY(1, 6.6);
$pdf->cell(0, 0, "Antar Desa/Kelurahan Dalam Satu Kecamatan", 0, 0, 'C');
$pdf->setXY(1, 6.9);
$pdf->setFont('Arial', 'B', 11);
$pdf->cell(0, 0.5, "No. ".$no_form, 0, 0, 'C');

#data daerah asal
$pdf->setFont('Arial', 'B', 9);
$pdf->setXY(1, 7.5);
$pdf->cell(0, 0.5, "DATA DAERAH ASAL", 0, 0, "L");
# no kk
$pdf->setFont('Arial', '', 7);
$pdf->setXY(1, 8.1);
$pdf->cell(0, 0.5, "1. Nomor Kartu Keluarga");
$pdf->setX(6.3);
for($i=0; $i<strlen($no_kk);$i++){
	if($i == strlen($no_kk)-1){
		$pdf->cell(0.5, 0.5, $no_kk[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $no_kk[$i], "LTB", 0, "C");
}

#nama kepala keluarga
$pdf->setXY(1, 8.7);
$pdf->cell(0, 0.5, "2. Nama Kepala Keluarga");
$pdf->setX(6.3);
$pdf->cell(0, 0.5, strtoupper($nama_kepala_keluarga), 1, 0, "L");

# Alamat
$pdf->setXY(1, 9.3);
$pdf->cell(0, 0.5, "3. Alamat");
$pdf->setX(6.3);
$pdf->cell(7, 0.5, strtoupper($alamat), 1);
#rt
$pdf->SetX(13.3);
$pdf->cell(0, 0.5, "RT");
$pdf->setX(13.9);
for($i=0; $i<strlen($rt); $i++){
	if($i == strlen($rt)-1){
		$pdf->cell(0.5, 0.5, $rt[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $rt[$i], "LTB", 0, "C");
}
#rw
$pdf->setX(15.4);
$pdf->cell(0, 0.5, "RW");
$pdf->setX(16.1);
for($i=0; $i<strlen($rw); $i++){
	if($i == strlen($rw)-1){
		$pdf->cell(0.5, 0.5, $rw[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $rw[$i], "LTB", 0, "C");
}

#dusun
$pdf->setXY(6.18, 9.9);
$pdf->cell(0, 0.5, "Dusun/Dukuh/Kampung");
$pdf->setX(9.5);
$pdf->cell(0, 0.5, strtoupper($dusun), 1, 0);

#desa
$pdf->setXY(2, 10.5);
$pdf->cell(0, 0.5, "a. Desa/Kelurahan");
$pdf->setX(6.3);
$pdf->cell(6, 0.5, strtoupper($desa), 1, 0);
#kecamatan
$pdf->setXY(2, 11.1);
$pdf->cell(0, 0.5, "b. Kecamatan");
$pdf->setX(6.3);
$pdf->cell(6, 0.5, strtoupper($kecamatan), 1, 0);
#kabuptaen
$pdf->setXY(13, 10.5);
$pdf->cell(0, 0.5, "c. Kab/Kota");
$pdf->setX(15);
$pdf->cell(0, 0.5, strtoupper($kabupaten), 1, 0);
#provinsi
$pdf->setXY(13, 11.1);
$pdf->cell(0, 0.5, "d. Provinsi");
$pdf->setX(15);
$pdf->cell(0, 0.5, strtoupper($provinsi), 1, 0);
#kodepos
$pdf->setXY(6.18, 11.7);
$pdf->cell(0, 0.5, "Kode Pos");
$pdf->setX(7.5);
for($i=0; $i<strlen($kodepos); $i++){
	if($i == strlen($kodepos)-1){
		$pdf->cell(0.5, 0.5, $kodepos[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $kodepos[$i], "LTB", 0, "C");
}
#teltepon
$pdf->setX(13);
$pdf->cell(0, 0.5, "Telepon");
$pdf->setX(14.6);
for($i=0; $i<strlen($telepon); $i++){
	if($i == strlen($telepon)-1){
		$pdf->cell(0.5, 0.5, $telepon[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $telepon[$i], "LTB", 0, "C");
}
#nik pemohon
$pdf->setXY(1, 12.3);
$pdf->cell(0, 0.5, "4. NIK Pemohon");
$pdf->setX(6.3);
for($i=0; $i<strlen($nik_pemohon); $i++){
	if($i == strlen($nik_pemohon)-1){
		$pdf->cell(0.5, 0.5, $nik_pemohon[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $nik_pemohon[$i], "LTB", 0, "C");
}
#nama pemohon
$pdf->setXY(1, 12.9);
$pdf->cell(0, 0.5, "5. Nama Lengkap");
$pdf->setX(6.3);
$pdf->cell(0, 0.5, strtoupper($nama_pemohon), 1, 0);


# DATA KEPINDAHAN
$pdf->setXY(1, 13.5);
$pdf->setFont("Arial", "B", 9);
$pdf->cell(0, 0.5, "DATA KEPINDAHAN");

#alasan pindah
$pdf->setFont("Arial", "", 7);
$pdf->setXY(1, 14.1);
$pdf->cell(0, 0.5, "1. Alasan Pindah");
$pdf->setX(6.3);
$pdf->cell(0.5, 0.5, $alasan_pindah, 1, 0, "C");
$pdf->setX(7.5);
$pdf->cell(0, 0, "1. Pekerjaan");
$pdf->setX(9.7);
$pdf->cell(0, 0, "3. Keamanan");
$pdf->setX(11.9);
$pdf->cell(0, 0, "5. Perumahan");
$pdf->setX(14.1);
$pdf->cell(0, 0, "7. Lainnya (Sebutkan)");
$pdf->setXY(7.5, 14.5);
$pdf->cell(0, 0, "2. Pendidikan");
$pdf->setX(9.7);
$pdf->cell(0, 0, "4. Kesehatan");
$pdf->setX(11.9);
$pdf->cell(0, 0, "6. Keluarga");
$pdf->setX(14.1);
$pdf->cell(0, 0, "...................................");

# alamat tujuan
$pdf->setXY(1, 14.7);
$pdf->cell(0, 0.5, "2. Alamat Tujuan Pindah");
$pdf->setX(6.3);
$pdf->cell(7, 0.5, strtoupper($alamat_tujuan), 1);
#rt tujuan
$pdf->SetX(13.3);
$pdf->cell(0, 0.5, "RT");
$pdf->setX(13.9);
for($i=0; $i<strlen($rt_tujuan); $i++){
	if($i == strlen($rt_tujuan)-1){
		$pdf->cell(0.5, 0.5, $rt_tujuan[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $rt_tujuan[$i], "LTB", 0, "C");
}
#rw tujuan
$pdf->setX(15.4);
$pdf->cell(0, 0.5, "RW");
$pdf->setX(16.1);
for($i=0; $i<strlen($rw_tujuan); $i++){
	if($i == strlen($rw_tujuan)-1){
		$pdf->cell(0.5, 0.5, $rw_tujuan[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $rw_tujuan[$i], "LTB", 0, "C");
}

# Dusun tujuan
$pdf->setXY(6.18, 15.3);
$pdf->cell(0, 0.5, "Dusun/Dukuh/Kampung");
$pdf->setX(9.5);
$pdf->cell(0, 0.5, strtoupper($dusun_tujuan), 1, 0);
# desa tujuan
$pdf->setXY(2, 15.9);
$pdf->cell(0, 0.5, "a. Desa/Kelurahan");
$pdf->setX(6.3);
$pdf->cell(6, 0.5, strtoupper($desa_tujuan), 1, 0);
#kecamatan tujuan
$pdf->setXY(2, 16.5);
$pdf->cell(0, 0.5, "b. Kecamatan");
$pdf->setX(6.3);
$pdf->cell(6, 0.5, strtoupper($kecamatan_tujuan), 1, 0);
#kabuptaen tujuan
$pdf->setXY(13, 15.9);
$pdf->cell(0, 0.5, "c. Kab/Kota");
$pdf->setX(15);
$pdf->cell(0, 0.5, strtoupper($kabupaten_tujuan), 1, 0);
#provinsi
$pdf->setXY(13, 16.5);
$pdf->cell(0, 0.5, "d. Provinsi");
$pdf->setX(15);
$pdf->cell(0, 0.5, strtoupper($provinsi_tujuan), 1, 0);
#kodepos tujuan
$pdf->setXY(6.18, 17.1);
$pdf->cell(0, 0.5, "Kode Pos");
$pdf->setX(7.5);
for($i=0; $i<strlen($kodepos_tujuan); $i++){
	if($i == strlen($kodepos_tujuan)-1){
		$pdf->cell(0.5, 0.5, $kodepos_tujuan[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $kodepos_tujuan[$i], "LTB", 0, "C");
}
#teltepon tujuan
$pdf->setX(13);
$pdf->cell(0, 0.5, "Telepon");
$pdf->setX(14.6);
for($i=0; $i<strlen($telepon_tujuan); $i++){
	if($i == strlen($telepon_tujuan)-1){
		$pdf->cell(0.5, 0.5, $telepon_tujuan[$i], 1, 0, "C");
		break;
	}
	$pdf->cell(0.5, 0.5, $telepon_tujuan[$i], "LTB", 0, "C");
}

# jenis kepindahan
$pdf->setXY(1, 17.7);
$pdf->cell(0, 0.5, "3. Jenis Kepindahan");
$pdf->setX(6.3);
$pdf->cell(0.5, 0.5, $jenis_kepindahan, 1, 0, "C");
$pdf->setX(7.5);
$pdf->cell(0, 0.2, "1. Kep. Keluarga");
$pdf->setX(15);
$pdf->cell(0, 0.2, "3. Kep. Keluarga dan Sebagian Anggota Keluarga");
$pdf->setXY(7.5, 18);
$pdf->cell(0, 0.2, "2. Kep. Keluarga dan Seluruh Anggota Keluarga");
$pdf->setX(15);
$pdf->cell(0, 0.2, "4. Anggota Keluarga");

# status kk bagi yang tidak pindah
$pdf->setXY(1, 18.3);
$pdf->cell(0, 0.5, "4. Status KK Bagi Yang Tidak Pindah");
$pdf->setX(6.3);
$pdf->cell(0.5, 0.5, $status_kk_yang_tidak_pindah, 1, 0, "C");
$pdf->setX(7.5);
$pdf->cell(0, 0.5, "1. Numpang KK");
$pdf->setX(11);
$pdf->cell(0, 0.5, "2. Membuat KK Baru");
$pdf->setX(15);
$pdf->cell(0, 0.5, "3. Nomor KK Tetap");

# status kk bagi yang pindah
$pdf->setXY(1, 18.9);
$pdf->cell(0, 0.5, "5. Status KK Bagi Yang Pindah");
$pdf->setX(6.3);
$pdf->cell(0.5, 0.5, $status_kk_yang_pindah, 1, 0, "C");
$pdf->setX(7.5);
$pdf->cell(0, 0.5, "1. Numpang KK");
$pdf->setX(11);
$pdf->cell(0, 0.5, "2. Membuat KK Baru");
$pdf->setX(15);
$pdf->cell(0, 0.5, "3. Nomor KK Tetap");

# keluarga yang pindah
$pdf->setXY(1, 19.5);
$pdf->cell(0, 0.5, "6. Keluarga Yang Pindah");
# header
$pdf->setXY(1, 20.1);
$pdf->setFillColor(50, 50, 50);
$pdf->SetTextColor(255, 255, 255);
$pdf->cell(1, 1, "NO", 1, 0, 'C', true);
$pdf->cell(8, 1, "NIK", "TRB", 0, "C", true);
$pdf->cell(5, 1, "NAMA", "TRB", 0, "C", true);
$pdf->cell(3.5, 1, "MASA BERLAKU KTP S/D", "TRB", 0, "C", true);
$pdf->cell(2, 1, "SHDK", "TRB", 1, "C", true);
#konten
$pdf->SetTextColor(0, 0, 0);
$koneksi = db_connect();
$sql = "select * from penduduk_pindahan where no_form='".$no_form."'";
$result = $koneksi->query($sql);
$no = 1;
while($row = $result->fetch_array()){
	#no
	$pdf->cell(1, 0.5, $no, "LBR", 0, "C");
	#nik
	for($i=0; $i<strlen($row['nik']); $i++){
		$pdf->cell(0.5, 0.5, $row['nik'][$i], "BR", 0, "C");
	}
	# nama
	$pdf->cell(5, 0.5, strtoupper($row['nama']), "BR", 0, "L");
	#masa berlaku ktp
	$pdf->cell(3.5, 0.5, formattanggalindo($row['batas_berlaku_ktp']), "BR", 0, "C");
	#shdk
	$pdf->cell(2, 0.5, $row['shdk'], "BR", 1, "C");
	$no++;
}

# tanda tangan
$pdf->setFont("Arial", "", 9);
$pdf->setXY(1, 27);
$pdf->cell(0, 0.5, "Rajagaluhlor, ".tanggalTitimangsa(date('d'), date('m'), date('Y')), 0, 1, "R");
$pdf->setX(2);
$pdf->cell(5, 0.5, "Petugas Registrasi", 0, 0, "C");
$pdf->cell(20, 0.5, "Pemohon", 0, 1, "C");
$pdf->setXY(2, 29);
$pdf->cell(5, 0.5, "(....................................)", 0, 0, "C");
$pdf->cell(20, 0.5, "(....................................)", 0, 1, "C");

# keterangan
$pdf->setXY(1, 29.5);
$pdf->setFont("Arial", "B", 7);
$pdf->cell(0, 0.5, "Keterangan :");
$pdf->setXY(1, 29.8);
$pdf->setFont("Arial", "", 7);
$pdf->cell(0, 0.5, "*) Diisi Oleh Petugas");


$filename = strtoupper($no_form)."_F125.pdf" ;
$pdf->output("I", $filename);
?>