<?php 
if(authorize($_SESSION["access"]["pengaturan_umum"]["hakakses"]["ac_view"])){
?>
<?php echo $sukses;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pengaturan Umum <small> <?php echo empty($hakakses->id) ? 'Tambah Hak Akses' :  'Update Hak Akses : <strong>'.$hakakses->an_name.'</strong>'; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pengaturan umum</li>
			<li>Hak akses</li>
			<li class="active"><?php echo empty($hakakses->id) ? 'Tambah Hak Akses' :  'Update Hak Akses '; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-8">
			
			<?php echo form_open_multipart('','id="demo-form" data-parsley-validate class="form-horizontal"'); ?>
			<div class="box-header with-border">
            <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
			<?php echo anchor ( 'backoffice/hakakses', 'Kembali', 'class="btn btn-warning"' ); ?>
            </div>
				<div class="box box-info">
					<div class="box-body">
						<div class="col-md-12">
						
							<div class="form-group">
								<label for="an_id" class="col-sm-2 control-label">Kode<span
									class="required">*</span></label>
								<div class="col-sm-10">
								<?php echo form_input ( 'an_id', set_value ( 'an_id', $hakakses->an_id ), 'class="form-control" required' ); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="an_name" class="col-sm-2 control-label">Hak akses<span
									class="required">*</span></label>
								<div class="col-sm-10">
									<?php echo form_input ( 'an_name', set_value ( 'an_name', $hakakses->an_name ), 'class="form-control" required' ); ?>
								</div>
							</div>

						</div>
						   <?php echo validation_errors(); ?>
					</div>
					
					 <!-- /.box-body -->
              <div class="box-footer">
                <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
				<?php echo anchor ( 'backoffice/hakakses', 'Kembali', 'class="btn btn-warning"' ); ?>
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


