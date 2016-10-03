<?php

function component_f134(){
	?>
	<div id="custom-component" class="col-md-12 col-xs-12 col-sm-12">
		<div class="btn-group col-md-6 col-xs-12 col-sm-12" role="group">
		  <a href="?page1=f134-input&step=1" class="btn btn-primary">Isi Formulir</a>
          <a href="?page1=f134-reset" class="btn btn-danger" onclick="return confirm('Yakin Hapus Semua Data f134 ?');">Reset Data Pemohon</a>
		</div>
		<form method="get" action="index.php" id="form-cari" class="form-inline col-md-3 col-xs-12 col-sm-12">
			<input type="hidden" name="page1" value="f134-search">
		    <div class="input-group">
		      <input type="text" name="search" class="form-control" placeholder="Cari Data" required>
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		      </span>
            </div><!-- /input-group -->
		</form>	
	</div>
	<?php
}

?>