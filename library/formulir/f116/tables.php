<?php 

function table_f116(){
	$sort="ASC";
	?>
	<table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=nik_pemohon&sort=".$sort; ?>">Nik Pemohon</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=nama_pemohon&sort=".$sort; ?>">Nama Pemohon</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=no_kk_lama&sort=".$sort; ?>">Nomor KK Lama</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=alasan_permohonan&sort=".$sort; ?>">Alasan Permohonan</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=jumlah_anggota_keluarga&sort=".$sort; ?>">Jumlah Anggota Keluarga</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=telepon&sort=".$sort; ?>">Telepon</a></th>
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
		$sql = "Select * from perubahan_kk order by tanggal_input desc LIMIT ".$posisi.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $posisi + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $row['nik_pemohon'];?></td>
					<td><?php echo $row['nama_pemohon'];?></td>
					<td><?php echo $row['no_kk_lama'];?></td>
					<td>
						<?php
						if($row['alasan_permohonan'] == 1){
							echo "Penambahan Anggota Keluarga";
						}elseif($row['alasan_permohonan'] == 2){
							echo "Pengurangan Anggota Keluarga" ;
						}else{
							echo "Lainnya";
						}
						?>
					</td>
					<td><?php echo $row['jumlah_anggota_keluarga'];?></td>
					<td><?php echo $row['telepon'];?></td>
					<td>
						<div class="text-center">
							<a class="btn btn-warning" target="_blank" href="<?php echo "?page1=f116-pdf&nik_pemohon=".$row['nik_pemohon']; ?>">View Pdf</a>
							<a class="btn btn-danger" href="<?php echo "?page1=f116-delete&nik_pemohon=".$row['nik_pemohon'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nik pemohon = ".$row['nik_pemohon']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</div>
					</td>
				</tr>
				<?php
				$no++;
			}
		} else {
			?>
			<tr><td colspan="11">No Record</td></tr>
			<?php
		}
		
		# mencari total data
		$sql = "select * from perubahan_kk";
		$result = $koneksi->query($sql);
		if($result){
			$totaldata = $result->num_rows;
		} else {
			$totaldata = 0;
		}

		?>
		<tr>
			<th colspan="11">Total Data:  <?php echo $totaldata; ?></th>
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
			<a class="nav-a" href="<?php echo "?page1=f116&hal=".$prev; ?>">Prev</a>
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
			<a class="nav-a" href="<?php echo "?page1=f116&hal=".$next; ?>">Next</a>
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

# tebel cari
function table_cari_f116($caridata)
{	
	$sort="ASC";
	?>
	<table class="table table-bordered table-aing">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nik Pemohon</th>
			<th class="text-center">Nama Pemohon</th>
			<th class="text-center">Nomor KK Lama</th>
			<th class="text-center">Alasan Permohonan</th>
			<th class="text-center">Jumlah Anggota Keluarga</th>
			<th class="text-center">Telepon</th>
			<th class="text-center">Aksi</th>
		</tr>
		<?php 
		
		$koneksi = db_connect();
		$cari = $koneksi->real_escape_string($caridata);
		$limit = 10;
		$hal = @$_GET['hal'];
		if(empty($hal)){
			$position = 0;
			$hal = 1;
		} else {
			$position = ($hal-1)*$limit;
		}
		$sql = "Select * from perubahan_kk where nik_pemohon like '%".$cari."%' or nama_pemohon like '%".$cari."%' order by tanggal_input desc LIMIT ".$position.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $position + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $row['nik_pemohon'];?></td>
					<td><?php echo $row['nama_pemohon'];?></td>
					<td><?php echo $row['no_kk_lama'];?></td>
					<td>
						<?php
						if($row['alasan_permohonan'] == 1){
							echo "Penambahan Anggota Keluarga";
						}elseif($row['alasan_permohonan'] == 2){
							echo "Pengurangan Anggota Keluarga" ;
						}else{
							echo "Lainnya";
						}
						?>
					</td>
					<td><?php echo $row['jumlah_anggota_keluarga'];?></td>
					<td><?php echo $row['telepon'];?></td>
					<td>
						<div class="text-center">
							<a class="btn btn-warning" target="_blank" href="<?php echo "?page1=f116-pdf&nik_pemohon=".$row['nik_pemohon']; ?>">View Pdf</a>
							<a class="btn btn-danger" href="<?php echo "?page1=f116-delete&nik_pemohon=".$row['nik_pemohon'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nik pemohon = ".$row['nik_pemohon']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</div>
					</td>
				</tr>
				<?php
				$no++;
			}
		} else {
			?>
			<tr><td colspan="10">No Record</td></tr>
			<?php
		}
		
		# mencari total data
		$sql = "select * from perubahan_kk where nik_pemohon like '%".$cari."%' or nama_pemohon like '%".$cari."%'";
		$result = $koneksi->query($sql);
		if($result){
			$totaldata = $result->num_rows;
		}else {
			$totaldata = 0;
		}
			
		?>
		<tr>
			<th colspan="11">Total Data:  <?php echo $totaldata; ?></th>
		</tr>
	</table>
	<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
		<?php
		$jumlahpage = ceil($totaldata/$limit);
		$file =$_SERVER['PHP_SELF'];
		
		#halaman sebelumbnya
		if($hal > 1){
			$prev = $hal - 1;
			?>
			<a class="nav-a" href="<?php echo "?page1=f116-search&search=".$cari."&hal=".$prev; ?>">Prev</a>
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
			<a class="nav-a" href="<?php echo "?page1=f116-search&search=".$cari."&hal=".$next; ?>">Next</a>
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

# tabel sorting
function table_sorting_f116($kolom, $sort)
{	
	if($sort=="ASC"){
		$linksort = "DESC";
	}else{
		$linksort = "ASC";
	}
	?>
	<table class="table table-bordered table-aing">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=nik_pemohon&sort=".$linksort; ?>">Nik Pemohon</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=nama_pemohon&sort=".$linksort; ?>">Nama Pemohon</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=no_kk_lama&sort=".$linksort; ?>">Nomor KK Lama</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=alasan_permohonan&sort=".$linksort; ?>">Alasan Permohonan</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=jumlah_anggota_keluarga&sort=".$linksort; ?>">Jumlah Anggota Keluarga</a></th>
			<th class="text-center"><a class="link-th" href="<?php echo "?page1=f116-sorting&kolom=telepon&sort=".$linksort; ?>">Telepon</a></th>
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
		$sql = "Select * from perubahan_kk order by ".$kolom." ".$sort." LIMIT ".$posisi.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $posisi + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $row['nik_pemohon'];?></td>
					<td><?php echo $row['nama_pemohon'];?></td>
					<td><?php echo $row['no_kk_lama'];?></td>
					<td>
						<?php
						if($row['alasan_permohonan'] == 1){
							echo "Penambahana anggota keluarga";
						}elseif($row['alasan_permohonan'] == 2){
							echo "Pengurangan anggota keluarga" ;
						}else{
							echo "Lainnya";
						}
						?>
					</td>
					<td><?php echo $row['jumlah_anggota_keluarga'];?></td>
					<td><?php echo $row['telepon'];?></td>
					<td>
						<div class="text-center">
							<a class="btn btn-warning" target="_blank" href="<?php echo "?page1=f116-pdf&nik_pemohon=".$row['nik_pemohon']; ?>">View Pdf</a>
							<a class="btn btn-danger" href="<?php echo "?page1=f116-delete&nik_pemohon=".$row['nik_pemohon'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nik pemohon = ".$row['nik_pemohon']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</div>
					</td>
				</tr>
				<?php
				$no++;
			}
		} else {
			?>
			<tr><td colspan="11">No Record</td></tr>
			<?php
		}
		
		# mencari total data
		$sql = "select * from perubahan_kk";
		$result = $koneksi->query($sql);
		if($result){
			$totaldata = $result->num_rows;
		} else {
			$totaldata = 0;
		}
		?>
		<tr>
			<th colspan="11">Total Data:  <?php echo $totaldata; ?></th>
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
			<a class="nav-a" href="<?php echo "?page1=f116-sorting&kolom=".$kolom."&sort=".$sort."&hal=".$prev; ?>">Prev</a>
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
			<a class="nav-a" href="<?php echo "?page1=f116-sorting&kolom=".$kolom."&sort=".$sort."&hal=".$next; ?>">Next</a>
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