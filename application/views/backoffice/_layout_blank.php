<?php
$this->load->view('backoffice/components/page_head');
?>


<body class="hold-transition login-page"
	style="background-color: #1caae2">
	
	
<div class="login-logo">
  
  </div>
	
	
	<div class="col-sm-7">
    	
		<div class="login-box ">
				
				<!-- /.login-logo -->
			<div class="login-box-body box-body">

					<!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;">
                          <span class="step"></span>
                          <span class="step"></span>
                    </div>

				<div class="tab">
					 <div class="box-group" id="accordion">
					  <?php echo validation_errors(); ?>
					 <?php /* <div class="panel box box-warning">
	                  <div class="box-header">
	                  <h2 class="box-title">
	                      	<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	                       Register Here
	                      	</a>
	                    	</h2>
	                  </div>
	                  <div id="collapseOne" class="panel-collapse collapse ">
	                    <div class="box-body">
	                    <?php $this->load->view($regsubview); ?>
	                    </div>
	                  </div>
	                </div> <?php*/ ?>
	                
					
					  <div class="panel box box-danger">
	                  	<div class="box-header with-border">
	                    	<h2 class="box-title" >
	                      	<a data-toggle="collapse"  data-parent="#accordion" href="#collapseTwo">
	                        Halaman Login
	                      	</a>
	                    	</h2>
	                  	</div>
	                  	 <div id="collapseTwo" class="panel-collapse collapse in">
	                  	 <div class="box-body">
						<p class="login-box-msg">Harap Masuk Terlebih Dahulu</p>
							 <?php $this->load->view($subview); ?>

	 					</div>
	   					</div>
	   				</div>
	   				
	   				</div>
				</div>

				<div class="tab">
   					 <h2 class="page-header">Lupa Password</h2>
   					 <p class="login-box-msg">Sistem kami akan mengirimkan link validasi ke alamat email yang terdaftar.</p>
   					  <?php $this->load->view($forgotview); ?>
   				</div>
   				
   <div class="social-auth-links">
   <!--  <p> <a href="<?php //echo $authURL; ?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a></p>-->
				
					</div>

					<div class="text-center">
					 <p>&copy;<?php echo date(Y); ?> <?php echo "<br> ".$copyright;?></p> 
						<!-- <b>Ver</b> <?php //echo $version;?>-->
					</div>
				</div>

			</div>
		
	</div>

	<div class="col-sm-5" >
		<img class="img-responsive"
			src="<?php echo base_url()?>assets/dist/img/medic.png"
			alt="Photo"> 
			<!-- <div style="background-image:url(<?php echo base_url()?>assets/dist/img/medic.png);background-position: bottom center;
    background-repeat: no-repeat;"></div> -->
			
	</div>
	<!-- /.error-page -->
	
	 <!-- example-modal -->
      <div class="example-modal">
		<div class="modal modal-info fade" id="adModal-Log" tabindex="-1" role="dialog" aria-labelledby="adModal-logLabel">
	 	  <div class="modal-dialog" role="document">
	 	  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
	 	                 <img class="img-responsive" src="<?php echo base_url()?>assets/img_adlogin/banner-iklan.png">
             
            <div class="modal-content">
            </div>
          </div>
        </div>
      </div>
      <!-- /.example-modal -->
	

	<!-- <div id="footer-flat">
		<img class="img-responsive" src="<?php echo base_url()?>assets/dist/img/cloud-bottom.png" />
	</div> -->
	
<?php
$this->load->view('backoffice/components/page_tail_log');
?>