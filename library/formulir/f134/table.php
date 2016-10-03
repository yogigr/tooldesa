<?php

function table_f134(){
	$sort="ASC";
	?>
	<table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=no_form&sort=".$sort; ?>">No Formulir</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=no_kk&sort=".$sort; ?>">No Kartu Keluarga</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=nama_kepala_keluarga&sort=".$sort; ?>">Nama Kepala Keluarga</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=telepon&sort=".$sort; ?>">Telepon</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=kabupaten_tujuan&sort=".$sort; ?>">Kabupaten Tujuan</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=nama_pemohon&sort=".$sort; ?>">Nama Pemohon</a></th>
			<th class="text-center">Aksi</th>
		</tr>
		<?php 
		
		$koneksi = db_connect();
		$limit = 10;
		$hal = @$_GET['hal'];
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
		} else {
			$posisi = ($hal-1)*$limit;
		}
		$sql = "Select * from pemohon_pindah where tipe_pindah = 'antar kabupaten' order by no_form desc LIMIT ".$posisi.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $posisi + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $row['no_form'];?></td>
					<td><?php echo $row['no_kk'];?></td>
					<td><?php echo strtoupper($row['nama_kepala_keluarga']);?></td>
					<td><?php echo $row['telepon'];?></td>
					<td><?php echo strtoupper($row['kabupaten_tujuan']);?></td>
					<td><?php echo strtoupper($row['nama_pemohon']);?></td>
					<td>
						<div class="text-center">
							<a class="btn btn-warning" target="_blank" href="<?php echo "?page1=f134-pdf&no_form=".$row['no_form']; ?>">View Pdf</a>
							<a class="btn btn-danger" href="<?php echo "?page1=f134-delete&no_form=".$row['no_form'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nomor formulir = ".$row['no_form']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</div>
					</td>
				</tr>
				<?php
				$no++;
			}
		} else {
			?>
			<tr><td colspan="8">No Record</td></tr>
			<?php
		}
		
		# mencari total data
		$sql = "select * from pemohon_pindah where tipe_pindah = 'antar kabupaten'";
		$result = $koneksi->query($sql);
		if($result){
			$totaldata = $result->num_rows;
		} else {
			$totaldata = 0;
		}

		?>
		<tr>
			<th colspan="8">Total Data:  <?php echo $totaldata; ?></th>
		</tr>
	</table>
	<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
		<?php
		$jumlahpage = ceil($totaldata/$limit);
		$file = $_SERVER['PHP_SELF'];
		
		#halaman sebelumbnya
		if($hal > 1){
			$prev = $hal - 1;
			?>
			<a class="nav-a" href="<?php echo "?page1=f134&hal=".$prev; ?>">Prev</a>
			<?php
		}else{
			?>
			<span class="nav-a">Prev</span>
			<?php
		}
		#halaman selanjutnya
		if($hal < $jumlahpage){
			$next = $hal + 1;
			?>
			<a class="nav-a" href="<?php echo "?page1=f134&hal=".$next; ?>">Next</a>
			<?php
		}else{
			?>
			<span class="nav-a">Next</span>
			<?php
		}
		
		?>
	</div>
	<?php
}

# tabel cari
function table_cari_f134($caridata){
	?>
	<table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">No Formulir</th>
			<th class="text-center">No Kartu Keluarga</th>
			<th class="text-center">Nama Kepala Keluarga</th>
			<th class="text-center">Telepon</th>
			<th class="text-center">Kabupaten Tujuan</th>
			<th class="text-center">Nama Pemohon</th>
			<th class="text-center">Aksi</th>
		</tr>
		<?php 
		
		$koneksi = db_connect();
		$cari = $koneksi->real_escape_string($caridata);
		$limit = 10;
		$hal = @$_GET['hal'];
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
		} else {
			$posisi = ($hal-1)*$limit;
		}
		$sql = "Select * from pemohon_pindah where no_kk like '%".$cari."%' or nama_kepala_keluarga like '%".$cari."%' AND tipe_pindah = 'antar kabupaten' order by waktu_input desc LIMIT ".$posisi.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $posisi + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $row['no_form'];?></td>
					<td><?php echo $row['no_kk'];?></td>
					<td><?php echo strtoupper($row['nama_kepala_keluarga']);?></td>
					<td><?php echo $row['telepon'];?></td>
					<td><?php echo strtoupper($row['kabupaten_tujuan']);?></td>
					<td><?php echo strtoupper($row['nama_pemohon']);?></td>
					<td>
						<div class="text-center">
							<a class="btn btn-warning" target="_blank" href="<?php echo "?page1=f134-pdf&no_form=".$row['no_form']; ?>">View Pdf</a>
							<a class="btn btn-danger" href="<?php echo "?page1=f134-delete&no_form=".$row['no_form'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nomor formulir = ".$row['no_form']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</div>
					</td>
				</tr>
				<?php
				$no++;
			}
		} else {
			?>
			<tr><td colspan="8">No Record</td></tr>
			<?php
		}
		
		# mencari total data
		$sql = "Select * from pemohon_pindah where no_kk like '%".$cari."%' or nama_kepala_keluarga like '%".$cari."%' AND tipe_pindah = 'antar kabupaten'";
		$result = $koneksi->query($sql);
		if($result){
			$totaldata = $result->num_rows;
		} else {
			$totaldata = 0;
		}

		?>
		<tr>
			<th colspan="8">Total Data:  <?php echo $totaldata; ?></th>
		</tr>
	</table>
	<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
		<?php
		$jumlahpage = ceil($totaldata/$limit);
		$file = $_SERVER['PHP_SELF'];
		
		#halaman sebelumbnya
		if($hal > 1){
			$prev = $hal - 1;
			?>
			<a class="nav-a" href="<?php echo "?page1=f134&search=".$cari."&hal=".$prev; ?>">Prev</a>
			<?php
		}else{
			?>
			<span class="nav-a">Prev</span>
			<?php
		}
		#halaman selanjutnya
		if($hal < $jumlahpage){
			$next = $hal + 1;
			?>
			<a class="nav-a" href="<?php echo "?page1=f134&search=".$cari."&hal=".$next; ?>">Next</a>
			<?php
		}else{
			?>
			<span class="nav-a">Next</span>
			<?php
		}
		
		?>
	</div>
	<?php
}


# table sorting
function table_sorting_f134($kolom, $sort){
	if($sort=="ASC"){
		$linksort = "DESC";
	}else{
		$linksort = "ASC";
	}
	?>
	<table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=no_form&sort=".$linksort; ?>">No Formulir</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=no_kk&sort=".$linksort; ?>">No Kartu Keluarga</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=nama_kepala_keluarga&sort=".$linksort; ?>">Nama Kepala Keluarga</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=telepon&sort=".$linksort; ?>">Telepon</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=kabupaten_tujuan&sort=".$linksort; ?>">Kabupaten Tujuan</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f134-sorting&kolom=nama_pemohon&sort=".$linksort; ?>">Nama Pemohon</a></th>
			<th class="text-center">Aksi</th>
		</tr>
		<?php 
		
		$koneksi = db_connect();
		$limit = 10;
		$hal = @$_GET['hal'];
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
		} else {
			$posisi = ($hal-1)*$limit;
		}
		$sql = "Select * from pemohon_pindah where tipe_pindah = 'antar kabupaten' order by ".$kolom." ".$sort."  LIMIT ".$posisi.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $posisi + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $row['no_form'];?></td>
					<td><?php echo $row['no_kk'];?></td>
					<td><?php echo strtoupper($row['nama_kepala_keluarga']);?></td>
					<td><?php echo $row['telepon'];?></td>
					<td><?php echo strtoupper($row['kabupaten_tujuan']);?></td>
					<td><?php echo strtoupper($row['nama_pemohon']);?></td>
					<td>
						<div class="text-center">
							<a class="btn btn-warning" target="_blank" href="<?php echo "?page1=f134-pdf&no_form=".$row['no_form']; ?>">View Pdf</a>
							<a class="btn btn-danger" href="<?php echo "?page1=f134-delete&no_form=".$row['no_form'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nomor formulir = ".$row['no_form']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</div>
					</td>
				</tr>
				<?php
				$no++;
			}
		} else {
			?>
			<tr><td colspan="8">No Record</td></tr>
			<?php
		}
		
		# mencari total data
		$sql = "select * from pemohon_pindah where tipe_pindah = 'antar kabupaten'";
		$result = $koneksi->query($sql);
		if($result){
			$totaldata = $result->num_rows;
		} else {
			$totaldata = 0;
		}

		?>
		<tr>
			<th colspan="8">Total Data:  <?php echo $totaldata; ?></th>
		</tr>
	</table>
	<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
		<?php
		$jumlahpage = ceil($totaldata/$limit);
		$file = $_SERVER['PHP_SELF'];
		
		#halaman sebelumbnya
		if($hal > 1){
			$prev = $hal - 1;
			?>
			<a class="nav-a" href="<?php echo "?page1=f134-sorting&kolom=".$kolom."&sort=".$sort."&hal=".$prev; ?>">Prev</a>
			<?php
		}else{
			?>
			<span class="nav-a">Prev</span>
			<?php
		}
		#halaman selanjutnya
		if($hal < $jumlahpage){
			$next = $hal + 1;
			?>
			<a class="nav-a" href="<?php echo "?page1=f134&kolom=".$kolom."&sort=".$sort."&hal=".$next; ?>">Next</a>
			<?php
		}else{
			?>
			<span class="nav-a">Next</span>
			<?php
		}
		
		?>
	</div>
	<?php
}


?>

