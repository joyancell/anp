<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
  	<ol class="breadcrumb">
  	  <li><a href="<?php echo base_url() ?>"><span class="fa fa-home"></span> Beranda</a></li>
  	  <li class="active"><span class="fa fa-user"></span> Profil</li>
  	</ol>
  	<p style="margin-bottom:10px;">
  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Profil</strong>
  	</p>
    <form method="post" action="<?php echo base_url() ?>Profil/update">
      <div class="form-group">
        <label for="nl">Nama Lengkap</label>
        <input type="text" class="form-control" id="nl" name="nl" value="<?php echo $this->session->userdata('nama_lengkap'); ?>" required>
      </div>
      <div class="form-group">
        <label for="un">Username</label>
        <input type="text" class="form-control" id="un" name="un" value="<?php echo $this->session->userdata('username'); ?>" required>
      </div>
      <div class="form-group">
        <label for="pw">Password</label>
        <input type="password" class="form-control" id="pw" name="pw" placeholder="kosongkan jika tidak ingin mengubah password">
      </div>
      <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span> Ubah</button>
    </form>

  </div>
</div>