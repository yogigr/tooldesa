<?php


function form_input_f201_bayi()
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-2.01 / Form Keterangan kelahiran</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Bayi / Anak</strong></h5>
            <form method="post" action="?page1=f201-input&step=ibu">
            	<input type="text" name="nama_bayi" class="halfsize form-control custom-input-form" placeholder="Nama Bayi" required>
            	<select name="jenis_kelamin" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>Jenis Kelamin</option>
            		<option value="1">Laki - laki</option>
            		<option value="2">Perempuan</option>
            	</select>
            	<select name="tempat_dilahirkan" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>Tempat dilahirkan</option>
            		<option value="1">RS/RB</option>
            		<option value="2">Puskesmas</option>
            		<option value="3">Polindes</option>
            		<option value="4">Rumah</option>
            		<option value="5">Lainnya</option>
            	</select>
            	<input type="text" name="tempat_kelahiran" class="halfsize form-control custom-input-form" placeholder="Tempat Kelahiran" required>
            	<select name="hari_lahir" class="halfsize form-control custom-input-form">
            		<option value="" disabled selected>Hari Lahir</option>
            		<option value="senin">Senin</option>
            		<option value="selasa">Selasa</option>
            		<option value="rabu">Rabu</option>
            		<option value="kamis">Kamis</option>
            		<option value="jumat">Jum'at</option>
            		<option value="sabtu">Sabtu</option>
            		<option value="minggu">Minggu</option>
            	</select>
            	<input type="text" id="tanggal_lahir_bayi" name="tanggal_lahir" class="halfsize form-control custom-input-form" placeholder="Tanggal Lahir" required>
            	<div class="input-group halfsize">
				  <input type="text" name="waktu_lahir" class="form-control" placeholder="Waktu Lahir [jam].[menit]" aria-describedby="basic-addon2" maxlength="5" required>
				  <span class="input-group-addon" id="basic-addon2">WIB</span>
			  	</div>
            	<select name="jenis_kelahiran" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>Jenis Kelahiran</option>
            		<option value="1">Tunggal</option>
            		<option value="2">Kembar 2</option>
            		<option value="3">Kembar 3</option>
            		<option value="4">Kembar 4</option>
            		<option value="5">Lainnya</option>
            	</select>
            	<select name="kelahiran_ke" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>Kelahiran Ke</option>
            		<option value="1">1</option>
            		<option value="2">2</option>
            		<option value="3">3</option>
            		<option value="4">4</option>
            		<option value="-">-</option>
            	</select>
            	<select name="penolong_kelahiran" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>Penolong Kelahiran</option>
            		<option value="1">Dokter</option>
            		<option value="2">Bidan/Perawat</option>
            		<option value="3">Dukun</option>
            		<option value="4">Lainnya</option>
            	</select>
            	<div class="input-group halfsize">
				  <input type="text" name="berat_bayi" class="form-control" placeholder="Berat Bayi" aria-describedby="basic-addon2" maxlength="2" required>
				  <span class="input-group-addon" id="basic-addon2">Kg</span>
			  	</div>
			  	<div class="input-group halfsize">
				  <input style="position: static" type="text" name="panjang_bayi" class="form-control" placeholder="Panjang Bayi" aria-describedby="basic-addon2" maxlength="2" required>
				  <span class="input-group-addon" id="basic-addon2">Cm</span>
			  	</div>
			  	<div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" name="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>  
	<?php
}

# form ibu 
function form_input_f201_ibu(){
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-2.01 / Form Keterangan kelahiran</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Ibu</strong></h5>
            <form method="post" action="?page1=f201-input&step=ayah">
            	<input type="text" name="nik_ibu" class="form-control halfsize custom-input-form" placeholder="NIK Ibu" maxlength="16" required>
            	<input type="text" name="nama_ibu" class="form-control halfsize custom-input-form" placeholder="Nama Ibu" required>
            	<div class="input-group">
                        <input type="text" name="umur" class="form-control" placeholder="Umur" aria-describedby="basic-addon2" maxlength="2" required>
                        <span class="input-group-addon" id="basic-addon2">Tahun</span>
                  </div>
            	<select name="tanggal_lahir" class="triplesize form-control custom-input-form" required>
            		<option value="" disabled selected>Tanggal Lahir</option>
            		<?php
            		for ($i=1; $i <= 31 ; $i++) { 
            			echo "<option value=\"".fungsiDuaDigit($i)."\">".fungsiDuaDigit($i)."</option>" ;
            		}
            		?>
            	</select>
            	<select name="bulan_lahir" class="triplesize form-control custom-input-form" required>
            		<option value="" disabled selected>Bulan Lahir</option>
            		<?php

            		for ($i=1; $i <= 12 ; $i++) { 
            			echo "<option value=\"".fungsiDuaDigit($i)."\">".konversiBulan($i)."</option>" ;
            		}

            		?>
            	</select>
            	<select name="tahun_lahir" class="triplesize form-control custom-input-form" required>
            		<option value="" disabled selected>Tahun Lahir</option>
            		<?php
            		for ($i=1940; $i <= 2000 ; $i++) { 
            			echo "<option value=\"".$i."\">".$i."</option>" ;
            		}
            		?>
            	</select>
            	<select name="pekerjaan" class="form-control custom-input-form" required>
            		<option value="" disabled selected>Pekerjaan</option>
            		<?php
            		for ($i=1; $i <= 88 ; $i++) { 
            			echo "<option value=\"".$i."\">".konversiKodePekerjaan($i)."</option>" ;
            		}
            		?>
            	</select>
            	<textarea name="alamat" class="form-control custom-input-form" rows="3" placeholder="Alamat" required></textarea>
            	<input type="text" name="desa" class="halfsize form-control custom-input-form" placeholder="Desa/Kelurahan" required>
            	<input type="text" name="kecamatan" class="halfsize form-control custom-input-form" placeholder="kecamatan" required>
            	<input type="text" name="kabupaten" class="halfsize form-control custom-input-form" placeholder="Kabupaten/Kota" required>
            	<input type="text" name="provinsi" class="halfsize form-control custom-input-form" placeholder="Provinsi" required>
            	<select name="kewarganegaraan" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>kewarganegaraan</option>
            		<option value="1">WNI</option>
            		<option value="2">WNA</option>
            	</select>
            	<input type="text" name="kebangsaan" class="halfsize form-control custom-input-form" placeholder="Kebangsaan" required>
            	<input type="text" id="tanggal_catat_kawin"  name="tanggal_kawin" class="form-control custom-input-form" placeholder="TGL Pencatatan Perkawinan" required> 
            	<div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" name="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>  
	<?php
}

# form ayah 
function form_input_f201_ayah(){
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-2.01 / Form Keterangan kelahiran</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Ayah</strong></h5>
            <form method="post" action="?page1=f201-input&step=pelapor">
            	<input type="text" name="no_kk" class="form-control halfsize custom-input-form" placeholder="Nomor Kartu Keluarga" maxlength="16" required>
            	<input type="text" name="nik_ayah" class="form-control halfsize custom-input-form" placeholder="NIK Ayah" maxlength="16" required>
            	<input type="text" name="nama_ayah" class="halfsize form-control custom-input-form" placeholder="Nama Ayah" required>
            	<div class="input-group">
                        <input type="text" name="umur" class="form-control" placeholder="Umur" aria-describedby="basic-addon2" maxlength="2" required>
                        <span class="input-group-addon" id="basic-addon2">Tahun</span>
                  </div>
            	<select name="tanggal_lahir" class="triplesize form-control custom-input-form" required>
            		<option value="" disabled selected>Tanggal Lahir</option>
            		<?php
            		for ($i=1; $i <= 31 ; $i++) { 
            			echo "<option value=\"".fungsiDuaDigit($i)."\">".fungsiDuaDigit($i)."</option>" ;
            		}
            		?>
            	</select>
            	<select name="bulan_lahir" class="triplesize form-control custom-input-form" required>
            		<option value="" disabled selected>Bulan Lahir</option>
            		<?php

            		for ($i=1; $i <= 12 ; $i++) { 
            			echo "<option value=\"".fungsiDuaDigit($i)."\">".konversiBulan($i)."</option>" ;
            		}

            		?>
            	</select>
            	<select name="tahun_lahir" class="triplesize form-control custom-input-form" required>
            		<option value="" disabled selected>Tahun Lahir</option>
            		<?php
            		for ($i=1940; $i <= 2000 ; $i++) { 
            			echo "<option value=\"".$i."\">".$i."</option>" ;
            		}
            		?>
            	</select>
            	<select name="pekerjaan" class="form-control custom-input-form" required>
            		<option value="" disabled selected>Pekerjaan</option>
            		<?php
            		for ($i=1; $i <= 88 ; $i++) { 
            			echo "<option value=\"".$i."\">".konversiKodePekerjaan($i)."</option>" ;
            		}
            		?>
            	</select>
            	<textarea name="alamat" class="form-control custom-input-form" rows="3" placeholder="Alamat" required></textarea>
            	<input type="text" name="desa" class="halfsize form-control custom-input-form" placeholder="Desa/Kelurahan" required>
            	<input type="text" name="kecamatan" class="halfsize form-control custom-input-form" placeholder="kecamatan" required>
            	<input type="text" name="kabupaten" class="halfsize form-control custom-input-form" placeholder="Kabupaten/Kota" required>
            	<input type="text" name="provinsi" class="halfsize form-control custom-input-form" placeholder="Provinsi" required>
            	<select name="kewarganegaraan" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>kewarganegaraan</option>
            		<option value="1">WNI</option>
            		<option value="2">WNA</option>
            	</select>
            	<input type="text" name="kebangsaan" class="halfsize form-control custom-input-form" placeholder="Kebangsaan" required>
            	<div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" name="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>  
	<?php
}

# form pelapor
function form_input_f201_pelapor()
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-2.01 / Form Keterangan kelahiran</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Pelapor</strong></h5>
            <form method="post" action="?page1=f201-input&step=saksi1">
            	<input type="text" name="nik" class="halfsize form-control custom-input-form" placeholder="NIK" maxlength="16" required>
            	<input type="text" name="nama" class="halfsize form-control custom-input-form" placeholder="Nama Lengkap" required>
            	<div class="input-group halfsize">
				  <input type="text" name="umur" class="form-control" placeholder="Umur" aria-describedby="basic-addon2" maxlength="2" required>
				  <span class="input-group-addon" id="basic-addon2">Tahun</span>
			  	</div>
			  	<select name="jenis_kelamin" class="halfsize form-control custom-input-form" required>
			  		<option value="" disabled selected>Jenis Kelamin</option>
			  		<option value="1">Laki-laki</option>
			  		<option value="2">Perempuan</option>
			  	</select>
			  	<select name="pekerjaan" class="form-control custom-input-form" required>
            		<option value="" disabled selected>Pekerjaan</option>
            		<?php
            		for ($i=1; $i <= 88 ; $i++) { 
            			echo "<option value=\"".$i."\">".konversiKodePekerjaan($i)."</option>" ;
            		}
            		?>
            	</select>
            	<textarea name="alamat" class="form-control custom-input-form" rows="3" placeholder="Alamat" required></textarea>
            	<input type="text" name="desa" class="halfsize form-control custom-input-form" placeholder="Desa/Kelurahan" required>
            	<input type="text" name="kecamatan" class="halfsize form-control custom-input-form" placeholder="kecamatan" required>
            	<input type="text" name="kabupaten" class="halfsize form-control custom-input-form" placeholder="Kabupaten/Kota" required>
            	<input type="text" name="provinsi" class="halfsize form-control custom-input-form" placeholder="Provinsi" required>
            	<div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" name="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>  
	<?php
}

# form saksi 1
function form_input_f201_saksi1()
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-2.01 / Form Keterangan kelahiran</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Saksi 1</strong></h5>
            <form method="post" action="?page1=f201-input&step=saksi2">
            	<input type="text" name="nik" class="halfsize form-control custom-input-form" placeholder="NIK" maxlength="16" required>
            	<input type="text" name="nama" class="halfsize form-control custom-input-form" placeholder="Nama Lengkap" required>
            	<div class="input-group halfsize">
				  <input type="text" name="umur" class="form-control" placeholder="Umur" aria-describedby="basic-addon2" maxlength="2" required>
				  <span class="input-group-addon" id="basic-addon2">Tahun</span>
			  	</div>
			  	<select name="pekerjaan" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>Pekerjaan</option>
            		<?php
            		for ($i=1; $i <= 88 ; $i++) { 
            			echo "<option value=\"".$i."\">".konversiKodePekerjaan($i)."</option>" ;
            		}
            		?>
            	</select>
            	<textarea name="alamat" class="form-control custom-input-form" rows="3" placeholder="Alamat" required></textarea>
            	<input type="text" name="desa" class="halfsize form-control custom-input-form" placeholder="Desa/Kelurahan" required>
            	<input type="text" name="kecamatan" class="halfsize form-control custom-input-form" placeholder="kecamatan" required>
            	<input type="text" name="kabupaten" class="halfsize form-control custom-input-form" placeholder="Kabupaten/Kota" required>
            	<input type="text" name="provinsi" class="halfsize form-control custom-input-form" placeholder="Provinsi" required>
            	<div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" name="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>  
	<?php
}

# form saksi 1
function form_input_f201_saksi2()
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-2.01 / Form Keterangan kelahiran</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Saksi 2</strong></h5>
            <form method="post" action="?page1=f201-input&step=proses">
            	<input type="text" name="nik" class="halfsize form-control custom-input-form" placeholder="NIK" maxlength="16" required>
            	<input type="text" name="nama" class="halfsize form-control custom-input-form" placeholder="Nama Lengkap" required>
            	<div class="input-group halfsize">
				  <input type="text" name="umur" class="form-control" placeholder="Umur" aria-describedby="basic-addon2" maxlength="2" required>
				  <span class="input-group-addon" id="basic-addon2">Tahun</span>
			  	</div>
			  	<select name="pekerjaan" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>Pekerjaan</option>
            		<?php
            		for ($i=1; $i <= 88 ; $i++) { 
            			echo "<option value=\"".$i."\">".konversiKodePekerjaan($i)."</option>" ;
            		}
            		?>
            	</select>
            	<textarea name="alamat" class="form-control custom-input-form" rows="3" placeholder="Alamat" required></textarea>
            	<input type="text" name="desa" class="halfsize form-control custom-input-form" placeholder="Desa/Kelurahan" required>
            	<input type="text" name="kecamatan" class="halfsize form-control custom-input-form" placeholder="kecamatan" required>
            	<input type="text" name="kabupaten" class="halfsize form-control custom-input-form" placeholder="Kabupaten/Kota" required>
            	<input type="text" name="provinsi" class="halfsize form-control custom-input-form" placeholder="Provinsi" required>
            	<div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" name="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>  
	<?php
}

?>