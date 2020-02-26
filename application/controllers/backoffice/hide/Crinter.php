<?php

class Crinter extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('u_an_id') == 'super_admin') {
            
            $this->data['crinters'] = $this->Crinter_m->get_with_join_all();
        } else {
            
            $this->data['crinters'] = $this->Crinter_m->GetModuleDB();
        }
        
        $this->data['subview'] = 'backoffice/crinter/index';
        $this->load->view('backoffice/_layout_main', $this->data);
    }

    public function form($id,$updateID)
    {
        // memanggil data 1 crinter berdasarkan id
        if ($id) {
            $this->data['crinter'] = $this->Crinter_m->GetModuleDB($id);
            $this->data['crinter'] = $this->Crinter_m->get_new();
            count($this->data['crinter']) || $this->show_404();
            // dump($this->data['crinter']);
        } else {
            if ($this->session->userdata('u_an_id') == 'super_admin') {
                $this->show_404();
                //$this->data['crinters'] = $this->Crinter_m->get_with_join_all();
            } else {
                $this->show_404();
                //$this->data['crinters'] = $this->Crinter_m->get_new();
            }
        }
        
        $this->data['country_codetujuan'] = $this->Crinter_m->get_dropdown_country();
        
        $rules = $this->Crinter_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
         
            $data = $this->Crinter_m->array_from_post(array(
                'namapenerima',         //namapenerima
                'notelppenerima',        //notelpenerima
                'alamatlengkappenerima', //alamatlengkappenerima
                'kodeposnegara',        //kodeposnegara
                'country_codetujuan',   //country_codetujuan
                'panjangpaket',         //panjangpaket
                'lebarpaket',           //lebarpaket
                'tinggipaket',          //tinggipaket
                'beratpaket',           //beratpaket
                'jenisbarang',          //jenisbarang
                'idkla_layananiex',     //idkla_layananiex
                'idjenislayananiex',    //idjenislayananiex
                'biaya_tarif',           //biaya_tarif
                'idpromointr',
            ));
            $iduser = $this->session->userdata('iduser');
            $noPesanan = $this->generateNoPesan($iduser);
            $namapengirim = $this->session->userdata('namalengkap');
            $notelppengirim = $this->session->userdata('nomorhp');
            $biaya_promo = $this->input->post('biaya_promo');
          
                 $data['no_pesanan'] = $noPesanan;           //no_pesanan
                 $data['no_resi'] = "";
                 $data['idusers'] = $iduser;
                 $data['idalamatusers'] = $id;
                 $data['country_codekirm'] = 'ID';
                 $data['namapengirim'] = $namapengirim;
                 $data['notelppengirim'] = $notelppengirim;
                 $data['idstatusdom'] = '1';
                 //$biaya_promo == 0 ?   $data['idactiondom'] = '1'   : $data['idactiondom'] = '2';
                 $data['idactiondom'] = '1';
                 $data['curr_tarif'] = 'IDR';
                 //$data['idpromointr'] = '0';
                 $biaya_promo == 0 ?   $data['biaya_promo'] = '0': $data['biaya_promo'] = $biaya_promo;
                 $data['biaya_asuransiintr'] = '0';
                 $biaya_promo == 0 ?  $data['totalprice'] =  $this->input->post('biaya_tarif') : $data['totalprice'] = '0' ;
                 
              //insert itemdetail condition
           
              $i = 0;
              $namaitem   =  $this->input->post('namaitem');
              $currency   =  $this->input->post('currency');
              $priceitem  =  $this->input->post('priceitem');
              $qty        =  $this->input->post('qty');
              $totalprice =  $this->input->post('totalprice');
              Foreach($namaitem as $key=>$val)
              {
                  $dataItem[$i]['idusers'] = $iduser;
                  $dataItem[$i]['no_pesanan'] = $noPesanan;
                  $dataItem[$i]['namaitem'] = $namaitem[$key];
                  $dataItem[$i]['currency'] = $currency[$key];
                  $dataItem[$i]['priceitem'] = $priceitem[$key];
                  $dataItem[$i]['qty'] = $qty[$key];
                  $dataItem[$i]['totalprice'] = $totalprice[$key];
                  $i++;
              } 
              
              //update promo
              $idpromointr = $this->input->post('idpromointr');
              $now = date('Y-m-d H:i:s');
              $datapromo['statusvoucher'] = 'TIDAK AKTIF';
              $datapromo['no_pesanan'] = $noPesanan;
              $datapromo['tanggaldigunakan'] = $now;
          
              $biaya_promo == '0' ? : $this->Promointr_m->simpan($datapromo, $idpromointr) ;
              $this->Itemdetail_m->simpanMultiple($dataItem);
              $this->Crinter_m->simpan($data, $updateID); 
         
          /*   dump($dataItem);
            dump($datapromo);
            dump($data); */
              
    $this->data['sukses'] = '<script>
                            swal({
                            title: "Pesanan Sukses",
                            text: "Pesanan yang telah disimpan, tidak dapat dirubah",
                            type: "success",
                            closeOnConfirm: false
                            },
                           function(isConfirm){
                             if (isConfirm) {
             
                         swal({
                              title: "Jemput Sekarang?",
                              text: "Segera Ajukan Penjemputan untuk pesanan ini",
                              type: "info",
                              showCancelButton: true,
                              confirmButtonText: "Yes, Lets go!",
                              cancelButtonText: "No, Later!",
                              closeOnConfirm: false,
                              closeOnCancel: false,
                              showLoaderOnConfirm: true
                            },
                            function(isConfirm){
                              if (isConfirm) {
                                setTimeout(function(){
                                     window.location.replace("'.site_url('backoffice/orderpickup/form/'.$data['no_pesanan']).'");
                                   }, 1500);
                              } else {
                                 setTimeout(function(){
                                     window.location.replace("'.site_url('backoffice/international/').'");
                                   }, 1500);
                              }
                            });
             
                            }
                        });
                           
                          </script>';   
        }
     
        $this->data['subview'] = 'backoffice/crinter/form';
        $this->load->view('backoffice/_layout_main', $this->data);
    }

    private function generateNoPesan($iduser)
    {
        $nodate = date('ymdhms');
        $nopesan = "";
        // sc_alert($nodate);
        if ($iduser < 10) {
            $nopesan = 'E' . '0000' . $iduser . $nodate;
        } else {
            if (($iduser >= 10) && ($iduser < 100)) {
                $nopesan = 'E' . '000' . $iduser . $nodate;
            } else {
                if (($iduser >= 100) && ($iduser < 1000)) {
                    $nopesan = 'E' . '00' . $iduser . $nodate;
                } else {
                    if (($iduser >= 1000) && ($iduser < 10000)) {
                        $nopesan = 'E' . '0' . $iduser . $nodate;
                    } else {
                        if (($iduser >= 10000) && ($iduser < 100000)) {
                            $nopesan = 'E' . $iduser . $nodate;
                        }
                    }
                }
            }
        }
        
        return $nopesan;
    }

    public function klasiLayanan_ajax()
    {
        
        // echo '<script> window.location.replace("'.site_url('backoffice/bukualamat/form').'");</script>';
       $idmemstat =  $this->session->userdata('idmemstat');
        //echo $idmemstat;
       // $idmemstat = $user->idmemstat;
        $country_codetujuan = $this->input->post('country_codetujuan', TRUE);
        $finalWcount = $this->input->post('finalWcount');
        // dump($this->data['finalWcount']);
        // $this->post_ajax();
        $this->Crinter_m->getJenisLayananiex($country_codetujuan, $finalWcount,$idmemstat);
        count($country_codetujuan) || $this->show_404();
    }

    public function promo_ajax()
    {
        $nilaiPromo = $this->input->post('nilaiPromo');
        $this->Crinter_m->getPromoInter($nilaiPromo);
        count($nilaiPromo) || $this->show_404();
    }

    public function hapus($id)
    {
        $this->Crinter_m->hapus($id);
        redirect('backoffice/crinter/');
    }

    public function stts($id)
    {
        $this->Crinter_m->edit_status($id);
        redirect('backoffice/crinter');
    }

    public function suggestions()
    {
        $suggest = $this->input->post('area_tujuan', TRUE);
        $rows = $this->Crinter_m->getWilayah($suggest);
        $json_array = array();
        foreach ($rows as $row)
            $json_array[] = $row->namaKotkab;
        echo json_encode($json_array);
    }
}
