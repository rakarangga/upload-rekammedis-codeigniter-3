<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RestMenu extends Frontend_Controller
{

    public function index()
    {
        // $this->show_404();
        $this->load->helper('url');

        $this->load->view('rest_server');
    }
}
