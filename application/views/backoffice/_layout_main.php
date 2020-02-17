<?php
$this->load->view('backoffice/components/page_head');

?>
<style>
/* .skin-yellow-light .main-header .navbar {
    background-color: #1caae2;
} */
</style>
<body class="hold-transition skin-blue">
<div class="wrapper">

  <header class="main-header">
  
    <!-- Logo -->
    <a href="<?php echo site_url('backoffice/dashboard')?>" class="logo ">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>ARM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Manajemen</b> Area</span>
    </a>
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <img src="<?php echo $user_me->logo == NULL ? base_url().'assets/dist/img/user.png' : base_url().$user_me->logo; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $nama_lengkap; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <img src="<?php echo $user_me->logo == NULL ? base_url().'assets/dist/img/user.png' : base_url().$user_me->logo; ?>"  class="img-circle" alt="User Image">
                <p>
               	  <?php echo $nama_lengkap; ?>
                </p>
              </li>
        
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url().'backoffice/profile' ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                   <?php echo anchor('backoffice/user/logout','<span class="glyphicon glyphicon-off" aria-hidden="true"></span>',
                                        'data-toggle="tooltip"  class="btn btn-default btn-flat" data-placement="top" title="Logout"'); ?>
                 
                </div>
              </li>
            </ul>
          </li>
   
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar ">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $user_me->logo == NULL ? base_url().'assets/dist/img/user.png' : base_url().$user_me->logo; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nama_lengkap; ?></p>
        </div>
      </div>
        <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
      <!--   <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div> -->
      </form>
<?php $CI = & get_instance(); ?>
      <ul class="sidebar-menu">
        <li class="header">MENU UTAMA</li>
        <li class="<?=$CI->uri->segment(2) == "dashboard" ? "active" : "";?>">
          <a href="<?php echo site_url('backoffice/dashboard')?>"><i class="fa fa-dashboard"></i> DASHBOARD</a>
        </li>
         <?php 

         foreach ($_SESSION["access"] as $key => $access) { 
//              $active_treeview = $CI->uri->segment(2) == $access ? TRUE : FALSE;
//              $tes = implode("", implode("",$access));
             
//            echo $access[] = 'tes';
//            if(!$access["top_menu_name"]){

//                dump($access);
                
                
//            } 
            $active_top = $CI->uri->segment(1).'/'.$CI->uri->segment(2) == $access[$CI->uri->segment(2)]["page_name"] ? TRUE : FALSE;
            $active_menu_top = $active_top == TRUE ? '<li class="treeview active">' : '<li class="treeview">';
             echo $active_menu_top
             ?>
             
               <a  href="javascript:void(0);"><?php echo $access["top_menu_name"]; ?>
             <span class="pull-right-container">
             			 <i class="fa fa-angle-left pull-right"></i></a>
            			</span>
                                <?php
                                echo '<ul class="treeview-menu">';
                                foreach ($access as $k => $val) {
                                  //  dump($val);
                                    if ($k != "top_menu_name") {
                                       $active = $CI->uri->segment(1).'/'.$CI->uri->segment(2) == $val['page_name']? TRUE : FALSE;
                                        $active_menu = $active == TRUE ? '<li class="active">' : '<li>';
                                        echo $active_menu.'<a href="' . (site_url($val["page_name"])) . '"><i class="fa fa-circle-o"></i>' . strtoupper($val["menu_name"]) . '</a></li>';
                                        ?>
                                        <?php
                                    }
                                }
                                echo '</ul>';
                                ?>
                            </li>
                            <?php
                        }
                        // dump($CI->uri->segment(1).'/'.$CI->uri->segment(2));
                        ?>
          <li class="<?=$CI->uri->segment(2) == "dashboard" ? "active" : "";?>">
            <a href="<?php echo site_url('backoffice/logout')?>"><i class="glyphicon glyphicon-off"></i> Logout</a>
          </li>
      </ul>
      </section>
      
</aside>	<!-- Loading (remove the following to stop the loading)-->
		<div class="box no-border" id="loadPage" 
		style="opacity: 0.5;filter: alpha(opacity=50); /* For IE8 and earlier */position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;">
            <div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>
          </div>
                <?php $this->load->view($subview); ?>
          <?php echo $notif;?>
           <?php $this->load->view('backoffice/components/page_tail')?>
