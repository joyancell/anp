<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <ol class="breadcrumb">
      <li><a href="index.php">Beranda</a></li>
      <li><a href="<?php echo base_url() ?>Wisata">Data Alternatif</a></li>
      <li class="active">Ubah Data</li>
    </ol>
    <p style="margin-bottom:10px;">
      <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Alternatif</strong>
    </p>
    <div class="panel panel-default">
      <div class="panel-body">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>Wisata/update">
          <div class="form-group">
            <label for="id">ID Alternatif</label>
            <input type="text" name="id" id="id" class="form-control" autofocus="on" readonly="on" value="<?php echo $wisata->id_wisata; ?>">
          </div>
          <div class="form-group">
            <label for="nama">Nama Wisata</label>
            <input type="text" name="nama" id="nama" class="form-control" required="on" value="<?php echo $wisata->nama_wisata; ?>">
          </div>
          <div class="form-group">
            <label for="foto_wisata">Foto Wisata</label>
            <input type="file" name="foto_wisata" id="foto_wisata" class="form-control">
            <input type="hidden" name="foto_lama" value="<?php echo $wisata->foto_wisata; ?>">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required="on" value="<?php echo $wisata->alamat; ?>">
          </div>
          <div class="btn-group">
            <button type="submit" class="btn btn-dark">Ubah</button>
            <button type="button" onclick="location.href = '<?php echo base_url() ?>Wisata'" class="btn btn-default">Kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>