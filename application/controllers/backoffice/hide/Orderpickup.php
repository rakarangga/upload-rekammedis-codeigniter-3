<?php
 class Orderpickup extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
		 $this->load->model('Orderpickup_m');
     }

     public function index()
     {
     	
         $this->data['orderpickups']=$this->Orderpickup_m->get_with_join();

         $this->data['subview'] = 'backoffice/orderpickup/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 orderpickup berdasarkan id
      if ($id) {
          $this->data['orderpickup'] = $this->Orderpickup_m->get_with_join_form($id,TRUE);
          count($this->data['orderpickup']) || $this->show_404();
      } else {
          //$this->data['orderpickup'] = $this->Orderpickup_m->get_with_join_form($id,TRUE);
          $this->show_404();
      }
      
      $this->data['get_pengirim'] = $this->Orderpickup_m->get_with_pengirim($this->data['orderpickup']->idalamatusers,$id, TRUE);
      $this->data['get_dropdown_mp'] = $this->Orderpickup_m->get_mp($this->data['orderpickup']->idpromointr,
                                                                    $this->data['orderpickup']->biaya_tarif,
                                                                    $this->data['orderpickup']->biaya_promo,
                                                                    $this->data['orderpickup']->totalprice,
                                                                    $this->data['orderpickup']->curr_tarif
                                                                     );
      $data['idmp']   =  $this->input->post('idmp');
      $idpromointr = $this->data['orderpickup']->idpromointr;
      
      //dump($data['idmp'] );
      if($data['idmp']  == 2){    
      $rules = $this->Payment_m->rules;
      $this->form_validation->set_rules($rules);
          if ($this->form_validation->run() == TRUE) {  
              $dir = $this->do_uploaded('fotobukti',$id);
              $data = $this->Payment_m->array_from_post(array(
                  'idmp',
                  'namabank',         //namabank
                  'norek',            //norek
                  'atasnama',         //atasnama
                  'kerekper',         //kerekper
                  'fotobukti'         //fotobukti
              ));
             // $data['fotobukti'] =  file_get_contents($data['fotobukti']);
              $now = date('Y-m-d H:i:s');
              $data['fotobukti'] = $dir;
              $data['no_pesanan'] = $this->data['orderpickup']->no_pesanan;
              $data['iduser'] = $this->data['orderpickup']->idusers;
              $data['iduserlevel'] = '4';
              $data['waktuinputuser'] = $now;
              $data['waktubayaruser'] = $now;
              
              $dataPickup = array(
                  'idusers' => $this->data['orderpickup']->idusers,
                  'no_pesanan' =>$this->data['orderpickup']->no_pesanan,
                  'waktuajuan'=> $now,
                  'idstatusdom'=>'2',
                  'idactiondom'=>'1',
                  'idstatusresidom'=>'1'
              );
              $dataEditPesan = array(
                  'idstatusdom' => '2'
              );
                  /*   dump($dataItem);
                   dump($datapromo);*/
                 if (!empty($data['fotobukti'])) { // jika tidak ada gambar
                     $this->Payment_m->simpan($data, $id = NULL);
                     $this->Jemputdom_m->simpan($dataPickup, $id = NULL);
                     $this->Crinter_m->simpan($dataEditPesan, $this->data['orderpickup']->idinterorder); 
                   /*   dump($data);
                     dump($dataPickup);
                     dump($dataEditPesan,'where = '.$this->data['orderpickup']->idinterorder);  */
                     
                      $this->data['sukses']='<script>
                      swal({
                      title: "Terima Kasih, Anda Telah Mengajukan Penjemputan dan Konfirmasi Pembayaran",
                      text: "Silahkan tunggu Verifikasi dari Customer Service kami.",
                      type: "success",
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                      }, function(isConfirm){
                              if (isConfirm) {
                                setTimeout(function(){
                                     window.location.replace("'.site_url('backoffice/international/form/'.$this->data['orderpickup']->idinterorder).'");
                                   }, 1500);
                              }
                            });
                      </script>';  
                    }else{
                        $this->data['error']='<script>
                                   swal("Terjadi Kesalahan", "Periksa Upload Foto Bukti Transfer", "error");
                                  </script>';
                        }
                     }
      }else{
          $rules = $this->Payment_m->rulesTunaiVouch;
          $this->form_validation->set_rules($rules);
              if ($this->form_validation->run() == TRUE) {
                      $data = $this->Payment_m->array_from_post(array(
                          'idmp',
                      ));
                      $now = date('Y-m-d H:i:s');
                      $data['no_pesanan'] = $this->data['orderpickup']->no_pesanan;
                      $data['iduser'] = $this->data['orderpickup']->idusers;
                      $data['iduserlevel'] = '4';
                      $data['waktuinputuser'] = $now;
                      $data['waktubayaruser'] = $now;
                      $data['idpromodom'] = $idpromointr;
                      $dataPickup = array(
                          'idusers' => $this->data['orderpickup']->idusers,
                          'no_pesanan' =>$this->data['orderpickup']->no_pesanan,
                          'waktuajuan'=> $now,
                          'idstatusdom'=>'2',
                          'idactiondom'=>'1',
                          'idstatusresidom'=>'1'
                      );
                      $dataEditPesan = array(
                          'idstatusdom' => '2'
                      );
                    $this->Payment_m->simpan($data, $id = NULL);
                    $this->Jemputdom_m->simpan($dataPickup, $id = NULL);
                    $this->Crinter_m->simpan($dataEditPesan, $this->data['orderpickup']->idinterorder); 
                    /*   dump($data);
                     dump($dataPickup);
                     dump($dataEditPesan,'where = '.$this->data['orderpickup']->idinterorder);  */
                      $this->data['sukses']='<script>
                      swal({
                      title:"Terima Kasih, Anda Telah Mengajukan Penjemputan dan Konfirmasi Pembayaran",
                      text: "Silahkan tunggu Verifikasi dari Customer Service kami.",
                      type: "success",
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                      },    function(isConfirm){
                              if (isConfirm) {
                                setTimeout(function(){
                                     window.location.replace("'.site_url('backoffice/international/form/'.$this->data['orderpickup']->idinterorder).'");
                                   }, 1500);
                              }
                            });
                       $(\'#paymentModal\').modal(\'hide\'); 
                      </script>';  
              }
      }

          
      $this->data['subview'] = 'backoffice/orderpickup/form';
      $this->load->view('backoffice/_layout_main',$this->data);
     }
     
     public function itemdetail_ajax()
     {
         $no_pesanan = $this->input->post('no_pesanan');
         $this->Orderpickup_m->get_itemDetail($no_pesanan);
         count($no_pesanan) || $this->show_404();
     }
     
 /*     public function metodepay_ajax()
     {
         $idpromointr = $this->input->post('idpromointr');
         $this->Orderpickup_m->get_mp($idpromointr);
     }
       */
     
     private function do_uploaded($imgName = 'fotobukti',$noPesanan)
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
            
                $file_name   = $_FILES[$imgName]['name'];
                $array       = explode('.', $file_name);
                $file_ext    = end($array);
                $file_size   = $_FILES[$imgName]['size'];
                $file_tmp    = $_FILES[$imgName]['tmp_name'];
            
                if (!(in_array($file_ext, $allowed_ext) == false) || empty($_FILES[$imgName]['name'])) {
            
                    if ($file_size < 20480000   || empty($_FILES[$imgName]['name']) ) {
                        if (empty($errors)) {
                            $dir    = "./assets/buktitransferuser";
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
      
      
     public function _unique_id($str){

       $id = $this->uri->segment(4);
       $orderpickup_id = $this->input->post('an_id');
       $this->db->where('an_id',$orderpickup_id);
       !$id || $this->db->where('id !=', $id);
       $orderpickup = $this->Orderpickup_m->get();
		if(count($orderpickup)){
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
     	$this->Orderpickup_m->hapus($id);
     	redirect('backoffice/Orderpickup/');
     }

 }
