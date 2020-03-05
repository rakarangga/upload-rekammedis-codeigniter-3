<?php

class Admin_Controller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['meta_title'] = 'ARCHIVE MANAGER';
        $this->data['nav_title'] = 'Archive Manager';
        $this->data['copyright'] = 'All Rights Reserved. Archive Manager Medical Record';
        $this->data['version'] = 'Beta 0.1';
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->library('session');
        // $this->load->library('fileupload');
        // $this->load->library('barcode'); 
        $this->load->library('Datatables'); 
        //encrypt Vigenere / Crypto.php
        $params = array('key' => config_item('encryption_key'));
        $this->load->library('crypto', $params);
        
        //path for config module
        // $this->load->library('facebook');
        $this->load->model('User_m');
        $this->load->model('Settuser_m');
        $this->load->model('Module_m');
        $this->load->model('Accescontrol_m');
        $this->load->model('Promo_m');
        $this->load->model('Promointr_m');
      
        //path for module
        // $this->load->model('Voucherintr_m');
        // $this->load->model('Rulepickup_m');
        // $this->load->model('BukuAlamat_m');
        // $this->load->model('Crdomestic_m');
        // $this->load->model('Propinsi_m');
        // $this->load->model('Crinter_m');
        // $this->load->model('Itemdetail_m');
        // $this->load->model('Draftinter_m');
        // $this->load->model('Metodepay_m');
        // $this->load->model('Jemputdom_m');
        // $this->load->model('Payment_m');
        // $this->load->model('International_m');
        $this->load->model('Direktori_m');
        $this->load->model('Berkas_m');
        $this->load->model('Pasien_m');
        
        //define variable to the array $this->data
        $this->data['iduser'] = $this->session->userdata('iduser');
        $this->data['u_an_id'] = $this->session->userdata('u_an_id');
        $this->data['loggedin'] = $this->session->userdata('loggedin');
        $this->data['nama_lengkap'] = $this->session->userdata('namalengkap');
        $this->data['email'] = $this->session->userdata('email');
        $this->data['no_hp'] = $this->session->userdata('nomorhp');
        $this->data['namastatusmember'] =  $this->session->userdata('namastatus');
        $this->data['idmemstat'] =  $this->session->userdata('idmemstat');
        $this->data['modulesGroup'] = $this->Module_m->modulesGroup();
        $this->data['allModules'] = $this->Module_m->allModules();
        $this->data['acsControl'] = $this->Accescontrol_m->acsControl();
        $this->data['promo'] = $this->Promo_m->get_nested();
        
        if (count($this->data['iduser'])) {
            $this->data['user_m'] = $this->Settuser_m->get_by(array(
            'logis_users.iduser' => $this->data['iduser'] ,
            // 'logis_users.idmemstat' => $this->data['idmemstat']
            ), true); 
            // if (!count($this->data['user'])) {
            //     $this->data['notif']='<script>swal({
            //                     title: "Notifikasi",
            //                     text: "Mohon Untuk Login Kembali",
            //                     type: "info",
            //                     closeOnConfirm: false
            //                   },function(isConfirm) {
            //                      window.location.replace("'.site_url('backoffice/user/logout').'");
            //                   });
            //                  </script>';
              
            // }
        }
   
       
        $token = $this->uri->segment(4);
        // Jika sudah login redirect ke dashboard selain itu riderect ke login
        $exception_uris = array(
            'backoffice/user',
            'backoffice/user/logout',
            'backoffice/user/pw_reset/'.$token
        );
        
        if (in_array(uri_string(), $exception_uris) == FALSE ) {
            if ($this->User_m->loggedin() == FALSE) {
                redirect('backoffice/user');
            }
        }

    }
    
    public function show_404()
    {
        $CI =& get_instance();
        $CI->load->view('error404');
        echo $CI->output->get_output();
        exit;
    }
 
 
}
