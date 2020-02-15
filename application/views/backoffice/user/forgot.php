  <?php //echo validation_errors(); ?>
  <?php echo $valid_forgot; ?>
  
  
  
    <?php echo form_open(); ?>
      <div class="form-group has-feedback">
           <?php echo form_input('email', '', 'class="form-control" placeholder="email"'); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
   
      <div class="row">
         <div class="col-xs-8">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-defaul btn-flat">Masuk Akun Intrex</button>
        </div>
        <div class="col-xs-4">
         <?php  echo form_submit('forgot', 'Kirim', 'class="btn btn-danger btn-block btn-flat" id="forgot" name="forgot"'); ?>
        </div>
        <!-- /.col -->
      </div>
       
   <?php echo form_close(); ?>
  