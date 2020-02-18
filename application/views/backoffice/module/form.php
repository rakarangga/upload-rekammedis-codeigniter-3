<?php 
if(authorize($_SESSION["access"]["pengaturan_umum"]["settmodule"]["ac_view"])){
?>
<?php echo $sukses;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pengaturan Umum <small><?php echo empty($module->id) ? 'Tambah Module' :  'Update Module <strong>'.$module->mod_modulename.'</strong>'; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pengaturan umum</li>
			<li>Setting Module</li>
			<li class="active">   <?php echo empty($module->id) ? 'Tambah Module' :  'Update Module '; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
			
			<?php echo form_open_multipart('','id="demo-form" data-parsley-validate class="form-horizontal"'); ?>
			<div class="box-header with-border">
            <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
			<?php echo anchor ( 'backoffice/settmodule', 'Kembali', 'class="btn btn-warning"' ); ?>
            </div>
				<div class="box box-info">
					<div class="box-body">
						<div class="col-md-12">

							<div class="form-group">
								<label for="mod_modulegroupid" class="col-sm-2 control-label">Kode Menu Utama<span class="required">*</span>
								</label>
								<div class="col-sm-10">
									<?php echo form_input ( 'mod_modulegroupid', set_value ( 'mod_modulegroupid', $module->mod_modulegroupid ), 'class="form-control" required' ); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="mod_modulegroupname" class="col-sm-2 control-label">Menu Utama<span
									class="required">*</span></label>
								<div class="col-sm-10">
									<?php //echo form_input ( 'mod_modulegroupname', set_value ( 'mod_modulegroupname',$module->mod_modulegroupname), 'class="form-control"  required' ); ?>
									<?php echo form_input('mod_modulegroupname',set_value ( 'mod_modulegroupname',$module->mod_modulegroupname), 'class="form-control" placeholder="Nama Menu Utama (dapat menggunakan icon dengan tag html)."  '); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="ico" class="col-sm-2 control-label">Icon Module<span class="required">*</span>
								</label>
								<div class="col-sm-10">
								<div class="input-group">
									<?php echo form_input ( 'ico', set_value ( 'ico', $module->ico == "" ? "<i class=\"fa  fa-dropbox\"></i>" : $module->ico, false), 'class="form-control" required' ); ?>
									
									<span  class="input-group-addon "><?=$module->ico == NULL ? "ICON KOSONG" : set_value ( 'ico', $module->ico , false) ?></span>
									</div>
									<?php echo anchor ( 'backoffice/settmodule/ico', '<label for="ico" class="control-label">Klik untuk memilih icon</span></label>', 'target="_blank"' ); ?>
								</div>
								
							</div>

							<div class="form-group">
								<label for="mod_modulegrouporder" class="col-sm-2 control-label">Urutan<span
									class="required">*</span></label>
								<div class="col-sm-2">
									<?php 
									$data = array(
									    'name' => 'mod_modulegrouporder',
									    'id' => 'mod_modulegrouporder',
									    'class' => 'form-control',
									    'type' => 'number',
									    'min'   => '1',
									    'value'=> set_value ( 'mod_modulegrouporder', $module->mod_modulegrouporder )
									
									);
									echo form_input($data);
									?>
								</div>
							</div>
							
							<hr>
						
							<div class="form-group">
								<label for="mod_moduleid" class="col-sm-2 control-label">Kode Submenu<span class="required">*</span>
								</label>
								<div class="col-sm-10">
									<?php echo form_input ( 'mod_moduleid', set_value ( 'mod_moduleid', $module->mod_moduleid ), 'class="form-control" required' ); ?>
								</div>
							</div>
						
							<div class="form-group">
								<label for="mod_modulename" class="col-sm-2 control-label">Submenu<span
									class="required">*</span></label>
								<div class="col-sm-10">
									<?php echo form_input ( 'mod_modulename', set_value ( 'mod_modulename', $module->mod_modulename ), 'class="form-control"  required' ); ?>
								</div>
							</div>
						
							<div class="form-group">
								<label for="mod_moduleorder" class="col-sm-2 control-label">Urutan<span
									class="required">*</span></label>
								<div class="col-sm-2">
								
									<?php 
									$data = array(
									    'name' => 'mod_moduleorder',
									    'id' => 'mod_moduleorder',
									    'class' => 'form-control',
									    'type' => 'number',
									    'min'   => '1',
									    'value'=> set_value ( 'mod_moduleorder', $module->mod_moduleorder )
									
									);
									
									echo form_input($data);
									
									 ?>
								</div>
							</div>
						
							<div class="form-group">
								<label for="mod_modulepagename" class="col-sm-2 control-label">Url Menu<span class="required">*</span>
								</label>
								<div class="col-sm-10">
									<?php echo form_input ( 'mod_modulepagename', set_value ( 'mod_modulepagename', $module->mod_modulepagename ), 'class="form-control" required' ); ?>
								</div>
							</div>
							
						
							
						</div>
						
					</div>

					<!-- /.box-body -->
					<div class="box-footer">
                <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
				<?php echo anchor ( 'backoffice/settmodule', 'Kembali', 'class="btn btn-warning"' ); ?>
              </div>
				</div>
			<?php echo form_close();?>
			</div>
				
				<div class="col-md-3">
				<div class="box-header">
           
            	</div><br/>
            	
				<?php echo validation_errors(); ?>
				
				</div>
				
		</div>
	</section>
</div>


<?php   }else{
    redirect('backoffice/user');
}
?>

