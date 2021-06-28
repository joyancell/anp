<h3><?php echo $wisata->nama_wisata ?> (<?php echo $wisata->id_wisata ?>)</h3>
<hr>
<table width="100%" class="table table-striped">
	<thead>
		<tr>
			<th>Kriteria</th>
			<th>Nilai</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		foreach ($nilai as $nilai) {
			?>
			<tr>
				<td style="vertical-align:middle;"><?php echo $nilai->kriteria ?></td>
				<td style="vertical-align:middle;"><?php echo $nilai->nilai ?></td>
			</tr>
			<?php 
		}
		?>
	</tbody>
</table>