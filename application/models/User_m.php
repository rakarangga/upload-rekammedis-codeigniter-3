<?php

class User_m extends MY_Model
{
    protected $_table_nama = 'logis_users';
    protected $_primary_key = 'iduser';
    protected $_order_by = 'namalengkap';
    protected $_timePost = 'created';
    protected $_timeedit='modified';
    protected $_timestamp = TRUE;
    // protected $_primary_key = 'username';
    public $rules = array(
        'namauser' => array(
            'field' => 'namauser',
            'label' => 'Username',
            'rules' => 'trim|required',
            'errors' => array(
                     'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>',
            ),
        ),
        'userpass' => array(
            'field' => 'userpass',
            'label' => 'Password',
            'rules' => 'trim|required',
            'errors' => array(
                     'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>',

            ),
        )
    );
    public $rulesRegis = array(
        'namalengkap' => array(
            'field' => 'namalengkap',
            'label' => 'Nama Lengkap',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>'
            ),
        ),
        'namabisnis' => array(
            'field' => 'namabisnis',
            'label' => 'Nama Bisnis',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>'
    
            ),
        ),
        'namauser' => array(
            'field' => 'namauser',
            'label' => 'Username',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>'
            ),
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Alamat Email',
            'rules' => 'trim|required|callback__unique_email|xss_clean',
            'errors' => array(
                'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>'
            ),
        ),
        'nomorhp' => array(
            'field' => 'nomorhp',
            'label' => 'No. Telp',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>'
            ),
        ),

    );
 public $rulesForgot = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Alamat Email',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>'
            ),
        ),
);
  public $rulesReset = array(
       'userpass' => array (
                    'field' => 'userpass',
                    'label' => 'Password',
                    'rules' => 'trim|matches[u_pass_confirm]',
                    'errors' => array (
                            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>',
                            'matches' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>%s</strong> Tidak Sesuai.
                  </div>' 
                    )
                     
            ),
            'u_pass_confirm' => array (
                    'field' => 'u_pass_confirm',
                    'label' => 'Konfirmasi Password',
                    'rules' => 'trim|matches[userpass]',
                    'errors' => array (
                            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>',
                            'matches' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>%s</strong> Tidak Sama.
                </div>' 
                    )
                     
            ),
);
    public function login()
    {
        $this->db->select('logis_users.*, tbluserstatus.idmemstat as idmemstat, tbluserstatus.namastatusmember as namastatus, tbluserstatus.inisialstatus as inisial');
        $this->db->join('tbluserstatus', 'logis_users.idmemstat = tbluserstatus.idmemstat', 'left');
        $user = $this->get_by(array(
            'logis_users.namauser' => $this->input->post('namauser'),
            'logis_users.userpass' => $this->hash($this->input->post('userpass'))
        ), true);

        if (count($user)) {
            // login in
            if ($this->agent->is_browser()) {
                $agent = $this->agent->browser() . ' ' . $this->agent->version() . ' ' . $this->agent->platform();
            } elseif ($this->agent->is_robot()) {
                $agent = $this->agent->robot() . ' ' . $this->agent->platform();
            } elseif ($this->agent->is_mobile()) {
                $agent = $this->agent->mobile() . ' ' . $this->agent->platform();
            } else {
                $agent = 'Unidentified User Agent';
            }
            $data = array(
                'iduser' => $user->iduser,
                'idmemstat' => $user->idmemstat,
                'namastatus' => $user->namastatus,
                'u_an_id' => $user->u_an_id,
                'iduserlevel' => $user->iduserlevel,
                'namalengkap' => $user->namalengkap,
                'namauser' => $user->namauser,
                'email' => $user->email,
                'nomorhp' => $user->nomorhp,
                'loggedin' => true,
                'login' =>true,
                'user_agent' => $agent
            );
            // $datas = urlencode(base64_encode($data));
            $this->session->set_userdata($data);
            return (bool) $this->session->userdata('login');
          
        }
       
    }

public function resetLogin($id)
    {
        $this->db->select('logis_users.*, tbluserstatus.idmemstat as idmemstat, tbluserstatus.namastatusmember as namastatus, tbluserstatus.inisialstatus as inisial');
        $this->db->join('tbluserstatus', 'logis_users.idmemstat = tbluserstatus.idmemstat', 'left');
        $user = $this->get_by(array(
            'logis_users.iduser' => $id
        ), true);

        if (count($user)) {
            // login in
            if ($this->agent->is_browser()) {
                $agent = $this->agent->browser() . ' ' . $this->agent->version() . ' ' . $this->agent->platform();
            } elseif ($this->agent->is_robot()) {
                $agent = $this->agent->robot() . ' ' . $this->agent->platform();
            } elseif ($this->agent->is_mobile()) {
                $agent = $this->agent->mobile() . ' ' . $this->agent->platform();
            } else {
                $agent = 'Unidentified User Agent';
            }
            $data = array(
                'iduser' => $user->iduser,
                'idmemstat' => $user->idmemstat,
                'namastatus' => $user->namastatus,
                'u_an_id' => $user->u_an_id,
                'namalengkap' => $user->namalengkap,
                'namauser' => $user->namauser,
                'email' => $user->email,
                'nomorhp' => $user->nomorhp,
                'loggedin' => true,
                'login' =>true,
                'user_agent' => $agent
            );
            $this->session->set_userdata($data);
            return (bool) $this->session->userdata('login');
        }
    }
    public function randPass(){
        $length = 10;
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        return $randomString;
    }

    public function encrypt($string) {
        return hash ( 'sha512', $string . config_item ( 'encryption_key' ) );
    }
    
    public function register($protocol,$smtp_host,$smtp_port,$mailuser,$mailpass,$mailto,$mailtopass,$namalengkap,$mailtype = "html",$charset="iso-8859-1",$wordrap = TRUE){
        //set up email
        $config = array(
            'protocol' => $protocol,//'smtp',
            'smtp_host' => $smtp_host, //'smtp.hostinger.co.id',
            'smtp_port' => $smtp_port, //587
            'smtp_user' => $mailuser,//"<a href=\"mailto:$mailuser\" rel=\"nofollow\">".$mailuser."</a>", // change it to yours intrex_support@intrex.online
            'smtp_pass' => $mailpass, //'Intr3xId,2018', // change it to yours
            'mailtype' => $mailtype, //html
            'charset' => $charset,
            'wordwrap' => TRUE
        );
        /*$config['newline'] = "\r\n";
        $config['crlf'] = "\r\n"; */
        // $from = "<a href=\"mailto:$mailuser\" rel=\"nofollow\">".$mailuser."</a>";
        $message = 	" <html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Selamat Bergabung dengan PT. Intrex Global Logistindo.</h2>
							<p>Akun Anda:</p>
							<p>Email: ".$mailto."</p>
							<p>Password: ".$mailtopass."</p>
							<p>Terima Kasih dan Salam.</p>
							<h4>Support PT.Intrex Global Logistindo</h4>
						</body>
						</html>
						";
        
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from($mailuser);
        $this->email->to($mailto);
        $this->email->subject($namalengkap.', Akun Anda Telah Aktif');
        $this->email->message($message);
        
        //sending email
        if($this->email->send()){
            $data = array(
                'register' => true
            );
            $this->session->set_userdata($data);
            $this->session->set_flashdata('message','Activation code sent to email');
            return (bool) $this->session->userdata('register');
        }
        else{
          
            $this->session->set_flashdata('message', $this->email->print_debugger());
            $this->data['valid_register']='<p class="margin text-red">Terjadi Kesalahan Server, Silahakan coba register kembali.</code></p>';
            //dump($this->session->flashdata('message'));
            //dump($config);
        
        }
    }

    public function forgot($protocol,$smtp_host,$smtp_port,$mailuser,$mailpass,$mailto,$mailtopass,$mailtype = "html",$charset="iso-8859-1",$wordrap = TRUE){
        //set up email
           $user_info = $this->get_by(array(
            'logis_users.email' => $mailto
        ), true);

  if (count($user_info)) {
        $iduser = $user_info->iduser;
        $namalengkap = $user_info->namalengkap;
        $token = $this->insertToken($iduser);              
        $qstring = $this->base64url_encode($token);           
        $url = site_url() . 'backoffice/user/pw_reset/' . $qstring;  
        $link = '<a href="' . $url . '">' . $url . '</a>';   

        $config = array(
            'protocol' => $protocol,//'smtp',
            'smtp_host' => $smtp_host, //'smtp.hostinger.co.id',
            'smtp_port' => $smtp_port, //587
            'smtp_user' => $mailuser,//"<a href=\"mailto:$mailuser\" rel=\"nofollow\">".$mailuser."</a>", // change it to yours intrex_support@intrex.online
            'smtp_pass' => $mailpass, //'Intr3xId,2018', // change it to yours
            'mailtype' => $mailtype, //html
            'charset' => $charset,
            'wordwrap' => TRUE
        );
        /*$config['newline'] = "\r\n";
        $config['crlf'] = "\r\n"; */
        // $from = "<a href=\"mailto:$mailuser\" rel=\"nofollow\">".$mailuser."</a>";
        $message =  " <html>
                        <head>
                            <title>Verification Forgot Password</title>
                        </head>
                        <body>
                            <h2>Hai,".$namalengkap." </h2>
                            <p>Anda menerima email ini karena ada permintaan untuk memperbaharui  
                            password anda.</p>
                            <p><strong>Silakan klik link ini:</strong> ".$link."</p>
                           
                            <p>Terima Kasih dan Salam.</p>
                            <h4><strong>Support PT.Intrex Global Logistindo</strong></h4>
                        </body>
                        </html>
                        ";
        
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from($mailuser);
        $this->email->to($mailto);
        $this->email->subject('Intrex Support, Verification Forgot Password');
        $this->email->message($message);
        
        /*dump($this->email->message($message));
        dump($token);*/
        //sending email
        if($this->email->send()){
            $data = array(
                'forgot' => true
            );
            $this->session->set_userdata($data);
            $this->session->set_flashdata('message','Verification Forgot Password sent to email');
            return (bool) $this->session->userdata('forgot');
            }
        else{
          
            $this->session->set_flashdata('message', $this->email->print_debugger());
            $this->data['valid_forgot']='<p class="margin text-red">Terjadi Kesalahan Server, Silahakan masukkan email kembali.</code></p>';
             $this->data['valid_forgot_tab']='<script type="text/javascript">$(document).ready(function(){nextPrev(1);}); </script>';
            //dump($this->session->flashdata('message'));
            //dump($config);
        
            }
        }
    }

    public function insertToken($user_id)  
       {    
         $token = substr(sha1(rand()), 0, 30);   
         $date = date('Y-m-d');  
           
         $string = array(  
             'token'=> $token,  
             'iduser'=>$user_id,  
             'created'=>$date,
             'status'=> 'tersedia'  
           );  
         $query = $this->db->insert_string('tokens',$string);  
         $this->db->query($query);  
         return $token . $user_id;  
       }  

    
   public function isTokenValid($token)  
   {  
     $tkn = substr($token,0,30);  
     $uid = substr($token,30);     
       
     $q = $this->db->get_where('tokens', array(  
       'tokens.token' => $tkn,   
       'tokens.iduser' => $uid), 1);               
       
     if($this->db->affected_rows() > 0){  
       $row = $q->row();     
       $created = $row->created;  
       $createdTS = strtotime($created);  
       $today = date('Y-m-d');   
       $todayTS = strtotime($today);  
         
       if($createdTS != $todayTS){  
         return false;  
       }  
        if($row->status == "tidak tersedia"){  
         return false;  
       }
      
       $user_info = $this->get_by(array(
            'logis_users.iduser' => $row->iduser
            ), true);

       return $user_info;
        }else{  
           return false;  
        }  
   }   

   public function editToken($data, $id, $token)  
   {    
     $this->db->set($data);
     $this->db->where(array("iduser" => $id,"token"=>$token));
     $this->db->update("tokens");   
     return true;  
   }   

    public function loginFB(){
       // $userDataFB = array();
        if($this->facebook->is_authenticated()){
        
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,picture');
            
            //user agent
            if ($this->agent->is_browser()) {
                $agent = $this->agent->browser() . ' ' . $this->agent->version() . ' ' . $this->agent->platform();
            } elseif ($this->agent->is_robot()) {
                $agent = $this->agent->robot() . ' ' . $this->agent->platform();
            } elseif ($this->agent->is_mobile()) {
                $agent = $this->agent->mobile() . ' ' . $this->agent->platform();
            } else {
                $agent = 'Unidentified User Agent';
            }
        
            // Preparing data for database insertion
         /*    $userDataFB['oauth_provider'] = 'facebook';
            $userDataFB['iduser']    = !empty($fbUser['id'])?$fbUser['id']:'';
            $userDataFB['namauser']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
            $userDataFB['namalengkap']    = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            $userDataFB['email']        = !empty($fbUser['email'])?$fbUser['email']:'';
            $userDataFB['logo']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'';
            $userDataFB['iduserlevel'] = '4';
            $userDataFB['u_an_id'] = 'user';
            $userDataFB['loggedin'] =true;
            $userDataFB['login'] =true;
            $userDataFB['user_agent'] = $agent; */
            
            $userDataFB = array(
                'oauth_provider' => 'facebook',
                'iduser' => !empty($fbUser['id'])?$fbUser['id']:'',
                'namauser' => !empty($fbUser['first_name'])?$fbUser['first_name']:'',
                'namalengkap' => !empty($fbUser['last_name'])?$fbUser['last_name']:'',
                'email' => !empty($fbUser['email'])?$fbUser['email']:'',
                'logo' =>!empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:'',
                'iduserlevel' => '4',
                'u_an_id' => true,
                'login' =>true,
                'user_agent' => $agent
            );
            
     /*        $userDataFB = array(
                'oauth_provider' => 'facebook',
                'iduser' => '',
                'namauser' => '',
                'namalengkap' =>'',
                'email' => '',
                'logo' =>'',
                'iduserlevel' => '4',
                'u_an_id' => true,
                'login' =>true,
                'user_agent' => $agent
            ); */
            
     /*        // Insert or update user data
            $userID = $this->checkUser($userDataFB);
        
            // Check user data insert or update status
            if(!empty($userID)){
                 $this->data['userData'] = $userDataFB;
               $this->this->session->set_userdata($userDataFB);
            }else{
               $this->data['userData'] = array();
            } */
            $this->session->set_userdata($userDataFB);
            return (bool) $this->session->userdata('login');
        }
    }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
           /*  $this->db->select($this->$_primary_key);
            $this->db->from($this->$_table_nama);
            $this->db->where(array('oauth_provider'=>$userData['oauth_provider'], 'oauth_uid'=>$userData['oauth_uid'])); */
            $prevQuery = $this->get_by(array(
                'oauth_provider'=>$userData['oauth_provider'], 
                'iduser'=>$userData['iduser']
            ), true);
            $prevCheck = $prevQuery->num_rows();
    
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();
    
                //update user data
                $userData['modified'] = date("Y-m-d H:i:s");
                $update = $this->simpan($userData, array('iduser' => $prevResult['iduser']));
    
                //get user ID
                $userID = $prevResult['id'];
            }else{
                //insert user data
                $userData['created']  = date("Y-m-d H:i:s");
                $userData['modified'] = date("Y-m-d H:i:s");
                $insert = $this->simpan($userData);
    
                //get user ID
                $userID = $this->db->insert_id();
            }
        }
    
        //return user ID
        return $userID?$userID:FALSE;
    }

// function for call
    public function logout()
    {
        $this->session->sess_destroy();
        // Remove local Facebook session
    //    $this->facebook->destroy_session();
        // Remove user data from session
        $this->session->unset_userdata('userData');
       
    }

    public function loggedin()
    {
        return (bool) $this->session->userdata('loggedin');
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }
    
    public function hapus($id)
    {
        // hapus halaman
        parent::hapus($id);
    }
    
    public function base64url_encode($data) {   
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
   }   
   
   public function base64url_decode($data) {   
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
   }    
    
}
