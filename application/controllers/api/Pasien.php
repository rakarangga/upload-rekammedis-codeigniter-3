<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends Restfull_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();


        $this->load->model('Berkas_m');
        $this->load->model('Pasien_m');
      /*   $this->methods['pasiens_get']['limit'] = 500; // 500 requests per hour per pasien/key
        $this->methods['pasiens_post']['limit'] = 100; // 100 requests per hour per pasien/key
        $this->methods['pasiens_delete']['limit'] = 50; // 50 requests per hour per pasien/key */
    }

    public function index_get()
    {

        $all = $this->Pasien_m->get();
        $pasiens =  $all;
        $id = $this->get('id');

        if ($id === NULL) {
            if ($pasiens) {
                $this->response([
                    'status' => TRUE,
                    'data' => $pasiens
                ], Restfull_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'msg' => 'Tidak Tersedia'
                ], Restfull_Controller::HTTP_NOT_FOUND);
            }
        } else {

            $id = (int) $id;
            if ($id <= 0) {
                $this->response(NULL, Restfull_Controller::HTTP_BAD_REQUEST);
            }

            $pasien = NULL;
            if (!empty($pasiens)) {
                foreach ($pasiens as $value) {
                    // dump($value->id);
                    // die();
                    if (isset($value->id) && intval($value->id) === $id) {
                        $pasien = $value;
                    }
                }
            }

            if (!empty($pasien)) {
                $this->set_response([
                    'status' => TRUE,
                    'data' => $pasien
                ], Restfull_Controller::HTTP_OK);
            } else {
                $this->set_response([
                    'status' => FALSE,
                    'msg' => 'Tidak Tersedia data Pasien'
                ], Restfull_Controller::HTTP_NOT_FOUND);
            }
        }
    }
}
