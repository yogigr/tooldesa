<?php
function form_input_f115_step1()
{
    ?>
    
    <div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-1.15 / Permohonan Kartu Keluarga - Step 1</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
            <form method="post" action="?page1=f115-input&step=2">  
                <input type="text" name="jumlah_anggota_keluarga" class="halfsize form-control custom-input-form" placeholder="Jumlah Anggota Keluarga" maxlength="2" required>
                <div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>
    <?php
}
function form_input_f115_step2($jumlah)
{
    ?>
    <div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
        <div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
            <h4>Form input F-1.15 / Permohonan Kartu Keluarga - Step 2</h4>
        </div>
        <div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<form method="post" action="?page1=f115-input&step=3">  
                <input type="text" name="nik_pemohon" class="form-control custom-input-form" placeholder="NIK Pemohon" maxlength=16 required>
                <input type="text" name="nama_pemohon" class="form-control custom-input-form" placeholder="Nama Pemohon" required>
                <input type="text" name="no_kk_semula" class="form-control custom-input-form" placeholder="Nomor KK Semula" maxlength=16 required>
                <input type="text" name="alamat_pemohon" class="form-control custom-input-form" placeholder="Alamat Pemohon" required>
                <input type="text" name="rt" class="halfsize form-control custom-input-form" placeholder="RT" maxlength="3" required>
                <input type="text" name="rw" class="halfsize form-control custom-input-form" placeholder="RW" maxlength="3" required>
                <input type="text" name="desa" class="halfsize form-control custom-input-form" placeholder="Desa" required>
                <input type="text" name="kecamatan" class="halfsize form-control custom-input-form" placeholder="Kecamatan" required>
                <input type="text" name="kabupaten" class="halfsize form-control custom-input-form" placeholder="Kabupaten/Kota" required>
                <input type="text" name="propinsi" class="halfsize form-control custom-input-form" placeholder="Propinsi" required>
                <input type="text" name="kodepos" class="halfsize form-control custom-input-form" placeholder="Kode Pos" maxlength="5" required>
                <input type="text" name="telepon" class="halfsize form-control custom-input-form" placeholder="Telepon" maxlength="8" required>
                <select name="alasan_permohonan" class="halfsize form-control custom-input-form" required>
					<option value="">--------Alasan Permohonan--------</option>
					<option value="1">Membentuk Rumah Tangga Baru</option>
					<option value="2">Kartu Keluarga Hilang/Rusak</option>
					<option value="3">Lainnya</option>
				</select>
                <input type="hidden" name="jumlah_anggota_keluarga" value="<?php echo $jumlah; ?>" class="halfsize form-control custom-input-form" placeholder="Jumlah Anggota Keluarga" maxlength="2">
                <div class="clear"></div>
                <label>Pengisian Daftar Anggota Keluarga Pemohon</label>
                <div class="clear"></div>
                <?php 
                $count = 1;
                while($count <= $jumlah){
					?>
                    <input type="text" name="<?php echo "nik_anggota".$count; ?>" class="triplesize form-control custom-input-form" placeholder="<?php echo "NIK ".$count; ?>" maxlength="16" required>
                    <input type="text" name="<?php echo "nama_anggota".$count; ?>" class="triplesize form-control custom-input-form" placeholder="<?php echo "Nama ".$count; ?>" required>
                    <input type="text" name="<?php echo "shdk".$count; ?>" class="triplesize form-control custom-input-form" placeholder="<?php echo "SHDK ".$count; ?>" maxlength="2" required>
                    <?php
                    $count++;
                }
                ?>
                <a href="?page1=f115-input&step=1" class="btn btn-danger">Sebelumnya</a>
                <input type="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
        </div>
    </div>
    <?php
}
?>
