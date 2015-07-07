<div class="well">
<form name="search_devices" method="GET">
<input type="hidden" value="<?=site_url('ajax/getsection')?>" id="section_url" \>
	<div class="row">
		<div class="col-md-3">	
				<select class="form-control" onchange="getsection();" name="group">
					<option value="">-- Select Schedule --</option>
					<option <?=($params['group'] == 1 && date('m') < 4)?"selected":''?> value="1">Januari - Maret (G1)</option>
					<option <?=($params['group'] == 2 && date('m') < 7)?"selected":''?> value="2">April - Juni (G2)</option>
					<option <?=($params['group'] == 1)?"selected":''?> value="1">Juli - September (G1)</option>
					<option <?=($params['group'] == 2)?"selected":''?> value="2">Oktober - Desember (G2)</option>
					
				</select>
		</div>
		<div class="col-md-3">
				<select class="form-control" name="section_kalibrasi">
					<option value="">-- Select Section --</option>
					<?php 
						foreach($sections['data'] as $key => $value){
					?>
						<option <?=($params['section'] == $value['id_section'])?"selected":''?> value=<?=$value['id_section']?>><?=$value['section_name']?></option>
					<?php 
						}
					?>
				</select>
		</div>
		<div class="col-md-6">
		<?php
			$link_download = isset($download['path'][0]['path'])?base_url().$download['path'][0]['path']:'';
		?>
			<button type="submit" class="btn btn-danger"><i class="fa fa-filter"></i> Filter</button>
			<a href="<?=$link_download?>" type="button" class="btn btn-warning"><i class="fa fa-download"></i> Sertificate</a>
			<button type="button" onclick="upload_sertif();" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
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
				<div class="form-group" id="status_of_<?=$value['id_device']?>" style="padding:0px;margin:0px;">
				<select onchange="ganti_status('<?=$value['id_device']?>');" class="form-control" style="padding-right:10px;padding-left:1px;" name="status_<?=$value['id_device']?>">
					<option <?=($value['status'] == 1)?"selected":''?> value="1">OK</option>
					<option <?=($value['status'] == 2)?"selected":''?> value="2">NG</option>
					<option <?=($value['status'] == 3)?"selected":''?> value="3">RUSAK</option>
					<option <?=($value['status'] == 4)?"selected":''?> value="4">HILANG</option>
				</select>
				</div>
			</td>
		</tr>
	<?php
		}
	?>
</tbody>
</table>