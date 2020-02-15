  <?php 
  if(authorize($_SESSION["access"]["pengaturan_umum"]["accescontrol"]["ac_view"])){
  ?>

<?php echo $sukses;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pengaturan Umum <small> <?php echo empty($accescontrol->id) ? 'Tambah Akses Control' :  'Update Akses Control : <strong>'.$accescontrol->ac_module_id.'</strong>'; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pengaturan umum</li>
			<li>Hak akses</li>
			<li class="active"><?php echo empty($accescontrol->id) ? 'Tambah Akses Control' :  'Update Akses Control '; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12 ">
			
			<?php echo form_open_multipart('','id="demo-form" data-parsley-validate role="form"'); ?>
			<div class="box-header with-border">
            <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
			<?php echo anchor ( 'backoffice/accescontrol', 'Kembali', 'class="btn btn-warning"' ); ?>
            </div>
				<div class="box box-info">
					<div class="box-body">
					<div class="col-md-16 ">
							<div class="form-group">
								<label for="ac_an_id">Hak Akses<span
									class="required">*</span></label>
								<?php  echo form_dropdown('ac_an_id', $hakakses_dropdown, $this->input->post('ac_an_id') ? $this->input->post('ac_an_id') : $accescontrol->ac_an_id, 'class="form-control select2" style="width: 100%;"');?>
								
							</div>

								<div class="form-group">
								<label for="ac_module_id" >Akses Control<span
									class="required">*</span></label>
								<?php  echo form_dropdown('ac_module_id', $module_dropdown, $this->input->post('ac_module_id') ? $this->input->post('ac_module_id') : $accescontrol->ac_module_id, 'class="form-control select2" style="width: 100%;"');?>
								
							</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
      					<div class="form-group">
								<label for="ac_create">Dapat Mengentry<span
									class="required">*</span></label>
							
								<?php
                                $options = array(
                                    'Y' => 'Ya',
                                    'T' => 'Tidak'
                                );
                                echo form_dropdown('ac_create', $options, $this->input->post('ac_create') ? $this->input->post('ac_create') : $accescontrol->ac_create,  'class="form-control" style="width:100px;"');
                                ?>	
								
        					</div>
						</div>
						
					
						
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="form-group">
								<label for="ac_edit" >Dapat Mengedit<span
									class="required">*</span></label>
								
								<?php
                                $options = array(
                                    'Y' => 'Ya',
                                    'T' => 'Tidak'
                                );
                                echo form_dropdown('ac_edit', $options, $this->input->post('ac_edit') ? $this->input->post('ac_edit') : $accescontrol->ac_edit, 'class="form-control" style="width:100px;"');
                                ?>	
								
							</div>
							</div>
							
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="form-group">
								<label for="ac_delete">Dapat Menghapus<span
									class="required">*</span></label>
								
								<?php
                                $options = array(
                                    'Y' => 'Ya',
                                    'T' => 'Tidak'
                                );
                                echo form_dropdown('ac_delete', $options, $this->input->post('ac_delete') ? $this->input->post('ac_delete') : $accescontrol->ac_delete, 'class="form-control" style="width:100px;"');
                                ?>	
								
							</div>
							</div>
							
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="form-group">
								<label for="ac_view" >Dapat Melihat<span
									class="required">*</span></label>
								
								<?php
                                $options = array(
                                    'Y' => 'Ya',
                                    'T' => 'Tidak'
                                );
                                echo form_dropdown('ac_view', $options, $this->input->post('ac_view') ? $this->input->post('ac_view') : $accescontrol->ac_view, 'class="form-control" style="width:100px;"');
                                ?>	
							
							</div>
							</div>

						 
					</div>
					
					 <!-- /.box-body -->
              <div class="box-footer">
                <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
				<?php echo anchor ( 'backoffice/accescontrol', 'Kembali', 'class="btn btn-warning"' ); ?>
              </div>
				</div>
			<?php echo form_close();?>
			</div>
			
			<div class="col-xs-2">
			  <?php echo validation_errors(); ?>
			</div>

		</div>
	</section>
</div>
<?php 
  }else{
      redirect('backoffice/user');
  }
 ?>


