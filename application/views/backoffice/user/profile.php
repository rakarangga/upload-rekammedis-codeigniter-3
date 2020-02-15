<?php 
if(authorize($_SESSION["access"]["akun_saya"]["pengaturan_akun"]["ac_view"])){
?>
<?php echo $sukses; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Akun Saya<small>    <?php echo empty($user->iduser) ? 'Tambah User' :  'Edit Profile <strong>'.$user->namalengkap.'</strong>'; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Akun Saya</li>
			<li>Profile</li>
			<li class="active">   <?php echo empty($user->iduser) ? 'Tambah User' :  'Edit Profile '; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
	
          
		<?php echo validation_errors(); ?>
		   <!-- end loading -->
		   <?php echo form_open_multipart('','id="demo-form" data-parsley-validate '); ?>
			<div class="col-md-6">
			
			
		
				<div class="box box-info">
				<div class="box-header with-border text-default">
						<h3 class="box-title">Profile</h3>
					</div>
					<div class="box-body">
						
							<div class="form-group">
								<label for="namalengkap">Nama Lengkap<span class="required">*</span>
								</label>
									<?php echo form_input ( 'namalengkap', set_value ( 'namalengkap', $user->namalengkap ), 'class="form-control" required' ); ?>
							</div>
					

						
							<div class="form-group">
								<label for="namauser">Username<span class="required">*</span>
								</label>
									<?php echo form_input ( 'namauser', set_value ( 'namauser', $user->namauser ), 'class="form-control"  required' ); ?>
								</div>
							
						
									
							<div class="form-group">
								<label for="email">Email<span class="required">*</span>
								</label>
									
									<?php echo form_input ( 'email', set_value ( 'email', $user->email ), 'class="form-control"  required disabled' ); ?>
								</div>
						
							
							<div class="form-group">
								<label for="nomorhp">No. HP<span class="required">*</span>
								</label>
									<div class="input-group">
                                      <div class="input-group-btn">
                                                  <button type="button" class="btn btn-primary">+62</button>
                                                </div>
                                         <?php echo form_input('nomorhp',  set_value ( 'nomorhp', str_replace('+62', '', $user->nomorhp)), 'class="form-control" placeholder="No. Telp" onkeypress="return isNumberKey(event)" '); ?>
                                       <span class="fa fa-phone form-control-feedback"></span>
                                      </div>
									</div>
									
							<div class="form-group">
								<label for="namabisnis">Nama Bisnis<span class="required">*</span>
								</label>
									
									<?php echo form_input ( 'namabisnis', set_value ( 'namabisnis', $user->namabisnis ), 'class="form-control"  required' ); ?>
								</div>
									
							</div>
						<!-- /.box-body -->
					<div class="box-footer">
                <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
				<?php echo anchor ( 'backoffice/settuser', 'Kembali', 'class="btn btn-warning"' ); ?>
              </div>
					</div>

					
			</div>
			<div class="col-md-6">
				<div class="box box-info">
				<div class="box-header with-border text-default">
						<h3 class="box-title">Pengaturan Kata Sandi</h3>
					</div>
					<div class="box-body">
					
							<div class="form-group">
								<label for="userpass">Ubah Password<span class="required">*</span>
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
					</div>
			</div>
			<div class="box box-primary">
				<div class="box-header with-border text-default">
						<h3 class="box-title">Foto</h3>
					</div>
					<div class="box-body">
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
    	                </div>
			<?php echo form_close();?>
			</div>
		
	
				
		</div>
	</section>
</div>
<script type="text/javascript">
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

