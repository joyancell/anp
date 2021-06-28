<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<br/>

		<h3>Hasil Perankingan</h3>
		<hr>
		<br>
		<?php 
		$tahun = date('Y');
		for ($i=2017; $i <= $tahun; $i++){
			?>
			<h4>Tahun <?= $i ?></h4>
			<table width="100%" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Hasil Akhir</th>
						<th class="success">Ranking</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$rank = 1; 
					$alt1c = $this->rank->readByRank($i); 
					foreach ($alt1c as $row) {
						?>
						<tr>
							<td><?= $row->nama_wisata ?></td>
							<td><?= number_format($row->hasil_akhir , 4, '.', ',')?></td>
							<td class="success"><?= $rank++ ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<br>
			<?php
		}
		?>
	</div>
</div>