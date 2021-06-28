<hr>
    <footer class="text-center">Copyright &copy; 2021 By Ancell</footer>
  </div>

  <script src="<?php echo base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
  <script src="<?php echo base_url() ?>assets/js/exporting.js"></script>

  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.toastmessage.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/app.js"></script>
  <script>
    var chart1; // globally available
    $(document).ready(function() {
      chart1 = new Highcharts.Chart({
        chart: {
          renderTo: 'container2',
          type: 'column'
        },
        title: {
          text: 'Grafik Usulan'
        },
        xAxis: {
          categories: ['Alternatif']
        },
        yAxis: {
          title: {
            text: 'Jumlah Nilai'
          }
        },
        series: [
          <?php  
          foreach ($filter as $filter) {
            ?>
            {
              name: '<?php echo $filter->nama_wisata; ?>',
              data: [<?php echo $filter->hasil_akhir; ?>]
            },
            <?php 
          }
          ?>
        ]
      });
    });
  </script>
</body>
</html>