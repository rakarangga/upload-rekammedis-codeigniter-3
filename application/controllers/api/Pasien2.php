<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends Restfull_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();


        $this->load->model('APIPasien_m');
        /*   $this->methods['pasiens_get']['limit'] = 500; // 500 requests per hour per pasien/key
        $this->methods['pasiens_post']['limit'] = 100; // 100 requests per hour per pasien/key
        $this->methods['pasiens_delete']['limit'] = 50; // 50 requests per hour per pasien/key */
    }

    public function index2_get()
    {
        $norm = $this->get('norm');
        /* $norm = (int) $norm; */
        if ($norm) {
            if ($norm <= 0) {
                $pasiens = NULL;
                $this->response($pasiens, Restfull_Controller::HTTP_BAD_REQUEST);
            }
            $pasiens = $this->APIPasien_m->get_pasien_with_berkas($norm);
        } else {
            $pasiens = $this->APIPasien_m->get_pasien_with_berkas();
        }
        if ($pasiens) {
            $this->set_response([
                'status' => TRUE,
                'data' => $pasiens
            ], Restfull_Controller::HTTP_OK);
        } else {
            $this->set_response([
                'status' => FALSE,
                'msg' => 'Tidak Tersedia data Pasien'
            ], Restfull_Controller::HTTP_NOT_FOUND);
        }
    }

   
}
