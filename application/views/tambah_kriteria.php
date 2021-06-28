<?php  
if ($this->session->flashdata('pesan')) {
	?>
	<script type="text/javascript">
		window.onload=function(){
			showStickySuccessToast();
		};
	</script>
	<?php 
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>">Beranda</a></li>
			<li><a href="<?php echo base_url() ?>Kriteria">Data Kriteria</a></li>
			<li class="active">Tambah Data</li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Kriteria</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" id="form" action="<?php echo base_url() ?>Kriteria/simpan">
					<div class="form-group">
						<label for="id_kriteria">ID Kriteria</label>
					  <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" required readonly="on" value="<?php echo $this->model->getNewId(); ?>">
					</div>
					<div class="form-group">
						<label for="nama">Nama Kriteria</label>
						<input type="text" class="form-control" id="nama" name="nama" minlength="5" required="on">
					</div>
					<div class="btn-group">
						<button type="submit" class="btn btn-dark">Simpan</button>
						<button type="button" onclick="location.href='<?php echo base_url() ?>Kriteria'" class="btn btn-default">Kembali</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>