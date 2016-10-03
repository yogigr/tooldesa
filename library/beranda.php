<?php  

function beranda()
{
	?>
	<div id="beranda" class="col-md-12">
		<div id="beranda-header" class="col-md-12">
			<h4>Beranda</h4>
		</div>
		<div id="beranda-content" class="col-md-12">
			<div class="alert alert-success" role="alert"><p>Selamat datang Administrator Tool Desa</p></div>
			<table class="table">
				<tr>
					<td>Login Terakhir</td>
					<td><?php echo $_COOKIE['login_terakhir']; ?></td>
				</tr>
				<!--PBB DESA-->
				<tr>
					<td colspan="2"><strong>PBB DESA</strong></td>
				</tr>
				<tr>
					<td>Jumlah Master NOP</td>
					<td>
						<?php
							$koneksi = db_connect();
							$totalnop = $koneksi->query("select * from pbbdesa")->num_rows ;
							echo $totalnop." Data NOP" ;
						?>
					</td>
				</tr>
				<tr>
					<td>Total Tagihan per Tahun</td>
					<td>
						<?php
						$data = $koneksi->query("select sum(tagihan) as totaltagihan from pbbdesa")->fetch_array();
						echo "Rp. ".number_format($data['totaltagihan']);
						?>
					</td>
				</tr>
				<!--/PBB DESA-->

				<!-- Formulir -->
				<tr>
					<td colspan="2"><strong>FORMULIR</strong></td>
				</tr>
				<tr>
					<td>Jml Data F-1.15</td>
					<td>
						<?php
							$totalf115 = $koneksi->query("Select * from pemohon_kk")->num_rows;
							echo $totalf115." Data";
						?>
					</td>
				</tr>
				<tr>
					<td>Jml Data F-1.16</td>
					<td>
						<?php
							$totalf116 = $koneksi->query("Select * from perubahan_kk")->num_rows;
							echo $totalf116." Data";
						?>
					</td>
				</tr>
				<tr>
					<td>Jml Data F-1.25</td>
					<td>
						<?php
							$totalf125 = $koneksi->query("Select * from pemohon_pindah where tipe_pindah = 'antar desa'")->num_rows;
							echo $totalf125." Data";
						?>
					</td>
				</tr>
				<tr>
					<td>Jml Data F-1.29</td>
					<td>
						<?php
							$totalf129 = $koneksi->query("Select * from pemohon_pindah where tipe_pindah = 'antar kecamatan'")->num_rows;
							echo $totalf129." Data";
						?>
					</td>
				</tr>
				<tr>
					<td>Jml Data F-1.34</td>
					<td>
						<?php
							$totalf134 = $koneksi->query("Select * from pemohon_pindah where tipe_pindah = 'antar kabupaten'")->num_rows;
							echo $totalf134." Data";
						?>
					</td>
				</tr>
				<tr>
					<td>Jml Data F-2.01</td>
					<td>
						<?php
							$totalf201 = $koneksi->query("Select * from bayi")->num_rows;
							echo $totalf201." Data";
						?>
					</td>
				</tr>
				<tr>
					<td>Jml Data F-2.29</td>
					<td>
						<?php
							$totalf229 = $koneksi->query("Select * from jenazah")->num_rows;
							echo $totalf229." Data";
						?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php
}


?>