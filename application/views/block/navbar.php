<div class="row">
  <div class="col-md-2">
    <a href="<?=site_url()?>"><img class="img-responsive" src="<?=base_url()?>assets/img/Logo_AHM.png"></a>
  </div>
</div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=site_url()?>"><i class="fa fa-dashboard"></i> Calibration System DB</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-tasks"></i> Alat Ukur <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:new_device();"><i class="fa fa-pencil-square"></i> Baru</a></li>
            <li><a href="<?=site_url('home/kalibrasi')?>"><i class="fa fa-cogs"></i> Kalibrasi</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url('home/peminjaman')?>"><i class="fa fa-exchange"></i> Pinjam / Kembali</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url('home/perbaikan')?>"><i class="fa fa-shield"></i> Perbaikan</a></li>
            <li><a href="<?=site_url('home/penggantian')?>"><i class="fa fa-recycle"></i> Penggantian</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-newspaper-o"></i> Laporan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$d['pp']?> <?=$d['nama']?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Edit Profile</a></li>
            <li><a href="#">Report</a></li>
            <li class="divider"></li>
            <li><a href="<?=site_url('login/logout')?>">Logout</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-gear"></i></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>