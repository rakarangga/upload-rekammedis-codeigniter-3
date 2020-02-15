<?php
 class Voucherintr extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
		 $this->load->model('Voucherintr_m');
     }

     public function index()
     {
     	  
        //$this->data['voucherintrs']=$this->Voucherintr_m->get_by('curdate() between tblvoucerintr.startdate and tblvoucerintr.enddate');
         $this->data['voucherintrs']=$this->Voucherintr_m->get_with_join();
      
        // dump($this->data['voucherintrs']);
         $this->data['subview'] = 'backoffice/voucherintr/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 voucherintr berdasarkan id
      if ($id) {
          $this->data['voucherintr'] = $this->Voucherintr_m->get($id);
          count($this->data['voucherintr']) || $this->show_404();
          $this->data['promointrs'] = $this->Promointr_m->get_by(array(
            'tblpromointr.idvoucherintr' =>  $this->data['voucherintr']->idvoucherintr,
            'tblpromointr.idusers' => $this->session->userdata('iduser')
          ));
           //!count($this->data['promointrs']) || $this->show_404(); 
      } else {
          redirect('404');
      }
      if(!count($this->data['promointrs'])){
                 $data = array( 
                          'idusers' => $this->session->userdata('iduser'),
                          'idvoucherintr' =>  $this->data['voucherintr']->idvoucherintr,
                          'idrefdom' => '0',
                          'idinpoints' => '0',
                          'tanggalambil'=> date('Y-m-d'),
                          'statusvoucher' => 'AKTIF'  
                          );              
                 // dump($data); 
                 $this->Promointr_m->simpan($data, $id = NULL); 
                      $this->data['sukses']='<script>
                      swal({
                                    title: "Voucher Telah Berhasil Diambil",
                                    type: "success",
                                    closeOnConfirm: false,
                                    showConfirmButton: false
                                    });
                                   setTimeout(function(){
        
                                     window.location.replace("'.site_url('backoffice/crinter/').'");
                                   }, 4000); 
                      </script>';  
                      }else{
                            $this->data['sukses']='<script>
                      swal({
                                    title: "Maaf, Voucher Sudah Berhasil Diambil",
                                    type: "error",
                                    closeOnConfirm: false,
                                    showConfirmButton: false
                                    });
                                   setTimeout(function(){
        
                                     window.location.replace("'.site_url('backoffice/voucherintr/').'");
                                   }, 3000); 
                      </script>';  
                      }
     // $this->data['get_pengirim'] = $this->Voucherintr_m->get_with_pengirim($this->data['voucherintr']->idalamatusers,$id, TRUE);
      $this->data['subview'] = 'backoffice/voucherintr/index';
      $this->load->view('backoffice/_layout_main',$this->data);
     }
     
    
 /*
     public function hapus($id)
     {
     	$this->Voucherintr_m->hapus($id);
     	redirect('backoffice/Voucherintr/');
     }
*/
 }
