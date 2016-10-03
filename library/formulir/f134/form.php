<?php
function form_input_f134_step1()
{
	
	if(isset($_SESSION['no_form'])){$no_form = $_SESSION['no_form'];}else{$no_form="";}
	if(isset($_SESSION['no_kk'])){$no_kk = $_SESSION['no_kk'];}else{$no_kk="";}
	if(isset($_SESSION['nama_kepala_keluarga'])){$nama_kepala_keluarga = $_SESSION['nama_kepala_keluarga'];}else{$nama_kepala_keluarga="";}
	if(isset($_SESSION['alamat'])){$alamat = $_SESSION['alamat'];}else{$alamat="";}
	if(isset($_SESSION['rt'])){$rt = $_SESSION['rt'];}else{$rt="";}
	if(isset($_SESSION['rw'])){$rw = $_SESSION['rw'];}else{$rw="";}
	if(isset($_SESSION['dusun'])){$dusun = $_SESSION['dusun'];}else{$dusun="";}
	if(isset($_SESSION['desa'])){$desa	= $_SESSION['desa'];}else{$desa="";}
	if(isset($_SESSION['kecamatan'])){$kecamatan = $_SESSION['kecamatan'];}else{$kecamatan="";}
	if(isset($_SESSION['kabupaten'])){$kabupaten = $_SESSION['kabupaten'];}else{$kabupaten="";}
	if(isset($_SESSION['provinsi'])){$provinsi = $_SESSION['provinsi'];}else{$provinsi="";}
	if(isset($_SESSION['kodepos'])){$kodepos = $_SESSION['kodepos'];}else{$kodepos="";}
	if(isset($_SESSION['telepon'])){$telepon = $_SESSION['telepon'];}else{$telepon="";}
	if(isset($_SESSION['nik_pemohon'])){$nik_pemohon = $_SESSION['nik_pemohon'];}else{$nik_pemohon="";}
	if(isset($_SESSION['nama_pemohon'])){$nama_pemohon = $_SESSION['nama_pemohon'];}else{$nama_pemohon="";}
    ?>
    <div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-1.34 / Permohonan Pindah WNI - Step 1</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Data Daerah Asal</strong></h5>
            <form method="post" action="?page1=f134-input&step=2">  
                <input type="text" name="no_form" value="<?php echo $no_form; ?>" class="halfsize form-control custom-input-form" placeholder="Nomor Formulir" maxlength="20" required>
				<input type="text" name="no_kk" value="<?php echo $no_kk; ?>" class="halfsize form-control custom-input-form" placeholder="Nomor Kartu Keluarga" maxlength="16" required>
				<input type="text" name="nama_kepala_keluarga" value="<?php echo $nama_kepala_keluarga; ?>" class="halfsize form-control custom-input-form" placeholder="Nama Kepala Keluarga" maxlength="25" required>
				<input type="text" name="alamat" value="<?php echo $alamat; ?>" class="halfsize form-control custom-input-form" placeholder="Alamat" maxlength="50" required>
				<input type="text" name="rt" value="<?php echo $rt; ?>" class="halfsize form-control custom-input-form" placeholder="RT" maxlength="3" required>
				<input type="text" name="rw" value="<?php echo $rw; ?>" class="halfsize form-control custom-input-form" placeholder="RW" maxlength="3" required>
				<input type="text" name="dusun" value="<?php echo $dusun; ?>" class="halfsize form-control custom-input-form" placeholder="Dusun" maxlength="20" required>
                <input type="text" name="desa" value="<?php echo $desa; ?>" class="halfsize form-control custom-input-form" placeholder="Desa / Kelurahan" maxlength="20" required>
				<input type="text" name="kecamatan" value="<?php echo $kecamatan; ?>" class="halfsize form-control custom-input-form" placeholder="Kecamatan" maxlength="20" required>
				<input type="text" name="kabupaten" value="<?php echo $kabupaten; ?>" class="halfsize form-control custom-input-form" placeholder="Kabupaten" maxlength="20" required>
				<input type="text" name="provinsi" value="<?php echo $provinsi; ?>" class="halfsize form-control custom-input-form" placeholder="Provinsi" maxlength="20" required>
				<input type="text" name="kodepos" value="<?php echo $kodepos; ?>" class="halfsize form-control custom-input-form" placeholder="Kodepos" maxlength="5" required>
				<input type="text" name="telepon" value="<?php echo $telepon; ?>" class="halfsize form-control custom-input-form" placeholder="Telepon" maxlength="15" required>
				<div class="clear"></div>
				<input type="text" name="nik_pemohon" value="<?php echo $nik_pemohon; ?>" class="halfsize form-control custom-input-form" placeholder="NIK Pemohon" maxlength="16" required>
				<input type="text" name="nama_pemohon" value="<?php echo $nama_pemohon; ?>" class="halfsize form-control custom-input-form" placeholder="Nama Pemohon" maxlength="25" required>
				<div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>
    <?php
}

function form_input_f134_step2()
{
	if(isset($_SESSION['alasan_pindah'])){$alasan_pindah = $_SESSION['alasan_pindah'];}else{$alasan_pindah="";}
	if(isset($_SESSION['alamat_tujuan'])){$alamat_tujuan = $_SESSION['alamat_tujuan'];}else{$alamat_tujuan="";}
	if(isset($_SESSION['rt_tujuan'])){$rt_tujuan = $_SESSION['rt_tujuan'];}else{$rt_tujuan="";}
	if(isset($_SESSION['rw_tujuan'])){$rw_tujuan = $_SESSION['rw_tujuan'];}else{$rw_tujuan="";}
	if(isset($_SESSION['dusun_tujuan'])){$dusun_tujuan = $_SESSION['dusun_tujuan'];}else{$dusun_tujuan="";}
	if(isset($_SESSION['desa_tujuan'])){$desa_tujuan = $_SESSION['desa_tujuan'];}else{$desa_tujuan="";}
	if(isset($_SESSION['kecamatan_tujuan'])){$kecamatan_tujuan = $_SESSION['kecamatan_tujuan'];}else{$kecamatan_tujuan="";}
	if(isset($_SESSION['kabupaten_tujuan'])){$kabupaten_tujuan = $_SESSION['kabupaten_tujuan'];}else{$kabupaten_tujuan="";}
	if(isset($_SESSION['provinsi_tujuan'])){$provinsi_tujuan = $_SESSION['provinsi_tujuan'];}else{$provinsi_tujuan="";}
	if(isset($_SESSION['kodepos_tujuan'])){$kodepos_tujuan = $_SESSION['kodepos_tujuan'];}else{$kodepos_tujuan="";}
	if(isset($_SESSION['telepon_tujuan'])){$telepon_tujuan = $_SESSION['telepon_tujuan'];}else{$telepon_tujuan="";}
	if(isset($_SESSION['jenis_kepindahan'])){$jenis_kepindahan = $_SESSION['jenis_kepindahan'];}else{$jenis_kepindahan="";}
	if(isset($_SESSION['status_kk_yang_tidak_pindah'])){$status_kk_yang_tidak_pindah = $_SESSION['status_kk_yang_tidak_pindah'];}else{$status_kk_yang_tidak_pindah="";}
	if(isset($_SESSION['status_kk_yang_pindah'])){$status_kk_yang_pindah = $_SESSION['status_kk_yang_pindah'];}else{$status_kk_yang_pindah="";}
	if(isset($_SESSION['jumlah_anggota_keluarga_yang_pindah'])){$jumlah_anggota_keluarga_yang_pindah = $_SESSION['jumlah_anggota_keluarga_yang_pindah'];}else{$jumlah_anggota_keluarga_yang_pindah="";}
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-1.34 / Permohonan Pindah WNI - Step 2</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Data Kepindahan</strong></h5>
            <form method="post" action="?page1=f134-input&step=3">  
                <select name="alasan_pindah" value="<?php echo $alasan_pindah; ?>" class="halfsize form-control custom-input-form" required>
					<option value="">-------------Alasan Pindah--------------</option>
					<option value="1">Pekerjaan</option>
					<option value="2">Pendidikan</option>
					<option value="3">Keamanan</option>
					<option value="4">Kesehatan</option>
					<option value="5">Perumahan</option>
					<option value="6">Keluarga</option>
					<option value="7">Lainnya</option>
				</select>
				<input type="text" name="alamat_tujuan" value="<?php echo $alamat_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="Alamat Tujuan" maxlength="50" required>
				<input type="text" name="rt_tujuan" value="<?php echo $rt_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="RT" maxlength="3" required>
				<input type="text" name="rw_tujuan" value="<?php echo $rw_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="RW" maxlength="3" required>
				<input type="text" name="dusun_tujuan" value="<?php echo $dusun_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="Dusun" maxlength="20" required>
                <input type="text" name="desa_tujuan" value="<?php echo $desa_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="Desa / Kelurahan" maxlength="20" required>
				<input type="text" name="kecamatan_tujuan" value="<?php echo $kecamatan_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="Kecamatan" maxlength="20" required>
				<input type="text" name="kabupaten_tujuan" value="<?php echo $kabupaten_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="Kabupaten" maxlength="20" required>
				<input type="text" name="provinsi_tujuan" value="<?php echo $provinsi_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="Provinsi" maxlength="20" required>
				<input type="text" name="kodepos_tujuan" value="<?php echo $kodepos_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="Kodepos" maxlength="5" required>
				<input type="text" name="telepon_tujuan" value="<?php echo $telepon_tujuan; ?>" class="halfsize form-control custom-input-form" placeholder="Telepon" maxlength="15" required>
				<select name="jenis_kepindahan" value="<?php echo $jenis_kepindahan; ?>" class="halfsize form-control custom-input-form" required>
					<option value="">-------------Jenis Kepindahan--------------</option>
					<option value="1">Kepala Keluarga</option>
					<option value="2">Kepala Keluarga dan Seluruh Anggota Keluarga</option>
					<option value="3">Kepala Keluarga dan Sebagian Anggota Keluarga</option>
					<option value="4">Anggota Keluarga</option>
				</select>
				<select name="status_kk_yang_tidak_pindah" value="<?php echo $status_kk_yang_tidak_pindah; ?>" class="halfsize form-control custom-input-form" required>
					<option value="">Status KK bagi yg tidak pindah</option>
					<option value="1">1.Numpang KK</option>
					<option value="2">2.Membuat KK Baru </option>
					<option value="3">3.Nomor KK tetap</option>
					<option value="-">-</option>
				</select>
				<select name="status_kk_yang_pindah" value="<?php echo $status_kk_yang_pindah; ?>" class="halfsize form-control custom-input-form" required>
					<option value="">Status KK bagi yg pindah</option>
					<option value="1">1.Numpang KK</option>
					<option value="2">2.Membuat KK Baru </option>
					<option value="3">3.Nomor KK tetap</option>
				</select>
				<input type="text" name="jumlah_anggota_keluarga_yang_pindah" value="<?php echo $jumlah_anggota_keluarga_yang_pindah; ?>" class="halfsize form-control custom-input-form" placeholder="Jumlah Anggota Keluarga Yg Pindah" maxlength="2" required>
				
				<div class="clear"></div>
                <a href="?page1=f134-input&step=1" class="btn btn-danger">Sebelumnya</a>
                <input type="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>
	<?php
}

function form_input_f134_step3($jumlah_anggota_keluarga_yang_pindah)
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-1.29 / Permohonan Pindah WNI - Step 3</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Anggota Keluarga yang Pindah</strong></h5>
            <form method="post" action="?page1=f134-input&step=4">
				<input type="hidden" name="jumlah_anggota_keluarga_yang_pindah" value="<?php echo $jumlah_anggota_keluarga_yang_pindah; ?>">
                <?php 
				
				for($i=1; $i<=$jumlah_anggota_keluarga_yang_pindah; $i++){
					?>
					<input type="text" name="<?php echo "nik_anggota".$i; ?>" class="halfsize form-control custom-input-form" placeholder="<?php echo "NIK ".$i; ?>" maxlength="16" required>
					<input type="text" name="<?php echo "nama_anggota".$i; ?>" class="halfsize form-control custom-input-form" placeholder="<?php echo "Nama Anggota ".$i; ?>" required>
					<input type="text" id="<?php echo "berlaku_ktp".$i; ?>" name="<?php echo "batas_berlaku_ktp".$i; ?>" class="halfsize form-control custom-input-form" placeholder="<?php echo "Batas Berlaku KTP Anggota ".$i; ?>" required>
					<input type="text" name="<?php echo "shdk".$i; ?>" class="halfsize form-control custom-input-form" placeholder="<?php echo "SHDK ".$i; ?>" maxlength="2" required>
					<?php
				}
				
				?>
				
				<div class="clear"></div>
                <a href="?page1=f134-input&step=2" class="btn btn-danger">Sebelumnya</a>
                <input type="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>
	<?php
}

?> 