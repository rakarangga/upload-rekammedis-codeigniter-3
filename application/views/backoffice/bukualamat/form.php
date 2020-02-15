<?php 
if(authorize($_SESSION["access"]["akun_saya"]["daftar_alamat"]["ac_view"])){
?>
<?php echo $sukses;echo $error;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Akun Saya <small> <?php echo empty($bukualamat->idalamatusers) ? 'Tambah Buku Alamat' :  'Update Buku Alamat Dengan ID: <strong>'.$bukualamat->idalamatusers.'</strong>'; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Akun Saya</li>
			<li>Buku Alamat</li>
			<li class="active"><?php echo empty($bukualamat->idalamatusers) ? 'Tambah Buku Alamat' :  'Update Buku Alamat '; ?></li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
			
			<?php echo form_open_multipart('','id="demo-form" data-parsley-validate class="form-horizontal"'); ?>
			<div class="box-header with-border">
            <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
			<?php echo anchor ( 'backoffice/bukualamat', 'Kembali', 'class="btn btn-warning"' ); ?>
            </div>
				<div class="box box-info">
					<div class="box-body">
					<div class="col-md-12">
            			  <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>', '</div>');?>
            			</div>
						<div class="col-md-16">
						
							<div class="form-group">
								<label for="propuser" class="col-sm-2 control-label">Propinsi<span
									class="required">*</span></label>
								<div class="col-sm-6">
								<?php  echo form_dropdown('propuser', $propinsi_dropdown, $this->input->post('kodexxpropinsi') ? $this->input->post('kodexxpropinsi') : $bukualamat->propuser, 'id="propuser" name="propuser" class="form-control select2" ');?>
								
								</div>
							</div>

								<div class="form-group">
								<label for="kotkabuser" class="col-sm-2 control-label">Kota / Kabupaten<span
									class="required">*</span></label>
								<div class="col-sm-6">
								<?php 
								$options = array(
								    $bukualamat->kotkabuser => " - ".$bukualamat->nama_kotkab
								);
								?>
								<?php  echo form_dropdown('kotkabuser',$options, $this->input->post('kodexxkotkab') ? $this->input->post('kodexxkotkab') : $bukualamat->kotkabuser, 'id="kotkabuser" name="kotkabuser" class="form-control select2" ');?>
								</div>
								</div>
							
								<div class="form-group">
								<label for="kecuser" class="col-sm-2 control-label">Kecamatan<span
									class="required">*</span></label>
								<div class="col-sm-6">
								<?php 
								$options = array(
								    $bukualamat->kecuser => " - ".$bukualamat->nama_kec
								);
								?>
								
								<?php
                                
                                echo form_dropdown('kecuser', $options, $this->input->post('kecuser') ? $this->input->post('kecuser') : $bukualamat->kecuser, 'id="kecuser" name="kecuser" class="form-control select2" ');
                                ?>	
								</div>
							</div>
							
								<div class="form-group">
								<label for="keluser" class="col-sm-2 control-label">Kelurahan<span
									class="required">*</span></label>
								<div class="col-sm-6">
								<?php 
								$options = array(
								    $bukualamat->keluser => " - ".$bukualamat->nama_kel
								);
								?>
								<?php
                               
                                echo form_dropdown('keluser', $options, $this->input->post('keluser') ? $this->input->post('keluser') : $bukualamat->keluser,  'id="keluser" name="keluser" class="form-control select2" ');
                                ?>	
								</div>
							</div>
							
							
								<div class="form-group">
								<label for="kodeposuser" class="col-sm-2 control-label">Kode Pos<span
									class="required">*</span></label>
								<div class="col-sm-6">
								<?php echo form_input ('kodeposuser', set_value ( 'kodeposuser', $bukualamat->kodeposuser ), 'class="form-control" id="kodeposuser" style="width:150px;" required' ); ?>
								</div>
								</div>
							
								<div class="form-group">
								<label for="alamatuser" class="col-sm-2 control-label">Alamat Lengkap<span
									class="required">*</span></label>
								<div class="col-sm-6">
								<?php echo form_textarea('alamatuser', $bukualamat->alamatuser, 'class="form-control" placeholder="Alamat Lengkap..." '); ?>
								</div>
							</div>

						</div>
						
						 
					</div>
					  <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay" id="animation" >
              <i class="fa fa-refresh fa-spin"></i>
            </div>
            <!-- end loading -->
					
					 <!-- /.box-body -->
              <div class="box-footer">
                <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
				<?php echo anchor ( 'backoffice/bukualamat', 'Kembali', 'class="btn btn-warning"' ); ?>
              </div>
				</div>
			<?php echo form_close();?>
			</div>
			
			

		</div>
	</section>
</div>

		 
<?php   }else{
    redirect('backoffice/user');
}
?>


