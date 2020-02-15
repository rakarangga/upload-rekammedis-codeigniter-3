<?php

class Crinter_m extends MY_Model
{

    protected $_table_nama = 'tblpesan_interex';

    protected $_primary_key = 'idinterorder';

    protected $_timePost = 'waktuorder';

    protected $_timeedit = '';

    protected $_timestamp = TRUE;

    protected $_order_by = 'waktuorder';

    public $rules = array(
     
        'namapenerima' => array(
            'field' => 'namapenerima',
            'label' => 'Nama Lengkap Penerima',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        )
        ,
        'notelppenerima' => array(
            'field' => 'notelppenerima',
            'label' => 'No. Telp Penerima',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        )
        ,
        'alamatlengkappenerima' => array(
            'field' => 'alamatlengkappenerima',
            'label' => 'Alamat Lengkap Penerima',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        )
        ,
        'kodeposnegara' => array(
            'field' => 'kodeposnegara',
            'label' => 'KodePos Negara',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        ),
        'country_codetujuan' => array(
            'field' => 'country_codetujuan',
            'label' => 'Negara Tujuan',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        ),
        
        'panjangpaket' => array(
            'field' => 'panjangpaket',
            'label' => 'Panjang Paket',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        ),
        
        'lebarpaket' => array(
            'field' => 'lebarpaket',
            'label' => 'Lebar Paket',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        ),
        
        'tinggipaket' => array(
            'field' => 'tinggipaket',
            'label' => 'Tinggi Paket',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        ),
        
        'beratpaket' => array(
            'field' => 'beratpaket',
            'label' => 'Berat Paket',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        ),
        
        'jenisbarang' => array(
            'field' => 'jenisbarang',
            'label' => 'jenis Barang',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        ),
        
        'idkla_layananiex' => array(
            'field' => 'idkla_layananiex',
            'label' => 'Pilih Klasilayanan',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Dengan tekan tombol cek  <strong>tarif</strong>.
              </div>'
            )
        ),
        
        'idjenislayananiex' => array(
            'field' => 'idjenislayananiex',
            'label' => 'Pilih Jenis Layanan',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Dengan tekan tombol cek  <strong>tarif</strong>.
              </div>'
            )
        ),
        
        'biaya_tarif' => array(
            'field' => 'biaya_tarif',
            'label' => 'Total Harga',
            'rules' => 'trim|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Dengan tekan tombol cek  <strong>tarif</strong>.
              </div>'
            )
        ),
        
        'idpromointr' => array(
            'field' => 'idpromointr',
            'label' => 'Promo International',
            'rules' => 'trim|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Dengan tekan tombol cek  <strong>tarif</strong>.
              </div>'
            )
        ),
        
        
        
    );

    public function get_new()
    {
        $crinter = new stdClass();
        $crinter->namapenerima = '';
        $crinter->notelppenerima = '';
        $crinter->alamatlengkappenerima = '';
        $crinter->kodeposnegara = '';
        $crinter->kodeposnegara = '';
        $crinter->country_codetujuan = '';
        $crinter->panjangpaket = '';
        $crinter->lebarpaket = '';
        $crinter->beratpaket = '';
        $crinter->jenisbarang = '';
        $crinter->idkla_layananiex = '';
        $crinter->idjenislayananiex = '';
        $crinter->biaya_tarif = '';
        $crinter->idpromointr = '';
        
        return $crinter;
    }

    public function get_with_join($id = NULL, $single = FALSE)
    {
        $this->db->select('tblpesan_interex.*, alamatUser.*, klasiLayanan.namalayananex, jenisLayanan.jenislayanan, statusDom.namastatusdom, actionDom.namaaction, countrySend.country_name as negaraPengirim,  countryReceiv.country_name as negaraTujuan');
        $this->db->join('tblalamat_users as alamatUser', 'tblpesan_interex.idalamatusers = alamatUser.idalamatusers', 'left');
        $this->db->join('tbl_countries as countrySend', 'tblpesan_interex.country_codekirm = countrySend.country_code', 'left');
        $this->db->join('tbl_countries as countryReceiv', 'tblpesan_interex.country_codetujuan = countryReceiv.country_code', 'left');
        $this->db->join('tblstatusdom as statusDom', 'tblpesan_interex.idstatusdom = statusDom.idstatusdom', 'left');
        $this->db->join('tblklasi_layanan_iex as klasiLayanan', 'tblpesan_interex.idkla_layananiex = klasiLayanan.idkla_layananiex', 'left');
        $this->db->join('tbl_jenis_layananiex as jenisLayanan', 'tblpesan_interex.idjenislayananiex = jenisLayanan.idjenislayananiex', 'left');
        $this->db->join('tblaction_dom as actionDom', 'tblpesan_interex.idactiondom = actionDom.idactiondom', 'left');
        $this->db->join('tblpromointr as promoDom', 'tblpesan_interex.idpromointr = promoDom.idpromointr', 'left');
        
        $this->db->where('tblpesan_interex.idusers', $this->session->userdata('iduser'));
        
        return parent::get($id, $single);
    }

    public function get_with_join_all()
    {
        $this->load->model('BukuAlamat_m');
        $alamat = $this->BukuAlamat_m->get_with_join_all();
        
        return $alamat;
    }

    public function GetModuleDB($id = NULL)
    {
        $this->load->model('BukuAlamat_m');
        $alamat = $this->BukuAlamat_m->get_with_join($id);
        return $alamat;
    }

    public function get_dropdown_country()
    {
        $this->load->model('Country_m');
        $countrys = $this->Country_m->get();
        
        // Jika catagorie Tidak 0 Tampilkan Judul
        $arr = array(
            "" => ' - PILIH NEGARA'
        );
        if (count($countrys)) {
            foreach ($countrys as $country) :
                $arr[$country->country_code] = $country->country_name;
            endforeach
            ;
        }
        return $arr;
    }
/* 
    function get_dropdown_klasiLayananiex()
    {
        $this->db->select('tblklasi_layanan_iex.idkla_layananiex, tblklasi_layanan_iex.namalayananex');
        $this->db->where('1=1');
        $klasi_layananiexs = $this->db->get('tblklasi_layanan_iex')->result();
        // Jika catagorie Tidak 0 Tampilkan Judul
        $arr = array(
            "" => ' - PILIH LAYANAN'
        );
        if (count($klasi_layananiexs)) {
            foreach ($klasi_layananiexs as $klasi_layananiex) :
                $arr[$klasi_layananiex->idkla_layananiex] = ' - ' . $klasi_layananiex->namalayananex;
            endforeach
            ;
        }
        return $arr;
    } */
    
    function getJenisLayananiex($idnegtujuan,$finalWcount,$idmemstat)
    {
        $this->db->select(array('klasilayananiex.idkla_layananiex as idKlasi',
                                'klasilayananiex.namalayananex as namaKlasi',
                                'tbl_jenis_layananiex.idjenislayananiex as idJenis',
                                'tbl_jenis_layananiex.jenislayanan as namaJenis'
        ));
           // 'klasilayananiex.idkla_layananiex as idKlasi, klasilayananiex.namalayananex as namaKlasi, tbl_jenis_layananiex.idjenislayananiex as idJenis, tbl_jenis_layananiex.jenislayanan as namaJenis');
        $this->db->join('tblklasi_layanan_iex as klasilayananiex', 'tbl_jenis_layananiex.idkla_layananiex = klasilayananiex.idkla_layananiex', 'join');
       // $this->db->where('klasilayananiex.idkla_layananiex',$id);
       $this->db->group_by('idKlasi');
        $array =  $this->db->get('tbl_jenis_layananiex')->result();
        
        
    $str = '';
    if (count($array)) {
        $str .= ' <ul class="nav nav-tabs" id="jenisLayanan_item">';
        foreach ($array as $count => $itemTabs) {
            $active = $count == 0 ? TRUE : FALSE;
            $str .= $active ? '<li id="tabjenislayananItem" class="active">' : '<li id="tabjenislayananItem">' . PHP_EOL;
            $str .= '<a href="#tab_' . $itemTabs->idKlasi . '" aria-controls="tab_' . $itemTabs->idKlasi. '" role="tab" data-toggle="tab">' . e($itemTabs->namaKlasi) . '</a>';
            $str .= '</li>' . PHP_EOL;
        }
        $str .= ' </ul>' . PHP_EOL;
        $str .= '<div class="tab-content" id="tabContent_item">';
        foreach ($array as $count => $tabPane) {
            $active = $count == 0 ? TRUE : FALSE;
            $str .= $active ? '<div class="table-responsive tab-pane fade active in " id="tab_' . $tabPane->idKlasi . '">' : '<div class="table-responsive tab-pane fade in" id="tab_' . $tabPane->idKlasi . '">' . PHP_EOL;
          //  $str .= e($tabPane->idKlasi);
           // $str .= e($tabPane->idJenis);
            $str .=   $this->getTarif($tabPane->idKlasi, $idnegtujuan,$finalWcount,$idmemstat);
            $str .= '</div>' . PHP_EOL;
        }
        $str .= '</div>' . PHP_EOL;
        echo  $str;
    }
    return $str;
}

   public function getTarif($idklasi,$idnegtujuan,$finalWcount,$idmemstat)
    {
        $this->load->model('Tarifinter_m');
        $this->db->select(array('tbltarif_intr.hargapengiriman as hargapengiriman',
                                'tbltarif_intr.hargamemberosede as hargamemberosede',
                                'tbltarif_intr.idtarifintr as idtarifintr',
                                'tbltarif_intr.durasipengiriman as durasipengiriman',
                                'tbltarif_intr.currency as currency',
                                'tblklasi_layanan_iex.namalayananex as namaKlasi',
                                'tbl_jenis_layananiex.jenislayanan as namaJenis',
                                'tblklasi_layanan_iex.idkla_layananiex as idKlasi',
                                'tbl_jenis_layananiex.idjenislayananiex as idJenis',
                                'tbltarif_intr.berat_vol as berat'
        ));
        $this->db->join('tblklasi_layanan_iex', 'tbltarif_intr.idkla_layananiex = tblklasi_layanan_iex.idkla_layananiex', 'join');
        $this->db->join('tbl_jenis_layananiex', 'tbltarif_intr.idjenislayananiex = tbl_jenis_layananiex.idjenislayananiex', 'join');
        $finalWcount >20 ? $this->db->where('tbltarif_intr.berat_vol','>20') : $this->db->where('tbltarif_intr.berat_vol',$finalWcount);
        $tarifinters = $this->Tarifinter_m->get_by(array(
            'tbltarif_intr.idkla_layananiex' => $idklasi,
            'tbltarif_intr.contry_codekirim' => 'ID',
            'tbltarif_intr.country_code' => $idnegtujuan,
            'tbltarif_intr.currency' => 'IDR',
            'tbltarif_intr.aktivasi' => '1'
        ));
        
        // Jika catagorie Tidak 0 Tampilkan Judul
      /*   $arr = array();
        if (count($tarifinters)) {
            foreach ($tarifinters as $tarifinter) :
                $arr[0] =  $tarifinter->hargapengiriman;
          //  dump($tarifinter);
            endforeach;
        } */
       $str = '';
       $str .= get_tabContent($tarifinters,$finalWcount,$idmemstat);
    //   echo $str;
      
        return $str; 
       
    }
    
    
    
    function getPromoInter($nilaiPromo)
    {
        $this->load->model('Promointr_m');
        $this->db->select('tblpromointr.idvoucherintr,tblpromointr.idpromointr,tblvoucerintr.namavoucher,tblvoucerintr.kodevoucher,tblvoucerintr.jenisvoucher, tblvoucerintr.nilaivoucher');
        $this->db->join('tblvoucerintr', 'tblpromointr.idvoucherintr = tblvoucerintr.idvoucherintr', 'left');
        $promointers = $this->Promointr_m->get_by(array(
            'tblpromointr.statusvoucher' => 'AKTIF',
            'tblpromointr.idusers' =>  $this->session->userdata('iduser')
        ));
        // Jika catagorie Tidak 0 Tampilkan Judul
         $str = "";
	       if (count($promointers)) {
          foreach ($promointers as $promointer) {
              if(($promointer->nilaivoucher) >= ($nilaiPromo)){
              $str .= "<option value='".$promointer->idpromointr."'> - " . $promointer->namavoucher. 
                      ' - ' . $promointer->kodevoucher.' - ' . $promointer->jenisvoucher."</option>".PHP_EOL ;
              $str .='<script>
                            swal({
                            title: "Anda Memiliki Voucher Promo..!!",
                            type: "info"
                            });
                            var myfrm = document.interFrm; 
                            document.getElementById("detailPromo").innerHTML = "'.$promointer->namavoucher.'";
							document.getElementById("detailTotal").innerHTML = "0";
                            myfrm.biaya_promo.value ="'.$promointer->nilaivoucher.'";
                          </script>';
                 }
              }
          echo $str;
	      }
     
          return $str;  
    }
}
