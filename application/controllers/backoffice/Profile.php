<?php
 class Profile extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
        
     }



     public function index()
     {
     	 $id = $this->session->userdata('iduser');
             if ($id) {
                  $this->data['user'] = $this->Settuser_m->get($id);
                  count($this->data['user']) || $this->show_404();
              } else {
                  count($this->data['user']) || $this->show_404();
              }
        
       $rules = $this->Settuser_m->rules;
       $id || $rules['userpass']['rules'] .= '|required';
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
       
         $data = $this->Settuser_m->array_from_post(array(
               'namalengkap',
               'namauser',
               'nomorhp',
               'namabisnis',
               'userpass',
               'logo'
           ));

           $dir = $this->do_uploaded('logo',$id);
           if (empty($dir)) { 
               $data['logo'] = $this->data['user']->logo;
           } else {
                $data['logo'] = $dir;
           }
          if (empty($data['userpass'])) {
               $data['userpass'] = $this->data['user']->userpass;
           } else {
               $data['userpass'] = $this->Settuser_m->hash($data['userpass']);
           }
           $data['nomorhp'] = '+62'.$data['nomorhp'];
           //dump($data);
          // dump($this->post('userpass'));
           $this->Settuser_m->simpan($data, $id);
           
           $data = array(
               'namalengkap' =>  $data['namalengkap'],
               'namauser' =>  $data['namauser'],
               'nomorhp' => $data['nomorhp'],
           );
           $this->session->set_userdata($data);
           //var_dump($data);
          // redirect('backoffice/settuser/');
          
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
                             window.location.replace("'.site_url('backoffice/profile/').'");
                           }, 1500);
                          </script>'; 
      }
       $this->data['subview'] = 'backoffice/user/profile';
       $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 user berdasarkan id
      if ($id) {
          $this->data['user'] = $this->Settuser_m->get($id);
          count($this->data['user']) || $this->show_404();
      } else {
          $this->data['user'] = $this->Settuser_m->get_new();
      }
      
      $rules = $this->Settuser_m->rules_OSEDE;
     //  $id || $rules['userpass']['rules'] .= '|required';
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
        
         $data = $this->Settuser_m->array_from_post(array(
               'namalengkap',
               'namauser',
               'nomorhp',
               'namabisnis',    
               'logo',
               'linktoko'
           ));
          $dir = $this->do_uploaded('logo',$id);
        /*    if (empty($data['userpass'])) {
               $data['userpass'] = $this->data['user']->userpass;
           } else {
               $data['userpass'] = $this->Settuser_m->hash($data['userpass']);
           } */
           $data['nomorhp'] = '+62'.$data['nomorhp'];
           $data['idmemstat'] = '1';
           $data['idajuosede'] = '1';
            if (empty($dir)) { 
               $data['logo'] = $this->data['user']->logo;
           } else {
                $data['logo'] = $dir;
           }
          // dump($data);
          // dump($this->post('userpass'));
           $this->Settuser_m->simpan($data, $id);
           $data = array(
               'namalengkap' =>  $data['namalengkap'],
               'namauser' =>  $data['namauser'],
               'nomorhp' => $data['nomorhp'],
           );
           $this->session->set_userdata($data);
           //var_dump($data);
          // redirect('backoffice/settuser/');
          
           $this->data['sukses']='<script>
                            swal({
                            title: "Anda Berhasil Mendaftar",
                            text:  "Mohon tunggu hasil verifikasi member dari Customer Service kami.",
                            type: "success",
                            closeOnConfirm: false
                            },
                           function(isConfirm){
                             if (isConfirm) {
                                window.location.replace("'.site_url('backoffice/dashboard/').'");
                            }
                        });
                          </script>'; 
      }
      
       $this->data['subview'] = 'backoffice/user/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
   

     private function whitespace($str){
      return $str = str_replace('_', '', $str);
     }

     private function do_uploaded($imgName = 'fotobukti', $noPesanan)
     {
         if (!empty($_FILES[$imgName]['name'])) {
             $errors      = array();
             $allowed_ext = array(
                 'png',
                 'bmp',
                 'jpg',
                 'jpeg',
                 'JPG',
                 'PNG',
                 'JPEG'
             ); //do neccessary validation
     
             $file_name   = 'logo.jpg';
             $array       = explode('.', $file_name);
             $file_ext    = end($array);
             $file_size   = $_FILES[$imgName]['size'];
             $file_tmp    = $_FILES[$imgName]['tmp_name'];
     
             if (!(in_array($file_ext, $allowed_ext) == false) || empty($_FILES[$imgName]['name'])) {
     
                 if ($file_size < 20480000   || empty($_FILES[$imgName]['name']) ) {
                     if (empty($errors)) {
                         $dir    = "./assets/pictuser";
                         $userid = !$this->session->userdata('iduser') ? "" : $this->session->userdata('iduser');
                         $dir1   = $dir . "/" . $userid;
                         if (!is_dir($dir1)) {
                             mkdir($dir1);
                         }
                         $dirUpload = $dir1 . "/".$noPesanan."-".$file_name;
                         if (is_uploaded_file($file_tmp))
                             if (move_uploaded_file($file_tmp, $dirUpload))
                                 return $dirUpload;
                                 return $errors;
                     } else {
                         foreach ($errors as $error) {
                             $flag = 0;
                             $this->data['error']='<script>
                               swal("Terjadi Kesalahan", "File Upload Error", "error");
                              </script>';
                         }
                     }
                 } else {
                     $flag = 0;
                     $this->data['error']='<script>
                           swal("Terjadi Kesalahan", "Kapasitas file tidak boleh lebih dari 20MB", "error");
                          </script>';
                 }
             } else {
                 $flag = 0;
                 $this->data['error']='<script>
                           swal("Terjadi Kesalahan", "Format File tidak sesuai", "error");
                          </script>';
             }
         }
     }
   public function _unique_email()
     {
         // tidak bisa validate jika username sudah didaftarkan
         // kecuali jika edit data bisa menggunakan username yang sama sesuai id
         // $id = $this->uri->segment(5);
         $this->db->where('email', $this->input->post('email'));
         //! $id || $this->db->where('id !=', $id);
         $user = $this->User_m->get();
         if (count($user)) {
             $this->form_validation->set_message('_unique_email', '<p class="margin">- <code>%s sudah terdaftar</code></p>');
             return FALSE;
         }
         return TRUE;
     }
     
     public function hapus($id)
     {
     	$this->Settuser_m->hapus($id);
     	redirect('backoffice/settuser/');
     }
     
     public function stts($id)
     {
     	$this->Settuser_m->edit_status($id);
     	redirect('backoffice/settuser');
     }
     
     public function suggestions()
     {
     	$suggest = $this->input->post('u_nip',TRUE);
     	$rows = $this->Settuser_m->getData($suggest);
     	$json_array = array();
     	foreach ($rows as $row)
     		$json_array[]=$row->u_nip;
     	echo json_encode($json_array);
     	
     }
      
 }
