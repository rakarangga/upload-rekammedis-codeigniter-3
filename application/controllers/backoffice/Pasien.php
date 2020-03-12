<?php
class Pasien extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function fetch_berkas()
  {
    // header('Content-Type: application/json');
    $id = isset($_GET['id'])  ? $_GET['id'] : null;
    if ($id) {
      $id = decrypting($id);
      $data = $this->Pasien_m->get_berkas_by($id);
      $output = array();
    } else {
      $this->show_404();
      return false;
    }
    foreach ($data as $rows) {
      // $filePath = $dir . "/" . $file;
      $arr = array();
      $pathinfo = pathinfo(base_url($rows['namaberkas']));
      $arr['namaberkas'] = $pathinfo['basename'];
     
      $url = file_exists(FCPATH.$rows['namaberkas']) ? base_url(str_replace('./assets','assets',$rows['namaberkas'])) :  base_url('/assets/dist/img/user.png');
      $arr['files'] =  $pathinfo['extension'] == 'pdf' ? '<span class="card-img-top" alt="Card image cap"><i class="fa fa-file-pdf-o fa-5x card-icon" ></i></span>' : '<img class="card-img-top" src="'.$url.'" alt="Card image cap">' ;
      $arr['btndelete'] = "<button type=\"button\" onclick=\"hapus('" . base_url('backoffice/pasien/hapus/' . encrypting($rows['id'])). "');\" class=\"btn btn-danger btn-sm pull-right hapus\" data-toggle=\"tooltip\" data-original-title=\"Hapus Berkas ini\"><i class=\"fa fa-trash\"></i></button>";
      $arr['ext'] = $pathinfo['extension'];
      $arr['tgl'] = $rows['created'];
      $arr['order'] = $rows['orderby'];
      $output[] = $arr;
    }
    echo json_encode($output);
  }

  public function form($id = NULL)
  {
    // memanggil data 1 pasien berdasarkan id
    if ($id) {
      $id = decrypting($id);
      $this->data['pasien'] = $this->Pasien_m->get($id);
      count($this->data['pasien']) || $this->show_404();
    } else {
      // $this->data['pasien'] = $this->Pasien_m->get_new();
      $this->show_404();
    }
    // $this->data['cpasien'] = $this->Pasien_m->getWithSession($id);
    // $this->data['direktori'] = $this->Direktori_m->get($id);
    $this->data['norm'] = $id;
    $this->data['direktori'] = $this->Direktori_m->get($this->data['pasien']->iddirectory);
    $rules = $this->Pasien_m->rules;
    $rules['iddirectory']['rules'] = 'trim|xss_clean';
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run() === TRUE) {
      $data = $this->Pasien_m->array_from_post(array(
        'norm',
        'tgl_directory',
        'namapasien',
        'jeniskelamin',
      ));
      $data['iddirectory'] = $this->data['pasien']->iddirectory;
      $this->Pasien_m->simpan($data, $id);

      $this->data['sukses'] = '<script>
                              swal({
                              title: "Berhasil Disimpan",
                              type: "success",
                              closeOnConfirm: false,
                              showConfirmButton: false
                              });
                           setTimeout(function(){
                             window.location.replace("' . site_url('backoffice/berkas/list_berkas/' . encrypting($this->data['pasien']->iddirectory)) . '");
                           }, 1500);
                          </script>';
    }
    $this->data['subview'] = 'backoffice/pasien/form';
    $this->load->view('backoffice/_layout_main', $this->data);
  }


  public function upload_multiple()
  {
    header('Content-Type: application/json');
    // memanggil data 1 direktori berdasarkan id
    $id = $this->input->post('id');
    if ($id) {
      $id = decrypting($id);
      $data = $this->Pasien_m->get($id);
      count($data) || $this->show_404();
    } else {
      $this->show_404();
    }

    $output = array();
    if (!is_array($_FILES["fileberkas"]["name"])) {  //single file

      $ext = pathinfo($_FILES['fileberkas']['name']);
      $config = array(
        'save_path' => getcwd() . '/assets/rmberkas/', //save path di assets/rmberkas
        'max_file_size' => 1025 * 5, //max kapasisas 5mb
        'allowed_mime_type_arr' => array('application/pdf', 'image/png', 'image/jpeg',), //hanya support pdf
        'field_name' => 'fileberkas', // nama form file berkas
        'allowed_types' => '*' // nama form file berkas
      );
      $order = $this->Berkas_m->get_sum('stts', array('idpasien' => $id));

      $config['file_name'] =  $data->tgl_directory . '_' .  $data->norm . '_' . intval($order + 1); //filename dynamic
      $this->load->library('fileupload', $config);
      if (!$this->fileupload->handle_upload()) {
        $output['jquery-upload-file-error'] = $this->fileupload->display_errors();
        $json = json_encode($output);
        echo $_FILES['fileberkas']['name'];
        return false;
      }
      if (!$this->fileupload->do_upload($config['field_name'])) {
        $output['jquery-upload-file-error'] = $this->fileupload->display_errors();
        $json = json_encode($output);
        echo $json;
        return false;
      } else {
        $up_data     = $this->fileupload->data();

        // array dataitem berkas
        $dataitem = array(
          'namaberkas' => './assets/rmberkas/' . $up_data['file_name'],
          'tglberkas' => $data->tgl_directory,
          'idpasien' => $id,
          'iddirectory' =>  $data->iddirectory,
          'orderby' => intval($order + 1)
        );
        $this->Berkas_m->simpan($dataitem);
        $output['success_msg_upload'] = true;
      }
    } else {  //Multiple files, file[]
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
          'save_path' => getcwd() . '/assets/rmberkas/', //save path di assets/rmberkas
          'max_file_size' => 1025 * 5, //max kapasisas 5mb
          'allowed_mime_type_arr' => array('application/pdf', 'image/png', 'image/jpeg',), //hanya support pdf
          'field_name' => 'fileberkass', // nama form file berkas
          'allowed_types' => '*' // nama form file berkas
        );
        $order = $this->Berkas_m->get_sum('idpasien', array('idpasien' => $id));
        $config['file_name'] =  $data->tgl_directory . '_' .  $data->norm . '_' . intval($order + 1); //filename dynamic

        $this->load->library('fileupload', $config);
        if (!$this->fileupload->handle_upload()) {
          $output['jquery-upload-file-error'] = $this->fileupload->display_errors();
          $json = json_encode($output);
          echo $_FILES['fileberkass']['name'];
          return false;
        }
        if (!$this->fileupload->do_upload($config['field_name'])) {
          $output['jquery-upload-file-error'] = $this->fileupload->display_errors();
          $json = json_encode($output);
          echo $json;
          return false;
        } else {
          $up_data     = $this->fileupload->data();

          // array dataitem berkas
          $dataitem = array(
            'namaberkas' => './assets/rmberkas/' . $up_data['file_name'],
            'tglberkas' => $data->tgl_directory,
            'idpasien' => $id,
            'iddirectory' =>  $data->iddirectory,
            'orderby' =>  intval($order + 1)
          );
          $this->Berkas_m->simpan($dataitem);
          $output['success_msg_upload'] = true;
        }
      }
    }
    $json = json_encode($output);
    echo $json;
  }

  public function _unique_norm()
  {
    $id = $this->uri->segment(4);
    $id = decrypting($id);
    $this->db->where(array('norm' => $this->input->post('norm')));
    !$id || $this->db->where('id !=', $id);
    $data = $this->Pasien_m->get();
    if (count($data)) {
      $this->form_validation->set_message('_unique_norm', '*<strong>Nomor Rekam Medis Sudah Terdaftar</strong>, </br>Silahkan Periksa Kembali Pasien Rekam Medis Yang akan diupload');
      return FALSE;
    }
    return TRUE;
  }

  public function hapus($id)
  {
    $id = decrypting($id);
    // $this->Berkas_m->HapusBerkas($id);
    // exit();
    $this->Berkas_m->hapus($id);
    redirect($_SERVER['HTTP_REFERER']);
  }

}
