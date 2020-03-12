<?php

use chriskacerguis\RestServer\RestController;

class Rest_Controller extends RestController
{

    public function __construct()
    {
        parent::__construct();
       
    }
    
    public function show_404()
    {
        $CI =& get_instance();
        $CI->load->view('error404');
        echo $CI->output->get_output();
        exit;
    }
 
 
}
