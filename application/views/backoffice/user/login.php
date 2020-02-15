  <?php //echo validation_errors(); ?>
  <?php echo $valid_login; ?>
  
  
  
    <?php echo form_open(); ?>
      <div class="form-group has-feedback">
           <?php echo form_input('namauser', '', 'class="form-control" placeholder="username"'); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo form_password('userpass', '', 'class="form-control" placeholder="Password"'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
         <div class="col-xs-8">
           <!-- <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-flat btn-primary"></button> -->
        </div>
        <div class="col-xs-4">
         <?php  echo form_submit('submit', 'Masuk', 'class="btn btn-danger btn-block btn-flat" id="submit" name="submit"'); ?>
        </div>
        <!-- /.col -->
      </div>
       
   <?php echo form_close(); ?>
  