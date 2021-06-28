<?php
$altCount = $this->model->countByFilter();

$no   = 1; 
$r    = []; 
$nid  = [];
$alt1 = $this->model->readByFilter();
foreach ($alt1 as $row) {
	$alt2 = $this->model->readByFilter();
	foreach ($alt2 as $roww) {
		$nid[$row->id_alternatif][] = $roww->id_alternatif;
	}
	$total = $altCount-$no;
	if ($total >= 1) {
		$r[$row->id_alternatif] = $total;
	}
	$no++;
}
$ni = 1;
foreach ($nid as $key => $value) {
	array_splice($nid[$key], 0, $ni++);
}
$ne = count($nid)-1;
array_splice($nid, $ne, 1);
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>">Beranda</a></li>
			<li class="active">Analisa Alternatif</li>
			<li><a href="#" data-toggle="modal" data-target="#myModalalt">Tabel Analisa Alternatif</a></li>
		</ol>
		<table width="100%" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th width="50px"></th>
					<th width="50px">No</th>
					<th>ID</th>
					<th>Nama</th>
					<th>Nilai</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1; 
				$alt1a = $this->model->readByFilter();
				foreach ($alt1a as $row) {
					?>
					<tr>
						<td class="text-center">
							<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalNilaiDetail" data-id-alternatif="<?= $row->id_alternatif ?>"><span class="fa fa-eye" aria-hidden="true"></span></button>
						</td>
						<td><?= $no++ ?></td>
						<td><?= $row->id_alternatif ?></td>
						<td><?= $row->nama_wisata ?></td>
						<td><?= $row->nilai ?></td>
						<td>
							<?php
							if ($row->keterangan == "B") {
								echo "Baik";
							}elseif($row->keterangan == "C"){
								echo "Cukup";
							}else{
								echo "Kurang";
							}
							?>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>

		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" action="<?php echo base_url() ?>Analisa_alternatif/tabel_analisa_alternatif">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<p style="padding:10px 0;"><label>Pilih Kriteria</label></p>
							</div>
						</div>
						<div class="col-xs-12 col-md-9">
							<div class="form-group">
								<select class="form-control" id="kriteria" name="kriteria">
									<?php 
									$kri2 = $this->kriteria->getKriteria(); 
									foreach ($kri2 as $row) {
										?>
										<option value="<?= $row->id_kriteria ?>"><?= $row->nama_kriteria ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label>Kriteria Pertama</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label>Pernilaian</label>
							</div>
						</div>
						<div class="col-xs-12 col-md-3">
							<div class="form-group">
								<label>Kriteria Kedua</label>
							</div>
						</div>
					</div>

					<?php 
					$no=1; 
					foreach ($r as $k => $v)
					{
						$j=0; 
						for ($i=1; $i<=$v; $i++)
						{
							$rows = $this->model->readSatu($k); 
							foreach ($rows as $row => $value) 
							{
								?>
								<div class="row">
									<div class="col-xs-12 col-md-3">
										<div class="form-group">
											<?php 
											$rows = $this->model->readAlternatif($k); 
											foreach ($rows as $row) {
												?>
												<input type="text" class="form-control" value="<?= $row->nama_wisata ?>" readonly />
												<input type="hidden" name="<?= $k ?><?= $no ?>" value="<?=$row->id_wisata ?>" />
												<?php
											}
											?>
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<select class="form-control" name="nl<?=$no?>">
												<?php 
												$stmt1 = $this->nilai->getNilai(); 
												foreach ($stmt1 as $row2) {
													?>
													<option value="<?= $row2->jum_nilai ?>"><?=$row2->jum_nilai ?> - <?=$row2->ket_nilai ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-md-3">
										<div class="form-group">
											<?php 
											$rows = $this->model->readAlternatif($nid[$k][$j]); 
											foreach ($rows as $row) {
												?>
												<input type="text" class="form-control" value="<?= $row->nama_wisata ?>" readonly />
												<input type="hidden" name="<?=$nid[$k][$j]?><?=$no?>" value="<?=$row->id_wisata ?>" />
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<?php 
							}
							$no++; 
							$j++;
						}
					} 
					?>
					<button type="submit" name="submit" class="btn btn-dark"> Selanjutnya <span class="fa fa-arrow-right"></span></button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- modal -->




