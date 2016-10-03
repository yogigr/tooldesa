<?php 

# fungsi konversi kode pekerjaan
function konversiKodePekerjaan($kode)
{
	switch ($kode) {
		case 1 : return "Belum/tidak Bekerja"; break;
		case 2 : return "Mengurus Rumah Tangga"; break;
		case 3 : return "Pelajar/Mahasiswa"; break;
		case 4 : return "Pensiun"; break;
		case 5 : return "Pegawai Negeri Sipil"; break;
		case 6 : return "Tentara Nasional Indonesia"; break;
		case 7 : return "Kepolisian RI"; break;
		case 8 : return "Perdagangan"; break;
		case 9 : return "Petani/Pekebun"; break;
		case 10 : return "Peternak"; break;
		case 11 : return "Nelayan/Perikanan"; break;
		case 12 : return "Industri"; break;
		case 13 : return "Konstruksi"; break;
		case 14 : return "Transportasi"; break;
		case 15 : return "Karyawan Swasta"; break;
		case 16 : return "Karyawan BUMN"; break;
		case 17 : return "Karyawan BUMD"; break;
		case 18 : return "Karyawan Honorer"; break;
		case 19 : return "Buruh Harian Lepas"; break;
		case 20 : return "Buruh Tani/Perkebunan"; break;
		case 21 : return "Buruh Nelayan/Perikanan"; break;
		case 22 : return "Buruh Peternakan"; break;
		case 23 : return "Pembantu Rumah Tangga"; break;
		case 24 : return "Tukang Cukur"; break;
		case 25 : return "Tukang Listrik"; break;
		case 26 : return "Tukang Batu"; break;
		case 27 : return "Tukang Kayu"; break;
		case 28 : return "Tukang Sol Sepatu"; break;
		case 29 : return "Tukang Las/Pandai Besi"; break;
		case 30 : return "Tukang Jahit"; break;
		case 31 : return "Penata Rambut"; break;
		case 32 : return "Penata Rias"; break;
		case 33 : return "Penata Busana"; break;
		case 34 : return "Mekanik"; break;
		case 35 : return "Tukang Gigi"; break;
		case 36 : return "Seniman"; break;
		case 37 : return "Tabib"; break;
		case 38 : return "Paraji"; break;
		case 39 : return "Perancang Busana"; break;
		case 40 : return "Penterjemah"; break;
		case 41 : return "Imam Masjid"; break;
		case 42 : return "Pendeta"; break;
		case 43 : return "Pastur"; break;
		case 44 : return "Wartawan"; break;
		case 45 : return "Ustadz/Mubaligh"; break;
		case 46 : return "Juru Masak"; break;
		case 47 : return "Promotor Acara"; break;
		case 48 : return "Anggota DPR RI"; break;
		case 49 : return "Anggota DPD"; break;
		case 50 : return "Anggota BPK"; break;
		case 51 : return "Presiden"; break;
		case 52 : return "Wakil Presiden"; break;
		case 53 : return "Anggota Mahkamah Konstitusi"; break;
		case 54 : return "Anggota Kabinet/Kementrian"; break;
		case 55 : return "Duta Besar"; break;
		case 56 : return "Gubernur"; break;
		case 57 : return "Wakil Gubernur"; break;
		case 58 : return "Bupati"; break;
		case 59 : return "Wakil Bupati"; break;
		case 60 : return "Walikota"; break;
		case 61 : return "Wakil Walikota"; break;
		case 62 : return "Anggota DPRD Propinsi"; break;
		case 63 : return "Anggota DPRD Kab/Kota"; break;
		case 64 : return "Dosen"; break;
		case 65 : return "Guru"; break;
		case 66 : return "Pilot"; break;
		case 67 : return "Pengacara"; break;
		case 68 : return "Notaris"; break;
		case 69 : return "Arsitek"; break;
		case 70 : return "Akuntan"; break;
		case 71 : return "Konsultan"; break;
		case 72 : return "Dokter"; break;
		case 73 : return "Bidan"; break;
		case 74 : return "Perawat"; break;
		case 75 : return "Apoteker"; break;
		case 76 : return "Psikiater/Psikologi"; break;
		case 77 : return "Penyiar Televisi"; break;
		case 78 : return "Penyiar Radio"; break;
		case 79 : return "Pelaut"; break;
		case 80 : return "Peneliti"; break;
		case 81 : return "Sopir"; break;
		case 82 : return "Pialang"; break;
		case 83 : return "Paranormal"; break;
		case 84 : return "Pedagang"; break;
		case 85 : return "Perangkat Desa"; break;
		case 86 : return "Kepala Desa"; break;
		case 87 : return "Biarawati"; break;
		case 88 : return "Wiraswasta"; break;
	}
}

# kode tanggal
function fungsiDuaDigit($x)
{
	if (strlen($x) == 1) {
		return "0".$x ;
	} else {
		return $x ;
	}
}

# konversi bulan
function konversiBulan($i)
{
	switch ($i) {
		case 1 : return "Januari"; break;
		case 2 : return "Februari"; break;
		case 3 : return "Maret"; break;
		case 4 : return "April"; break;
		case 5 : return "Mei"; break;
		case 6 : return "Juni"; break;
		case 7 : return "Juli"; break;
		case 8 : return "Agustus"; break;
		case 9 : return "September"; break;
		case 10 : return "Oktober"; break;
		case 11 : return "November"; break;
		case 12 : return "Desember"; break;
	}
}

?>