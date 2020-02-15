<?php
 class Draftinter extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
		 $this->load->model('Draftinter_m');
     }

     public function index()
     {
     	
         $this->data['draftinters']=$this->Draftinter_m->get_with_join();

         $this->data['subview'] = 'backoffice/draftinter/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 draftinter berdasarkan id
      if ($id) {
          $this->data['draftinter'] = $this->Draftinter_m->get_with_join($id);
          count($this->data['draftinter']) || $this->show_404();
      } else {
          redirect('404');
          //$this->data['draftinter'] = $this->Draftinter_m->get_new();
      }
      $this->data['get_pengirim'] = $this->Draftinter_m->get_with_pengirim($this->data['draftinter']->idalamatusers,$id, TRUE);
   
      $this->data['subview'] = 'backoffice/draftinter/form';
      $this->load->view('backoffice/_layout_main',$this->data);
     }
     
     public function itemdetail_ajax()
     {
         $no_pesanan = $this->input->post('no_pesanan');
         $this->Draftinter_m->get_itemDetail($no_pesanan);
         count($no_pesanan) || $this->show_404();
     }
      
 
     public function _unique_id($str){

       $id = $this->uri->segment(4);
       $draftinter_id = $this->input->post('an_id');
       $this->db->where('an_id',$draftinter_id);
       !$id || $this->db->where('id !=', $id);
       $draftinter = $this->Draftinter_m->get();
		if(count($draftinter)){
         $this->form_validation->set_message('_unique_id','<div class="alert alert-warning alert-dismissible fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
           </button>
           <strong>%s</strong> Sudah Terdaftar.
           </div>');
         return FALSE;
       }
         return TRUE;
     }
     
     public function hapus($id)
     {
     	$this->Draftinter_m->hapus($id);
     	redirect('backoffice/Draftinter/');
     }

 }
