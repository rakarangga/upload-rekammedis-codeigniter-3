<?php
 class Hakakses extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
		 $this->load->model('Hakakses_m');
     }



     public function index()
     {
     	
         $this->data['hakaksess']=$this->Hakakses_m->get();

         $this->data['subview'] = 'backoffice/hakakses/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 hakakses berdasarkan id
      if ($id) {
          $this->data['hakakses'] = $this->Hakakses_m->get($id);
          // count($this->data['hakakses']) || $this->data['error'][] = 'Pengguna Tidak Ditemukan';
          count($this->data['hakakses']) || $this->show_404();
      } else {
          $this->data['hakakses'] = $this->Hakakses_m->get_new();
      }
      
      //set rules validation
       $rules = $this->Hakakses_m->rules;
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
         $data = $this->Hakakses_m->array_from_post(array(
               'an_id',
               'an_name',
           ));
          
           $this->Hakakses_m->simpan($data, $id);
           //var_dump($data);
          // redirect('backoffice/Hakakses/');
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
           
                             window.location.replace("'.site_url('backoffice/Hakakses/').'");
                           }, 1500);
                          </script>';
       }
      
       $this->data['subview'] = 'backoffice/hakakses/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
 
     public function _unique_id($str){

       $id = $this->uri->segment(4);
       $hakakses_id = $this->input->post('an_id');
       $this->db->where('an_id',$hakakses_id);
       !$id || $this->db->where('id !=', $id);
       $hakakses = $this->Hakakses_m->get();
		if(count($hakakses)){
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
     	$this->Hakakses_m->hapus($id);
     	redirect('backoffice/Hakakses/');
     }

     public function multi_delete()
     {
     	if($this->input->post('chk_val')){
             $id = $this->input->post('chk_val');
             for($count = 0; $count < count($id); $count++){
                $this->Hakakses_m->hapus($id[$count]);
             }
         }
     
     }

 }
