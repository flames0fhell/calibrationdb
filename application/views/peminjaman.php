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
		<div class="col-md-6">
			<button type="submit" class="btn btn-danger"><i class="fa fa-filter"></i> Filter</button>
			<button type="button" onclick="peminjaman();" class="btn btn-success"><i class="fa fa-hand-o-up"></i> Pinjam</button>
			<button type="button" onclick="pengembalian();" class="btn btn-info"><i class="fa fa-hand-o-down"></i> Kembali</button>
		</div>
	</div>
</form>
</div>
<table id="device" class="table table-bordered">
<thead>
	<tr>
		<th>&nbsp;</th>
		<th>Part Name</th>
		<th>Serial Number</th>
		<th>Peminjam</th>
		<th>Plant Peminjam</th>
		<th>Section Peminjam</th>
		<th>Tanggal Kembali</th>
		<th>Qty</th>
	</tr>
</thead>
<tbody>
<form id="dataPeminjaman" name="dataPeminjaman">
	<?php 
		foreach($devices['data'] as $key => $value){
	?>
		<tr style="<?=in_array($value['id_device'], isset($rented_devices['id'])?$rented_devices['id']:array())?"background-color:#aeaeae":""?>">
			<td><input type="checkbox" value="<?=$value['id_device']?>" name="rent[]" class="form-control rent" /></td>
			<td><a href="javascript:edit_device(<?=$value['id_device']?>);"><?=$value['part_name']?></a></td>
			<td><?=$value['serial_number']?></td>
			<td><?=isset($rented_devices['device'][$value['id_device']])?$rented_devices['device'][$value['id_device']]['name']:''?></td>
			<td><?=isset($rented_devices['device'][$value['id_device']])?str_plant($rented_devices['device'][$value['id_device']]['plant']):''?></td>
			<td><?=isset($rented_devices['device'][$value['id_device']])?str_section($rented_devices['device'][$value['id_device']]['section']):''?></td>
			<td><?=isset($rented_devices['device'][$value['id_device']])?$rented_devices['device'][$value['id_device']]['givenback_date']:''?></td>
			<td><?=$value['quantity']?></td>
		</tr>
	<?php
		}
	?>
</form>
</tbody>
</table>