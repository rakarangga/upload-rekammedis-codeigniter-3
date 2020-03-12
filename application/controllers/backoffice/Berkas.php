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

  public function fetch_ajax1()
  {
    $id = $this->input->post('iddirectory');
    $kategori = $this->input->post('kategori');
    if ($id) {
      // $iddir = decrypting($id);
      $arr = array('id' => $id, 'kategori' => $kategori);
      $fetchdata = $this->Pasien_m->getDataTables($arr);
    } else {
      $this->show_404();
    }

    $data = array();
    $no = 1;
    foreach ($fetchdata as $row) {
      $sub_array = array();
      // $sub_array[] = $no++;

      if ($kategori === 'sampah') {
        $is_edit =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"]) ? "<a  href=\"" . base_url('backoffice/berkas/stts/' . encrypting($row->id)) . "\" class=\"btn btn-primary btn-sm\" data-toggle=\"tooltip\" data-original-title=\"Pulihkan\"><i class=\"fa fa-arrow-up\"></i></a>" : '';
        $is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"]) ? btn_hapus_icon_permanent(base_url('backoffice/berkas/hapus/' . encrypting($row->id))) : '';
      } else {
        $is_edit =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"]) ? btn_koreksi_icon('backoffice/pasien/form/' . encrypting($row->id)) : '';
        $is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"]) ? btn_hapus_icon(base_url('backoffice/berkas/stts/' . encrypting($row->id))) : '';
      }

      $sub_array[] = form_checkbox('check_id[]', encrypting($row->id), FALSE, 'class="icheckbox_flat-green chk"') . '<filedset>'; //checkbox
      $sub_array[] = '<span class="fa fa-file"></span> '; //icon

      if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) {
        $sub_array[] = anchor('backoffice/pasien/form/' . encrypting($row->id), $row->norm);
      } else {
        $sub_array[] = $row->norm;
      }
      $sub_array[] = strtoupper($row->namapasien);
      $sub_array[] = strtoupper($row->jeniskelamin);
      if ($this->data['u_an_id'] == 'super_admin') {
        $iduser = $row->id_user;
        $nama_user = $this->Settuser_m->get($iduser);
        $sub_array[] = $nama_user->namalengkap;
      }

      $sub_array[] = '<div class="btn-group">' . $is_edit . $is_delete . '</div>';

      $data[] = $sub_array;
    }
    $output = array(
      "draw"            => intval($_POST["draw"]),
      "recordsTotal"    => $this->Pasien_m->getAllData($arr),
      "recordsFiltered" => $this->Pasien_m->getFiltered($arr),
      "data"            => $data
    );
    echo json_encode($output);
    // dump($id);
  }


  public function list_berkas($id = NULL)
  {

    if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_view"])) {
      // memanggil data 1 berkas berdasarkan id
      if ($id) {
        $id = decrypting($id);
        // $this->data['berkas'] = $this->Berkas_m->get_by(array('iddirectory' => $id));
        // $this->data['dataTable'] = $this->Pasien_m->getDatatable_init();
        $this->data['cpasien'] = $this->Pasien_m->getWithSession($id);
        $this->data['direktori'] = $this->Direktori_m->get($id);
        $this->data['iddirectory'] = $id;

        // dump($this->Pasien_m->getWhereIn());
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


  public function upload_single($id = NULL)
  {
    header('Content-Type: application/json');
    // memanggil data 1 direktori berdasarkan id
    if ($id) {
      $id = decrypting($id);
      $this->data['pasien'] = $this->Pasien_m->get($id);
      count($this->data['pasien']) || $this->show_404();
    } else {
      $this->data['pasien'] = $this->Pasien_m->get_new();
    }
    $rules = $this->Pasien_m->rules;
    $this->form_validation->set_rules($rules);
    $output['error_msg'] = '';
    if (!$this->form_validation->run()) {
      $output['error_msg'] = validation_errors('', '');
      $json = json_encode($output);
      echo $json;
      return false;
    }
    if ($this->form_validation->run() === TRUE) {
      $data = $this->Pasien_m->array_from_post(array(
        'norm',
        'tgl_directory',
        'iddirectory',
        'namapasien',
        'jeniskelamin',
      ));
      $save_pasien = $this->Pasien_m->simpan($data, $id);
      if ($save_pasien) {
        $output['save_msg'] = true;
        // $this->Pasien_m->hapus($save_pasien); // buat debug
        //UPLOAD PROSES (MULTIPLE)
        $fieldfile = $_FILES['fileberkas']['name'];
        for ($i = 0; $i < count($fieldfile); $i++) {
          // Define new $_FILES array - $_FILES['file']
          $_FILES['fileberkass']['name'] = $_FILES['fileberkas']['name'][$i];
          $_FILES['fileberkass']['type'] = $_FILES['fileberkas']['type'][$i];
          $_FILES['fileberkass']['tmp_name'] = $_FILES['fileberkas']['tmp_name'][$i];
          $_FILES['fileberkass']['error'] = $_FILES['fileberkas']['error'][$i];
          $_FILES['fileberkass']['size'] = $_FILES['fileberkas']['size'][$i];
          $ext = pathinfo($_FILES['fileberkas']['name'][$i]);
          $config = array(
            'save_path' => getcwd() . './assets/rmberkas/', //save path di assets/rmberkas
            'max_file_size' => 1025 * 5, //max kapasisas 5mb
            'allowed_mime_type_arr' => array('application/pdf'), //hanya support pdf
            'field_name' => 'fileberkass', // nama form file berkas
            'allowed_types' => '*' // nama form file berkas
          );
          $order = $this->Berkas_m->get_sum('stts', array('idpasien' => $id));
          $config['file_name'] =  $data['tgl_directory'] . '_' . $data['norm'] . '_' . intval($order + 1); //filename dynamic

          $this->load->library('fileupload', $config);
          if (!$this->fileupload->handle_upload()) {
            $output['error_msg'] = $this->fileupload->display_errors();
            $json = json_encode($output);
            echo $json;
            return false;
          }
          if (!$this->fileupload->do_upload($config['field_name'])) {
            $output['error_msg'] = $this->fileupload->display_errors();
            $json = json_encode($output);
            echo $json;
            return false;
          } else {
            $up_data     = $this->fileupload->data();
            // array dataitem berkas
            $dataitem = array(
              'namaberkas' => './assets/rmberkas/' . $up_data['file_name'],
              'tglberkas' => $data['tgl_directory'],
              'idpasien' => $save_pasien,
              'iddirectory' => $data['iddirectory'],
              'orderby' => intval($order + 1)
            );
            $this->Berkas_m->simpan($dataitem, $id);
            $output['success_msg_upload'] = true;
          }
        }
      }
    }
    $json = json_encode($output);
    echo $json;
  }

  public function _unique_norm($id)
  {
    /*  $id = $this->uri->segment(4);
    $id = decrypting($id);
    $id || $this->db->where('iddirectory', $id); */
    $this->db->where(array('norm' => $this->input->post('norm')));
    $data = $this->Pasien_m->get();
    if (count($data)) {
      $this->form_validation->set_message('_unique_norm', '*<strong>Nomor Rekam Medis Sudah Terdaftar</strong>, <br>Silahkan Periksa Kembali Berkas Rekam Medis Yang akan diupload');
      return FALSE;
    }
    return TRUE;
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
    // $this->Berkas_m->HapusBerkas($id);
    // exit();
    $this->Berkas_m->HapusBerkas($id);
    $this->Pasien_m->hapus($id);
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function multi_delete()
  {
    if ($this->input->post('chk_val')) {
      $id = $this->input->post('chk_val');
      $id = decrypting($id);
      for ($count = 0; $count < count($id); $count++) {
        // $this->Berkas_m->hapus($id[$count]);
      }
    }
  }

  public function multi_edit_status()
  {
    $id = $this->input->post('chk_val');
    if (isset($id)) {
      for ($count = 0; $count < count($id); $count++) {
        $iddec[$count] = decrypting($id[$count]);
        $this->Pasien_m->edit_status($iddec[$count]);
      }
    }
  }
  public function stts($id)
  {
    $id = decrypting($id);
    $this->Pasien_m->edit_status($id);
    redirect($_SERVER['HTTP_REFERER']);
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
