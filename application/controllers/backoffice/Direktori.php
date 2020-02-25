<?php
class Direktori extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }



  public function index()
  {
    if (authorize($_SESSION["access"]["manajemen_direktori"]["direktori"]["ac_view"])) {
      $this->data['direktoris'] = $this->Direktori_m->get();
      $this->data['subview'] = 'backoffice/direktori/index';
      $this->load->view('backoffice/_layout_main', $this->data);
    } else {
      $this->show_404();
    }
  }

  public function fetch_ajax()
  {
    $fetchdata = $this->Direktori_m->getDataTable();
    $data = array();
    $no = 1;
    foreach ($fetchdata as $row) {
      $sub_array = array();
      $is_edit =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"]) ? btn_koreksi_icon('backoffice/berkas/form/' . encrypting($row->id)) : '';
      $is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"]) ? btn_hapus_icon('berkas/hapus/' . encrypting($row->id)) : '';

      if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"])) {
        $sub_array[] = form_checkbox('check_id[]', $row->id, FALSE, 'class="icheckbox_flat-green chk"') . '<filedset>';
      }
      $sub_array[] = '<span class="fa fa-folder"></span> ';
      if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) {
        $sub_array[] = anchor('backoffice/berkas/form/' . encrypting($row->id), tgl_no_jam($row->namadirectory));
      } else {
        $sub_array[] = tgl_no_jam($row->namadirectory);
      }
      $sub_array[] = $row->modified;
      $sub_array[] = '<div class="btn-group">' . $is_edit . $is_delete . '</div>';

      $data[] = $sub_array;
    }
    $output = array(
      "draw"            => intval($_POST["draw"]),
      "recordsTotal"    => $this->Direktori_m->getAllData(),
      "recordsFiltered" => $this->Direktori_m->getFiltered(),
      "data"            => $data
    );
    echo json_encode($output);
  }


  public function form($id = NULL)
  {
    // memanggil data 1 user berdasarkan id
    if ($id) {
      $id = decrypting($id);
      $this->data['direktori'] = $this->Direktori_m->get($id);
      count($this->data['direktori']) || $this->show_404();
    } else {
      $this->data['direktori'] = $this->Direktori_m->get_new();
    }

    // buat dropdown hakakses
    $this->data['hakakses_dropdown'] = $this->Direktori_m->get_drowpdown_hakakses();

    $rules = $this->Direktori_m->rules;
    $id || $rules['direktoripass']['rules'] .= '|required';
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {
      $data = $this->Direktori_m->array_from_post(array(
        //  'idlevel',
        'namalengkap',
        'namauser',
        'email',
        'nomorhp',
        'logo',
        'stts',
        'direktoripass'
      ));
      //  $data['idlevel'] =$this->input->post('ac_an_id');
      $ex = explode(':', $this->input->post('idlevel'));
      if (!empty($ex)) {
        $data['idlevel'] = $ex[0];
        $data['u_an_id'] = $ex[1];
      }


      if (empty($data['direktoripass'])) {
        $data['direktoripass'] = $this->data['direktori']->userpass;
      } else {
        $data['direktoripass'] = $this->Direktori_m->hash($data['direktoripass']);
      }
      $this->Direktori_m->simpan($data, $id);
      //var_dump($data);
      // redirect('backoffice/direktori/');

      $this->data['sukses'] = '<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
      
                             window.location.replace("' . site_url('backoffice/direktori/') . '");
                           }, 1500);
                          </script>';
    }

    $this->data['subview'] = 'backoffice/user/form';
    $this->load->view('backoffice/_layout_main', $this->data);
  }


  private function whitespace($str)
  {
    return $str = str_replace('_', '', $str);
  }

  public function _unique_nip($str)
  {

    $id = $this->uri->segment(4);
    $id = decrypting($id);
    $user_id = $this->whitespace($this->input->post('u_nip'));
    $this->db->where('u_nip', $user_id);
    !$id || $this->db->where('id !=', $id);
    $user = $this->Direktori_m->get();
    if (count($user)) {
      $this->form_validation->set_message('_unique_nip', '<div class="alert alert-warning alert-dismissible fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
           </button>
           <strong>%s</strong> Sudah Terdaftar.
           </div>');
      return FALSE;
    }
    return TRUE;
  }

  public function _unique_u_name($str)
  {

    $id = $this->uri->segment(4);
    $id = decrypting($id);
    $this->db->where('u_name', $this->input->post('u_name'));
    !$id || $this->db->where('id !=', $id);
    $user = $this->Direktori_m->get();
    if (count($user)) {
      $this->form_validation->set_message('_unique_u_name', '<div class="alert alert-warning alert-dismissible fade in" role="alert">
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
    $this->Direktori_m->hapus($id);
    redirect('backoffice/direktori/');
  }

  public function multi_delete()
  {
    if ($this->input->post('chk_val')) {
      $id = $this->input->post('chk_val');

      for ($count = 0; $count < count($id); $count++) {
        $this->Direktori_m->hapus($id[$count]);
      }
    }
  }
  public function stts($id)
  {
    $id = decrypting($id);
    $this->Direktori_m->edit_status($id);
    redirect('backoffice/direktori');
  }

  public function chk_dir()
  {
    $this->form_validation->set_rules('tgl', 'tgl', 'trim|xss_clean|required');
    if ($this->form_validation->run() == TRUE) {
      $tgl = $this->input->post('tgl');
      $data = array();
      $id = NULL;
      if ($id == NULL) {
        $row_single = $this->Direktori_m->get_by(array('tgldirectory' => $tgl));
      }
      if (count($row_single) > 0) {
        foreach ($row_single as $row) {
          $output = array();
          $output['id'] = encrypting($row->id);
          $data[] = $output;
        }
      } else {
        $dataInsert = array(
          'tgldirectory' => $tgl,
          'namadirectory' => $tgl,
          'stts' => '1'
        );
        $save = $this->Direktori_m->simpan($dataInsert, $id);
        $output = array();
        $output['id'] =  encrypting($save);
        $data[] = $output;
      }
      echo json_encode($data);
    }
  }
  // public function suggestions()
  // {
  //   $suggest = $this->input->post('u_nip', TRUE);
  //   $rows = $this->Direktori_m->getData($suggest);
  //   $json_array = array();
  //   foreach ($rows as $row)
  //     $json_array[] = $row->u_nip;
  //   echo json_encode($json_array);
  // }
}
