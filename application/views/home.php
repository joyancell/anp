<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="jumbotron">
      <h1>Selamat datang!</h1>
      <p>Pemilihan Tempat Wisata terbaik Kabupaten TTU</p>
    </div>
    <div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
    <br/>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Nilai Preferensi</h3>
          </div>
          <div class="panel-body">
            <ol>
              <?php  
              foreach ($nilai as $nilai) {
                ?>
                <li><?php echo $nilai->ket_nilai ?> (<?php echo $nilai->jum_nilai ?>)</li>
                <?php 
              }
              ?>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Kriteria & Bobot</h3>
          </div>
          <div class="panel-body">
            <ol>
              <?php  
              foreach ($kriteria as $kriteria) {
                ?>
                <li><?php echo $kriteria->nama_kriteria ?></li>
                <?php 
              }
              ?>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Skor Alternatif & Hasil</h3>
          </div>
          <div class="panel-body">
            <ol>
              <?php  
              foreach ($skor as $skor) {
                ?>
                <li><?php echo $skor->nama_wisata ?></li>
                <?php 
              }
              ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>