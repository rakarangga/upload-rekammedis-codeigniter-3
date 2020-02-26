<?php
 class International extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
		 $this->load->model('International_m');
     }



     public function index()
     {
     	
         $this->data['internationals']=$this->International_m->get_with_join();

         $this->data['subview'] = 'backoffice/international/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 international berdasarkan id
      if ($id) {
          $this->data['international'] = $this->International_m->get_with_join($id);
          count($this->data['international']) || $this->show_404();
      } else {
          $this->show_404();
         // $this->data['international'] = $this->International_m->get_new();
      }
      $this->data['get_pengirim'] = $this->International_m->get_with_pengirim($this->data['international']->idalamatusers,$id, TRUE);
   
      $this->data['subview'] = 'backoffice/international/form';
      $this->load->view('backoffice/_layout_main',$this->data);
     }
     
     public function label($id = NULL)
     {
         // memanggil data 1 international berdasarkan id
         if ($id) {
             $this->data['international'] = $this->International_m->get_with_join($id);
            // dump($this->data['international']);
             count($this->data['international']) || $this->show_404();
         } else {
             //$this->show_404();
             // $this->data['international'] = $this->International_m->get_new();
         }
         $this->data['get_pengirim'] = $this->International_m->get_with_pengirim($this->data['international']->idalamatusers,$id, TRUE);
         $this->data['get_barcode'] = $this->International_m->get_barcode($this->data['international']->no_pesanan);  
         $this->data['subview'] = 'backoffice/international/label';
         $this->load->view('backoffice/_layout_print',$this->data);
     }
     
     public function itemdetail_ajax()
     {
         $no_pesanan = $this->input->post('no_pesanan');
         $this->International_m->get_itemDetail($no_pesanan);
         count($no_pesanan) || $this->show_404();
     }
     
     public function payment_ajax()
     {
         
           $no_pesanan = $this->input->post('no_pesanan');
           $this->International_m->getPayment($no_pesanan);
           count($no_pesanan) || $this->show_404();
     }
     
     public function _unique_id($str){

       $id = $this->uri->segment(4);
       $international_id = $this->input->post('an_id');
       $this->db->where('an_id',$international_id);
       !$id || $this->db->where('id !=', $id);
       $international = $this->International_m->get();
		if(count($international)){
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
     	$this->International_m->hapus($id);
     	redirect('backoffice/International/');
     }

 }
