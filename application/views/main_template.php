<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Dashboard - Login - Calibration System</title>

	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<?php
			#CSS Dasar
		?>

		<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?=base_url()?>assets/css/atika.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.datatable.css" />

	</head>
	<body>
			<?=isset($navbar)?$navbar:''?>
		<div id="atikaBox" class="modal fade">
		  
		</div><!-- /.modal -->
		<div class="container">
			<?=isset($contents)?$contents:''?>
		</div>
		<div class="modal-footer">
			<div class="pull-right"><small>Copyright &copy; 2015</small></div>
		</div>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/atika.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		    $('#device').DataTable();
		});
	</script>
	</body>


</html>