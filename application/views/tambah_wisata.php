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
			<li><a href="index.php">Beranda</a></li>
			<li><a href="<?php echo base_url() ?>Wisata">Data Alternatif</a></li>
			<li class="active">Tambah Data</li>
		</ol>
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-clone"></span> Tambah Alternatif</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>Wisata/simpan">
					<div class="form-group">
						<label for="id_wisata">ID Alternatif</label>
						<input type="text" class="form-control" id="id_wisata" name="id_wisata" required readonly="on" value="<?php echo $this->model->getNewIdWisata(); ?>">
					</div>
					<div class="form-group">
						<label for="nama_wisata">Nama Wisata</label>
						<input type="text" name="nama_wisata" id="nama_wisata" class="form-control" autofocus="on" required="on">
					</div>
					<div class="form-group">
						<label for="foto_wisata">Foto Wisata</label>
						<input type="file" name="foto_wisata" id="foto_wisata" class="form-control" required="on">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control" required="on">
					</div>
					<div class="btn-group">
						<button type="submit" class="btn btn-dark">Simpan</button>
						<button type="button" onclick="location.href='<?php echo base_url() ?>Wisata'" class="btn btn-default">Kembali</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>