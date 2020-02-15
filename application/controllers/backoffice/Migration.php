<?php

class Migration extends Admin_Controller
{

    public function index()
    {
        $this->load->library('migration');
        if (! $this->migration->current()) {
            $this->show_404();
            //show_error($this->migration->error_string());
        } else {
            echo 'Migration Worked!';
        }
    }
}