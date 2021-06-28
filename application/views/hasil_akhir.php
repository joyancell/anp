<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<br/>
		<div class="row">
			<div class="col-md-6 text-left">
				<h3>Data Bobot</h3>
			</div>
			<div class="col-md-6 text-right">
				<button type="button" onclick="location.href='<?php echo base_url() ?>'" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</button>
			</div>
		</div>
		<br/>
		<table width="100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th rowspan="3" class="text-center active">Alternatif</th>
					<th colspan="<?php echo $jum_kriteria; ?>" class="text-center">Kriteria</th>
				</tr>
				<tr>
					<?php 
					foreach ($kriteria as $row) {
						?>
						<th><?= $row->nama_kriteria ?></th>
						<?php 
					}
					?>
				</tr>
				<tr class="success">
					<?php 
					foreach ($kriteria as $row) {
						?>
						<td><?=number_format($row->bobot_kriteria, 4, '.', ',')?></td>
						<?php 
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($baris as $row1) {
					?>
					<tr>
						<th class="active"><?= $row1->nama_wisata ?></th>
						<?php 
						$a = $row1->id_wisata;
						foreach ($kriteria as $row2) {
							$b = $row2->id_kriteria;
							$ran1a = $this->rank->readR($a, $b); 
							foreach ($ran1a as $row3) {
								?>
								<td>
									<?php
									echo $nor = number_format($row3->skor_alt_kri, 4, '.', ',');
									?>
								</td>
								<?php
							}
						}
						?>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<hr>

		<h3>Hasil Akhir</h3>
		<br/>
		<table width="100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th rowspan="2" class="text-center active">Alternatif</th>
					<th colspan="<?php echo $jum_kriteria; ?>" class="text-center">Kriteria</th>
					<th rowspan="2" class="text-center warning">Hasil Akhir</th>
				</tr>
				<tr>
					<?php 
					foreach ($kriteria as $row) {
						?>
						<th><?= $row->nama_kriteria ?></th>
						<?php
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($baris as $row1) {
					?>
					<tr>
						<th class="active"><?=$row1->nama_wisata ?></th>
						<?php 
						$a1 = $row1->id_wisata;
						foreach ($kriteria as $row2) {
							$b2 = $row2->id_kriteria;
							$ran1b = $this->rank->readR($a1, $b2); 
							foreach ($ran1b as $row3) {
								?>
								<td>
									<?php
									$norx = $row3->skor_alt_kri * $row2->bobot_kriteria;
									echo number_format($norx, 4, '.', ',');
									// $ia = $a1;
									// $ranObj->ik = $b2;
									// $ranObj->nn4 = $norx;
									$data = ['hasil_alt_kri' => $norx];
									$where = [
										'id_alternatif' => $a1,
										'id_kriteria' => $b2,
									];
									$this->rank->normalisasi1('jum_alt_kri', $data, $where);
									?>
								</td>
								<?php
							}
						}
						?>
						<td class="warning">
							<?php
							$hasil = $this->rank->readHasil1($a1);
							echo number_format($hasil->bbn, 4, '.', ',');
							// $ranObj->ia = $a1;
							// $ranObj->has1 = $hasil['bbn'];
							$data = ['hasil_akhir' => $hasil->bbn];
							$where = ['id_wisata' => $a1];
							$this->rank->hasil1('data_wisata', $data, $where);
							?>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<hr>

	</div>
</div>

