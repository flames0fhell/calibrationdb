<div class="well">
	<button type="button" class="btn btn-primary" onclick="PrintElem('#printable_area');"><i class="fa fa-print"></i> Cetak</button>
</div>
<div id="printable_area">
<h3><?=$title?></h3>
<table id="device" class="table table-bordered">
<thead>
	<tr>
		<th>Part Name</th>
		<th>Serial Number</th>
		<th>Drawing Maker</th>
		<th>D</th>
		<th>D.U</th>
		<th>D.L</th>
		<th>D/H</th>
		<th>Dp.U</th>
		<th>Dp.L</th>
		<th>Drawing AHM</th>
		<th>Material Number</th>
		<th>Qty</th>
		<th>Stats</th>
	</tr>
</thead>
<tbody>

	<?php 
		foreach($devices['data'] as $key => $value){
	?>
		<tr>
			<td><a href="javascript:edit_device(<?=$value['id_device']?>);"><?=$value['part_name']?></a></td>
			<td><?=$value['serial_number']?></td>
			<td><?=$value['drawing_maker']?></td>
			<td><?=$value['diameter']?></td>
			<td><?=$value['diameter_upper']?></td>
			<td><?=$value['diameter_lower']?></td>
			<td><?=$value['depth']?></td>
			<td><?=$value['depth_upper']?></td>
			<td><?=$value['depth_lower']?></td>
			<td><?=$value['drawing_ahm']?></td>
			<td><?=$value['material_number']?></td>
			<td><?=$value['quantity']?></td>
			<td>
				<?php 
					switch($value['status']){
						case 1:
							echo "OK";
							break;
						case 2:
							echo "NG";
							break;
						case 3:
							echo "RUSAK";
							break;
						case 4:
							echo "HILANG";
							break;
					}
				?>
			</td>
		</tr>
	<?php
		}
	?>
</tbody>
</table>
</div>