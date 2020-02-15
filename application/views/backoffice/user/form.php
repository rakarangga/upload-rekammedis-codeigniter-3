<?php 
if(authorize($_SESSION["access"]["akun_saya"]["pengaturan_akun"]["ac_view"])){
?>
<?php echo $sukses;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Daftar Member O.S.E.D.E<small>    <?php //echo empty($user->iduser) ? 'Tambah User' :  ' <strong>'.$user->namalengkap.'</strong>'; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Akun Saya</li>
			<li class="active">   <?php echo empty($user->iduser) ? 'Tambah User' :  'Daftar Member O.S.E.D.E '; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content" >
		<div class="row" >

          
		<?php echo validation_errors(); ?>
		   <!-- end loading -->
		   <?php echo form_open_multipart('','id="demo-form" data-parsley-validate '); ?>
			<div class="col-md-12" >
			
			
		
				<div class="error-page box box-info">
				<div class="box-header with-border text-default">
						
						<!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;">
                          <span class="step"></span>
                          <span class="step"></span>
						   <span class="step"></span>
                        </div>
					</div>
					<div class="box-body">
					
					 <div class="tab">
                         <section id="implementations">
						  <h2 class="page-header">Introduction</h2>
						  
						  <p><b>O.S.E.D.E</b> adalah Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
						  when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
						 <p>Keuntungan menjadi member O.S.E.D.E antara lain :</p>
						  <ul>
							<li><a href="https://github.com/mmdsharifi/AdminLTE-RTL">Persian RTL</a> by <a href="https://github.com/mmdsharifi">Mohammad Sharifi</a></li>
							<li><a href="https://github.com/dmstr/yii2-adminlte-asset" target="_blank">Yii 2</a> by <a href="https://github.com/schmunk42" target="_blank">Tobias Munk</a></li>
							<li><a href="https://github.com/yajra/laravel-admin-template" target="_blank">Laravel</a> by <a href="https://github.com/yajra" target="_blank">Arjay Angeles</a></li>
							<li><a href="https://github.com/acacha/adminlte-laravel" target="_blank">Laravel 5 package</a> by <a href="https://github.com/acacha" target="_blank">Sergi Tur Badenas</a></li>
							<li><a href="https://github.com/jeroennoten/Laravel-AdminLTE" target="_blank">Laravel-AdminLTE</a> by <a href="https://github.com/jeroennoten" target="_blank">Jeroen Noten</a></li>
							<li><a href="https://github.com/avanzu/AdminThemeBundle" target="_blank">Symfony</a> by <a href="https://github.com/avanzu" target="_blank">Marc Bach</a></li>
							<li>Rails gems: <a href="https://github.com/nicolas-besnard/adminlte2-rails" target="_blank">adminlte2-rails</a> by <a href="https://github.com/nicolas-besnard" target="_blank">Nicolas Besnard</a> and <a href="https://github.com/racketlogger/lte-rails" target="_blank">lte-rails</a> (using AdminLTE sources) by <a href="https://github.com/racketlogger" target="_blank">Carlos at RacketLogger</a></li>
						  </ul>

						  <p><b class="text-red">Note:</b> these implementations are not supported by Almsaeed Studio. However,
							they do provide a good example of how to integrate AdminLTE into different frameworks. For the latest release
							of AdminLTE, please visit our <a href="https://github.com/almasaeed2010/AdminLTE">repository</a> or <a href="https://almsaeedstudio.com">website</a></p>
						</section>
                        </div>
                        
                     
                     <div class="tab">
					 <h2 class="page-header">Form Pendaftaran</h2>
							<div class="form-group">
								<label for="namalengkap">Nama Lengkap<span class="required">*</span>
								</label>
									<?php echo form_input ( 'namalengkap', set_value ( 'namalengkap', $user->namalengkap ), 'class="form-control tab-input" required' ); ?>
							</div>
					

						
							<div class="form-group">
								<label for="namauser">Username<span class="required">*</span>
								</label>
									<?php echo form_input ( 'namauser', set_value ( 'namauser', $user->namauser ), 'class="form-control tab-input"  required' ); ?>
								</div>
							
						
									
							<div class="form-group">
								<label for="email">Email<span class="required">*</span>
								</label>
									
									<?php echo form_input ( 'email', set_value ( 'email', $user->email ), 'class="form-control tab-input"  required disabled' ); ?>
								</div>
						
							
							<div class="form-group">
								<label for="nomorhp">No. HP<span class="required">*</span>
								</label>
									<div class="input-group">
                                      <div class="input-group-btn">
                                                  <button type="button" class="btn btn-primary">+62</button>
                                                </div>
                                         <?php echo form_input('nomorhp',  set_value ( 'nomorhp', str_replace('+62', '', $user->nomorhp)), 'class="form-control tab-input" placeholder="No. Telp" onkeypress="return isNumberKey(event)" '); ?>
                                       <span class="fa fa-phone form-control-feedback"></span>
                                      </div>
									</div>
									
							<div class="form-group">
								<label for="namabisnis">Nama Toko Online<span class="required">*</span>
								</label>
									
									<?php echo form_input ( 'namabisnis', set_value ( 'namabisnis', $user->namabisnis ), 'class="form-control tab-input"  required' ); ?>
								</div>
							
						<div class="row">
                        	<div class="col-md-6">
                            	<div class="form-group">
							<label for="logo">Logo / Foto Toko Online<span class="required">*</span></label>
    	                <?php $data_upload = array(
    	                      'name' => 'logo',
    	                      'id' =>'logo',
    	                      'class' => 'form-control',
    	                      'style' => 'width:250px;',
    	                      'onChange' => "previewImg(event)"
    	                  );
    	                  echo form_upload($data_upload); ?>  
    	                  		</div>
    	                  	</div>
    	             
    	               
                         	<div class="col-md-6">
                            	 <div class="form-group">
            	                  <p class="help-block">Format Gambar JPG / JPEG / PNG</p>
            	                  <div id="form-img">
            	                  <img id="img" class="img-responsive" style="margin-top:10px;width:250px;" src="<?php echo $user->logo == NULL ? base_url().'assets/dist/img/user.png' : base_url().$user->logo; ?>" >
            	                  </div>
    	            			</div>
    	            		</div>  
						</div>							
    	                   </div>
						   
						
						<div class="tab">
                            <div class="form-group">
                            <label for="logo">Link / URL Toko Online<span class="required">*</span></label>
                               <?php echo form_input('linktoko', set_value ( 'linktoko', $user->linktoko ), 'class="form-control" placeholder="Copy atau tulis Link / URL Toko Online"'); ?>
                        
                            <p class="margin">ex :  <code>http://intrex.online/namatokoonline</code></p>
                          </div>
                        </div>
    	                 
						 
					</div>
								
					

					<!-- /.box-body -->
					<div class="box-footer">
                <?php ///echo form_submit('submit','Simpan','class="btn btn-success" id="nextBtn" onclick="nextPrev(1)"');?>
				<?php //echo anchor ( 'backoffice/settuser', 'Kembali', 'class="btn btn-warning"' ); ?>
				<div class="btn-group pull-right">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary"><i class="fa fa-chevron-right"></i></button>
                  </div>
              </div>
              </div>
			</div>
		<?php echo form_close();?>
		
	
				
		</div>
	</section>
</div>
<script type="text/javascript">
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    //document.getElementById("prevBtn").style.display = "inline";
	
	document.getElementById("prevBtn").disabled = true;
  } else {
    //document.getElementById("prevBtn").style.display = "inline";
	document.getElementById("prevBtn").disabled = false;
  }
   if (n == 0) {
	document.getElementById("nextBtn").innerHTML = 'Ya, Saya Mengerti Lanjutkan...';
   }else if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = 'Finnish';
  } else {
    document.getElementById("nextBtn").innerHTML = '<i class="fa fa-chevron-right"></i>';
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
};

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("demo-form").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
};

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("tab-input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
};

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
};

function previewImg(event){
	$("#form-img").html('<img id="img" class="img" style="margin-top:10px;width:250px;">');
	var reader = new FileReader();
	var imageField = document.getElementById("img");
	
	reader.onload = function(){
		if(reader.readyState == 2){
		
			imageField.src = reader.result;
		}
	}
		reader.readAsDataURL(event.target.files[0]);
};
    
</script>
<?php   }else{
    redirect('backoffice/user');
}
?>

