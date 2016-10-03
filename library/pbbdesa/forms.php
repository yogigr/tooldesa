<?php  

function form_input_wajib_pajak()
{
	?>
	<div id="pbbdesa-content" class="col-md-12">
		
			<h4>Form Input PBB DESA</h4>
			<form method="post" action="?page1=pbbdesa-input&page2=proses" class="col-md-6">  
			  <input type="text" name="nop" class="form-control custom-input-form" placeholder="NOP" maxlength=18 required>
			  <input type="text" name="nama" class="form-control custom-input-form" placeholder="Nama Wajib Pajak" required>
			  <div class="input-group">
				  <input type="text" name="luas_tanah" class="form-control" placeholder="Luas Tanah" aria-describedby="basic-addon2">
				  <span class="input-group-addon" id="basic-addon2">M&sup2;</span>
			  </div>
			  <div class="input-group">
				  <input type="text" name="luas_bangunan" class="form-control" placeholder="Luas Bangunan" aria-describedby="basic-addon2">
				  <span class="input-group-addon" id="basic-addon2">M&sup2;</span>
			  </div>
			  <div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">Rp</span>
				  <input type="text" name="njop_tanah" class="form-control" placeholder="NJOP Tanah" aria-describedby="basic-addon1">
			  </div>
			  <div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">Rp</span>
				  <input type="text" name="njop_bangunan" class="form-control" placeholder="NJOP Bangunan" aria-describedby="basic-addon1">
			  </div>
			  <div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">Rp</span>
				  <input type="text" name="tagihan" class="form-control" placeholder="Tagihan" aria-describedby="basic-addon1">
			  </div>
			  <textarea name="keterangan" class="form-control custom-input-form" rows="3" placeholder="Keterangan"></textarea>
			  <input type="reset" class="btn btn-danger" value="Reset">
			  <input type="submit" class="btn btn-primary" value="Input">
			</form>
		
	</div>
	<?php
}

function form_export_wajib_pajak(){
    ?>
<div id="custom-form" class="col-md-6 col-xs-12 col-sm-12">
    <div id="custom-form-header" class="col-md-12 col-xs-12 col-sm-12">
        <h4>Form Export Wajib Pajak</h4>
    </div>
    <div id="custom-form-content" class="col-md-12 col-xs-12 col-sm-12">
        <form method="post" action="?page1=pbbdesa-export&page2=proses">
             <div class="input-group">
		<input type="text" name="nama_file" class="form-control" placeholder="Nama File" aria-describedby="basic-addon1" required>
                <span class="input-group-addon" id="basic-addon1">xls</span>
            </div>
            <div class="form-inline">
                <input id="dari_tanggal" type="text" name="dari_tanggal" class="form-control custom-input-form" placeholder="Dari Tanggal" required>
                <input id="sampai_tanggal" type="text" name="sampai_tanggal" class="form-control custom-input-form" placeholder="Sampai Tanggal" required>
            </div>
            <input type="reset" class="btn btn-danger" value="Reset">
            <input type="submit" class="btn btn-primary" value="Export">
        </form>
    </div>
</div>
    <?php
}

function form_edit_wajib_pajak($nop)
{
    $koneksi = db_connect();
    $sql = "select * from pbbdesa where nop='".$nop."'";
    $result = $koneksi->query($sql);
    $row = $result->fetch_array();
    ?>
    <div id="pbbdesa-content" class="col-md-12">
    	<h4>Form Edit PBB DESA </h4>
       <form method="post" action="index.php?page1=pbbdesa-edit&page2=proses" class="col-md-6">  
            <input type="text" name="nop" class="form-control custom-input-form" value="<?php echo $row['nop']; ?>" maxlength=18 required >
			<input type="text" name="nama" class="form-control custom-input-form" value="<?php echo $row['nama']; ?>" required>
			<div class="input-group">
				<input type="text" name="luas_tanah" class="form-control" value="<?php echo $row['luas_tanah']; ?>" aria-describedby="basic-addon2">
				<span class="input-group-addon" id="basic-addon2">M&sup2;</span>
			</div>
			<div class="input-group">
				<input type="text" name="luas_bangunan" class="form-control" value="<?php echo $row['luas_bangunan']; ?>" aria-describedby="basic-addon2">
				<span class="input-group-addon" id="basic-addon2">M&sup2;</span>
			</div>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Rp</span>
				<input type="text" name="njop_tanah" class="form-control" value="<?php echo $row['njop_tanah']; ?>" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Rp</span>
				<input type="text" name="njop_bangunan" class="form-control" value="<?php echo $row['njop_bangunan']; ?>" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">Rp</span>
				  <input type="text" name="tagihan" class="form-control" placeholder="Tagihan" value="<?php echo $row['tagihan']; ?>" aria-describedby="basic-addon1">
			  </div>
			<textarea name="keterangan" class="form-control custom-input-form" rows="3"><?php echo $row['keterangan']; ?></textarea>
			<input type="reset" class="btn btn-danger" value="Reset">
			<input type="submit" class="btn btn-primary" value="Update">
        </form>
      </div>
    <?php
}







############################ PEMBAYARAN PBBDESA 
function form_input_bayar_pajak1()
{
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<form method="get" action="index.php" class="col-md-6 form-horizontal">
			<input type="hidden" name="page1" value="pembayaran-pbbdesa-input">
			<input type="hidden" name="step" value="2">
			<div class="form-group">
			   <label class="col-sm-2 control-label">NOP</label>
			   <div class="col-sm-10">
			     <input type="text" name="nop" class="form-control" placeholder="NOP" maxlength="18" required>
			   </div>
			</div>
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-warning">Proses</button>
			    </div>
			</div>
		</form> 
	</div>
	<?php
}

function form_input_bayar_pajak2($nop)
{
	$koneksi = db_connect();
	$data = $koneksi->query("select * from pbbdesa where nop='".$nop."'")->fetch_array();
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<form method="post" action="?page1=pembayaran-pbbdesa-input&step=proses" class="col-md-6 form-horizontal">
			<div class="form-group">
			   <label class="col-sm-2 control-label">NOP</label>
			   <div class="col-sm-10">
			     <input type="text" name="nop" class="form-control" value="<?php echo $data['nop']; ?>" placeholder="NOP" maxlength="18" readonly="readonly">
			   </div>
			</div>
			<div class="form-group">
			   <label class="col-sm-2 control-label">Nama</label>
			   <div class="col-sm-10">
			     <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Nama" readonly="readonly">
			   </div>
			</div>
			<div class="form-group">
			   <label class="col-sm-2 control-label">Luas Tanah</label>
			   <div class="col-sm-10">
			     <div class="input-group">
					  <input type="text" name="luas_tanah" class="form-control" placeholder="Luas Tanah" value="<?php echo $data['luas_tanah']; ?>" aria-describedby="basic-addon2" disabled>
					  <span class="input-group-addon" id="basic-addon2">M&sup2;</span>
			  	</div>
			   </div>
			</div>
			<div class="form-group">
			   <label class="col-sm-2 control-label">Luas Bangunan</label>
			   <div class="col-sm-10">
			     <div class="input-group">
					  <input type="text" name="luas_bangunan" class="form-control" placeholder="Luas Bangunan" value="<?php echo $data['luas_bangunan']; ?>" aria-describedby="basic-addon2" disabled>
					  <span class="input-group-addon" id="basic-addon2">M&sup2;</span>
			  	</div>
			   </div>
			</div>
			<div class="form-group">
			   <label class="col-sm-2 control-label">Tagihan</label>
			   <div class="col-sm-10">
			   	 <div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Rp</span>
					  <input type="text" name="tagihan" class="form-control" placeholder="Tagihan" value="<?php echo $data['tagihan']; ?>" aria-describedby="basic-addon1" readonly="readonly">
				 </div>
			   </div>
			</div>
			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="submit" class="btn btn-warning">Proses Bayar</button>
			    </div>
			</div>
		</form>
	</div>
	<?php
}
?>