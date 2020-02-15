<!doctype html> 
<html> 
  <head> 
    <title>404 Page Not Found</title> 
    <style> 

      body{ 
      <?php  
        /* background: url(<?php echo base_url()?>assets/dist/img/truck-intrex.png) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-position: right center; 
        background-size: 50%; */ ?>
        width: 99%; height: 100%; 
        background-color: #f39c12; 
        color: white; 
        font-family: sans-serif; 
      } 
      div { 
        position: absolute; 
        width: 400px; 
        height: 300px; 
        z-index: 15; 
        top: 45%; 
        left: 50%; 
        margin: -100px 0 0 -200px; 
        text-align: center; 
      } 
      h1,h2{ 
        text-align: center; 
      } 
      h1{ 
        font-size: 60px; 
        margin-bottom: 10px; 
        border-bottom: 1px solid white; 
        padding-bottom: 10px; 
      } 
      h2{ 
        margin-bottom: 40px; 
      } 
      a{ 
        margin-top:10px; 
        text-decoration: none; 
        padding: 10px 25px; 
        background-color: ghostwhite; 
        color: black; 
        margin-top: 20px; 
      } 
    </style> 
  </head> 
  <body> 
     <div> 

       <h1>404</h1> 
       <h2>Page not found</h2> 
       <?php echo ' '.anchor ( 'backoffice/dashboard', 'Back to Dashboard', 'class="btn btn-primary"' ); ?>
     </div> 
  </body> 
</html>