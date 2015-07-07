var domain_url = "http://" + document.domain + "/";
$(document).ready(function()
{

//Callback handler for form submit event
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

$("#default-post").click(function()
    {
        
    $("#default-form").submit();
    
});
var sectionURL = $("input[id=section_url]").val();
getsection();
});
function peminjaman(){
    $.ajax({
        url : domain_url + "ajax/pinjam"
        ,type : 'POST'
        ,data : $('.rent:checked').serialize()
        ,success:function(data,textStatus,jqXHR){
            $("#atikaBox").html(data);
            $("#atikaBox").modal();
        }
    });
}
function pengembalian(){
    $.ajax({
        url : domain_url + "ajax/kembali"
        ,type : 'POST'
        ,data : $('.rent:checked').serialize()
        ,success:function(data,textStatus,jqXHR){
            $("#atikaBox").html(data);
            $("#atikaBox").modal();
        }
    });
}
function new_device(){
    $.ajax({
        url : domain_url + "ajax/device_new"
        ,type : 'POST'
        ,data : ''
        ,success:function(data,textStatus,jqXHR){
            $("#atikaBox").html(data);
            $("#atikaBox").modal();
        }
    });
}
function edit_device(device_id){
    $.ajax({
        url : domain_url + "ajax/device_edit"
        ,type : 'POST'
        ,data : 'device_id=' + device_id
        ,success:function(data,textStatus,jqXHR){
            $("#atikaBox").html(data);
            $("#atikaBox").modal();
        }
    });
}
function upload_sertif(){
    var section_id = getUrlParameter('section_kalibrasi');
    var group_id = getUrlParameter('group');
    $.ajax({
        url : domain_url + "ajax/upload_sertif"
        ,type : 'POST'
        ,data : 'section=' + section_id + '&group=' + group_id
        ,success:function(data,textStatus,jqXHR){
            $("#atikaBox").html(data);
            $("#atikaBox").modal();
        }
    });
    
}
function getsection(){
    var sectionURL = $("input[id=section_url]").val();
    var plant_id = $("select[name=plant]").val();
    var section_id = getUrlParameter('section');

    $.ajax({
        url:sectionURL
        ,type:'POST'
        ,data:'plant_id='+plant_id+'&section_id='+section_id
        ,success:function(data, textStatus, jqXHR)
        {
            $("select[name=section]").html(data);
        }
    });
}
function ganti_status(device_id){
    var status = $("select[name=status_"+device_id+"]").val();
    var sclass = "has-success";
    $.ajax({
        url : domain_url + "process/ganti_status"
        ,type:'POST'
        ,data:'device_id=' + device_id + "&status=" + status
        ,success:function(data,textStatus,jqXHR){
            if(data == 0){
                sclass = "has-error";
            }
            $("#status_of_"+device_id).addClass(sclass);
            setTimeout(function(){
                $("#status_of_"+device_id).removeClass(sclass);
            },500);
        }
    });



        
}
function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}    
function PrintElem(elem)
{
    Popup($(elem).html());
}

function Popup(data) 
{
    
    var mywindow = window.open('', 'my div', 'height=400,width=800');
    mywindow.document.write('<html><head><title>Print</title>');
    /*optional stylesheet*/ mywindow.document.write('<link rel="stylesheet" href="'+domain_url+"assets"+"/"+"css"+"/"+"bootstrap.min.css"+'" type="text/css" />');
    /*optional stylesheet*/ mywindow.document.write('<link rel="stylesheet" href="'+domain_url+"assets"+"/"+"css"+"/"+"jquery.datatable.css"+'" type="text/css" />');
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10

    mywindow.print();
    mywindow.close();

    return true;
}