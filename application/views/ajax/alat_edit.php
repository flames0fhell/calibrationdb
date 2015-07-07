
<form class="form-horizontal" id="default-form" method="POST" action="<?=site_url('process/device_edit')?>">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><i class="fa fa-file"></i> Formulir Perubahan Data Alat</h4>
  </div>
  <div id="multi-msg"></div>
  <div class="modal-body">
  <div class="row">
  		<div class="col-md-6">
	      <div class="form-group">
		    <label for="part_name" class="col-sm-5 control-label">Part Name</label>
		    <div class="col-sm-7">
		      <input type="hidden" value="<?=$data_alat[0]['id_device']?>" name="device_id" id="device_id">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['part_name']?>" id="part_name" required name="part_name" placeholder="Part Name ...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="serial_number" class="col-sm-5 control-label">Serial Number</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['serial_number']?>" id="serial_number" name="serial_number" placeholder="Serial Number ...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="drawing_maker" class="col-sm-5 control-label">Drawing Maker</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['drawing_maker']?>" id="drawing_maker" name="drawing_maker" placeholder="Drawing Maker...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="diameter" class="col-sm-5 control-label">Diameter</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['diameter']?>" id="diameter" name="diameter" placeholder="Diameter ...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="d_upper" class="col-sm-5 control-label">Diameter Upper</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['diameter_upper']?>" id="d_upper" name="d_upper" placeholder="Diameter Upper...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="d_lower" class="col-sm-5 control-label">Diameter Lower</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['diameter_lower']?>" id="d_lower" name="d_lower" placeholder="Diameter Lower...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="depth" class="col-sm-5 control-label">Depth / Height (DH)</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['depth']?>" id="depth" name="depth" placeholder="Depth / Height...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="depth_upper" class="col-sm-5 control-label">DH Upper</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['depth_upper']?>" id="depth_upper" name="depth_upper" placeholder="DH Upper...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="depth_lower" class="col-sm-5 control-label">DH Lower</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['depth_lower']?>" id="depth_lower" name="depth_lower" placeholder="DH Lower...">
		    </div>
		  </div>

		</div>
		<div class="col-md-6">
		  <div class="form-group">
		    <label for="drawing_ahm" class="col-sm-5 control-label">Drawing AHM</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['drawing_ahm']?>" id="drawing_ahm" name="drawing_ahm" placeholder="Drawing AHM...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="material_number" class="col-sm-5 control-label">Material Number</label>
		    <div class="col-sm-7">
		      <input type="text" class="form-control" value="<?=$data_alat[0]['material_number']?>" id="material_number" name="material_number" placeholder="Material Number...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="qty" class="col-sm-5 control-label">Quantity</label>
		    <div class="col-sm-7">
		      <input type="number" class="form-control" value="<?=$data_alat[0]['quantity']?>" id="qty" name="qty" placeholder="Quantity...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="qty" class="col-sm-5 control-label">Plant</label>
		    <div class="col-sm-7">
		    <select class="form-control" name="plant" id="plant">
		    	<option value="">-- Select --</option>
		    	<?php 
					foreach($plants as $key => $value){
						if($data_alat[0]['plant'] == $value['id_plant']){
				?>
					<option selected="selected" value="<?=$value['id_plant']?>"><?=$value['plant_name']?></option>
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
		  </div>
		  <div class="form-group">
		    <label for="qty" class="col-sm-5 control-label">Section</label>
		    <div class="col-sm-7">
		    <select class="form-control" name="section" id="section">
		    	<option value="">-- Select --</option>
		    	<?php 
					foreach($sections as $key => $value){
						if($data_alat[0]['section'] == $value['id_section']){
				?>
					<option selected="selected" value="<?=$value['id_section']?>"><?=$value['section_name']?></option>
				<?php 
						}else{
				?>
					<option value="<?=$value['id_section']?>"><?=$value['section_name']?></option>
				<?php
						}
					}

				?>

		    </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="qty" class="col-sm-5 control-label">Group</label>
		    <div class="col-sm-7">
		    <select class="form-control" name="group" id="group">
		    	<option value="">-- Select --</option>
		    	<option <?=($data_alat[0]['group'] == 1)?"selected":''?> value="1">KUNING</option>
		    	<option <?=($data_alat[0]['group'] == 2)?"selected":''?> value="2">HIJAU</option>
		    </select>
		    </div>
		  </div>
		</div>
  </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</form>

<script type="text/javascript">
$("#default-form").submit(function(e)
{
 
    var formObj = $(this);
    var formURL = formObj.attr("action");
    var formData = new FormData(this);
    
    $.ajax({
        url: formURL,
    type: 'POST',
        data:  formData,
    mimeType:"multipart/form-data",
    contentType: false,
        cache: false,
        processData:false,
    beforeSend:function(){
        $("#default-post").attr('disabled','disabled');
        $("#multi-msg").hide();
    },
    success: function(data, textStatus, jqXHR)
    {
                
                $("#multi-msg").html(data);
                $("#multi-msg").show();
                $("#default-post").removeAttr('disabled');
     
    },
     error: function(jqXHR, textStatus, errorThrown)
     {
         $("#multi-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
                $("#multi-msg").show();
     }         
    });
    e.preventDefault(); //Prevent Default action.
    e.unbind();
});
</script>