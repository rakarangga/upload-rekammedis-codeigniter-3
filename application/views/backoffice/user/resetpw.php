<?php 
//if(authorize($_SESSION["access"]["akun_saya"]["pengaturan_akun"]["ac_view"])){
?>
<?php echo $valid_reset;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	
	<!-- Main content -->
	<section class="content" >
		<div class="row" >

          
		<?php echo validation_errors(); ?>
		   <!-- end loading -->
		   <?php echo form_open_multipart('','id="reset-form" data-parsley-validate '); ?>
			<div class="col-md-12" >
			
			
		
				<div class="error-page box box-info">
				<div class="box-header with-border text-default">
						
						<!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;">
                          <span class="step"></span>
                          <span class="step"></span>
						   
                        </div>
					</div>
					<div class="box-body">
					
					 
                     
                     <div class="tab">
					  <section id="implementations">
						<h2 class="page-header">Terima Kasih, Anda telah konfirmasi email dari kami</h2>
						  
						 <p>Ketentuan fitur reset password dapat digunakan apabila sebagai berikut :</p>
						  <ul>
						  	<li>User sudah teregisterasi di <a href="http://www.intrex.online">http://www.intrex.online</a>.</li>
							<li>User benar-benar tidak ingat password dari akun Intrex yang telah terdaftar.</li>
							<li>User sudah memeriksa password yang dikirimkan melalui alamat email setelah registerasi.</li>
							<li>User telah menerima pesan berisikan link validasi, dan mengklik link tersebut.</li>
							</ul>

						  <p><b class="text-red">Note:</b> Apabila menemukan kesulitan silahkan hubungi customer service kami ke nomor telp : </p>
							</section>
							</div>

							  <div class="tab">
							    <section id="implementations">
						 	 <h2 class="page-header">Reset Password</h2>
						 	 	  <p>Silahkan isi password baru anda</p>
								<div class="form-group">
								<label for="userpass">Password Baru<span class="required">*</span>
								</label>
								  <?php
                                    $data_password = array(
                                        'name' => 'userpass',
                                        'id' => 'userpasss',
                                        'class' => 'form-control '
                                    );
                                    echo form_password($data_password);
                                    ?>						
								</div>

								
							<div class="form-group">
								<label for="u_pass_confirm">Ulangi Password<span class="required">*</span>
								</label>
									
									     <?php
                                        $data_password = array(
                                            'name' => 'u_pass_confirm',
                                            'id' => 'u_pass_confirm',
                                            'class' => 'form-control '
                                        );
                                        echo form_password($data_password);
                                        ?>
							</div>
							
							</section>
															
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
    document.getElementById("reset-form").submit();
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
<?php  // }else{
    //redirect('backoffice/user');
//}
?>

