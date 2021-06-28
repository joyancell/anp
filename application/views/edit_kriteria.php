<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>">Beranda</a></li>
			<li><a href="<?php echo base_url() ?>Kriteria">Data Kriteria</a></li>
			<li class="active">Ubah Data</li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Kriteria</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
			<form method="post" action="<?php echo base_url() ?>Kriteria/Update">
				<div class="form-group">
					<label for="nama">Nama Kriteria</label>
					<input type="hidden" class="form-control" id="id_kriteria" name="id_kriteria" value="<?php echo $kriteria->id_kriteria; ?>">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $kriteria->nama_kriteria; ?>">
				</div>
				<div class="btn-group">
					<button type="submit" class="btn btn-dark">Ubah</button>
					<button type="button" onclick="location.href='data-kriteria.php'" class="btn btn-default">Kembali</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
