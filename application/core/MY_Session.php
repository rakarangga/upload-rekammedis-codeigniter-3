<?php

class My_Session extends CI_Session
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function sess_update()
    {
        // Listen to HTTP_X_REQUESTED_WITH
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
            parent::sess_update();
        }
    }
    

}