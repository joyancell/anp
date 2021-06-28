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
if ($this->session->flashdata('hapus')) {
  ?>
  <script type="text/javascript">
    window.onload=function(){
      showSuccessToast();
    };
  </script>
  <?php 
}

if (isset($_POST['hapus-contengan'])) {
  $imp = "('".implode("','", array_values($_POST['checkbox']))."')";
  $result = $this->model->hapusell($imp);
  $this->session->set_flashdata('hapus', 'Data Berhasil dihapus...');
  if ($result) { 
    redirect('Nilai');
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
  <div class="col-xs-12 col-sm-12 col-md-12">
    <ol class="breadcrumb">
      <li><a href="index.php">Beranda</a></li>
      <li class="active">Nilai</li>
    </ol>
    <form method="post">
      <div class="row">
        <div class="col-md-6 text-left">
          <strong style="font-size:18pt;"><span class="fa fa-modx"></span> Data Nilai Preferensi</strong>
        </div>
        <div class="col-md-6 text-right">
          <div class="btn-group">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Contengan</button>
            <button type="button" onclick="location.href='<?php echo base_url() ?>Nilai/tambah'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</button>
          </div>
        </div>
      </div>
      <br/>
      <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
          <tr>
            <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
            <th>Nilai</th>
            <th>Keterangan</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th><input type="checkbox" name="select-all2" id="select-all2" /></th>
            <th>Nilai</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php 
          $no=1; 
          foreach ($nilai as $nilai) {
            ?>
            <tr>
              <td style="vertical-align:middle;"><input type="checkbox" value="<?php echo $nilai->id_nilai ?>" name="checkbox[]" /></td>
              <td style="vertical-align:middle;"><?php echo $nilai->jum_nilai ?></td>
              <td style="vertical-align:middle;"><?php echo $nilai->ket_nilai ?></td>
              <td class="text-center" style="vertical-align:middle;">
                <a href="<?php echo base_url() ?>Nilai/edit/<?php echo $nilai->id_nilai ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href="<?php echo base_url() ?>Nilai/hapus/<?php echo $nilai->id_nilai ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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