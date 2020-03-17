<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends Restfull_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();


        $this->load->model('APIBerkas_m');
        /*   $this->methods['berkass_get']['limit'] = 500; // 500 requests per hour per berkas/key
        $this->methods['berkass_post']['limit'] = 100; // 100 requests per hour per berkas/key
        $this->methods['berkass_delete']['limit'] = 50; // 50 requests per hour per berkas/key */
    }

    public function index_get()
    {
        $id = $this->get('id');
       /*  $id = (int) $id; */
        if ($id) {
            if ($id <= 0) {
                $berkass = NULL;
                $this->response($berkass, Restfull_Controller::HTTP_BAD_REQUEST);
            }
            $berkass = $this->APIBerkas_m->get_berkas_by_pasien($id, FALSE, TRUE);
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'msg' => 'Tidak Tersedia data Berkas'
            ], Restfull_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        if ($berkass) {
            $this->set_response([
                'status' => TRUE,
                'data' => $berkass
            ], Restfull_Controller::HTTP_OK);
        } else {
            $this->set_response([
                'status' => FALSE,
                'msg' => 'Tidak Tersedia data Berkas'
            ], Restfull_Controller::HTTP_NOT_FOUND);
        }
    }
}
