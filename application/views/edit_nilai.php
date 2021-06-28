<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
	  <ol class="breadcrumb">
		  <li><a href="<?php echo base_url() ?>">Beranda</a></li>
		  <li><a href="<?php echo base_url() ?>Nilai">Nilai</a></li>
		  <li class="active">Ubah Data</li>
		</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Nilai Preferensi</strong>
  	</p>
  	<div class="panel panel-default">
			<div class="panel-body">
		    <form method="post" action="<?php echo base_url() ?>Nilai/update">
				  <div class="form-group">
				    <label for="jm">Jumlah Nilai</label>
				    <input type="text" class="form-control" id="jm" name="jm" value="<?php echo $nilai->jum_nilai; ?>">
				    <input type="hidden" class="form-control" id="id_nilai" name="id_nilai" value="<?php echo $nilai->id_nilai; ?>">
				  </div>
				  <div class="form-group">
				    <label for="kt">Keterangan Nilai</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $nilai->ket_nilai; ?>">
				  </div>
					<div class="btn-group">
					  <button type="submit" class="btn btn-dark">Ubah</button>
					  <button type="button" onclick="location.href='<?php echo base_url() ?>Nilai'" class="btn btn-default">Kembali</button>
					</div>
				</form>
			  </div>
			</div>
	</div>
  <div class="col-xs-12 col-sm-12 col-md-2"> </div>
</div>
