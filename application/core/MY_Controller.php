<?php

class MY_Controller extends CI_Controller
{

    public $data = array();

    function __construct()
    {
        parent::__construct();
        $this->data['Errors'] = array();
        $this->data['site_name'] = config_item('site_name');
    }

  
}