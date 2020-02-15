<?php
 class Accescontrol extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
     }



     public function index()
     {
     	
         $this->data['accescontrols']=$this->Accescontrol_m->get_with_module();

         $this->data['subview'] = 'backoffice/accescontrol/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 accescontrol berdasarkan id
      if ($id) {
          $this->data['accescontrol'] = $this->Accescontrol_m->get($id);
          count($this->data['accescontrol']) || $this->show_404();
      } else {
          $this->data['accescontrol'] = $this->Accescontrol_m->get_with_module();
      }
       $this->data['hakakses_dropdown'] = $this->Accescontrol_m->get_drowpdown_hakakses();
       $this->data['module_dropdown'] = $this->Accescontrol_m->get_drowpdown_module();
       $rules = $this->Accescontrol_m->rules;
       $this->form_validation->set_rules($rules);
      
       if ($this->form_validation->run() == TRUE) {
         $data = $this->Accescontrol_m->array_from_post(array(
               'ac_an_id',
               'ac_module_id',
               'ac_create',
               'ac_edit',
               'ac_delete',
               'ac_view',
           ));
        
           $this->Accescontrol_m->simpan($data, $id);
           //var_dump($data);
           // redirect('backoffice/accescontrol/');
          
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
      
                             window.location.replace("'.site_url('backoffice/accescontrol/').'");
                           }, 1500);
                          </script>';
      }
      
       $this->data['subview'] = 'backoffice/accescontrol/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
   
     public function hapus($id)
     {
     	$this->Accescontrol_m->hapus($id);
     	redirect('backoffice/accescontrol/');
     } 
     
     public function multi_delete()
     {
     	if($this->input->post('chk_val')){
             $id = $this->input->post('chk_val');
             for($count = 0; $count < count($id); $count++){
                $this->Accescontrol_m->hapus($id[$count]);
             }
         }
     
     }
     
     public function stts($id)
     {
     	$this->Accescontrol_m->edit_status($id);
     	redirect('backoffice/accescontrol');
     }
     

      
 }
