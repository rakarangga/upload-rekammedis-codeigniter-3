<?php
 class Settuser extends Admin_Controller
 {
     public function __construct()
     {
         parent::__construct();
     }



     public function index()
     {
     	
      
         if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_view"])){
          $this->data['users']=$this->Settuser_m->get();
          $this->data['subview'] = 'backoffice/user/index';
          $this->load->view('backoffice/_layout_main',$this->data);
        }else{
          $this->show_404();
        }
     }



     public function fetch_ajax()
     { 
        $fetchdata = $this->Settuser_m->getDataTable();
        $data = array();
        $no=1;
        foreach($fetchdata as $row){
            $sub_array = array();
            $is_edit =  authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"]) ? btn_koreksi('backoffice/settuser/form/'.encrypting($row->iduser)) : '';  
            $is_delete =  authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"]) ? btn_hapus('settuser/hapus/'.encrypting($row->iduser)) : '';  

          if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_delete"])){
            $sub_array[] = form_checkbox('check_id[]', $row->iduser, FALSE, 'class="icheckbox_flat-green chk"').'<filedset>';
          }
            $sub_array[] = $no++;
          if(authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"])){
            $sub_array[] = anchor('backoffice/settuser/form/'.encrypting($row->iduser), $row->namalengkap); 
          }else{
            $sub_array[] = $row->namalengkap;
          }
            $sub_array[] = $row->namauser;
            $sub_array[] = $row->email;
            $sub_array[] = $row->u_an_id;
          if($row->stts == 'Y'): 
            $is_edit_status_T =  authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"]) ? btn_tidak_aktif('backoffice/settuser/stts/'.encrypting($row->iduser)) : '';
            $sub_array[] = '<div class="btn-group  btn-group-sm"><a href="javascript:void(0);"><button type="button" class="btn btn-primary active" disabled> &nbsp; Aktif &nbsp;</button></a>'.$is_edit_status_T.'</div>';
          else:
            $is_edit_status_Y =  authorize($_SESSION["access"]["pengaturan_umum"]["settuser"]["ac_edit"]) ? btn_aktif('backoffice/settuser/stts/'.encrypting($row->iduser)) : '';                    
            $sub_array[] = '<div class="btn-group">'.$is_edit_status_Y.'<a href="javascript:void(0);"><button type="button" class="btn btn-info active" disabled> &nbsp; Nonaktif &nbsp;</button></a></div>';
          endif;
            $sub_array[] = '<div class="btn-group-vertical">'.$is_edit.$is_delete.'</div>';
          
            $data[] = $sub_array;
        }
        $output = array(
          "draw"            => intval($_POST["draw"]),
          "recordsTotal"    => $this->Settuser_m->getAllData(),
          "recordsFiltered" => $this->Settuser_m->getFiltered(),
          "data"            => $data
         );
         echo json_encode($output);    
     }

     public function form($id = NULL )
     {
       // memanggil data 1 user berdasarkan id
      if ($id) {
          $id = decrypting($id);
          $this->data['user'] = $this->Settuser_m->get($id);
          count($this->data['user']) || $this->show_404();
      } else {
          $this->data['user'] = $this->Settuser_m->get_new();
      }
      
      // buat dropdown hakakses
      $this->data['hakakses_dropdown'] = $this->Settuser_m->get_drowpdown_hakakses();
      
       $rules = $this->Settuser_m->rules;
       $id || $rules['userpass']['rules'] .= '|required';
       $this->form_validation->set_rules($rules);

       if ($this->form_validation->run() == TRUE) {
         $data = $this->Settuser_m->array_from_post(array(
              //  'iduserlevel',
               'namalengkap',
               'namauser',
               'email',
               'nomorhp',
               'logo',
               'stts',
               'userpass'
           ));
          //  $data['iduserlevel'] =$this->input->post('ac_an_id');
          $ex = explode(':',$this->input->post('iduserlevel'));
          if( ! empty($ex)){
            $data['iduserlevel'] = $ex[0];
            $data['u_an_id'] = $ex[1];
          }
         

           if (empty($data['userpass'])) {
               $data['userpass'] = $this->data['user']->userpass;
              
           } else {
               $data['userpass'] = $this->Settuser_m->hash($data['userpass']);

           }
           $this->Settuser_m->simpan($data, $id);
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
      
                             window.location.replace("'.site_url('backoffice/settuser/').'");
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
       $user = $this->Settuser_m->get();
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
     	$user = $this->Settuser_m->get();
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
     	  $this->Settuser_m->hapus($id);
     	redirect('backoffice/settuser/');
     }

     public function multi_delete()
     {
        if($this->input->post('chk_val')){
          $id = $this->input->post('chk_val');
            
              for($count = 0; $count < count($id); $count++){
                  $this->Settuser_m->hapus($id[$count]);
              }
            
          }
        
     }
     public function stts($id)
     {
      $id = decrypting($id);
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
