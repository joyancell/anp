<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>">Beranda</a></li>
			<li><a href="<?php echo base_url() ?>Nilai_awal">Nilai Awal</a></li>
			<li class="active">Tambah Data</li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Nilai Preferensi</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" action="<?php echo base_url() ?>Nilai_awal/simpan">
					<div class="form-group">
						<label for="id_alternatif">Pegawai</label>
						<select class="form-control" id="id_alternatif" name="id_alternatif">
							<option value="">---</option>
							<?php  
							foreach ($wisata as $wisata) {
								?>
								<option value="<?php echo $wisata->id_wisata ?>"><?php echo $wisata->nama_wisata ?></option>
								<?php 
							}
							?>
						</select>
					</div>
					<?php  
					foreach ($kriteria as $kriteria) {
						?>
						<div class="form-group">
							<label for="<?=$kriteria->nama_kriteria ?>"><?=ucfirst($kriteria->nama_kriteria)?></label>
							<input type="text" name="kriteria[<?=$kriteria->id_kriteria?>]" class="form-control">
						</div>
						<?php 
					} 
					?>
					<div class="form-group">
						<label for="periode">Periode</label>
						<select class="form-control" name="periode">
							<option>---</option>
							<?php 
							$date = date('Y');
							for ($i=2016; $i<=$date; $i++)
							{
								?>
								<option value="<?=$i?>"><?=$i?></option>
								<?php 
							} 
							?>
						</select>
					</div>
					<div class="btn-group">
						<button type="submit" class="btn btn-dark">Simpan</button>
						<button type="button" onclick="location.href='<?php echo base_url() ?>Nilai_awal'" class="btn btn-default">Kembali</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
