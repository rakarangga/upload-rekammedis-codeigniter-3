<?php
 class User extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
     }

     public function index()
     {
         $dashboard = 'backoffice/dashboard';
         $this->User_m->loggedin() == FALSE || redirect($dashboard);
        // dump(array('hash'=> $this->User_m->hash('raka73')));
          
         $register = $this->input->post('register');
         $forgot = $this->input->post('forgot');
          // dump($randPass);
          //  dump($password);
          // dump($register);
         if(isset($register)){
             $rulesRegis = $this->User_m->rulesRegis;
             $this->form_validation->set_rules($rulesRegis);
             if ($this->form_validation->run() == TRUE) {
                 $data = $this->User_m->array_from_post(array(
                     'namalengkap',
                     'namauser',
                     'namabisnis',
                     'email',
                     'nomorhp'
                 ));
                   $randPass=  $this->User_m->randPass();
                   $data['nomorhp'] = '+62'.$data['nomorhp'];
                   $data['iduserlevel'] = '4';
                   $data['iduservalid'] = '0';
                   $data['userpass'] =  $this->User_m->encrypt($randPass);
                   $data['u_an_id'] = 'user';
                   $data['idmemstat'] = '1';
                   $data['idajuosede'] = '0';
                   $data['statusonline'] = '0';
                   
                   /* 'protocol' => $protocol,//'smtp',
                   'smtp_host' => $smtp_host, //'smtp.hostinger.co.id',
                   'smtp_port' => $smtp_port, //587
                   'smtp_user' => '<a href="mailto:'.$mailuser.'" rel="nofollow">'.$mailuser.'</a>', // change it to yours intrex_support@intrex.online
                   'smtp_pass' => $mailpass, //'Intr3xId,2018', // change it to yours
                   'mailtype' => $mailtype, //html
                   'charset' => $charset,
                   'wordwrap' => $wordrap 
                    public function register($protocol,$smtp_host,$smtp_port,$mailuser,$mailpass,$mailto,$mailtopass,$namalengkap,$mailtype = 'html',$charset='iso-8859-1',$wordrap = TRUE){
                   */
                 if($this->User_m->register("smtp","smtp.hostinger.co.id",587,"intrex_support@intrex.online","Intr3xId,2018",$data['email'],$randPass,$data['namalengkap']) == TRUE){
                    // dump($data);
                     $this->User_m->simpan($data);
                     $this->data['valid_register']='<p class="margin text-green">Terima Kasih telah mendaftar sebagai pelanggan intrex. Email Validasi pendaftaran telah sukses dikirim.</code></p>';
                     $register = NULL;
                     $this->session->set_userdata('register',false);
                 }else{
                   $this->data['valid_register']='<p class="margin text-red">Terjadi Kesalahan Server, silahkan daftar kembali.</code></p>';
                   $register = NULL;
                 }
                
                // redirect('backoffice/user');
                
             }
         }else if(isset($forgot)){
            $rulesForgot = $this->User_m->rulesForgot;
             $this->form_validation->set_rules($rulesForgot);
             if ($this->form_validation->run() == TRUE) {
             $data = $this->User_m->array_from_post(array(
                     'email'
                 ));

               if($this->User_m->forgot("smtp","smtp.hostinger.co.id",587,"intrex_support@intrex.online","Intr3xId,2018",$data['email']) == TRUE){
                    // dump($data);
                    // $this->User_m->simpan($data);
                     $this->data['valid_forgot']='<p class="margin text-green">Terima Kasih telah mengajukan permintaan lupa password. Email Validasi telah sukses dikirim.</code></p>';
                     $this->data['valid_forgot_tab']='<script type="text/javascript">$(document).ready(function(){nextPrev(1);}); </script>';
                     $forgot = NULL;
                     $this->session->set_userdata('register',false);
                 }else{
                      $this->data['valid_forgot']='<p class="margin text-red">Mohon maaf alamat email tidak tersedia, Silahakan register terlebih dahulu.</code></p>';
                      $this->data['valid_forgot_tab']='<script type="text/javascript">$(document).ready(function(){nextPrev(1);}); </script>';
                      $forgot = NULL;
                  }
             }
       }else{
         $rules = $this->User_m->rules;
         $this->form_validation->set_rules($rules);
         $rules['u_pass'] .= '|required';
         if ($this->form_validation->run() == TRUE) {
             //login the pages and redirect to dashboard
                 if ($this->User_m->login() == TRUE) {
                   $this->data['valid_login']='<script>
                                    swal({
                                    title: "Login Success",
                                    type: "success",
                                    closeOnConfirm: false,
                                    showConfirmButton: false
                                    });
                                   setTimeout(function(){
        
                                     window.location.replace("'.site_url($dashboard).'");
                                   }, 1000);
                                   
                                  </script>';
                 
                 }else{
                 $this->session->set_flashdata('error','email / Password tidak valid !');
                 $url = "backoffice/user";
                 $this->data['valid_login']='<script>swal({
                                title: "username / password tidak valid !",
                                type: "error",
                                closeOnConfirm: false
                              },function(isConfirm) {
                                 window.location.replace("'.site_url($url).'");
                              });
                             </script>';
                    }
                  
                }
         }
 /*      if($this->User_m->loginFB() == TRUE){
          // Get logout URL
           $this->data['logoutURL'] = $this->facebook->logout_url();
       
       }else{
            // Get login URL
           $this->data['authURL'] =  $this->facebook->login_url();
           
        } */
       // dump($this->session->userdata());
        //$this->data['authURL'] =  $this->facebook->login_url();
         //dump( $data['authURL']);
        //  dump($this->session->userdata());
         $this->data['forgotview']='backoffice/user/forgot';
         $this->data['subview']='backoffice/user/login';
         $this->data['regsubview']='backoffice/user/regis';
         $this->load->view('backoffice/_layout_blank', $this->data);
     }
     
     public function pw_reset($token){
       $dashboard = 'backoffice/dashboard';
       $this->User_m->loggedin() == FALSE || redirect($dashboard);
      if ($token) {
                $token_decode = $this->User_m->base64url_decode($token);           
                $cleanToken = $this->security->xss_clean($token_decode);  
                $this->data['user_info'] = $this->User_m->isTokenValid($token_decode); //either false or array(); 
               // $this->data['user_info'] = "123456"; //either false or array();   
                $this->data['user_info']  == TRUE || redirect('backoffice/user');
             
              } else {
                 $this->data['user_info']  == TRUE || redirect('backoffice/user');
              }
      /* if(!$this->data['user_info']){  
         $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');  
         redirect('backoffice/user');   
       }   */ 
      
       $rulesReset  = $this->User_m->rulesReset;
       $rulesReset['u_pass']['rules'] .= '|required';
       $this->form_validation->set_rules($rulesReset);
       if ($this->form_validation->run() == TRUE) {
              $data = array(  
               'nama'=>  $this->data['user_info']->namalengkap,   
               'namauser'=> $this->data['user_info']->email,   
               'token'=> substr($token_decode,0,30),
               'iduser'=>$this->data['user_info']->iduser
             );  
              
             $dataPass = $this->User_m->array_from_post(array(
                   'userpass'
               ));   
             $dataPass['userpass'] = $this->Settuser_m->hash($dataPass['userpass']); 
             $sttsToken = array('status'=>'tidak tersedia');
             $this->Settuser_m->simpan($dataPass, $data['iduser']);
             $this->User_m->editToken($sttsToken,$data['iduser'], $data['token']);
         if ($this->User_m->resetLogin($data['iduser']) == TRUE) {
                   $this->data['valid_reset']='<script>
                                    swal({
                                    title: "Password Berhasil diperbarui",
                                    type: "success",
                                    closeOnConfirm: false,
                                    showConfirmButton: false
                                    });
                                   setTimeout(function(){
        
                                     window.location.replace("'.site_url($dashboard).'");
                                   }, 1000);
                                  </script>';
        
                 }else{
                 $this->session->set_flashdata('error','Tidak dapat Merubah Password !');
                 $url = "backoffice/user";
                 $this->data['valid_reset']='<script>swal({
                                title: "Tidak dapat Merubah Password",
                                type: "error",
                                closeOnConfirm: false
                              },function(isConfirm) {
                                 window.location.replace("'.site_url($url).'");
                              });
                             </script>';
            }
      }
     //   dump($data);
         $this->data['subview']='backoffice/user/resetpw';
         $this->load->view('backoffice/_layout_other', $this->data);        
     }
     
     public function _unique_email()
     {
         // tidak bisa validate jika username sudah didaftarkan
         // kecuali jika edit data bisa menggunakan username yang sama sesuai id
        // $id = $this->uri->segment(5);
         $this->db->where('email', $this->input->post('email'));
         /*!$id || $this->db->where('id !=', $id);*/
         $user = $this->User_m->get();
         if (count($user)) {
             $this->form_validation->set_message('_unique_email', '<p class="margin">- <code>%s sudah terdaftar</code></p>');
             return FALSE;
         }
         return TRUE;
     }

     public function logout()
     {
         $this->User_m->logout();
         redirect('backoffice/user');
     }


 }
