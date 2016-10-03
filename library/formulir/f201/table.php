<?php

function table_f201(){
	?>
	<table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama Bayi</th>
			<th class="text-center">Ibu</th>
			<th class="text-center">Ayah</th>
			<th class="text-center">Pelapor</th>
			<th class="text-center">Saksi 1</th>
			<th class="text-center">Saksi 2</th>
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
		$sql = "Select * from bayi order by id_bayi desc LIMIT ".$posisi.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $posisi + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo strtoupper($row['nama_bayi']); ?></td>
					<td>
						<?php

						# nama ibu
						$sql_ibu = "select nama_ibu from ibu where id_bayi = '".$row['id_bayi']."'";
						$ibu = $koneksi->query($sql_ibu)->fetch_array();
						echo strtoupper($ibu['nama_ibu']);

						?>
					</td>
					<td>
						<?php 

						# nama ayah
						$sql_ayah = "select nama_ayah from ayah where id_bayi = '".$row['id_bayi']."'";
						$ayah = $koneksi->query($sql_ayah)->fetch_array();
						echo strtoupper($ayah['nama_ayah']);

						?>
					</td>
					<td>
						<?php

						# nama pelapor
						$sql_pelapor = "select nama from pelapor where id_bayi = '".$row['id_bayi']."'";
						$pelapor = $koneksi->query($sql_pelapor)->fetch_array();
						echo strtoupper($pelapor['nama']);

						?>
					</td>
					<td>
						<?php

						# nama saksi 1
						$sql_saksi1 = "select nama from saksi1 where id_bayi = '".$row['id_bayi']."'";
						$saksi1 = $koneksi->query($sql_saksi1)->fetch_array();
						echo strtoupper($saksi1['nama']);

						?>
					</td>
					<td>
						<?php

						# nama saksi 2 
						$sql_saksi2 = "select nama from saksi2 where id_bayi = '".$row['id_bayi']."'";
						$saksi2 = $koneksi->query($sql_saksi2)->fetch_array();
						echo strtoupper($saksi2['nama']);

						?>
					</td>
					<td>
						<div class="text-center">
							<a class="btn btn-warning" target="_blank" href="<?php echo "?page1=f201-pdf&id_bayi=".$row['id_bayi']; ?>">View Pdf</a>
							<a class="btn btn-danger" href="<?php echo "?page1=f201-delete&id_bayi=".$row['id_bayi'];?>" onclick="return confirm('<?php echo "yakin hapus data bayi dengan nama bayi = ".$row['nama_bayi']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
		$sql = "select * from bayi" ;
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
			<a class="nav-a" href="<?php echo "?page1=f201&hal=".$prev; ?>">Prev</a>
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
			<a class="nav-a" href="<?php echo "?page1=f201&hal=".$next; ?>">Next</a>
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

# table cari
function table_cari_f201($cari){
	?>
	<table class="table table-bordered table-aing table-responsive col-md-12 col-sm-12 col-xs-12">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama Bayi</th>
			<th class="text-center">Ibu</th>
			<th class="text-center">Ayah</th>
			<th class="text-center">Pelapor</th>
			<th class="text-center">Saksi 1</th>
			<th class="text-center">Saksi 2</th>
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
		$sql = "Select * from bayi where nama_bayi like '%".$cari."%' order by id_bayi desc LIMIT ".$posisi.", ".$limit;
		$result = $koneksi->query($sql);
		if($result->num_rows > 0){
			$no = $posisi + 1;
			while($row = $result->fetch_array()){
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo strtoupper($row['nama_bayi']); ?></td>
					<td>
						<?php

						# nama ibu
						$sql_ibu = "select nama_ibu from ibu where id_bayi = '".$row['id_bayi']."'";
						$ibu = $koneksi->query($sql_ibu)->fetch_array();
						echo strtoupper($ibu['nama_ibu']);

						?>
					</td>
					<td>
						<?php 

						# nama ayah
						$sql_ayah = "select nama_ayah from ayah where id_bayi = '".$row['id_bayi']."'";
						$ayah = $koneksi->query($sql_ayah)->fetch_array();
						echo strtoupper($ayah['nama_ayah']);

						?>
					</td>
					<td>
						<?php

						# nama pelapor
						$sql_pelapor = "select nama from pelapor where id_bayi = '".$row['id_bayi']."'";
						$pelapor = $koneksi->query($sql_pelapor)->fetch_array();
						echo strtoupper($pelapor['nama']);

						?>
					</td>
					<td>
						<?php

						# nama saksi 1
						$sql_saksi1 = "select nama from saksi1 where id_bayi = '".$row['id_bayi']."'";
						$saksi1 = $koneksi->query($sql_saksi1)->fetch_array();
						echo strtoupper($saksi1['nama']);

						?>
					</td>
					<td>
						<?php

						# nama saksi 2 
						$sql_saksi2 = "select nama from saksi2 where id_bayi = '".$row['id_bayi']."'";
						$saksi2 = $koneksi->query($sql_saksi2)->fetch_array();
						echo strtoupper($saksi2['nama']);

						?>
					</td>
					<td>
						<div class="text-center">
							<a class="btn btn-warning" target="_blank" href="<?php echo "?page1=f201-pdf&id_bayi=".$row['id_bayi']; ?>">View Pdf</a>
							<a class="btn btn-danger" href="<?php echo "?page1=f201-delete&id_bayi=".$row['id_bayi'];?>" onclick="return confirm('<?php echo "yakin hapus data bayi dengan nama bayi = ".$row['nama_bayi']; ?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
		$sql = "select * from bayi where nama_bayi like '%".$cari."%'" ;
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
			<a class="nav-a" href="<?php echo "?page1=f201&search=".$cari."&hal=".$prev; ?>">Prev</a>
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
			<a class="nav-a" href="<?php echo "?page1=f201&search=".$cari."&hal=".$next; ?>">Next</a>
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

