
<form class="form-horizontal" id="default-form" method="POST" action="<?=site_url('process/pinjam')?>">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><i class="fa fa-hand-o-up"></i> Peminjaman</h4>
  </div>
  <div id="multi-msg"></div>
  <div class="modal-body">
    <div class="form-group">
      <label for="qty" class="col-sm-3 control-label">Nama Peminjam :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="peminjam" required name="peminjam" placeholder="Peminjam...">
      </div>
    </div>
    <div class="form-group">
      <label for="plant" class="col-sm-3 control-label">Plant :</label>
      <div class="col-sm-9">
      <select class="form-control" name="plant" id="plant">
        <option value="">-- Select --</option>
        <?php 
        foreach($plants as $key => $value){
          
      ?>
        <option value="<?=$value['id_plant']?>"><?=$value['plant_name']?></option>
      <?php
      
        }

      ?>

      </select>
      </div>
    </div>
    <div class="form-group">
      <label for="section" class="col-sm-3 control-label">Section :</label>
      <div class="col-sm-9">
      <select class="form-control" name="section" id="section">
        <option value="">-- Select --</option>
        <?php 
        foreach($sections as $key => $value){
          
      ?>
        <option value="<?=$value['id_section']?>"><?=$value['section_name']?></option>
      <?php
      
        }

      ?>

      </select>
      </div>
    </div>
    <div class="form-group">
      <label for="tgl_pinjam" class="col-sm-3 control-label">Tanggal Pinjam :</label>
      <div class="col-sm-9">
        <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="Tanggal Peminjaman...">
      </div>
    </div>
    <div class="form-group">
      <label for="tgl_kembali" class="col-sm-3 control-label">Sampai :</label>
      <div class="col-sm-9">
        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" placeholder="Tanggal Pengembalian...">
      </div>
    </div>
    <div class="table-responsive">
        <table id="device" class="table table-bordered">
          <thead>
            <tr>
              <th>Part Name</th>
              <th>Serial Number</th>
              <th>Drawing Maker</th>
              <th>Drawing AHM</th>
              <th>Material Number</th>
              <th>Qty</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($buff as $key => $v){
          ?>
            <tr>
                <td><?=$v[0]['part_name']?></td>
                <td><?=$v[0]['serial_number']?></td>
                <td><?=$v[0]['drawing_maker']?></td>
                <td><?=$v[0]['drawing_ahm']?></td>
                <td><?=$v[0]['material_number']?></td>
                <td><?=$v[0]['quantity']?></td>
                <input type="hidden" value="<?=$v[0]['id_device']?>" name="device[]" />
            </tr>
          <?php 
              }
            ?>

          </tbody>
        </table>
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