<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>">Beranda</a></li>
			<li><a href="<?php echo base_url() ?>Analisa_kriteria">Analisa Kriteria</a></li>
			<li class="active">Tabel Analisa Kriteria</li>
		</ol>
		<div class="row">
			<div class="col-md-6 text-left">
				<strong style="font-size:18pt;"><span class="fa fa-table"></span> Perbandingan Kriteria</strong>
			</div>
			<div class="col-md-6 text-right">
				<form method="post">
					<button name="hapus" class="btn btn-danger">Hapus Semua Data</button>
				</form>
			</div>
		</div>
		<br/>
		<table width="100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Antar Kriteria</th>
					<?php 
					foreach ($kriteria as $row) {
						?>
						<th><?=$row->nama_kriteria ?></th>
						<?php 
					} 
					?>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($kriteria as $baris) {
					?>
					<tr>
						<th class="active"><?= $baris->nama_kriteria ?></th>
						<?php 
						foreach ($kriteria as $kolom) {
							?>
							<td>
								<?php
								if ($baris->id_kriteria == $kolom->id_kriteria) {
									echo '1';
									$data = [
										'kriteria_pertama'       => $baris->id_kriteria,
										'nilai_analisa_kriteria' => 1,
										'hasil_analisa_kriteria' => 0,
										'kriteria_kedua'        => $kolom->id_kriteria
									];
									if ($this->model->insert('analisa_kriteria', $data)) {
										// ...
									} else {
										$this->model->update('analisa_kriteria', $data);
									}
								} else {
									$kp = $this->model->readAll1($baris->id_kriteria, $kolom->id_kriteria);
									echo number_format($kp->nilai_analisa_kriteria, 4, '.', ',');
								}
								?>
							</td>
							<?php 
						} 
						?>
					</tr>
					<?php 
				}
				?>
			</tbody>
			<tfoot>
				<tr class="info">
					<th>Jumlah</th>
					<?php 
					foreach ($kriteria as $row) {
						?>
						<th>
							<?php
							$nak = $this->model->readSum1($row->id_kriteria);
							echo number_format($nak->jumkr, 4, '.', ',');
							$data  = ['jumlah_kriteria' => $nak->jumkr];
							$where = ['id_kriteria' => $row->id_kriteria];
							$this->model->insert3('data_kriteria', $data, $where);
							?>
						</th>
						<?php 
					}
					?>
				</tr>
			</tfoot>
		</table>

		<table width="100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Perbandingan</th>
					<?php 
					foreach ($kriteria as $row2x) {
						?>
						<th><?=$row2x->nama_kriteria ?></th>
						<?php 
					}
					?>
					<th class="info">Jumlah</th>
					<th class="success">Prioritas</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($kriteria as $baris) {
					?>
					<tr>
						<th class="active"><?= $baris->nama_kriteria ?></th>
						<?php 
						foreach ($kriteria as $kolom) {
							?>
							<td>
								<?php
								if ($baris->id_kriteria == $kolom->id_kriteria) {
									$c = 1/$kolom->jumlah_kriteria;
									$data  = ['hasil_analisa_kriteria' => $c];
									$where = [
										'kriteria_pertama' => $baris->id_kriteria, 
										'kriteria_kedua'   => $kolom->id_kriteria
									];
									$this->model->insert2('analisa_kriteria', $data, $where);
									echo number_format($c, 4, '.', ',');
								} else {
									$kp = $this->model->readAll1($baris->id_kriteria, $kolom->id_kriteria);
									$c = $kp->nilai_analisa_kriteria/$kolom->jumlah_kriteria;
									$data  = ['hasil_analisa_kriteria' => $c];
									$where = [
										'kriteria_pertama' => $baris->id_kriteria, 
										'kriteria_kedua'   => $kolom->id_kriteria
									];
									$this->model->insert2('analisa_kriteria', $data, $where);
									echo number_format($c, 4, '.', ',');
								}
								?>
							</td>
							<?php
						}
						?>
						<th class="info">
							<?php
							$hak = $this->model->readSum2($baris->id_kriteria);
							$j   = $hak->jumlah;
							echo number_format($j, 4, '.', ',');
							?>
						</th>
						<th class="success">
							<?php
							$hak   = $this->model->readAvg($baris->id_kriteria);
							$b     = $hak->avgkr;
							$data  = ['bobot_kriteria' => $b];
							$where = ['id_kriteria' => $baris->id_kriteria];
							$this->model->insert4('data_kriteria', $data, $where);
							echo number_format($b, 4, '.', ',');
							?>
						</th>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>

		<table width="100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Penjumlahan</th>
					<?php 
					foreach ($kriteria as $row) {
						?>
						<th><?=$row->nama_kriteria ?></th>
						<?php
					}
					?>
					<th class="info">Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$sumRow = []; 
				foreach ($kriteria as $baris) {
					?>
					<tr>
						<th class="active"><?= $baris->nama_kriteria ?></th>
						<?php 
						$jumlah = 0; 
						foreach ($kriteria as $kolom) {
							?>
							<td>
								<?php
								if ($baris->id_kriteria == $kolom->id_kriteria) {
									$c = $kolom->bobot_kriteria * 1;
									echo number_format($c, 4, '.', ',');
									$jumlah += $c;
								} else {
									$kp = $this->model->readAll1($baris->id_kriteria, $kolom->id_kriteria);
									$c = $kolom->bobot_kriteria * $kp->nilai_analisa_kriteria;
									echo number_format($c, 4, '.', ',');
									$jumlah += $c;
								}
								?>
							</td>
							<?php
						}
						?>
						<th class="info">
							<?php
							$sumRow[$baris->id_kriteria] = $jumlah;
							echo number_format($jumlah, 4, '.', ',');
							?>
						</th>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>

		<table width="100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Rasio Konsistensi</th>
					<th class="info">Jumlah</th>
					<th class="success">Prioritas</th>
					<th class="warning">Hasil</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$total=0; 
				foreach ($kriteria as $row1) {
					?>
					<tr>
						<th class="active"><?= $row1->nama_kriteria?></th>
						<th class="info"><?= number_format($sumRow[$row1->id_kriteria], 4, '.', ',')?></th>
						<th class="success"><?= number_format($row1->bobot_kriteria, 4, '.', ',');?></th>
						<?php $jumlah = $sumRow[$row1->id_kriteria] + $row1->bobot_kriteria; ?>
						<th class="warning"><?= number_format($jumlah, 4, '.', ',');?></th>
						<?php $total += $jumlah; ?>
					</tr>
					<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr class="danger">
					<th colspan="3">Rata-rata</th>
					<th>
						<?php 
						$rata = $total/$count; 
						echo number_format($rata, 4, '.', ','); 
						?>
					</th>
				</tr>
			</tfoot>
		</table>

		<table width="100%" class="table table-striped table-bordered">
			<tbody>
				<tr>
					<th>N (kriteria)</th>
					<td><?= $count ?></td>
				</tr>
				<tr>
					<th>Hasil Akhir (X maks)</th>
					<td><?= number_format($rata, 4, '.', ',');?></td>
				</tr>
				<tr>
					<th>IR</th>
					<td><?php echo $ir = $this->model->getIr($count); ?></td>
				</tr>
				<tr>
					<th>CI</th>
					<td>
						<?php 
						$ci = ($rata-$count)/($count-1); 
						echo number_format($ci, 4, '.', ',');
						?>
					</td>
				</tr>
				<tr>
					<th>CR</th>
					<td><?php $cr = $ci/$ir; echo number_format($cr, 4, '.', ',');?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>