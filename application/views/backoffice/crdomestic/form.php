<?php 
if(authorize($_SESSION["access"]["pesanan_domestik"]["buat_pesanan_domestik"]["ac_view"])){
?>
<?php echo $sukses; echo $error;?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo empty($crdomestic->iddomorder) ? 'Buat Pesanan Domestik' :  'Update Domestik : <strong>'.$crdomestic->iddomorder.'</strong>'; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('backoffice/dashboard');?>"><i
					class="fa fa-dashboard"></i> Dashboard</a></li>
			<li>Pesanan Domestik</li>
			<li class="active"><?php echo empty($crdomestic->iddomorder) ? 'Buat Pesanan Domestik' :  'Update Domestik'; ?></li>
		</ol>
	</section>
	
	
	<!-- Main content -->
<section class="content">
	
	
<div class="row">
	<?php echo form_open_multipart('','id="demo-form" data-parsley-validate role="form"'); ?>
        <div class="col-md-6">
        
          <div class="box box-default  bg-yellow disabled">
          
           <div class="box-header with-border text-default">
              <i class="fa fa-send"></i>
              <h3 class="box-title">Tujuan</h3>
           </div>
					<div class="box-body ">
					<div class="form-group">
						<label for="area_tujuan" >Area Tujuan<span class="required">*</span></label>
					 	<?php
						
						echo form_input ( 'area_tujuan', '', 'id="area_tujuan" class="form-control " style="width: 100%;" data-inputmask="' . "'mask'" . ': ' . "'999999999999999999'" . ',' . "'greedy'" . ':' . "'fasle'" . 
								',' . "'placeholder'" . ':' . "'aa'" .  '" required' );
						?>	
						<div id="autoComplete"
							style="position: relative; float: left; width: 400px; "></div>
					
						</div>
						
						<div class="form-group">
								<label for="propuser" >Propinsi <span class="required">*</span></label>
								<?php  echo form_dropdown('propuser', $kotkab_dropdown, $this->input->post('kodexxkotkab') ? $this->input->post('kodexxkotkab') : $bukualamat->propuser, 'id="propuser" name="propuser" class="form-control select2" style="width: 100%;"');?>
						</div>
						
						<div class="form-group">
								<label for="kotkabuser" >Kota / Kabupaten <span class="required">*</span></label>
								<?php  echo form_dropdown('kotkabuser', $kotkab_dropdown, $this->input->post('kodexxkotkab') ? $this->input->post('kodexxkotkab') : $bukualamat->kotkabuser, 'id="kotkabuser" name="kotkabuser" class="form-control select2" style="width: 100%;"');?>
						</div>
						
						<div class="form-group">
								<label for="kecuser" >Kecamatan <span class="required">*</span></label>
								<?php  echo form_dropdown('kecuser', $kec_dropdown, $this->input->post('kodexxkec') ? $this->input->post('kodexxkec') : $bukualamat->kecuser, 'id="kecuser" name="kecuser" class="form-control select2" style="width: 100%;"');?>
						</div>
						
					</div>
					 <!-- /.box-body -->
           
			</div>
		</div>
		
		 <div class="col-md-6">
          <div class="box box-default">
             <div class="box-header with-border">
              <i class="fa fa-send"></i>
              <h3 class="box-title">Paket</h3>
            </div>
					<div class="box-body">
						
						<div class="form-group">
								<label for="propuser" class="control-label" >Propinsi <span class="required">*</span></label>
								<?php  echo form_dropdown('propuser', $kotkab_dropdown, $this->input->post('kodexxkotkab') ? $this->input->post('kodexxkotkab') : $bukualamat->propuser, 'id="propuser" name="propuser" class="form-control select2" style="width: 100%;"');?>
						</div>

					</div>
					 <!-- /.box-body -->
              <div class="box-footer">
                <?php echo form_submit('submit','Simpan','class="btn btn-success"');?>
				<?php echo anchor ( 'backoffice/domestic', 'Kembali', 'class="btn btn-warning"' ); ?>
              </div>
			</div>
		</div>
		
		
	</div>
		
		
			<?php echo form_close();?>
			<div class="col-xs-2">
			  <?php echo validation_errors(); ?>
			</div>
	</section>
</div>
<?php   }else{
    redirect('backoffice/user');
}
?>

