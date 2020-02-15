<?php
 class Promo extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
		 $this->load->model('Promo_m');
     }



     public function index()
     {
     	
         $this->data['promos']=$this->Promo_m->get();

         $this->data['subview'] = 'backoffice/promo/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }

     public function form($id = NULL )
     {
       // memanggil data 1 promo berdasarkan id
      if ($id) {
          $this->data['promo'] = $this->Promo_m->get($id);
          count($this->data['promo']) || $this->show_404();
      } else {
          $this->data['promo'] = $this->Promo_m->get_new();
      }
      
      //set rules validation
       $rules = $this->Promo_m->rules;
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
         $dir = $this->do_upload();
         $data = $this->Promo_m->array_from_post(array(
                'judul',
                'url',
                'ket',
                'gambar',
                'status'
           ));
         
         $data['penulis'] = $this->session->userdata('namalengkap');
         $data['url'] = strtolower($data['url']);
         $data['gambar'] = $dir;
         if (empty($data['gambar'])) { // jika tidak ada gambar
             $data['gambar'] = $this->data['promo']->gambar;
         }
         
           $this->Promo_m->simpan($data, $id);
           //var_dump($data);
          // redirect('backoffice/Promo/');
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
           
                             window.location.replace("'.site_url('backoffice/Promo/').'");
                           }, 1500);
                          </script>';
       }
      
       $this->data['subview'] = 'backoffice/promo/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
     private function do_upload()
     {
         $type = explode('.', $_FILES["gambar"]["name"]);
         $type = $type[count($type) - 1];
         $dir = "./assets/img_promoslider/promoslider-" . $_FILES["gambar"]["name"] . '.' . $type;
         if (in_array($type, array(
             "jpg",
             "jpeg",
             "png",
             "gif"
         )))
             if (is_uploaded_file($_FILES["gambar"]["tmp_name"]))
                 if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $dir))
                     return $dir;
                     return "";
     }
     
     public function _unique_id($str){

       $id = $this->uri->segment(4);
       $promo_id = $this->input->post('id');
       $this->db->where('id',$promo_id);
       !$id || $this->db->where('id !=', $id);
       $promo = $this->Promo_m->get();
		if(count($promo)){
         $this->form_validation->set_message('_unique_id','<div class="alert alert-warning alert-dismissible fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
           </button>
           <strong>%s</strong> Sudah Terdaftar.
           </div>');
         return FALSE;
       }
         return TRUE;

     }
     
     public function stts($id)
     {
         $this->Promo_m->edit_status($id);
         redirect('backoffice/promo');
     }
     public function hapus($id)
     {
         // hapus file gambar berdasarkan id di dir ./img_file/
         if ($id) {
             $this->data['promo'] = $this->Promo_m->get($id);
             count($this->data['promo']) || $this->data['error'][] = 'Promo Slider Tidak Ditemukan';
         } else {
             $this->data['promo'] = $this->Promo_m->get_new();
         }
         $hps = unlink($this->data['promo']->gambar);
         $this->Promo_m->hapus($id);
         redirect('backpage/module/promo');
     }

     public function multi_delete()
     {
     	if($this->input->post('chk_val')){
             $id = $this->input->post('chk_val');
             for($count = 0; $count < count($id); $count++){
                if ($id[$count]) {
                    $this->data['promo'] = $this->Promo_m->get($id[$count]);
                    // count($this->data['promo']) || $this->data['error'][] = 'Promo Slider Tidak Ditemukan';
                } else {
                    $this->data['promo'] = $this->Promo_m->get_new();
                }
                $hps = unlink($this->data['promo']->gambar);
                $this->Promo_m->hapus($id[$count]);
             }
         }
     
     }
   
 }
