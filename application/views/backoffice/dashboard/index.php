<style>
.bg_opa{
	width:100%;
	height:100%;
	background:#B8B8B8; opacity:0.5;
}
.white-box .box-title{
	font-size:15px;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!-- <section class="content-header">
		<h1>
			Hai <?php echo $nama_lengkap; ?> <small>Intrex OMS membantu Anda mengelola pesanan dan
				mengajukan penjemputan.</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Home</li>
		</ol>
	</section> -->

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<?php /*	<div class="row">

			<div class="col-lg-3 col-xs-3">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>*</h3>
						<p>Kirim Internasional</p>
					</div>
					<div class="icon">
							<i class="fa fa-plane bg-yellow"></i>
					</div>
					<a href="<?php echo site_url('backoffice/crinter')?>" class="small-box-footer">Go to <i
						class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			
			<!-- ./col -->
			<div class="col-lg-3 col-xs-3">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>*</h3>
						<p>Ajukan Penjemputan</p>
					</div>
					<div class="icon">
						<i class="fa fa-truck bg-red"></i>
					</div>
					<a href="<?php echo site_url('backoffice/orderpickup')?>" class="small-box-footer">Go <i
						class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			
		<?php */?>
		  <!-- Info boxes -->
		  <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-archive"></i></span>

            <div class="info-box-content" >
             <span class="info-box-text" style="font-size:20px">TOTAL BERKAS</span>
              <span class="info-box-number" style="font-size:20px">90</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa  fa-file-text-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:20px">NEW BERKAS</span>
              <span class="info-box-number" style="font-size:20px">10</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-rotate-left "></i></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:20px">YESTERDAY</span>
              <span class="info-box-number" style="font-size:20px">15</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-file-archive-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:20px">DRAFT</span>
              <span class="info-box-number" style="font-size:20px">5</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
		
	
		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
	
		<script>
					$(document).ready(function(e) {
						//$('.preloader').show();
						$("#tahun1").change(function(){
						var thn = $(this).val();
						// mengirim dan mengambil data
						$("#animation").show();
								$.ajax({
									type:"POST",                            
									url:"<?php echo base_url('backoffice/dashboard/grafikbatang'); ?>",
									data: 'id_user=<?=encrypting($this->data['iduser'])?>&thn='+thn,
									cache:false,
									success: function(data){
										$('#div_grafik').html(data);
									},
									error:function(){
												$.toast({
														heading: "Error",
														text: "Grafik Failed Connection.",
														showHideTransition: "fade",
														icon: "error",
														hideAfter: 5000,
													})		
									}
								});
							});

							$.ajax({
									type:"POST",                            
									url:"<?php echo base_url('backoffice/dashboard/grafikbatang'); ?>",
									data:'id_user=<?=encrypting($this->data['iduser'])?>',
									cache:false,
									success: function(data){
										$('#div_grafik').html(data);
									},
									error:function(){
												$.toast({
														heading: "Error",
														text: "Pantauan Bulanan Failed Connection.",
														showHideTransition: "fade",
														icon: "error",
														hideAfter: 5000,
													})		
									}
								});
						 });
			</script>
			<!-- right col (We are only adding the ID to make the widgets sortable)-->
			<div class="col-lg-8 col-sm-8 col-xs-12" >
	
				<div class="box box-primary" >
				<div class="box-header with-border">
					<h3 class="box-title">Pantauan Jumlah Pendaftaran Pasien</h3>
						<div class="box-tools pull-right">
						
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						<div class="btn-group ">
										<?php echo form_dropdown('tahun1', $year, $this->input->post('tahun1') ? $this->input->post('tahun1') : encrypting($year->id), 'id="tahun1" class="form-control select2" '); ?>
									</div>
							
							<!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
						</div>
					</div>
					<!-- /.box-header -->
				
					<div class="box-body" >
					
						
								
							<div class="chart-responsive">
								<div id="div_grafik" height="500" style="height: 450px;"></div>
							</div>
					
				
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
				</div>
				</div>

				<script>
					$(document).ready(function(e) {
						//$('.preloader').show();
						$("#tahun2").change(function(){
						var thn = $(this).val();
						// mengirim dan mengambil data
						$("#animation").show();
								$.ajax({
									type:"POST",                            
									url:"<?php echo base_url('backoffice/dashboard/grafikpie'); ?>",
									data: 'id_user=<?=encrypting($this->data['iduser'])?>&thn='+thn,
									cache:false,
									success: function(data){
										$('#pieChart').html(data);
									},
									error:function(){
												$.toast({
														heading: "Error",
														text: "Proporsi Failed Connection.",
														showHideTransition: "fade",
														icon: "error",
														hideAfter: 5000,
													})		
									}
								});
							});

							$.ajax({
									type:"POST",                            
									url:"<?php echo base_url('backoffice/dashboard/grafikpie'); ?>",
									data:'id_user=<?=encrypting($this->data['iduser'])?>',
									cache:false,
									success: function(data){
										$('#pieChart').html(data);
									},
									error:function(){
												$.toast({
														heading: "Error",
														text: "Grafik Failed Connection.",
														showHideTransition: "fade",
														icon: "error",
														hideAfter: 5000,
													})		
									}
								});
						 });
			</script>
			<div class="col-lg-4 col-sm-4 col-xs-12 ">
					<div class="box box-default">
					<div class="box-header with-border">
					<h4 class="box-title">Proporsi By Tanggal Medis</h4>
						<div class="box-tools pull-right">
						<div class="btn-group">
								<?php echo form_dropdown('tahun2', $year, $this->input->post('tahun2') ? $this->input->post('tahun2') : encrypting($year->id), 'id="tahun2" class="form-control select2" '); ?>
							</div>
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							
						</div>
					</div>
					
					<!-- /.box-header -->
					<div class="box-body">
					
				
					
						<div class="chart-responsive">
							<div id="pieChart" height="155" style="height: 155px;"></div>
						</div>
						<!-- ./chart-responsive -->
					
						<!-- /.col -->
						<!-- <div class="col-md-4">
						<ul class="chart-legend clearfix">
							<li><i class="fa fa-circle-o text-red"></i> Chrome</li>
							<li><i class="fa fa-circle-o text-green"></i> IE</li>
							<li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
							<li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
							<li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
							<li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
						</ul>
						</div> -->
						<!-- /.col -->
				
					<!-- /.row -->
					</div>
					<!-- /.box-body -->
					<div class="box-footer no-padding" >
						<ul class="nav nav-pills nav-stacked">
						<li><a href="#"><h4 class="box-title">Pantauan Kinerja Operator</h4></a></li>
						<li><a href="<?php echo site_url('backoffice/orderpickup/index')?>">Retno <span class="pull-right badge bg-blue"><?php echo count($getUnprocess) ? count($getUnprocess) : "30"; ?> Data</span></a></li>
						<li><a href="<?php echo site_url('backoffice/draftinter/index')?>">Fajar  <span class="pull-right badge bg-aqua"><?php echo count($getPending) ? count($getPending) : "15"; ?> Data</span></a></li>
						<li><a href="<?php echo site_url('backoffice/international/index')?>">Wulandari <span class="pull-right badge bg-green"><?php echo count($getPickup) ? count($getPickup) : "23"; ?> Data</span></a></li>
						<li><a href="#">Nurul <span class="pull-right badge bg-red"><?php echo count($internationals) ? count($internationals) : "32"; ?> Data</span></a></li>
						<li><a href="#">Ilham <span class="pull-right badge bg-red"><?php echo count($internationals) ? count($internationals) : "20"; ?> Data</span></a></li>
				
						</ul>
					</div>
					<!-- /.footer -->
			
				</div>
			</div>
			
			<?php /* 
				  <div class="col-md-3">
						<!-- Widget: user widget style 1 -->
						<div class="box box-widget widget-user-2">
							<!-- Add the bg color to the header using any of the bg-* classes -->
							<div class="widget-user-header bg-yellow">
							<div class="widget-user-image">
								<img src="<?php echo $user_me->logo == NULL ? base_url().'assets/dist/img/user.png' : base_url().$user_me->logo; ?>" width="200" height="200" class="img-circle" alt="User Avatar">
							
							</div>
							<!-- /.widget-user-image -->
							<h3 class="widget-user-username"><?php echo $nama_lengkap; ?></h3>
							<h5 class="widget-user-desc"><?php echo $email.' / '. $no_hp;?></h5>
							<h6 class="widget-user-desc"><?php echo  $idmemstat == "2" ? '<label class="label label-primary">User '.$namastatusmember.'</label>' : 
										'<label class="label label-danger">User '.$namastatusmember.'</label>';
										?></h6>
							</div>
							<div class="box-footer no-padding">
							<ul class="nav nav-stacked">
								<li><a href="<?php echo site_url('backoffice/orderpickup/index')?>">Belum Diproses <span class="pull-right badge bg-blue"><?php echo count($getUnprocess) ? count($getUnprocess) : "0"; ?></span></a></li>
								<li><a href="<?php echo site_url('backoffice/draftinter/index')?>">Tertunda  <span class="pull-right badge bg-aqua"><?php echo count($getPending) ? count($getPending) : "0"; ?></span></a></li>
								<li><a href="<?php echo site_url('backoffice/international/index')?>">Ajukan Penjemputan <span class="pull-right badge bg-green"><?php echo count($getPickup) ? count($getPickup) : "0"; ?></span></a></li>
								<li><a href="#">Jumlah Pesanan <span class="pull-right badge bg-red"><?php echo count($internationals) ? count($internationals) : "0"; ?></span></a></li>
							
							</ul>
							</div>
						</div>
					</div>
				<?php /*/?>
			<!-- Left col -->
			<!-- right col -->
		</div>
		<!-- /.row (main row) -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->