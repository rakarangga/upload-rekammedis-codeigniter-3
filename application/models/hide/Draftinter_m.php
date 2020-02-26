<?php
class Draftinter_m extends MY_Model {
	protected $_table_nama = 'tblpesan_interex';
	protected $_primary_key = 'idinterorder';
	protected $_timepost = 'waktuorder';
	protected $_timeedit='';
	protected $_timestamp = TRUE;
	protected $_order_by = 'waktuorder';
	
	
	/* public function get_new() {
		$drafinter = new stdClass ();
		$drafinter->an_id = '';
		$drafinter->an_name = '';
		return $drafinter;
	} */
	
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
	                           'tblpesan_interex.idstatusdom' => '3',
	    ));
	    return parent::get($id, $single); 
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
	    return  parent::get_by(array ('alamatUser.idalamatusers' => $idAlamatuser, 'tblpesan_interex.idinterorder'=>$id), $single);
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
                  swal({ title: "Detail Item",
                             text: swal_html,
                             html: true,
                             animation: "slide-from-top"});';
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
