<?php


function form_input_f229_jenazah()
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input F-2.29 / Form Keterangan Kematian</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Jenazah</strong></h5>
            <form method="post" action="?page1=f229-input&step=ibu">
            	<input type="text" name="nik_jenazah" class="halfsize form-control custom-input-form" placeholder="NIK Jenazah" maxlength="16" required>
                  <input type="text" name="nama_jenazah" class="halfsize form-control custom-input-form" placeholder="Nama Jenazah" required>
                  <input type="text" name="no_kk" class="halfsize form-control custom-input-form" placeholder="Nomor Kartu Keluarga" maxlength="16" required>
                  <input type="text" name="nama_kepala_keluarga" class="halfsize form-control custom-input-form" placeholder="Nama Kepala Keluarga" required>
            	<select name="jenis_kelamin" class="halfsize form-control custom-input-form" required>
            		<option value="" disabled selected>Jenis Kelamin</option>
            		<option value="1">Laki - laki</option>
            		<option value="2">Perempuan</option>
            	</select>
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
            	<input type="text" name="tempat_kelahiran" class="triplesize form-control custom-input-form" placeholder="Tempat Kelahiran" required>
                  <input type="text" name="kode_prov" class="triplesize form-control custom-input-form" placeholder="Kode Provinsi" maxlength="2" required>
                  <input type="text" name="kode_kab" class="triplesize form-control custom-input-form" placeholder="Kode Kabupaten" maxlength="2" required>
            	<select name="agama" class="halfsize form-control custom-input-form">
            		<option value="" disabled selected>Agama</option>
            		<option value="1">Islam</option>
            		<option value="2">Kristen</option>
            		<option value="3">Katolik</option>
            		<option value="4">Hindu</option>
            		<option value="5">Budha</option>
            		<option value="6">Lainnya</option>
            	</select>
                  <select name="pekerjaan" class="halfsize form-control custom-input-form" required>
                        <option value="" disabled selected>Pekerjaan</option>
                        <?php
                        for ($i=1; $i <= 88 ; $i++) { 
                              echo "<option value=\"".fungsiDuaDigit($i)."\">".konversiKodePekerjaan($i)."</option>" ;
                        }
                        ?>
                  </select>
                  <textarea name="alamat" class="form-control custom-input-form" rows="3" placeholder="Alamat" required></textarea>
                  <input type="text" name="desa" class="halfsize form-control custom-input-form" placeholder="Desa/Kelurahan" required>
                  <input type="text" name="kecamatan" class="halfsize form-control custom-input-form" placeholder="kecamatan" required>
                  <input type="text" name="kabupaten" class="halfsize form-control custom-input-form" placeholder="Kabupaten/Kota" required>
                  <input type="text" name="provinsi" class="halfsize form-control custom-input-form" placeholder="Provinsi" required>
                  <select name="anak_ke" class="halfsize form-control custom-input-form" required>
                        <option value="" disabled selected>Anak Ke</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                  </select>
                  <input type="text" name="tanggal_kematian" id="tanggal_kematian" class="halfsize form-control custom-input-form" placeholder="Tanggal Kematian" required>
                  <input type="text" name="pukul_kematian" class="halfsize form-control custom-input-form" placeholder="Waktu Kematian [jam].[menit]" maxlength="5" required>
                  <select name="sebab_kematian" class="halfsize form-control custom-input-form" required>
                        <option value="" disabled selected>Sebab Kematian</option>
                        <option value="1">Sakit Biasa/Tua</option>
                        <option value="2">Wabah Penyakit</option>
                        <option value="3">Kecelakaan</option>
                        <option value="4">Kriminalitas</option>
                        <option value="5">Bunuh Diri</option>
                        <option value="6">Lainnya</option>
                  </select>
                  <input type="text" name="tempat_kematian" class="halfsize form-control custom-input-form" placeholder="Tempat Kematian" required>
                  <select name="yang_menerangkan" class="halfsize form-control custom-input-form">
                  <option value="" disabled selected>Yang Menerangkan</option>
                        <option value="1">Dokter</option>
                        <option value="2">Tenaga Kesehatan</option>
                        <option value="3">Kepolisian</option>
                        <option value="4">Lainnya</option>
                  </select>  
		    <div class="clear"></div>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" name="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
		</div>
	</div>  
	<?php
}

# form ibu 
function form_input_f229_ibu(){
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input f-2.29 / Form Keterangan Kematian</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Ibu</strong></h5>
            <form method="post" action="?page1=f229-input&step=ayah">
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
            			echo "<option value=\"".fungsiDuaDigit($i)."\">".konversiKodePekerjaan($i)."</option>" ;
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

# form ayah 
function form_input_f229_ayah(){
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input f-2.29 / Form Keterangan kematian</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Ayah</strong></h5>
            <form method="post" action="?page1=f229-input&step=pelapor">
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
            			echo "<option value=\"".fungsiDuaDigit($i)."\">".konversiKodePekerjaan($i)."</option>" ;
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

# form pelapor
function form_input_f229_pelapor()
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input f-2.29 / Form Keterangan Kematian</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Pelapor</strong></h5>
            <form method="post" action="?page1=f229-input&step=saksi1">
            	<input type="text" name="nik" class="halfsize form-control custom-input-form" placeholder="NIK" maxlength="16" required>
            	<input type="text" name="nama" class="halfsize form-control custom-input-form" placeholder="Nama Lengkap" required>
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
            			echo "<option value=\"".fungsiDuaDigit($i)."\">".konversiKodePekerjaan($i)."</option>" ;
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
function form_input_f229_saksi1()
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input f-2.29 / Form Keterangan Kematian</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Saksi 1</strong></h5>
            <form method="post" action="?page1=f229-input&step=saksi2">
            	<input type="text" name="nik" class="halfsize form-control custom-input-form" placeholder="NIK" maxlength="16" required>
                  <input type="text" name="nama" class="halfsize form-control custom-input-form" placeholder="Nama Lengkap" required>
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
                              echo "<option value=\"".fungsiDuaDigit($i)."\">".konversiKodePekerjaan($i)."</option>" ;
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
function form_input_f229_saksi2()
{
	?>
	<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
		<div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
			<h4>Form input f-2.29 / Form Keterangan Kematian</h4>
		</div>
		<div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
			<h5><strong>Saksi 2</strong></h5>
            <form method="post" action="?page1=f229-input&step=proses">
            	<input type="text" name="nik" class="halfsize form-control custom-input-form" placeholder="NIK" maxlength="16" required>
                  <input type="text" name="nama" class="halfsize form-control custom-input-form" placeholder="Nama Lengkap" required>
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
                              echo "<option value=\"".fungsiDuaDigit($i)."\">".konversiKodePekerjaan($i)."</option>" ;
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