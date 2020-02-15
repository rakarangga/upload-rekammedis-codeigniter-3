<?php

class Dashboard extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
      $idrules = "1";
      $id = $this->session->userdata('iduser');
      $this->data['rules'] = $this->Rulepickup_m->get($idrules);
      count($this->data['rules']) || $this->show_404();
      $this->data['internationals'] = $this->International_m->get_with_join();
      $this->data['getUnprocess'] = $this->International_m->getUncprocess('1');
      $this->data['getPending'] = $this->International_m->getUncprocess('3');
      $this->data['getPickup'] = $this->International_m->getUncprocess('2');
      //dump($this->data['getPickup']);
     
      //dump( $this->data['rules']);
     
      if ($id) {
          $this->data['user'] = $this->Settuser_m->get($id);
          count($this->data['user']) || $this->show_404();
      } else {
          count($this->data['user']) || $this->show_404();
      }
      $this->data['subview'] = 'backoffice/dashboard/index';
      $this->load->view('backoffice/_layout_main',$this->data);

    }


}
