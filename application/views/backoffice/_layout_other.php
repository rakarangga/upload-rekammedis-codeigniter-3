<?php
$this->load->view('backoffice/components/page_head');

?>
<body class="hold-transition  skin-yellow-light  layout-top-nav">
<div class="wrapper">

  <header class="main-header">
  
   
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    <div class="navbar-header">
          <!-- Logo -->
    <a href="<?php echo site_url('backoffice/dashboard')?>" class="logo ">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>OMS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Intrex</b>OMS</span>
    </a>
        </div>

      <div class="navbar-custom-menu">
        
      </div>
    </nav>
  </header>

 	<!-- Loading (remove the following to stop the loading)-->
		<div class="box no-border" id="loadPage" 
		style="opacity: 0.5;filter: alpha(opacity=50); /* For IE8 and earlier */position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;">
            <div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>
          </div>
                <?php $this->load->view($subview); ?>
          <?php echo $notif;?>
           <?php $this->load->view('backoffice/components/page_tail')?>
