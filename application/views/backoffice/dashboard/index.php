

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
	
	
			
				<!-- LINE CHART
				<div class="box box-success">


					<div class="box-header with-border">
						<h3 class="box-title">Line Chart</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool"
								data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool"
								data-widget="remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<div class="chart">
							<canvas id="lineChart" style="height: 340px"></canvas>
						</div>
					</div>
					</.box-body -->

				<!-- </div> -->
				<!-- /.box (chart box) -->
				<?php /*
		<section class="col-lg-12 connectedSortable">

				<div class="alert <?php if($user->idajuosede == "1"){
								echo  'alert-info';
							}elseif($user->idajuosede == "3"){
								echo 'alert-warning';
							}elseif($user->idajuosede == "2"){
								echo 'alert-success';
							}else{
								echo 'alert-info';
							}?> alert-dismissible">
							
								<h4><i class="icon fa fa-info"></i> Selamat Datang</h4>
							
							<?php 
							if($user->idajuosede == "1"){
								echo  '<p>Terima kasih, Anda telah <b>Mendaftar</b> sebagai member O.S.E.D.E, Mohon untuk menunggu proses verifikasi data member O.S.E.D.E anda.</p>';
							}elseif($user->idajuosede == "3"){
								echo  '<p>Mohon Maaf Pengajuan data member O.S.E.D.E anda <b>Belum Diterima</b> dikarenakan data tidak valid, Mohon untuk merevisi data member O.S.E.D.E anda, lalu <b>Mendaftar</b> kembali  </br>'.anchor ( 'backoffice/profile/form/'.$user->iduser, '<b>Daftar Ulang</b>', 'class="btn btn-danger"' ).'</p>';
								echo $user->komenajuan == NULL ? "" :  '<b>Message From CSO :</b>  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">'.$user->komenajuan.'. </p>';
							}elseif($user->idajuosede == "2"){
								echo '<p>Anda telah terdaftar sebagai member O.S.E.D.E,  Nikmati potongan harga lebih murah untuk pengiriman international.</p>';
							}else{
								echo '<p>Anda Belum terdaftar sebagai member O.S.E.D.E,  dapatkan potongan harga lebih murah untuk pengiriman international. </br>'.anchor ( 'backoffice/profile/form/'.$user->iduser, '<b>Daftar</b>', 'class="btn btn-danger"' ).'</p>';
							}
							?>
							
										
							</div>
		  </section>
		  	<?php */ ?>
			<!-- /.Left col -->
			<!-- right col (We are only adding the ID to make the widgets sortable)-->
			<section class="col-lg-7 connectedSortable">
	
				<div class="box box-primary">
					<div class="box-header with-border">
					<marquee><h3 class="box-title text-blue">Batas Waktu Penjemputan mulai dari jam <?php echo e(substr($rules->waktuawal,0,5)) .' hingga jam '.e(substr($rules->waktuakhir,0,5));?></h3>
					</marquee>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="carousel-example-generic" class="carousel slide"
							data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0"
									class=""></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"
									class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"
									class=""></li>
							</ol>
							<div class="carousel-inner">
                
            <?php foreach ($promo as $promos) :
              
            
           
                $i++;
               
                if ($i == 1) {
                    $active ='active';
                    $iname = 'First';
                } elseif ($i == 2) {
                          $active='';
                          $iname = 'Seccond';
                } elseif ($i == 3) {
                         $active='';
                          $iname = 'Third';
                } 
                ?>
              		  <div class="item <?php echo $active; ?>">
									<img src="<?php echo '.'.htmlentities(gambar($promos)); ?>"
										alt="<?php echo $iname; ?> slide">

									<div class="carousel-caption"><?php echo $promos[judul]; ?></div>
								</div>
								
                 <?php 
// echo htmlentities($promos[gambar]);
                      // dump($promos);
                      //echo $i .','.$active.','.$iname. gambar($promos[gambar]);
           //      $CI = & get_instance();
                 //echo $promos[gambar];
                ?>
            
            <?php endforeach ; ?>
            
               <!--    <div class="item ">
                    <img src="http://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">

                    <div class="carousel-caption">
                      Voucher
                    </div>
                  </div>
                  <div class="item active">
                    <img src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">

                    <div class="carousel-caption">
                     Refferal
                    </div>
                  </div>
                  <div class="item ">
                    <img src="http://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">

                    <div class="carousel-caption">
                      I-Points
                    </div>
                  </div> -->
                
                </div>
							<a class="left carousel-control" href="#carousel-example-generic"
								data-slide="prev"> <span class="fa fa-angle-left"></span>
							</a> <a class="right carousel-control"
								href="#carousel-example-generic" data-slide="next"> <span
								class="fa fa-angle-right"></span>
							</a>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			

			</section>
			
				  <div class="col-md-5">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
              	 <img src="<?php echo $user->logo == NULL ? base_url().'assets/dist/img/user.png' : base_url().$user->logo; ?>" width="200" height="200" class="img-circle" alt="User Avatar">
              
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
          <!-- /.widget-user -->
          	<!-- TABLE: LATEST ORDERS
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Riwayat Transaksi</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool"
								data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool"
								data-widget="remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<!-- /.box-header 
					<div class="box-body">
						<div class="table-responsive">
							<table class="table no-margin">
								<thead>
									<tr>
										<th>ID Pesanan</th>
										<th>Potongan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="pages/examples/invoice.html">OR9842</a></td>
										<td><span class="label label-success">Shipped</span></td>
									</tr>

									<tr>
										<td><a href="pages/examples/invoice.html">OR1848</a></td>
										<td><span class="label label-warning">Pending</span></td>
									</tr>

									<tr>
										<td><a href="pages/examples/invoice.html">OR7429</a></td>
										<td><span class="label label-danger">Delivered</span></td>
									</tr>

									<tr>
										<td><a href="pages/examples/invoice.html">OR7429</a></td>
										<td><span class="label label-info">Processing</span></td>
									</tr>

									<tr>
										<td><a href="pages/examples/invoice.html">OR7429</a></td>
										<td><span class="label label-info">Processing</span></td>
									</tr>

								</tbody>
							</table>
						</div>
						<!-- /.table-responsive 
					</div>
					<!-- /.box-body 
					<div class="box-footer clearfix">
						<a href="javascript:void(0)"
							class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
						<a href="javascript:void(0)"
							class="btn btn-sm btn-default btn-flat pull-right">View All
							Orders</a>
					</div>
					<!-- /.box-footer 
				</div>
				<!-- /.box -->
        </div>
			<!-- Left col -->
			<!-- right col -->
		</div>
		<!-- /.row (main row) -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->