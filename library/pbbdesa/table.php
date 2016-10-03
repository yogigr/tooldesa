<?php  

function table_pbbdesa()
{	
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<div class="table-responsive">
			<?php $sort = "ASC"; ?>
		  <table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=nop&sort=".$sort; ?>">NOP</a></th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=nama&sort=".$sort; ?>">Nama</a></th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=luas_tanah&sort=".$sort; ?>">Ls Tanah(m&sup2;)</a></th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=luas_bangunan&sort=".$sort; ?>">Ls Bgnan(m&sup2;)</a></th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=njop_tanah&sort=".$sort; ?>">NJOP Tanah(Rp)</a></th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=njop_bangunan&sort=".$sort; ?>">NJOP Bgnan(Rp)</a></th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=tagihan&sort=".$sort; ?>">Tagihan(Rp)</a></th>
				<th class="text-center">Keterangan</th>
				<th class="text-center">Aksi</th>
			</tr>
			<?php 
			
			$koneksi = db_connect();
			$limit = 5;
			$hal = @$_GET['hal'];
			if(empty($hal)){
				$posisi = 0;
				$hal = 1;
			} else {
				$posisi = ($hal-1)*$limit;
			}
			$sql = "Select * from pbbdesa order by tanggal_input desc LIMIT ".$posisi.", ".$limit;
			$result = $koneksi->query($sql);
			if($result->num_rows > 0){
				$no = $posisi + 1;
				while($row = $result->fetch_array()){
					?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td><?php echo $row['nop'];?></td>
						<td><?php echo strtoupper($row['nama']);?></td>
						<td><?php echo $row['luas_tanah'];?></td>
						<td><?php echo $row['luas_bangunan'];?></td>
						<td class="text-right"><?php echo number_format($row['njop_tanah']);?></td>
						<td class="text-right"><?php echo number_format($row['njop_bangunan']);?></td>
						<td class="text-right"><?php echo number_format($row['tagihan']);?></td>
						<td><?php echo $row['keterangan'];?></td>
						<td>
							<a class="btn btn-primary" href="<?php echo "?page1=pbbdesa-edit&page2=form&nop=".$row['nop'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							<a class="btn btn-danger" href="<?php echo "?page1=pbbdesa-delete&nop=".$row['nop'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nop = ".$row['nop']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
			$sql = "select * from pbbdesa";
			$result = $koneksi->query($sql);
			if($result){
				$totaldata = $result->num_rows;
			}else {
				$totaldata = 0;
			}
					
			?>
			<tr>
				<th colspan="10">Total Data:  <?php echo $totaldata; ?></th>
			</tr>
		</table>
		</div>
		<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
			<?php
			$jumlahpage = ceil($totaldata/$limit);
			$file = $_SERVER['PHP_SELF'];
			
			#halaman sebelumbnya
			if($hal > 1){
				$prev = $hal - 1;
				?>
				<a class="nav-a" href="<?php echo $file."?page1=pbbdesa&hal=".$prev; ?>">Prev</a>
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
				<a class="nav-a" href="<?php echo $file."?page1=pbbdesa&hal=".$next; ?>">Next</a>
				<?php
			}else{
				?>
				<span class="nav-a">Next</span>
				<?php
			}
			
			?>
		</div>
	</div>
	<?php
}

# tabel pencarian
function table_cari_pbbdesa($caridata)
{	
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-aing">
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">NOP</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Ls Tanah(m&sup2;)</th>
					<th class="text-center">Ls Bgnan(m&sup2;)</th>
					<th class="text-center">NJOP Tanah(Rp)</th>
					<th class="text-center">NJOP Bgnan(Rp)</th>
					<th class="text-center">Tagihan(Rp)</th>
					<th class="text-center">Keterangan</th>
					<th class="text-center">Aksi</th>
				</tr>
				<?php 
				
				$koneksi = db_connect();
				$cari = $koneksi->real_escape_string($caridata);
				$limit = 5;
				$hal = @$_GET['hal'];
				if(empty($hal)){
					$position = 0;
					$hal = 1;
				} else {
					$position = ($hal-1)*$limit;
				}
				$sql = "Select * from pbbdesa where nop like '%".$cari."%' or nama like '%".$cari."%' order by tanggal_input desc LIMIT ".$position.", ".$limit;
				$result = $koneksi->query($sql);
				if($result->num_rows > 0){
					$no = $position + 1;
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td><?php echo $row['nop'];?></td>
							<td><?php echo strtoupper($row['nama']);?></td>
							<td><?php echo $row['luas_tanah'];?></td>
							<td><?php echo $row['luas_bangunan'];?></td>
							<td class="text-right"><?php echo number_format($row['njop_tanah']);?></td>
							<td class="text-right"><?php echo number_format($row['njop_bangunan']);?></td>
							<td class="text-right"><?php echo number_format($row['tagihan']);?></td>
							<td><?php echo $row['keterangan'];?></td>
							<td>
								<a class="btn btn-primary" href="<?php echo "?page1=pbbdesa-edit&page2=form&nop=".$row['nop'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="btn btn-danger" href="<?php echo "?page1=pbbdesa-delete&nop=".$row['nop'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nop = ".$row['nop']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
				$sql = "select * from pbbdesa where nop like '%".$cari."%' or nama like '%".$cari."%'";
				$result = $koneksi->query($sql);
				if($result){
					$totaldata = $result->num_rows;
				}else {
					$totaldata = 0;
				}
					
				?>
				<tr>
					<th colspan="10">Total Data:  <?php echo $totaldata; ?></th>
				</tr>
			</table>
		</div>
		<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
			<?php
			$jumlahpage = ceil($totaldata/$limit);
			$file =$_SERVER['PHP_SELF'];
			
			#halaman sebelumbnya
			if($hal > 1){
				$prev = $hal - 1;
				?>
				<a class="nav-a" href="<?php echo $file."?page1=pbbdesa-search&search=".$caridata."&hal=".$prev; ?>">Prev</a>
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
				<a class="nav-a" href="<?php echo $file."?page1=pbbdesa-search&search=".$caridata."&hal=".$next; ?>">Next</a>
				<?php
			}else{
				?>
				<span class="nav-a">Next</span>
				<?php
			}
			
			?>
		</div>
	</div>
	<?php
}

function table_filter_pbbdesa($dari, $sampai)
{	
	$daritanggal = ubahformattanggal($dari);
	$sampaitanggal = ubahformattanggal($sampai);
	$selisih = strtotime($sampaitanggal) - strtotime($daritanggal); # jika selisih - maka format filter salah
	?>
	<table class="table table-bordered table-aing">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">NOP</th>
			<th class="text-center">Nama</th>
			<th class="text-center">Ls Tanah(m&sup2;)</th>
			<th class="text-center">Ls Bgnan(m&sup2;)</th>
			<th class="text-center">NJOP Tanah(Rp)</th>
			<th class="text-center">NJOP Bgnan(Rp)</th>
			<th class="text-center">Ketetapan(Rp)</th>
			<th class="text-center">Keterangan</th>
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
		$sql = "Select * from pbbdesa where tanggal_input between '".$daritanggal."' and '".$sampaitanggal."' order by tanggal_input desc LIMIT ".$posisi.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $posisi + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $row['nop'];?></td>
					<td><?php echo strtoupper($row['nama']);?></td>
					<td><?php echo $row['luas_tanah'];?></td>
					<td><?php echo $row['luas_bangunan'];?></td>
					<td class="text-right"><?php echo number_format($row['njop_tanah']);?></td>
					<td class="text-right"><?php echo number_format($row['njop_bangunan']);?></td>
					<td class="text-right"><?php echo number_format($row['ketetapan']);?></td>
					<td><?php echo $row['keterangan'];?></td>
					<td>
						<a class="btn btn-primary" href="<?php echo "?page1=pbbdesa-edit&page2=form&nop=".$row['nop'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a class="btn btn-danger" href="<?php echo "?page1=pbbdesa-delete&nop=".$row['nop'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nop = ".$row['nop']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
		$sql = "Select * from pbbdesa where tanggal_input between '".$daritanggal."' and '".$sampaitanggal."'";
		$result = $koneksi->query($sql);
		if($result){
			$totaldata = $result->num_rows;
		} else {
			$totaldata = 0;
		}

		#mencari total ketetapan
		$sql = "select SUM(ketetapan) as totpan from pbbdesa where tanggal_input between '".$daritanggal."' and '".$sampaitanggal."'";
		$result = $koneksi->query($sql);
		if($result){
			$row = $result->fetch_array();
			$total_ketetapan = number_format($row['totpan']);
		}else {
			$total_ketetapan = 0;
		}		
		?>
		<tr>
			<th colspan="5">Total Data:  <?php echo $totaldata; ?></th>
			<th colspan="5">Total Ketetapan: Rp. <?php echo $total_ketetapan; ?></th>
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
			<a class="nav-a" href="<?php echo $file."?page1=pbbdesa-filter&dari_tanggal=".$dari."&sampai_tanggal=".$sampai."&hal=".$prev; ?>">Prev</a>
			<?php
			$file = str_replace('&hal='.$prev, '', $file);
		}else{
			?>
			<span class="nav-a">Prev</span>
			<?php
		}
		#halaman selanjutnya
		if($hal < $jumlahpage){
			$next = $hal + 1;
			?>
			<a class="nav-a" href="<?php echo $file."?page1=pbbdesa-filter&dari_tanggal=".$dari."&sampai_tanggal=".$sampai."&hal=".$next; ?>">Next</a>
			<?php
			$file = str_replace('&hal='.$next, '', $file);
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
function table_sorting_pbbdesa($kolom, $sort)
{	
	if($sort=="ASC"){
		$linksort = "DESC";
	}else{
		$linksort = "ASC";
	}
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-aing">
				<tr>
					<th class="text-center">No</th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=nop&sort=".$linksort; ?>">NOP</a></th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=nama&sort=".$linksort; ?>">Nama</a></th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=luas_tanah&sort=".$linksort; ?>">Ls Tanah(m&sup2;)</a></th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=luas_bangunan&sort=".$linksort; ?>">Ls Bgnan(m&sup2;)</a></th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=njop_tanah&sort=".$linksort; ?>">NJOP Tanah(Rp)</a></th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=njop_bangunan&sort=".$linksort; ?>">NJOP Bgnan(Rp)</a></th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pbbdesa-sorting&kolom=tagihan&sort=".$linksort; ?>">Tagihan(Rp)</a></th>
					<th class="text-center">Keterangan</th>
					<th class="text-center">Aksi</th>
				</tr>
				<?php 
				
				$koneksi = db_connect();
				$limit = 5;
				$hal = @$_GET['hal'];
				if(empty($hal)){
					$posisi = 0;
					$hal = 1;
				} else {
					$posisi = ($hal-1)*$limit;
				}
				$sql = "Select * from pbbdesa order by ".$kolom." ".$sort." LIMIT ".$posisi.", ".$limit;
				$result = $koneksi->query($sql);
				if($result->num_rows > 0){
					$no = $posisi + 1;
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td><?php echo $row['nop'];?></td>
							<td><?php echo strtoupper($row['nama']);?></td>
							<td><?php echo $row['luas_tanah'];?></td>
							<td><?php echo $row['luas_bangunan'];?></td>
							<td class="text-right"><?php echo number_format($row['njop_tanah']);?></td>
							<td class="text-right"><?php echo number_format($row['njop_bangunan']);?></td>
							<td class="text-right"><?php echo number_format($row['tagihan']);?></td>
							<td><?php echo $row['keterangan'];?></td>
							<td>
								<a class="btn btn-primary" href="<?php echo "?page1=pbbdesa-edit&page2=form&nop=".$row['nop'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="btn btn-danger" href="<?php echo "?page1=pbbdesa-delete&nop=".$row['nop'];?>" onclick="return confirm('<?php echo "yakin hapus data dengan nop = ".$row['nop']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
				$sql = "select * from pbbdesa";
				$result = $koneksi->query($sql);
				if($result){
					$totaldata = $result->num_rows;
				} else {
					$totaldata = 0;
				}
				?>
				<tr>
					<th colspan="10">Total Data:  <?php echo $totaldata; ?></th>
				</tr>
			</table>
		</div>
		<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
			<?php
			$jumlahpage = ceil($totaldata/$limit);
			$file = $_SERVER['PHP_SELF'];
			
			#halaman sebelumbnya
			if($hal > 1){
				$prev = $hal - 1;
				?>
				<a class="nav-a" href="<?php echo $file."?page1=pbbdesa-sorting&kolom=".$kolom."&sort=".$sort."&hal=".$prev; ?>">Prev</a>
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
				<a class="nav-a" href="<?php echo $file."?page1=pbbdesa-sorting&kolom=".$kolom."&sort=".$sort."&hal=".$next; ?>">Next</a>
				<?php
			}else{
				?>
				<span class="nav-a">Next</span>
				<?php
			}
			
			?>
		</div>
	</div>
	<?php
}

function table_pbbdesa_bayar()
{	
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<div class="table-responsive">
			<?php $sort = "ASC"; ?>
		  <table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pembayaran-pbbdesa-sorting&kolom=nop&sort=".$sort; ?>">NOP</a></th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pembayaran-pbbdesa-sorting&kolom=nama&sort=".$sort; ?>">Nama</a></th>
				<th class="text-center"><a class="link-th" href="<?php echo "?page1=pembayaran-pbbdesa-sorting&kolom=tagihan&sort=".$sort; ?>">Tagihan(Rp)</a></th>
				<th class="text-center">Aksi</th>
			</tr>
			<?php 
			
			$koneksi = db_connect();
			$limit = 5;
			$hal = @$_GET['hal'];
			if(empty($hal)){
				$posisi = 0;
				$hal = 1;
			} else {
				$posisi = ($hal-1)*$limit;
			}
			$sql = "Select * from pbbdesa_bayar order by id_bayar desc LIMIT ".$posisi.", ".$limit;
			$result = $koneksi->query($sql);
			if($result->num_rows > 0){
				$no = $posisi + 1;
				while($row = $result->fetch_array()){
					?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td><?php echo $row['nop'];?></td>
						<td><?php echo strtoupper(strtoupper($row['nama']));?></td>
						<td class="text-right"><?php echo number_format($row['tagihan']);?></td>
						<td>
							
							<a class="btn btn-danger" href="<?php echo "?page1=pembayaran-pbbdesa-delete&nop=".$row['nop'];?>" onclick="return confirm('<?php echo "yakin batalkan pembayaran dengan nop = ".$row['nop']; ?>');">Batal Pembayaran</a>
						</td>
					</tr>
					<?php
					$no++;
				}
			} else {
				?>
				<tr><td colspan="5">No Record</td></tr>
				<?php
			}
			
			
			# mencari total data
			$sql = "select * from pbbdesa_bayar";
			$result = $koneksi->query($sql);
			if($result){
				$totaldata = $result->num_rows;
			}else {
				$totaldata = 0;
			}
					
			?>
			<tr>
				<th colspan="5">Total Data:  <?php echo $totaldata; ?></th>
			</tr>
		</table>
		</div>
		<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
			<?php
			$jumlahpage = ceil($totaldata/$limit);
			$file = $_SERVER['PHP_SELF'];
			
			#halaman sebelumbnya
			if($hal > 1){
				$prev = $hal - 1;
				?>
				<a class="nav-a" href="<?php echo $file."?page1=pembayaran-pbbdesa&hal=".$prev; ?>">Prev</a>
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
				<a class="nav-a" href="<?php echo $file."?page1=pembayaran-pbbdesa&hal=".$next; ?>">Next</a>
				<?php
			}else{
				?>
				<span class="nav-a">Next</span>
				<?php
			}
			
			?>
		</div>
	</div>
	<?php
}

function table_cari_pbbdesa_bayar($caridata)
{	
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-aing">
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">NOP</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Tagihan(Rp)</th>
					<th class="text-center">Aksi</th>
				</tr>
				<?php 
				
				$koneksi = db_connect();
				$cari = $koneksi->real_escape_string($caridata);
				$limit = 5;
				$hal = @$_GET['hal'];
				if(empty($hal)){
					$position = 0;
					$hal = 1;
				} else {
					$position = ($hal-1)*$limit;
				}
				$sql = "Select * from pbbdesa_bayar where nop like '%".$cari."%' or nama like '%".$cari."%' order by id_bayar desc LIMIT ".$position.", ".$limit;
				$result = $koneksi->query($sql);
				if($result->num_rows > 0){
					$no = $position + 1;
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td><?php echo $row['nop'];?></td>
							<td><?php echo strtoupper($row['nama']);?></td>
							<td class="text-right"><?php echo number_format($row['tagihan']);?></td>
							<td>
								<a class="btn btn-danger" href="<?php echo "?page1=pembayaran-pbbdesa-delete&nop=".$row['nop'];?>" onclick="return confirm('<?php echo "yakin batalkan pembayaran dengan nop = ".$row['nop']; ?>');">Batal Pembayaran</a>
							</td>
						</tr>
						<?php
						$no++;
					}
				} else {
					?>
					<tr><td colspan="5">No Record</td></tr>
					<?php
				}
				
				# mencari total data
				$sql = "select * from pbbdesa_bayar where nop like '%".$cari."%' or nama like '%".$cari."%'";
				$result = $koneksi->query($sql);
				if($result){
					$totaldata = $result->num_rows;
				}else {
					$totaldata = 0;
				}
					
				?>
				<tr>
					<th colspan="5">Total Data:  <?php echo $totaldata; ?></th>
				</tr>
			</table>
		</div>
		<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
			<?php
			$jumlahpage = ceil($totaldata/$limit);
			$file =$_SERVER['PHP_SELF'];
			
			#halaman sebelumbnya
			if($hal > 1){
				$prev = $hal - 1;
				?>
				<a class="nav-a" href="<?php echo $file."?page1=pembayaran-pbbdesa-search&search=".$caridata."&hal=".$prev; ?>">Prev</a>
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
				<a class="nav-a" href="<?php echo $file."?page1=pembayaran-pbbdesa-search&search=".$caridata."&hal=".$next; ?>">Next</a>
				<?php
			}else{
				?>
				<span class="nav-a">Next</span>
				<?php
			}
			
			?>
		</div>
	</div>
	<?php
}

function table_sorting_pbbdesa_bayar($kolom, $sort)
{	
	if($sort=="ASC"){
		$linksort = "DESC";
	}else{
		$linksort = "ASC";
	}
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-aing">
				<tr>
					<th class="text-center">No</th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pembayaran-pbbdesa-sorting&kolom=nop&sort=".$linksort; ?>">NOP</a></th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pembayaran-pbbdesa-sorting&kolom=nama&sort=".$linksort; ?>">Nama</a></th>
					<th class="text-center"><a class="link-th" href="<?php echo "?page1=pembayaran-pbbdesa-sorting&kolom=tagihan&sort=".$linksort; ?>">Tagihan(Rp)</a></th>
					<th class="text-center">Aksi</th>
				</tr>
				<?php 
				
				$koneksi = db_connect();
				$limit = 5;
				$hal = @$_GET['hal'];
				if(empty($hal)){
					$posisi = 0;
					$hal = 1;
				} else {
					$posisi = ($hal-1)*$limit;
				}
				$sql = "Select * from pbbdesa_bayar order by ".$kolom." ".$sort." LIMIT ".$posisi.", ".$limit;
				$result = $koneksi->query($sql);
				if($result->num_rows > 0){
					$no = $posisi + 1;
					while($row = $result->fetch_array()){
						?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td><?php echo $row['nop'];?></td>
							<td><?php echo strtoupper($row['nama']);?></td>
							<td class="text-right"><?php echo number_format($row['tagihan']);?></td>
							<td>
								<a class="btn btn-danger" href="<?php echo "?page1=pembayaran-pbbdesa-delete&nop=".$row['nop'];?>" onclick="return confirm('<?php echo "yakin batalkan pembayaran dengan nop = ".$row['nop']; ?>');">Batal Pembayaran</a>
							</td>
						</tr>
						<?php
						$no++;
					}
				} else {
					?>
					<tr><td colspan="5">No Record</td></tr>
					<?php
				}
				
				# mencari total data
				$sql = "select * from pbbdesa_bayar";
				$result = $koneksi->query($sql);
				if($result){
					$totaldata = $result->num_rows;
				} else {
					$totaldata = 0;
				}
				?>
				<tr>
					<th colspan="5">Total Data:  <?php echo $totaldata; ?></th>
				</tr>
			</table>
		</div>
		<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
			<?php
			$jumlahpage = ceil($totaldata/$limit);
			$file = $_SERVER['PHP_SELF'];
			
			#halaman sebelumbnya
			if($hal > 1){
				$prev = $hal - 1;
				?>
				<a class="nav-a" href="<?php echo $file."?page1=pembayaran-pbbdesa-sorting&kolom=".$kolom."&sort=".$sort."&hal=".$prev; ?>">Prev</a>
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
				<a class="nav-a" href="<?php echo $file."?page1=pembayaran-pbbdesa-sorting&kolom=".$kolom."&sort=".$sort."&hal=".$next; ?>">Next</a>
				<?php
			}else{
				?>
				<span class="nav-a">Next</span>
				<?php
			}
			
			?>
		</div>
	</div>
	<?php
}
function table_pbbdesa_laporan()
{	
	?>
	<div id="pbbdesa-content" class="col-md-12">
		<div class="table-responsive">
			<?php $sort = "ASC"; ?>
		  <table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">NOP</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Ls Tanah(m&sup2;)</th>
				<th class="text-center">Ls Bgnan(m&sup2;)</th>
				<th class="text-center">NJOP Tanah(Rp)</th>
				<th class="text-center">NJOP Bgnan(Rp)</th>
				<th class="text-center">Ketetapan(Rp)</th>
				<th class="text-center">Keterangan</th>
			</tr>
			<?php 
			
			$koneksi = db_connect();
			$limit = 5;
			$hal = @$_GET['hal'];
			if(empty($hal)){
				$posisi = 0;
				$hal = 1;
			} else {
				$posisi = ($hal-1)*$limit;
			}
			$sql = "Select * from pbbdesa_bayar order by id_bayar desc LIMIT ".$posisi.", ".$limit;
			$result = $koneksi->query($sql);
			if($result->num_rows > 0){
				$no = $posisi + 1;
				while($row = $result->fetch_array()){
					?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td><?php echo $row['nop'];?></td>
						<td><?php echo strtoupper(strtoupper($row['nama']));?></td>
						<!--ambil data dari yp_master-->
						<?php
						$data = $koneksi->query("select * from pbbdesa where nop = '".$row['nop']."'")->fetch_array();
						?>
						<td><?php echo $data['luas_tanah'];?></td>
						<td><?php echo $data['luas_bangunan'];?></td>
						<td class="text-right"><?php echo number_format($data['njop_tanah']);?></td>
						<td class="text-right"><?php echo number_format($data['njop_bangunan']);?></td>
						<td class="text-right"><?php echo number_format($row['tagihan']);?></td>
						<td><?php echo $data['keterangan'];?></td>
					</tr>
					<?php
					$no++;
				}
			} else {
				?>
				<tr><td colspan="9">No Record</td></tr>
				<?php
			}
			
			
			# mencari total data
			$sql = "select * from pbbdesa_bayar";
			$result = $koneksi->query($sql);
			if($result){
				$totaldata = $result->num_rows;
			}else {
				$totaldata = 0;
			}

			# mancari total ketetapan
			$totpan = $koneksi->query("select sum(tagihan) as totpan from pbbdesa_bayar")->fetch_array();
			$totpan = $totpan['totpan'];
					
			?>
			<tr>
				<th colspan="4">Total Data:  <?php echo $totaldata; ?></th>
				<th colspan="5">Total Ketetapan : Rp. <?php echo number_format($totpan);  ?></th>
				
			</tr>
		</table>
		</div>
		<div id="navigasi-page" class="col-md-12 col-xs-12 col-sm-12 text-center">
			<?php
			$jumlahpage = ceil($totaldata/$limit);
			$file = $_SERVER['PHP_SELF'];
			
			#halaman sebelumbnya
			if($hal > 1){
				$prev = $hal - 1;
				?>
				<a class="nav-a" href="<?php echo $file."?page1=laporan-pbbdesa&hal=".$prev; ?>">Prev</a>
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
				<a class="nav-a" href="<?php echo $file."?page1=laporan-pbbdesa&hal=".$next; ?>">Next</a>
				<?php
			}else{
				?>
				<span class="nav-a">Next</span>
				<?php
			}
			
			?>
		</div>
	</div>
	<?php
}


?>