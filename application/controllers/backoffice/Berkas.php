<?php
class Berkas extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }



  public function index()
  {
    if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_view"])) {


      $this->data['dataTable'] = $this->Direktori_m->getDatatable_init();
      $this->data['berkass'] = $this->Berkas_m->get();
      $this->data['subview'] = 'backoffice/berkas/index';
      $this->load->view('backoffice/_layout_main', $this->data);
    } else {
      $this->show_404();
    }
  }


  public function list_berkas($id = NULL)
  {
    if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_view"])) {
      // memanggil data 1 berkas berdasarkan id
      if ($id) {
        $id = decrypting($id);
        // $this->data['berkas'] = $this->Berkas_m->get_by(array('iddirectory' => $id));
        $this->data['cpasien'] = $this->Pasien_m->getWithSession($id);
        $this->data['direktori'] = $this->Direktori_m->get($id);
        $this->data['dataTable'] = $this->Pasien_m->getDatatable_init($id);
        $this->data['iddirectory'] = $id;
        // dump(count($this->data['cpasien']));
        // count($this->data['berkas']) || $this->show_404();
      } else {
        // $this->data['berkas'] = $this->Berkas_m->get_new();
        $this->show_404();
      }
      

      $this->data['subview'] = 'backoffice/berkas/list_berkas';
      $this->load->view('backoffice/_layout_main', $this->data);
    } else {
      $this->show_404();
    }
  }


  public function form($id = NULL)
  {
    // memanggil data 1 direktori berdasarkan id
    if ($id) {
      $id = decrypting($id);
      $this->data['direktori'] = $this->Direktori_m->get($id);
      count($this->data['direktori']) || $this->show_404();
    } else {
      $this->data['direktori'] = $this->Direktori_m->get_new();
    }

    // buat dropdown hakakses
    $this->data['hakakses_dropdown'] = $this->Berkas_m->get_drowpdown_hakakses();

    $rules = $this->Berkas_m->rules;
    $id || $rules['direktoripass']['rules'] .= '|required';
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {
      $data = $this->Berkas_m->array_from_post(array(
        //  'idlevel',
        'namalengkap',
        'namadirektori',
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
        $data['direktoripass'] = $this->data['direktori']->direktoripass;
      } else {
        $data['direktoripass'] = $this->Berkas_m->hash($data['direktoripass']);
      }
      $this->Berkas_m->simpan($data, $id);
      //var_dump($data);
      // redirect('backoffice/berkas/');

      $this->data['sukses'] = '<script>
                            swal({
                            title: "Berhasil Disimpan",
                            type: "success",
                            closeOnConfirm: false,
                            showConfirmButton: false
                            });
                           setTimeout(function(){
                             window.location.replace("' . site_url('backoffice/berkas/') . '");
                           }, 1500);
                          </script>';
    }

    $this->data['subview'] = 'backoffice/berkas/form';
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
    $user = $this->Berkas_m->get();
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
    $user = $this->Berkas_m->get();
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
    $this->Berkas_m->hapus($id);
    redirect('backoffice/berkas/');
  }

  public function multi_delete()
  {
    if ($this->input->post('chk_val')) {
      $id = $this->input->post('chk_val');

      for ($count = 0; $count < count($id); $count++) {
        $this->Berkas_m->hapus($id[$count]);
      }
    }
  }
  public function stts($id)
  {
    $id = decrypting($id);
    $this->Berkas_m->edit_status($id);
    redirect('backoffice/berkas');
  }

  public function suggestions()
  {
    $suggest = $this->input->post('u_nip', TRUE);
    $rows = $this->Berkas_m->getData($suggest);
    $json_array = array();
    foreach ($rows as $row)
      $json_array[] = $row->u_nip;
    echo json_encode($json_array);
  }
}
