<?php
$this->load->view('backoffice/components/page_head');

?>
<style type="text/css" media="print">
 
/* @page {size:landscape}  */   
body {
  
     }

</style>
<body onload="window.print();" >
    <?php $this->load->view($subview); ?>
<!-- ./wrapper -->
</body>
          
