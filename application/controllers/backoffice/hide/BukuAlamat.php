<?php
 class BukuAlamat extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
     }



     public function index()
     {
     	if( $this->session->userdata('u_an_id') == 'super_admin'){
     	    
     	    $this->data['bukualamats']=$this->BukuAlamat_m->get_with_join_all();
     	}else{
     	    $this->data['bukualamats']=$this->BukuAlamat_m->get_with_join();
     	}
     	
         $this->data['subview'] = 'backoffice/bukualamat/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 bukualamat berdasarkan id
      if ($id) {
          $this->data['bukualamat'] = $this->BukuAlamat_m->get_with_join($id);
          count($this->data['bukualamat']) || $this->show_404();
      } else {
      if( $this->session->userdata('u_an_id') == 'super_admin'){
             //$this->show_404();
     	    $this->data['bukualamats']=$this->BukuAlamat_m->get_with_join_all();
     	}else{
     	    //$this->show_404();
     	    $this->data['bukualamats']=$this->BukuAlamat_m->get_with_join();
     	}
      }
       $this->data['propinsi_dropdown'] = $this->BukuAlamat_m->get_dropdown_propinsi();
      
       //$this->data['kotkab_dropdown'] = $this->BukuAlamat_m->get_dropdown_kotkab("11");
      
       //$this->data['module_dropdown'] = $this->BukuAlamat_m->get_drowpdown_module();
       $rules = $this->BukuAlamat_m->rules;
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
         $data = $this->BukuAlamat_m->array_from_post(array(
                'idusers',
                'propuser',
                'kotkabuser',
                'kecuser',
                'keluser',
                'kodeposuser',
                'alamatuser',
              
           ));
         
         $data[idusers] = $this->session->userdata('iduser');
         $this->BukuAlamat_m->simpan($data, $id);
           //var_dump($data);
           // redirect('backoffice/bukualamat/');
          
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
      
                             window.location.replace("'.site_url('backoffice/bukualamat/').'");
                           }, 1500);
                          </script>';
      }
      
       $this->data['subview'] = 'backoffice/bukualamat/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
     
     public function propinsi_ajax(){
      
             
            // echo '<script> window.location.replace("'.site_url('backoffice/bukualamat/form').'");</script>';
          $propuser = $this->input->post('kodepropuser',TRUE);
         
          $this->BukuAlamat_m->get_dropdown_kotkab($propuser);
          count($propuser) || $this->show_404();
           
     }
     
     public function kotkab_ajax(){
     
          
         // echo '<script> window.location.replace("'.site_url('backoffice/bukualamat/form').'");</script>';
         $kotkabuser = $this->input->post('kodekotkabuser',TRUE);
        
         $this->BukuAlamat_m->get_dropdown_kecamatan($kotkabuser);
         count($kotkabuser) || $this->show_404();
          
     }
     
     public function kecamatan_ajax(){
          
     
         // echo '<script> window.location.replace("'.site_url('backoffice/bukualamat/form').'");</script>';
         $kecamatanuser = $this->input->post('kodekecamatanuser',TRUE);
     
         $this->BukuAlamat_m->get_dropdown_kelurahan($kecamatanuser);
         count($kecamatanuser) || $this->show_404();
     
     }
     
     public function kelurahan_ajax(){
     
          
         // echo '<script> window.location.replace("'.site_url('backoffice/bukualamat/form').'");</script>';
         $kelurahanuser = $this->input->post('kodekelurahanuser',TRUE);
          
         $this->BukuAlamat_m->get_kodepos($kelurahanuser);
           count($kelurahanuser) || $this->show_404();
         
     }
     
     public function hapus($id)
     {
     	$this->BukuAlamat_m->hapus($id);
     	redirect('backoffice/bukualamat/');
     }
     
    
     
     public function stts($id)
     {
     	$this->BukuAlamat_m->edit_status($id);
     	redirect('backoffice/bukualamat');
     }
     

      
 }
