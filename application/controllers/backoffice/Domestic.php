<?php
 class Domestic extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
		 $this->load->model('Domestic_m');
     }



     public function index()
     {
     	
         $this->data['domestics']=$this->Domestic_m->get_with_join();

         $this->data['subview'] = 'backoffice/domestic/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 domestic berdasarkan id
      if ($id) {
          $this->data['domestic'] = $this->Domestic_m->get_with_join($id);
          count($this->data['domestic']) || $this->show_404();
      } else {
         $this->show_404();
      }
      
      $this->data['get_pengirim'] = $this->Domestic_m->get_with_pengirim($this->data['domestic']->idalamatusers,$id, TRUE);
      $this->data['get_penerima'] = $this->Domestic_m->get_with_penerima($this->data['domestic']->idalamatreceiver,$id, TRUE);
      
    // dump( $this->data['get_pengirim']);
    // dump( $this->data['get_penerima']);
      /* //set rules validation
       $rules = $this->Domestic_m->rules;
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
         $data = $this->Domestic_m->array_from_post(array(
               'an_id',
               'an_name',
           ));
          
           $this->Domestic_m->simpan($data, $id);
           //var_dump($data);
          // redirect('backoffice/Domestic/');
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
           
                             window.location.replace("'.site_url('backoffice/Domestic/').'");
                           }, 1500);
                          </script>';
       } */
      
       $this->data['subview'] = 'backoffice/domestic/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
 
     public function _unique_id($str){

       $id = $this->uri->segment(4);
       $domestic_id = $this->input->post('an_id');
       $this->db->where('an_id',$domestic_id);
       !$id || $this->db->where('id !=', $id);
       $domestic = $this->Domestic_m->get();
		if(count($domestic)){
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
     	$this->Domestic_m->hapus($id);
     	redirect('backoffice/Domestic/');
     }

 }
