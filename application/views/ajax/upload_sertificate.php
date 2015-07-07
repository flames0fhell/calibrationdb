
<form class="form-horizontal" id="default-form" method="POST" enctype="multipart/form-data" action="<?=site_url('process/upload_sertif')?>">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><i class="fa fa-upload"></i> Upload Sertificate</h4>
  </div>
  <div id="multi-msg"></div>
  <div class="modal-body">
  		<input type="hidden" name="group" value="<?=$group?>" />
  		<input type="hidden" name="section" value="<?=$section?>" />
  		<input type="file" name="sertificate" class="form-control" />
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