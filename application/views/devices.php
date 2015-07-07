<div class="well">
<form name="search_devices" class="form-horizontal" method="GET">
<input type="hidden" value="<?=site_url('ajax/getsection')?>" id="section_url" \>
	<div class="row">
		<div class="col-md-3">	
				<select class="form-control" onchange="getsection();" name="plant">
					<option value="">-- Select Plant --</option>
					<?php 
						foreach($plants['data'] as $key => $value){
							if($value['id_plant'] == $params['plant_id']){
					?>
								<option value="<?=$value['id_plant']?>" selected="selected"><?=$value['plant_name']?></option>

					<?php 
							}else{
					?>
								<option value="<?=$value['id_plant']?>"><?=$value['plant_name']?></option>
					<?php
							} 
						}

					?>
				</select>
		</div>
		<div class="col-md-3">
				<select class="form-control" name="section">
				</select>
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-danger"><i class="fa fa-filter"></i> Filter</button>
		</div>
	</div>
</form>
</div>
<table id="device" class="table table-bordered">
<thead>
	<tr>
		<th>Part Name</th>
		<th>Serial Number</th>
		<th>Drawing Maker</th>
		<th>Diameter</th>
		<th>Diameter Upper</th>
		<th>Diameter Lower</th>
		<th>Depth / Height</th>
		<th>Depth Upper</th>
		<th>Depth Lower</th>
		<th>Drawing AHM</th>
		<th>Material Number</th>
		<th>Quantity</th>
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
		</tr>
	<?php
		}
	?>
</tbody>
</table>