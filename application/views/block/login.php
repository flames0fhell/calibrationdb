<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

<div class="container">
  <div class="modal-header"><img src="<?=base_url()?>assets/img/Logo_AHM.png" width="20%" /></div>
  <form id="default-form" method="POST" class="form-signin" action="<?=site_url('login/do_login')?>">
    <h2 class="form-signin-heading"><span><h3><i class="fa fa-dashcube fa-2x"></i> Calibration System</h3></span></h2>
    <span id="multi-msg"></span>
    <label for="username" class="sr-only">Email address</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username..." required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password..." required>
    <label for="plantName" class="sr-only">Plant Name</label>
    <select id="plantName" name="plant" class="form-control">
      <?php 
        if(isset($dview['plants'])){
            foreach($dview['plants'] as $key => $val){
              ?>
                <option value="<?=$val['id_plant']?>"><?=$val['plant_name']?></option>
              <?php 
            }
        }else{
          ?>
            <option value=""> - No Data -</option>
          <?php 
        }
      ?>
    </select>
    <br>
    <div class="form-group">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </div>
  </form>

</div>