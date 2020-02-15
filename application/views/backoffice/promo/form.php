<?php 
if(authorize($_SESSION["access"]["pengaturan_umum"]["promo"]["ac_view"])){
?>
<?php echo $sukses;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pengaturan Umum <small> <?php echo empty($promo->id) ? 'Tambah Promo Slider' :  'Update Promo Slider : <strong>'.$promo->judul.'</strong>'; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pengaturan umum</li>
			<li>Hak akses</li>
			<li class="active"><?php echo empty($promo->id) ? 'Tambah Promo Slider' :  'Update Promo Slider '; ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-8">
			
			<?php echo form_open_multipart('','id="demo-form" data-parsley-validate class="form-horizontal"'); ?>
			<div class="box-header with-border">
            <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
			<?php echo anchor ( 'backoffice/promo', 'Kembali', 'class="btn btn-warning"' ); ?>
            </div>
				<div class="box box-info">
					<div class="box-body">
						<div class="col-md-12">
						
							<div class="form-group">
								<label for="an_id" class="col-sm-2 control-label">Judul<span
									class="required">*</span></label>
								<div class="col-sm-10">
								<?php echo form_input ( 'judul', set_value ( 'judul', $promo->judul ), 'class="form-control" required' ); ?>
								</div>
							</div>

							<div class="form-group">
								<label for="an_name" class="col-sm-2 control-label">URL<span
									class="required">*</span></label>
								<div class="col-sm-10">
									<?php echo form_input ( 'url', set_value ( 'url', $promo->url ), 'class="form-control" required' ); ?>
								</div>
							</div>
							
								<div class="form-group">
								<label for="an_name" class="col-sm-2 control-label">Keterangan<span
									class="required">*</span></label>
								<div class="col-sm-10">
									<?php echo form_input ( 'ket', set_value ( 'ket', $promo->ket ), 'class="form-control" required' ); ?>
								</div>
							</div>
							
							
								
							<div class="form-group">
								<label for="status" class="col-sm-2 control-label">Status<span
									class="required">*</span></label>
								<div class="col-sm-10">
								<?php
                                $options = array(
                                    'Y' => 'Aktif',
                                    'N' => 'Tidak Aktif'
                                );
                                echo form_dropdown('status', $options, $this->input->post('status') ? $this->input->post('status') : $promo->status, 'class="form-control" style="width:250px;"');
                                ?>	
								</div>
							</div>
							<hr>
        					<label>Gambar : </label>
                               <?php
                            $data_upload = array(
                                'name' => 'gambar',
                                'class' => 'form-control',
                                'style' => 'width:250px;'
                            );
							echo form_upload($data_upload).' <hr />';
							if(is_file($promo->gambar) || $promo->gambar != NULL){ 
								echo img(set_value('gambar', $promo->gambar), FALSE, 'class="img"style="margin-top:10px;width:250px;"');
							}else{
								echo img(set_value('gambar', base_url().'/assets/img_noimg/noimg_iklan.jpg'), FALSE, 'class="img"style="margin-top:10px;width:250px;"');
							}
                           
                            ?>
        					
                           

						</div>
						   <?php echo validation_errors(); ?>
					</div>
					
					 <!-- /.box-body -->
              <div class="box-footer">
                <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
				<?php echo anchor ( 'backoffice/promo', 'Kembali', 'class="btn btn-warning"' ); ?>
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

