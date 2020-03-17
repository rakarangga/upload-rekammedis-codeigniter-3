<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends Restfull_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function index_get()
    {

        $uri = (string) $this->uri->segment(2);
        $method = '_' . $uri;
        if (method_exists($this, $method)) {
            $data = $this->$method();
        }
        if ($this->data['Respdata']) {
            $this->set_response([
                'status' => TRUE,
                'data' => $this->data['Respdata']
            ], Restfull_Controller::HTTP_OK);
        } else {
            $this->set_response([
                'status' => FALSE,
                'msg' => 'Tidak Tersedia'
            ], Restfull_Controller::HTTP_NOT_FOUND);
        }
    }
    private function _pasien()
    {
        $this->load->model('APIPasien_m');
        $norm = $this->get('norm');
        /* $norm = (int) $norm; */
        if ($norm) {
            if ($norm <= 0) {
                $this->data['Respdata'] = NULL;
                $this->response($this->data['Respdata'], Restfull_Controller::HTTP_BAD_REQUEST);
            }
            $this->data['Respdata'] = $this->APIPasien_m->get_pasien_with_berkas($norm);
        } else {
            $this->data['Respdata'] = $this->APIPasien_m->get_pasien_with_berkas();
        }
    }
    private function _berkas()
    {
        $this->load->model('APIBerkas_m');
        $id = $this->get('id');
        /*  $id = (int) $id; */
        if ($id) {
            if ($id <= 0) {
                $this->data['Respdata'] = NULL;
                $this->response($this->data['Respdata'], Restfull_Controller::HTTP_BAD_REQUEST);
            }
            $this->data['Respdata'] = $this->APIBerkas_m->get_berkas_by_pasien($id, FALSE, TRUE);
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'msg' => 'Tidak Tersedia data Berkas'
            ], Restfull_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}
