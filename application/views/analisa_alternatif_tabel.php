<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>">Beranda</a></li>
			<li><a href="<?php echo base_url() ?>Analisa_alternatif">Analisa Alternatif</a></li>
			<li class="active">Tabel Analisa Alternatif</li>
		</ol>
		<div class="row">
			<div class="col-md-6 text-left">
				<strong style="font-size:18pt;"><span class="fa fa-table"></span> Alternatif Menurut Kriteria</strong>
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
					<th><?= $kriteria->nama_kriteria ?></th>
					<?php 
					$alt1a = $this->model->readByFilter(); 
					foreach ($alt1a as $row) {
						?>
						<th><?= $row->nama_wisata ?></th>
						<?php
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php 
				$alt2a = $this->model->readByFilter(); 
				foreach ($alt2a as $baris) {
					?>
					<tr>
						<th class="active"><?= $baris->nama_wisata ?></th>
						<?php 
						$alt3a = $this->model->readByFilter(); 
						foreach ($alt3a as $kolom) {
							?>
							<td>
								<?php
								if ($baris->id_wisata == $kolom->id_wisata) {
									echo '1';
									$data = [
										'alternatif_pertama'       => $baris->id_alternatif,
										'nilai_analisa_alternatif' => 1,
										'hasil_analisa_alternatif' => '',
										'alternatif_kedua'         => $kolom->id_alternatif,
										'id_kriteria'              => $altkriteria
									];
									$data2 = [
										'nilai_analisa_alternatif' => 1
									];
									$where = [
										'alternatif_pertama' => $baris->id_alternatif,
										'alternatif_kedua'   => $kolom->id_alternatif,
										'id_kriteria'        => $altkriteria,
									];
									if ($this->model->insert('analisa_alternatif', $data)) {
									}else{
										$this->model->update('analisa_alternatif', $data2, $where);
									}
								} else {
									$kp = $this->model->readAll1($baris->id_wisata, $kolom->id_wisata, $altkriteria);
									echo number_format($kp->nilai_analisa_alternatif, 4, '.', ',');
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
					$alt4a = $this->model->readByFilter(); 
					foreach ($alt4a as $row) {
						?>
						<th>
							<?php
							$nak = $this->model->readSum1($row->id_alternatif, $altkriteria);
							echo number_format($nak->jumkr, 4, '.', ',');
							$data = [
								'id_alternatif'  => $row->id_alternatif,
								'id_kriteria'    => $altkriteria,
								'jumlah_alt_kri' => $nak->jumkr,
							];
							$data2 = [
								'jumlah_alt_kri' => $nak->jumkr
							];
							$where = [
								'id_alternatif' => $row->id_alternatif,
								'id_kriteria'   => $altkriteria
							];
							if ($this->model->insert3('jum_alt_kri', $data)) {
							}else{
								$this->model->insert5('jum_alt_kri', $data, $where);
							}
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
					$alt1b = $this->model->readByFilter();
					foreach ($alt1b as $row) {
						?>
						<th><?=$row->nama_wisata ?></th>
						<?php
					}
					?>
					<th class="success">Prioritas</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$alt2b = $this->model->readByFilter(); 
				foreach ($alt2b as $baris) {
					?>
					<tr>
						<th class="active"><?=$baris->nama_wisata ?></th>
						<?php 
						$alt3b = $this->model->readByFilter(); 
						foreach ($alt3b as $kolom) {
							?>
							<td>
								<?php
								$jak = $this->model->readAll3($kolom->id_alternatif, $altkriteria);
								$jumlahBobot = $jak->jumlah_alt_kri;
								if ($baris->id_alternatif == $kolom->id_alternatif) {
									$n = 1/$jumlahBobot;
									$data = [
										'hasil_analisa_alternatif' => $n,
									];
									$where = [
										'alternatif_pertama' => $baris->id_alternatif,
										'alternatif_kedua'   => $kolom->id_alternatif,
										'id_kriteria'        => $altkriteria,
									];

									$this->model->insert2('analisa_alternatif', $data, $where);
									echo number_format($n, 4, '.', ',');
								} else {
									$data = [
										'hasil_analisa_alternatif' => $n,
									];
									$where = [
										'alternatif_pertama' => $baris->id_alternatif,
										'alternatif_kedua'   => $kolom->id_alternatif,
										'id_kriteria'        => $altkriteria,
									];
									$kp = $this->model->readAll1($baris->id_alternatif, $kolom->id_alternatif, $altkriteria);
									$bobot = $kp->nilai_analisa_alternatif;
									$n = $bobot/$jumlahBobot;
									$this->model->insert2('analisa_alternatif', $data, $where);
									echo number_format($n, 4, '.', ',');
								}
								?>
							</td>
							<?php
						}
						?>
						<th class="success">
							<?php
							$hak = $this->model->readAvg($baris->id_alternatif);
							$prioritas = $hak->avgkr;
							$data = [
								'skor_alt_kri' => $prioritas
							];
							$where = [
								'id_alternatif' => $baris->id_alternatif,
								'id_kriteria'   => $altkriteria,
							];
							$this->model->insert4('jum_alt_kri', $data, $where);
							echo number_format($prioritas, 4, '.', ',');
							?>
						</th>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>