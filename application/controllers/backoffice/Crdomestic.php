<?php
 class Crdomestic extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
     }



     public function index()
     {
     	if( $this->session->userdata('u_an_id') == 'super_admin'){
     	    
     	    $this->data['crdomestics']=$this->Crdomestic_m->get_with_join_all();
     	}else{
     	    
     	    $this->data['crdomestics']=$this->Crdomestic_m->GetModuleDB();
     
     	}
     	 
     	  $this->data['subview'] = 'backoffice/crdomestic/index';
          $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id)
     {
       // memanggil data 1 crdomestic berdasarkan id
      if ($id) {
          $this->data['crdomestic']=$this->Crdomestic_m->GetModuleDB($id);
          count($this->data['crdomestic']) || $this->show_404();
          
          
         
      } else {
      if( $this->session->userdata('u_an_id') == 'super_admin'){
          $this->show_404();
     	   // $this->data['crdomestics']=$this->Crdomestic_m->get_with_join_all();
     	}else{
     	    $this->show_404();
     	    //$this->data['crdomestics']=$this->Crdomestic_m->GetModuleDB();
     	}
      }
       //$this->data['hakakses_dropdown'] = $this->Crdomestic_m->get_drowpdown_hakakses();
       //$this->data['module_dropdown'] = $this->Crdomestic_m->get_drowpdown_module();
       dump($this->Crdomestic_m->getWilayah('bek'));
       $rules = $this->Crdomestic_m->rules;
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
         $data = $this->Crdomestic_m->array_from_post(array(
                $iduser,
                'propuser',
                'kotkabuser',
                'kecuser',
                'keluser',
                'kodeposuser',
                'alamatuser',
              
           ));
           $iduser = $this->session->userdata('iduser');
        
           $this->Crdomestic_m->simpan($data, $id);
           //var_dump($data);
           // redirect('backoffice/crdomestic/');
          
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
      
                             window.location.replace("'.site_url('backoffice/crdomestic/').'");
                           }, 1500);
                          </script>';
      }
      
       $this->data['subview'] = 'backoffice/crdomestic/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
   
     public function hapus($id)
     {
     	$this->Crdomestic_m->hapus($id);
     	redirect('backoffice/crdomestic/');
     }
     
     public function stts($id)
     {
     	$this->Crdomestic_m->edit_status($id);
     	redirect('backoffice/crdomestic');
     }
     
     public function suggestions()
     {
         $suggest = $this->input->post('area_tujuan',TRUE);
         $rows = $this->Crdomestic_m->getWilayah($suggest);
         $json_array = array();
         foreach ($rows as $row)
             $json_array[]= $row->namaKotkab;
             echo json_encode($json_array);
     }
     

      
 }
