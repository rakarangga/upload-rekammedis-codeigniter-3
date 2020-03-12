<?php

class Frontend_Controller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['meta_title'] = 'ARCHIVE MANAGER';
        $this->data['nav_title'] = 'Archive Manager';
        $this->data['copyright'] = 'All Rights Reserved. Archive Manager Medical Record';
        $this->data['version'] = 'Beta 0.1';
        $this->load->helper('form');
        $this->load->helper('security');
    }

    public function show_404()
    {
        $CI = &get_instance();
        $CI->load->view('error404');
        echo $CI->output->get_output();
        exit;
    }
}
