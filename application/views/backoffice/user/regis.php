 
  <?php echo $valid_login; ?>
  
  
  
    <?php echo form_open(); ?>
     <div class="form-group has-feedback">
           <?php echo form_input('namalengkap', '', 'class="form-control" placeholder="Nama Lengkap"'); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
           <?php echo form_input('namabisnis', '', 'class="form-control" placeholder="Nama Bisnis"'); ?>
        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
      </div>
     <div class="form-group has-feedback">
           <?php echo form_input('namauser', '', 'class="form-control" placeholder="Username"'); ?>
        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
           <?php echo form_input('email', '', 'type="email" class="form-control" placeholder="email"'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p class="margin">ex :  <code>yourmail@mail.com</code></p>
      </div>
       <div class="form-group has-feedback">
      <div class="input-group">
      <div class="input-group-btn">
                  <button type="button" class="btn btn-primary">+62</button>
                </div>
         <?php echo form_input('nomorhp', '', 'class="form-control" placeholder="No. Telp" onkeypress="return isNumberKey(event)" '); ?>
       <span class="fa fa-phone form-control-feedback"></span>
      </div>
      <p class="margin">ex :  <code>85355577559</code></p>
      </div>
      <div class="row">
     
        <div class="col-xs-4 pull-right">
         <?php  echo form_submit('register', 'Register', 'class="btn btn-primary btn-block btn-flat" id="register" name="register"'); ?>
        </div>
        <!-- /.col -->
      </div>
       
   <?php echo form_close(); ?>
  