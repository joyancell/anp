<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <ol class="breadcrumb">
      <li><a href="index.php">Beranda</a></li>
      <li class="active">Nilai Awal</li>
    </ol>
    <form method="post" action="<?php echo base_url() ?>Nilai_awal/simpan">
      <div class="row">
        <div class="col-md-6 text-left">
          <strong style="font-size:18pt;"><span class="fa fa-modx"></span> Data Nilai Preferensi</strong>
        </div>
        <div class="col-md-6 text-right">
          <div class="btn-group">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Contengan</button>
            <button type="button" onclick="location.href='<?php echo base_url() ?>Nilai_awal/tambah'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</button>
          </div>
        </div>
      </div>
      <br/>
      <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
          <tr>
            <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
            <th>Nama Wisata</th>
            <th>Nilai</th>
            <th>Keterangan</th>
            <th>Periode</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th><input type="checkbox" name="select-all2" id="select-all2" /></th>
            <th>Nama Wisata</th>
            <th>Nilai</th>
            <th>Keterangan</th>
            <th>Periode</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php  
          foreach ($nilai_awal as $nilai_awal) {
            ?>
            <tr>
              <td><input type="checkbox" value="<?php echo $nilai_awal->id_nilai_awal ?>" name="checkbox[]" /></td>
              <td><?php echo $nilai_awal->id_alternatif ?></td>
              <td><?php echo $nilai_awal->nilai ?></td>
              <td><?php
              if ($nilai_awal->keterangan == "B") {
                echo "Baik";
              }elseif($nilai_awal->keterangan == "C"){
                echo "Cukup";
              }else{
                echo "Kurang";
              }
            ?></td>
            <td><?php echo $nilai_awal->periode ?></td>
            <td class="text-center">
              <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target=".modal" data-id-alternatif="<?php echo $nilai_awal->id_alternatif ?>"><span class="fa fa-eye" aria-hidden="true"></span></button>
              <a href="<?php echo base_url() ?>Nilai_awal/hapus/<?php echo $nilai_awal->id_nilai_awal ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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

<!-- Default bootstrap modal example -->
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nilai Detail</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

