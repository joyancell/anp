<?php  
$r = [];
$kriteriaCount = $this->kriteria->countAll();
$kriterias = $this->kriteria->getKriteria();
foreach ($kriterias as $row) {
	$kriteriass = $this->kriteria->getOneKriteria($row->id_kriteria);
	$pcs = explode("C", $kriteriass->id_kriteria);
	$c = $kriteriaCount - $pcs[1];
	if ($c>=1) {
		echo "string";
		$r[$row->id_kriteria] = $c;
	}
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Beranda</a></li>
			<li class="active">Analisa Kriteria</li>
			<li><a href="analisa-kriteria-tabel.php">Tabel Analisa Kriteria</a></li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-bomb"></span> Analisa Kriteria</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" action="<?php echo base_url() ?>Analisa_kriteria/tabel_analisa_kriteria">
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
					foreach ($r as $k => $v): 
						for ($i=1; $i<=$v; $i++):
							$rows = $this->kriteria->getOneKriteria2($k); 
							foreach ($rows as $row) {
								?>
								<div class="row">
									<div class="col-xs-12 col-md-3">
										<div class="form-group">
											<?php 
											$rows = $this->kriteria->getOneKriteria2($k); 
											foreach ($rows as $row) {
												?>
												<input type="text" class="form-control" value="<?= $row->nama_kriteria ?>" readonly />
												<input type="hidden" name="<?=$k?><?=$no?>" value="<?=$row->id_kriteria ?>" />
												<?php 
											}
											?>
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="form-group">
											<select class="form-control" name="nl<?=$no?>">
												<?php 
												$rows = $this->nilai->getNilai(); 
												foreach ($rows as $row) {
													?>
													<option value="<?=$row->jum_nilai?>"><?=$row->jum_nilai ?> - <?=$row->ket_nilai ?></option>
													<?php 
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-md-3">
										<div class="form-group">
											<?php 
											$pcs = explode("C", $k); 
											$nid = "C".($pcs[1]+$i); 
											$rows = $this->kriteria->getOneKriteria2($nid); 
											foreach ($rows as $row) {
												?>
												<input type="text" class="form-control" value="<?=$row->nama_kriteria ?>" readonly />
												<input type="hidden" name="<?=$nid?><?=$no?>" value="<?=$row->id_kriteria ?>" />
												<?php 
											}
											?>
										</div>
									</div>
								</div>
								<?php 
							} 
							$no++; 
						endfor; 
					endforeach; 
					?>
					<button type="submit" name="submit" class="btn btn-dark"> Selanjutnya <span class="fa fa-arrow-right"></span></button>
				</form>
			</div>
		</div>
	</div>
</div>