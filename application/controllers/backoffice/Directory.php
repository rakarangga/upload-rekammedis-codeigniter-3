<?php
 class Directory extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
     }



     public function index()
     {
     	
      
         if(authorize($_SESSION["access"]["manajemen_directory"]["directory"]["ac_view"])){
          $this->data['directorys']=$this->Directory_m->get();
          $this->data['subview'] = 'backoffice/directory/index';
          $this->load->view('backoffice/_layout_main',$this->data);
        }else{
          $this->show_404();
        }
     }



     public function fetch_ajax()
     { 
        $fetchdata = $this->Directory_m->getDataTable();
        $data = array();
        $no=1;
        foreach($fetchdata as $row){
            $sub_array = array();
            $is_edit =  authorize($_SESSION["access"]["manajemen_directory"]["directory"]["ac_edit"]) ? btn_koreksi('backoffice/directory/form/'.encrypting($row->id)) : '';  
            $is_delete =  authorize($_SESSION["access"]["manajemen_directory"]["directory"]["ac_edit"]) ? btn_hapus('directory/hapus/'.encrypting($row->id)) : '';  

          if(authorize($_SESSION["access"]["manajemen_directory"]["directory"]["ac_delete"])){
            $sub_array[] = form_checkbox('check_id[]', $row->id, FALSE, 'class="icheckbox_flat-green chk"').'<filedset>';
          }
            $sub_array[] = $no++;
          if(authorize($_SESSION["access"]["manajemen_directory"]["directory"]["ac_edit"])){
            $sub_array[] = anchor('backoffice/directory/form/'.encrypting($row->id), $row->namalengkap); 
          }else{
            $sub_array[] = $row->namalengkap;
          }
            $sub_array[] = $row->namauser;
            $sub_array[] = $row->email;
            $sub_array[] = $row->u_an_id;
          if($row->stts == 'Y'): 
            $is_edit_status_T =  authorize($_SESSION["access"]["manajemen_directory"]["directory"]["ac_edit"]) ? btn_tidak_aktif('backoffice/directory/stts/'.encrypting($row->id)) : '';
            $sub_array[] = '<div class="btn-group  btn-group-sm"><a href="javascript:void(0);"><button type="button" class="btn btn-primary active" disabled> &nbsp; Aktif &nbsp;</button></a>'.$is_edit_status_T.'</div>';
          else:
            $is_edit_status_Y =  authorize($_SESSION["access"]["manajemen_directory"]["directory"]["ac_edit"]) ? btn_aktif('backoffice/directory/stts/'.encrypting($row->id)) : '';                    
            $sub_array[] = '<div class="btn-group">'.$is_edit_status_Y.'<a href="javascript:void(0);"><button type="button" class="btn btn-info active" disabled> &nbsp; Nonaktif &nbsp;</button></a></div>';
          endif;
            $sub_array[] = '<div class="btn-group-vertical">'.$is_edit.$is_delete.'</div>';
          
            $data[] = $sub_array;
        }
        $output = array(
          "draw"            => intval($_POST["draw"]),
          "recordsTotal"    => $this->Directory_m->getAllData(),
          "recordsFiltered" => $this->Directory_m->getFiltered(),
          "data"            => $data
         );
         echo json_encode($output);    
     }

     public function form($id = NULL )
     {
       // memanggil data 1 user berdasarkan id
      if ($id) {
          $id = decrypting($id);
          $this->data['directory'] = $this->Directory_m->get($id);
          count($this->data['directory']) || $this->show_404();
      } else {
          $this->data['directory'] = $this->Directory_m->get_new();
      }
      
      // buat dropdown hakakses
      $this->data['hakakses_dropdown'] = $this->Directory_m->get_drowpdown_hakakses();
      
       $rules = $this->Directory_m->rules;
       $id || $rules['directorypass']['rules'] .= '|required';
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
         $data = $this->Directory_m->array_from_post(array(
              //  'idlevel',
               'namalengkap',
               'namauser',
               'email',
               'nomorhp',
               'logo',
               'stts',
               'directorypass'
           ));
          //  $data['idlevel'] =$this->input->post('ac_an_id');
          $ex = explode(':',$this->input->post('idlevel'));
          if( ! empty($ex)){
            $data['idlevel'] = $ex[0];
            $data['u_an_id'] = $ex[1];
          }
         

           if (empty($data['directorypass'])) {
               $data['directorypass'] = $this->data['directory']->userpass;
              
           } else {
               $data['directorypass'] = $this->Directory_m->hash($data['directorypass']);

           }
           $this->Directory_m->simpan($data, $id);
           //var_dump($data);
          // redirect('backoffice/directory/');
          
           $this->data['sukses']='<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
      
                             window.location.replace("'.site_url('backoffice/directory/').'");
                           }, 1500);
                          </script>';
      }
      
       $this->data['subview'] = 'backoffice/user/form';
       $this->load->view('backoffice/_layout_main',$this->data);
     }
   

     private function whitespace($str){
      return $str = str_replace('_', '', $str);
     }

     public function _unique_nip($str){

       $id = $this->uri->segment(4);
       $id = decrypting($id);
       $user_id = $this->whitespace($this->input->post('u_nip'));
       $this->db->where('u_nip',$user_id);
       !$id || $this->db->where('id !=', $id);
       $user = $this->Directory_m->get();
		if(count($user)){
         $this->form_validation->set_message('_unique_nip','<div class="alert alert-warning alert-dismissible fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
           </button>
           <strong>%s</strong> Sudah Terdaftar.
           </div>');
         return FALSE;
       }
         return TRUE;

     }
     
     public function _unique_u_name($str){
     
       $id = $this->uri->segment(4);
       $id = decrypting($id);
     	$this->db->where('u_name', $this->input->post('u_name'));
     	!$id || $this->db->where('id !=', $id);
     	$user = $this->Directory_m->get();
     	if(count($user)){
     		$this->form_validation->set_message('_unique_u_name','<div class="alert alert-warning alert-dismissible fade in" role="alert">
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
      $id = decrypting($id);
     	  $this->Directory_m->hapus($id);
     	redirect('backoffice/directory/');
     }

     public function multi_delete()
     {
        if($this->input->post('chk_val')){
          $id = $this->input->post('chk_val');
            
              for($count = 0; $count < count($id); $count++){
                  $this->Directory_m->hapus($id[$count]);
              }
            
          }
        
     }
     public function stts($id)
     {
      $id = decrypting($id);
     	$this->Directory_m->edit_status($id);
     	redirect('backoffice/directory');
     }
     
     public function suggestions()
     {
     	$suggest = $this->input->post('u_nip',TRUE);
     	$rows = $this->Directory_m->getData($suggest);
     	$json_array = array();
     	foreach ($rows as $row)
     		$json_array[]=$row->u_nip;
     	echo json_encode($json_array);
     	
     }
      
 }
