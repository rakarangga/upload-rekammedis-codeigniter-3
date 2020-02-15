<?php
class Orderpickup_m extends MY_Model {
	protected $_table_nama = 'tblpesan_interex';
	protected $_primary_key = 'tblpesan_interex.no_pesanan';
	protected $_timepost = 'waktuorder';
	protected $_timeedit='';
	protected $_timestamp = TRUE;
	protected $_order_by = 'waktuorder';
	
	
	
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
	   
	    $this->db->where(array('tblpesan_interex.idusers' => $this->session->userdata('iduser'),
	                           'tblpesan_interex.idstatusdom' => '1',
	    ));
	    return parent::get($id, $single); 
	}
	
	public function get_with_join_form($id = NULL, $single = FALSE)
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
	
	    $this->db->where(array('tblpesan_interex.idusers' => $this->session->userdata('iduser'),
	        'tblpesan_interex.idstatusdom' => '1',
	    ));
	    return parent::get_by(array ('tblpesan_interex.no_pesanan'=>$id), $single);
	}
	

	
    public function get_with_pengirim($idAlamatuser, $id, $single = FALSE)
	{
	    $this->db->select('tblpesan_interex.idinterorder, alamatUser.idalamatusers, propuser.namaxxpropinsi as nama_propinsi, kotkabuser.namaxxkotkab as nama_kotkab, 
	                       kecuser.namaxxkecamatan as nama_kec, keluser.namaxxkelurahan as nama_kel, alamatUser.alamatuser');
	    $this->db->join('tblalamat_users as alamatUser', 'tblpesan_interex.idalamatusers = alamatUser.idalamatusers', 'left');
	    $this->db->join('tblxxpropinsi as propuser', 'alamatUser.propuser = propuser.kodexxpropinsi', 'left');
	    $this->db->join('tblxxkotkab as kotkabuser', 'alamatUser.kotkabuser = kotkabuser.kodexxkotkab', 'left');
	    $this->db->join('tblxxkecamatan as kecuser', 'alamatUser.kecuser = kecuser.kodexxkecamatan', 'left');
	    $this->db->join('tblxxkelurahan as keluser', 'alamatUser.keluser = keluser.kodexxekelurahan', 'left');
	    
	    $this->db->where(array('tblpesan_interex.idUsers' => $this->session->userdata('iduser')));
	    return  parent::get_by(array ('alamatUser.idalamatusers' => $idAlamatuser, 'tblpesan_interex.no_pesanan'=>$id), $single);
	} 


	public function get_mp($idpromointr,$biaya_tarif,$biaya_promo,$total_biaya,$curr_tarif)
	{
	    $this->load->model('Metodepay_m');
	    if($idpromointr == NULL || $idpromointr=='0' ||$idpromointr == ''){
	        $array = $this->Metodepay_m->get_by('idmp != 3');
	    }else{
	       $array = $this->Metodepay_m->get_by(array('idmp'=>'3'));
	    }
	  
	 
	  // echo $idpromointr;
	    // Jika catagorie Tidak 0 Tampilkan Judul
	 /*    $arr = array(
	        "" => ' - PILIH METODE PEMBAYARAN'
	    );
	    if (count($metodepays)) {
	        foreach ($metodepays as $metodepay) :
	        $arr[$metodepay->idmp] =  $metodepay->namametode;
	        endforeach
	        ;
	    }
	    return $arr; */
	  //  $array =  $this->db->get('tbl_jenis_layananiex')->result();
	    
	    
	    $str = '';
	    if (count($array)) {
	        $str .= ' <ul class="nav nav-tabs" id="metodepay_item">';
	        foreach ($array as $count => $itemTabs) {
	            $active = $count == 0 ? TRUE : FALSE;
	          //  $str .= $idpromointr; //for debuging
	            $str .= $active ? '<li id="metodepay_tab" class="active">' : '<li id="metodepay_tab">' . PHP_EOL;
	            $str .= '<a href="#tab_' . $itemTabs->idmp . '" aria-controls="tab_' . $itemTabs->idmp. '" role="tab" data-toggle="tab">' . e($itemTabs->namametode) . '</a>';
	            $str .= '</li>' . PHP_EOL;
	        }
	        $str .= ' </ul>' . PHP_EOL;
	        $str .= '<div class="tab-content" id="tabContent_item">';
	        foreach ($array as $count => $tabPane) {
	         $active = $count == 0 ? TRUE : FALSE;
	         $str .= $active ? '<div class="tab-pane box-primary fade active in " id="tab_' . $tabPane->idmp . '">' : '<div class="tab-pane fade in " id="tab_' . $tabPane->idmp . '">' . PHP_EOL;
    	          $str .= '</br><div class="row">' . PHP_EOL;
    	          $str .= '<div class="col-md-8">' . PHP_EOL;
	              $str .= '<div class="box box-primary r">' . PHP_EOL;
	              $str .= '<div class="box-header with-border">' . PHP_EOL;
	              $str .= '<h3 class="box-title"><i class="fa fa-check-square-o"></i> Transaksi</h3>' . PHP_EOL;
	              $str .= '</div>' . PHP_EOL;
    	          $str .= '<div class="box no-border">' . PHP_EOL;
    	          $str .= '<div class="box-body no-border">' . PHP_EOL;
    	          //bagian tab kiri 
    	         
    	          if($idpromointr == NULL || $idpromointr=='0' ||$idpromointr == ''){
    	              if( $tabPane->idmp == '2'){

    	                
    	                  $str .= form_open_multipart('','id="demo-form" name="interFrm" data-parsley-validate role="form"');
    	                  $str .= '<div class="form-group">' . PHP_EOL;
    	                  $str .= '<label for="namabank">Nama Bank</label>' . PHP_EOL;
    	                  $str .= '<input type="text" class="form-control" id="namabank" name="namabank" placeholder="Nama Bank Pengguna">' . PHP_EOL;
    	                  $str .= '<input type="hidden" class="form-control" id="idmp" name="idmp" placeholder="Metode Pembayaran" value="' . $tabPane->idmp . '">' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	                  $str .= '<div class="form-group">' . PHP_EOL;
    	                  $str .= '<label for="varchar">No. Rekening </label> ' . PHP_EOL;
    	                  $str .= '<input type="text" class="form-control" name="norek" id="norek" onkeypress="return isNumberKey(event)" placeholder="No. Rekening Pengguna" >' . PHP_EOL;
    	                  $str .= ' </div>' . PHP_EOL;
    	                  $str .= '<div class="form-group">' . PHP_EOL;
    	                  $str .= '<label for="namabank">Nama Lengkap</label>' . PHP_EOL;
    	                  $str .= '<input type="text" class="form-control" id="atasnama" name="atasnama" placeholder="Nama Lengkap">' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	                   $str .= '<div class="form-group">' . PHP_EOL;
    	                   $str .= $this->getRekPer();
    	                   $str .= '</div>' . PHP_EOL;
    	                   
    	                
    	               
    	                   $str .= '<div class="box-footer pull-right">' . PHP_EOL;
    	                   $str .= 	form_submit('submit','Konfirmasi','class="btn btn-info"');
            			   $str .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' . PHP_EOL;
    	                   $str .= '</div>' . PHP_EOL;
    	                 
    	                  
    	                  
    	              }else {
    	                  $str .=form_open_multipart('','id="demo-form" name="interFrm" data-parsley-validate role="form"');
    	                  $str .= '<div class="form-group">' . PHP_EOL;
    	                  $str .= '<input type="hidden" class="form-control" id="idmp" name="idmp" placeholder="Metode Pembayaran" value="' . $tabPane->idmp . '">' . PHP_EOL;
    	                  $str .= 'Anda dapat Membayar tunai atau cash, ' . PHP_EOL;
    	                  $str .= 'ketika penjemput tiba dilokasi jemput, </br>Silahkan langsung konfirmasi pembayaran.' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	                  $str .= '<div class="box-footer pull-right">' . PHP_EOL;
    	                  $str .= 	form_submit('submit','Konfirmasi','class="btn btn-info"');
    	                  $str .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	                  $str .= form_close();
    	              }
    	          }else{
    	              $str .=form_open_multipart('','id="demo-form" name="interFrm" data-parsley-validate role="form"');
    	              $str .= '<div class="form-group">' . PHP_EOL;
    	              $str .= '<input type="hidden" class="form-control" id="idmp" name="idmp" placeholder="Metode Pembayaran" value="' . $tabPane->idmp . '">' . PHP_EOL;
    	              $str .= 'Pembayaran Menggunakan Voucher' . PHP_EOL;
    	              $str .= 'Silahkan langsung konfirmasi pembayaran.' . PHP_EOL;
    	              $str .= '</div>' . PHP_EOL;
    	              $str .= '<div class="box-footer pull-right">' . PHP_EOL;
    	              $str .= 	form_submit('submit','Konfirmasi','class="btn btn-info"');
    	              $str .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' . PHP_EOL;
    	              $str .= '</div>' . PHP_EOL;
    	              $str .= form_close();
    	          }
    	       
    	          $str .= '</div>' . PHP_EOL;
    	          $str .= '</div>' . PHP_EOL;
    	          $str .= '</div>' . PHP_EOL;
    	          $str .= '</div>' . PHP_EOL;
    	          
    	          $str .= '<div class="col-md-4">' . PHP_EOL;
    	          
    	         
    	          $str .= '<div class="box box-primary ">' . PHP_EOL;
    	          $str .= '<div class="box-header with-border">' . PHP_EOL;
    	          $str .= '<h3 class="box-title"><i class="fa fa-list-alt"></i> Ringkasan Pembayaran</h3>' . PHP_EOL;
    	          $str .= '</div>' . PHP_EOL;
    	          $str .= '<div class="box no-border">' . PHP_EOL;
    	          $str .= '<div class="box-body no-border">' . PHP_EOL;
    	          // bagian tab kanan ringkasan pembayaran
    	         	$str .= '<div class="table-responsive">' . PHP_EOL;
					$str .= '<table class="table">' . PHP_EOL;
					$str .= '<tbody><tr>' . PHP_EOL;
					$str .= '<th style="width:50%">Biaya Tarif </th>' . PHP_EOL;
					$str .= '<td id="detailTarif" class="pull-right">'.$curr_tarif.' '. number_format ($biaya_tarif, 2, ',', '.').'</td>' . PHP_EOL;
					$str .= ' </tr>' . PHP_EOL;
				
					$str .= '<tr>' . PHP_EOL;
					$str .= '<th>Biaya Promo </th>' . PHP_EOL;
					$str .= '<td id="detailPromo" class="pull-right">'.$curr_tarif.' '. number_format ($biaya_promo, 2, ',', '.').'</td>' . PHP_EOL;
					$str .= '</tr>' . PHP_EOL;
					$str .= ' <tr>' . PHP_EOL;
					$str .= '<th>Total Bayar </th>' . PHP_EOL;
					$str .= '<td id="detailTotal" class="pull-right">'.$curr_tarif.' '. number_format ($total_biaya, 2, ',', '.').'</td>' . PHP_EOL;
					$str .= ' </tr>' . PHP_EOL;
					$str .= '</tbody></table>' . PHP_EOL;
					$str .= '</div>' . PHP_EOL;
    	          
    	          $str .= '</div>' . PHP_EOL;
    	          $str .= '</div>' . PHP_EOL;

    	          if($idpromointr == NULL || $idpromointr=='0' ||$idpromointr == ''){
    	              if( $tabPane->idmp == '2'){
    	                  $str .= '<div class="box box-primary ">' . PHP_EOL;
    	                  $str .= '<div class="box-header with-border">' . PHP_EOL;
    	                  $str .= '<h3 class="box-title"><i class="fa fa-list-alt"></i> Upload bukti transfer</h3>' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	                  $str .= '<div class="box no-border">' . PHP_EOL;
    	                  $str .= '<div class="box-body no-border">' . PHP_EOL;
    	                  // bagian tab kanan ringkasan pembayaran
    	                  $str .= '<div class="form-group">' . PHP_EOL;
    	                  $data_upload = array(
    	                      'name' => 'fotobukti',
    	                      'id' =>'fotobukti',
    	                      'class' => 'form-control',
    	                      'style' => 'width:250px;',
    	                      'onChange' => 'previewImg(event)'
    	                  );
    	                  $str .= form_upload($data_upload);
    	                  // $str .= img(set_value('gambar', $promo->gambar), FALSE, 'class="img"style="margin-top:10px;width:250px;"');
    	                  //$str .= '<input type="file" id="fotobukti" name="fotobukti" class="form-control" onChange="previewImg(event)">' . PHP_EOL;
    	                  $str .= '<p class="help-block">Format Gambar JPG / JPEG / PNG</p>' . PHP_EOL;
    	                  $str .= '<div id="form-img">' . PHP_EOL;
    	                  //$str .= '<img src="'.base_url().'assets/dist/img/user.png" width="110" height="130" id="img">' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	          
    	                  $str .= '</div>' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	                  $str .= '</div>' . PHP_EOL;
    	                  $str .= form_close();
    	              }
    	          }
    	           
    	          
    	          $str .= '</div>' . PHP_EOL; 
    	          $str .= '</div>' . PHP_EOL;
    	          
    	          $str .= '</div>' . PHP_EOL;
    	           
	         $str .= '</div>' . PHP_EOL;
	        }
	        $str .= '</div>' . PHP_EOL;
	       // echo  $str;
	    }
	    return $str;
	    
	}
	
	public function getRekPer(){
	    $this->load->model('Rekperusahaan_m');
	    $rekpers = $this->Rekperusahaan_m->get();
	    
	    // Jika catagorie Tidak 0 Tampilkan Judul
	   $str ='';
	    if (count($rekpers)) {
	        $str .= '<div class="table-responsive">' . PHP_EOL;
	        $str .= '<table class="table">' . PHP_EOL;
	        $str .= '<tbody>' . PHP_EOL;
	        $str .= '<tr>' . PHP_EOL;
	        foreach ($rekpers as $rekper) :
	        $str .= '<th><input type="radio" name="kerekper" id="kerekper" class="flat-red" value="'.$rekper->norek.'"></th>' . PHP_EOL;
	        $str .= '<th>'.$rekper->namabank.'</br>Atas Nama '.$rekper->atasnama.'</br>'.$rekper->norek.'</th>' . PHP_EOL;
	        endforeach
	        ;
	        $str .= '</tr>' . PHP_EOL;
	        $str .= '</tbody></table>' . PHP_EOL;
	        $str .= '</div>' . PHP_EOL;
	         
	         
	    }
	    return $str;
	}
	public function get_itemDetail($no_pesanan){
	    $this->load->model('Itemdetail_m');
	    $itemdetails = $this->Itemdetail_m->get_by(array(
	        'idusers' => $this->session->userdata('iduser'),
	        'no_pesanan' => $no_pesanan,
	    ));
	    // Jika catagorie Tidak 0 Tampilkan Judul
	    $str = "";
	    $item = "";
	    if (count($itemdetails)) {
	        $item .='<table class="table table-striped no-border" style="text-align: left; font-size: 12px;" id="regularTable"><thead><tr><th>Item</th><th>Price</th><th>Qty</th><th>Total</th></tr></thead><tbody id="regularTBody">';
	
	        foreach ($itemdetails as $itemdetail) {
	
	            // $str .='var swal_html ='."'".'<table class="table table-striped no-border" style="text-align: left; font-size: 12px;" id="regularTable"><thead><tr><th>Item</th><th>Price</th><th>Qty</th><th>Total</th></tr></thead><tbody id="regularTBody"><tr><td><label for="varchar" class="text-grey">'.e($itemdetail->namaitem).'</label></td><td><label for="varchar" class="text-grey">'.e($itemdetail->currency).' '. number_format (e($itemdetail->priceitem), 2, ',', '.') .'</label></td><td>'.e($itemdetail->qty).'</td><td>'.e($itemdetail->currency).' '. number_format (e($itemdetail->totalprice), 2, ',', '.') .'</td><td></td></tr></tbody></table>'."'".';
	            //';
	            $item .= '<tr><td>'.e($itemdetail->namaitem).'</td><td>'.e($itemdetail->currency).' '. number_format (e($itemdetail->priceitem), 2, ',', '.') .'</td><td>'.e($itemdetail->qty).'</td><td>'.e($itemdetail->currency).' '. number_format (e($itemdetail->totalprice), 2, ',', '.') .'</td></tr>';
	        }
	        $item .='</tbody></table>';
	        $str .='<script>';
	
	        $str .='
                  var swal_html ='."'".$item."'".';
                  swal({ title: "Detail Item", text: swal_html,html: true});';
	        $str .='</script>';
	       echo $str;
	    }
	     
	    return $str;
	}
	public function hapus($id)
	{
	    // hapus halaman
	    parent::hapus($id);
	}
}
