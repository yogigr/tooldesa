<?php  

function component_pbbdesa(){
	?>
	<div id="custom-component" class="col-md-12 col-xs-12 col-sm-12">
		<div class="btn-group col-md-3 col-xs-12 col-sm-12" role="group">
		  <a href="?page1=pbbdesa-input&page2=form" class="btn btn-primary">Input</a>
		  <a href="?page1=pbbdesa-export&page2=form" class="btn btn-warning">Export</a>
          <a href="?page1=pbbdesa-reset" class="btn btn-danger" onclick="return confirm('Yakin Hapus Semua Data NOP?');">Reset</a>
		</div>
		<form method="get" action="index.php" id="form-cari" class="form-inline col-md-3 col-xs-12 col-sm-12">
			<input type="hidden" name="page1" value="pbbdesa-search">
		    <div class="input-group">
		      <input type="text" name="search" class="form-control" placeholder="Cari Data" required>
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		      </span>
    		</div><!-- /input-group -->
		</form>	
		<form method="get" action="index.php" class="form-inline col-md-6 col-xs-12 col-sm-12">
			<input type="hidden" name="page1" value="pbbdesa-filter">
		    <input id="dari_tanggal" type="text" name="dari_tanggal" class="form-control" placeholder="Dari Tanggal" required>
		    <input id="sampai_tanggal" type="text" name="sampai_tanggal" class="form-control" placeholder="Sampai Tanggal" required>
		    <button type="submit" class="btn btn-success">Filter Data</button> 
		</form>	
	</div>
	<?php
}

function pbbdesa_header(){
	?>
	<div id="pbbdesa-header" class="col-md-12">
		<a href="?page1=pbbdesa" class="link-saya" style="background-color:#6e7585;">Master</a>
		<a href="?page1=pembayaran-pbbdesa" class="link-saya">Pembayaran</a>
		<a href="?page1=laporan-pbbdesa" class="link-saya">Laporan</a>
	</div>
	<?php
}
function pbbdesa_bayar_header(){
	?>
	<div id="pbbdesa-header" class="col-md-12">
		<a href="?page1=pbbdesa" class="link-saya">Master</a>
		<a href="?page1=pembayaran-pbbdesa" class="link-saya" style="background-color:#6e7585;">Pembayaran</a>
		<a href="?page1=laporan-pbbdesa" class="link-saya">Laporan</a>
	</div>
	<?php
}
function pbbdesa_report_header(){
	?>
	<div id="pbbdesa-header" class="col-md-12">
		<a href="?page1=pbbdesa" class="link-saya">Master</a>
		<a href="?page1=pembayaran-pbbdesa" class="link-saya">Pembayaran</a>
		<a href="?page1=laporan-pbbdesa" class="link-saya" style="background-color:#6e7585;">Laporan</a>
	</div>
	<?php
}

function pbbdesa_subheader(){
	?>
	<div id="pbbdesa-subheader" class="col-md-12">
		<div class="col-md-2">
			<a href="?page1=pbbdesa-input&page2=form" class="btn btn-success">Tambah Data</a>
		</div>
		<form action="index.php" method="GET" class="form-inline col-md-4">
			<input type="hidden" name="page1" value="pbbdesa-search">
			<input type="text" class="form-control" placeholder="Cari Berdasarkan NOP" name="search" required>
			<button class="btn btn-warning">Cari Data</button>		
		</form>
		<div class="col-md-3">
			<?php 
			$koneksi = db_connect();
			$totaldata = $koneksi->query("select * from pbbdesa")->num_rows ;
			?>
			<h5 class="tebel">Total Data NOP = <?php echo $totaldata; ?></h5>
		</div>
	</div>
	<?php
}

function pbbdesa_bayar_subheader(){
	?>
	<div id="pbbdesa-subheader" class="col-md-12">
		<div class="col-md-2">
			<a href="?page1=pembayaran-pbbdesa-input&step=1" class="btn btn-success">Bayar</a>
		</div>
		<form action="index.php" method="GET" class="form-inline col-md-4">
			<input type="hidden" name="page1" value="pembayaran-pbbdesa-search">
			<input type="text" class="form-control" placeholder="Cari Berdasarkan NOP" name="search" required>
			<button class="btn btn-warning">Cari Data</button>		
		</form>
		<div class="col-md-3">
			<?php 
			$koneksi = db_connect();
			$totaldata = $koneksi->query("select * from pbbdesa_bayar")->num_rows ;
			?>
			<h5 class="tebel">JML NOP Sudah Bayar = <?php echo $totaldata; ?></h5>
		</div>
		<div class="col-md-3">
			<?php 
			$totaltagihan = $koneksi->query("select sum(tagihan) as total_tagihan from pbbdesa_bayar")->fetch_array() ;
			?>
			<h5 class="tebel">Tot. Tgihan = Rp. <?php echo number_format($totaltagihan['total_tagihan']); ?></h5>
		</div>
	</div>
	<?php
}

function pbbdesa_report_subheader()
{
	?>
	
	<div id="pbbdesa-subheader" class="col-md-12">	
		
		<a href="?page1=laporan-pbbdesa-cetak" class="btn btn-success">Cetak Laporan</a>
	
	 	<a href="?page1=laporan-pbbdesa-reset" onclick="return confirm('Anda akan menghapus data pembayaran PBB Desa, Yakin ?')" class="btn btn-warning">Reset Laporan</a>
		
	</div>
	
	<?php
}



?>