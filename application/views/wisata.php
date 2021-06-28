<?php  
if ($this->session->flashdata('update')) {
  ?>
  <script type="text/javascript">
    window.onload=function(){
      tesupdate();
    };
  </script>
  <?php 
}

if (isset($_POST['hapus-contengan'])) {
  $imp = "('".implode("','", array_values($_POST['checkbox']))."')";
  
  $result = $this->model->hapusell($imp);
  if ($result) { ?>
    <script type="text/javascript">
      window.onload=function(){
        showSuccessToast();
        setTimeout(function(){
          window.location.reload(1);
          history.go(0)
          location.href = location.href
        }, 1);
      };
    </script> 
    <?php
  } else { 
    ?>
    <script type="text/javascript">
      window.onload=function(){
        showErrorToast();
        setTimeout(function(){
          window.location.reload(1);
          history.go(0)
          location.href = location.href
        }, 5000);
      };
    </script> 
    <?php
  }
}
?>
<div class="row">
  <div class="col-xs-13 col-sm-13 col-md-12">
    <ol class="breadcrumb">
      <li><a href="index.php">Beranda</a></li>
      <li class="active">Data Alternatif</li>
    </ol>
    <form method="post">
      <div class="row">
        <div class="col-md-6 text-left">
          <strong style="font-size:18pt;"><span class="fa fa-book"></span> Data Alternatif / Data Wisata</strong>
        </div>
        <div class="col-md-6 text-right">
          <div class="btn-group">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Contengan</button>
            <button type="button" onclick="location.href='<?php echo base_url() ?>Wisata/tambah'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</button>
          </div>
        </div>
      </div>
      <br/>

      <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
          <tr>
            <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
            <th>ID Alternatif</th>
            <th>Nama Wisata</th>
            <th>Alamat</th>
            <th>Nilai</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php  
          foreach ($wisata as $wisata) {
            ?>
            <tr>
              <td><input type="checkbox" value="<?php echo $wisata->id_wisata ?>" name="checkbox[]" /></td>
              <td><?php echo $wisata->id_wisata ?></td>
              <td><?php echo $wisata->nama_wisata ?></td>
              <td><?php echo $wisata->alamat ?></td>
              <td>
                <?php 
                $id_alternatif = $wisata->id_wisata; 
                $cek = $this->model->readByAlternatif($id_alternatif); 
                if ($cek): ?>
                  <?=$cek->nilai ?> (<?=$cek->keterangan?>)
                <?php else: ?>
                  <span class="label label-danger">Belum</span>
                <?php endif; ?>
              </td>
              <td class="text-center">
                <a href="<?php echo base_url() ?>Wisata/edit/<?php echo $id_alternatif ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href="<?php echo base_url() ?>Wisata/hapus/<?php echo $id_alternatif ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
            <?php 
          } 
          ?>
        </tbody>
      </table>
    </form>
  </div>
</div>