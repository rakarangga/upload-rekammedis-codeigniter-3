<?php
 class Settmodule extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
     }



     public function index()
     {
     	
         $this->data['modules']=$this->Module_m->get();

         $this->data['subview'] = 'backoffice/module/index';
         $this->load->view('backoffice/_layout_main',$this->data);
     }
     public function ico()
     {
       
       
         if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_view"])){
           // $this->data['users']=$this->Settuser_m->get();
           $this->data['subview'] = 'backoffice/module/ico';
           $this->load->view('backoffice/_layout_main',$this->data);
         }else{
           $this->show_404();
         }
     }

     public function form($id = NULL )
     {
       // memanggil data 1 module berdasarkan id
      if ($id) {
          $this->data['module'] = $this->Module_m->get($id);
          count($this->data['module']) || $this->show_404();
      } else {
          $this->data['module'] = $this->Module_m->get_new();
      }
      
    
      
       $rules = $this->Module_m->rules;
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
         $data = $this->Module_m->array_from_post(array(
               'ico',
               'mod_modulegroupid',
               'mod_modulegroupname',
               'mod_moduleid',
               'mod_modulename',
               'mod_modulegrouporder',
               'mod_moduleorder',
               'mod_modulepagename'
           ));
          $data['mod_modulegroupid'] = $this->whitespace($data['mod_modulegroupid']);
          $data['mod_moduleid'] = $this->whitespace($data['mod_moduleid']);
          if (empty($data['ico'])) {
            $data['ico'] = '<i class="fa fa-wrench"></i>';
          } else {
              $data['ico'] = $data['ico'];

          }
           $this->Module_m->simpan($data, $id);
           //var_dump($data);
          // redirect('backoffice/settmodule/');
          
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
      
                             window.location.replace("'.site_url('backoffice/settmodule/').'");
                           }, 1500);
                          </script>';
      }
      
       $this->data['subview'] = 'backoffice/module/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
   

     private function whitespace($str){
      return $str = str_replace(' ', '_', $str);
     }

     public function _unique_nip($str){

       $id = $this->uri->segment(4);
       $module_id = $this->whitespace($this->input->post('u_nip'));
       $this->db->where('u_nip',$module_id);
       !$id || $this->db->where('id !=', $id);
       $module = $this->Module_m->get();
		if(count($module)){
         $this->form_validation->set_message('_unique_nip','<div class="alert alert-warning alert-dismissible fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
           </button>
           <strong>%s</strong> Sudah Terdaftar.
           </div>');
         return FALSE;
       }
         return TRUE;

     }
     
     public function _unique_moduleid($str){
     
     	$id = $this->uri->segment(4);
     	$this->db->where('mod_moduleid', $this->input->post('mod_moduleid'));
     	!$id || $this->db->where('id !=', $id);
     	$module = $this->Module_m->get();
     	if(count($module)){
     		$this->form_validation->set_message('_mod_moduleid','<div class="alert alert-warning alert-dismissible fade in" role="alert">
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
     	$this->Module_m->hapus($id);
     	redirect('backoffice/settmodule/');
     }
     
     public function stts($id)
     {
     	$this->Module_m->edit_status($id);
     	redirect('backoffice/settmodule');
     }

     public function multi_delete()
     {
     	if($this->input->post('chk_val')){
             $id = $this->input->post('chk_val');
             for($count = 0; $count < count($id); $count++){
                $this->Module_m->hapus($id[$count]);
             }
         }
     
     }

      
 }
