<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $meta_title;?> | </title>

    <!-- Bootstrap core CSS -->
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font awesome -->
    <link href="<?php echo base_url()?>assets/dist/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
     <!-- select2 -->
      <link href="<?php echo base_url()?>assets/plugins/select2/select2.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
        <link href="<?php echo base_url()?>assets/dist/css/intrex.css" rel="stylesheet">
    
    <link href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"  />
    <!--  <link href="<?php //echo base_url()?>assets/plugins/iCheck/flat/all.css" rel="stylesheet">-->
    <link href="<?php echo base_url()?>assets/plugins/morris/morris.css" rel="stylesheet" />
	
    <!--datatables plus plugins -->
    <link href="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet">
   <link href="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
   
    <!-- toast-->
    <link href="<?php echo base_url()?>assets/plugins/toast/jquery.toast.css" rel="stylesheet">
 	
 	  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/all.css">
 	<!-- bootstrap wysihtml5 - text editor -->
    <!-- Include Jquery min js
    <script src="<?php //echo base_url()?>assets/js/jquery.min.js"></script>

     Include Sweet-alert-->
      <script src="<?php echo base_url()?>assets/sweet-allert/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="<?php echo base_url()?>assets/sweet-allert/sweetalert.css">
    
     
     
      <!-- include auto complete-->
     
      <!--.......................-->


    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
     <!-- <link rel="stylesheet" href="<?php //echo base_url()?>assets/plugins/validator/jquery-password-validator.css"></link> -->
    
</head>
<style>
.removeRow{
  background-color:#D3DCE3;
  /* color:#FFFFFF; */
}
.table thead,
.table th {text-align: center;}
</style>
<?php 
    try {
        $_SESSION["access"] = set_rights($allModules, $acsControl, $modulesGroup);
      
   
    } catch (Exception $ex) {
 
        echo $ex->getMessage();
}



?>
