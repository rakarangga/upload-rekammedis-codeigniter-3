<?php
class Domestic_m extends MY_Model {
	protected $_table_nama = 'tblpesan_logistik';
	protected $_primary_key = 'iddomorder';
	protected $_timepost = 'waktuorder';
	protected $_timeedit='';
	protected $_timestamp = TRUE;
	protected $_order_by = 'waktuorder';
	
	/* public $rules = array (
			'an_id' => array (
					'field' => 'an_id',
					'label' => 'Kode',
					'rules' => 'required|callback__unique_id',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                   </button>
                   <strong>%s</strong> Harus Di isi.
                   </div>' 
					) 
			),
			'an_name' => array (
					'field' => 'an_name',
					'label' => 'Nama Hak Akses',
					'rules' => 'trim|required',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>' 
					) 
			),
	); */
	
	public function get_new() {
		$hakakses = new stdClass ();
		$hakakses->an_id = '';
		$hakakses->an_name = '';
		return $hakakses;
	}
	
	public function get_with_join($id = NULL, $single = FALSE)
	{
	    $this->db->select('tblpesan_logistik.*, alamatUser.*, klasiLayanan.namalayanan, jenisLayanan.jenislayanan, statusDom.namastatusdom, actionDom.namaaction');
	    $this->db->join('tblalamat_users as alamatUser', 'tblpesan_logistik.idalamatusers = alamatUser.idalamatusers', 'left');
	    $this->db->join('tblalamat_receiver as alamatReceiv', 'tblpesan_logistik.idalamatreceiver = alamatReceiv.idalamatreceiver', 'left');
	    $this->db->join('tblstatusdom as statusDom', 'tblpesan_logistik.idstatusdom = statusDom.idstatusdom', 'left');
	    $this->db->join('tblklasi_layanan as klasiLayanan', 'tblpesan_logistik.idkla_layanan = klasiLayanan.idkla_layanan', 'left');
	    $this->db->join('tbl_jenis_layanan as jenisLayanan', 'tblpesan_logistik.idjenislayanan = jenisLayanan.idjenislayanan', 'left');
	    $this->db->join('tbl_kodepos as kodePos', 'tblpesan_logistik.kodepos = kodePos.kodepos', 'left');
	    $this->db->join('tblaction_dom as actionDom', 'tblpesan_logistik.idactiondom = actionDom.idactiondom', 'left');
	    $this->db->join('tblpromodom as promoDom', 'tblpesan_logistik.idpromodom = promoDom.idpromodom', 'left');
	   
	    
	    $this->db->where('tblpesan_logistik.idusers', $this->session->userdata('iduser'));
	     
	    return parent::get($id, $single); 
	}
	

	
    public function get_with_pengirim($idAlamatuser, $id, $single = FALSE)
	{
	    $this->db->select('tblpesan_logistik.iddomorder, alamatUser.idalamatusers, propuser.namaxxpropinsi as nama_propinsi, kotkabuser.namaxxkotkab as nama_kotkab, 
	                       kecuser.namaxxkecamatan as nama_kec, keluser.namaxxkelurahan as nama_kel, alamatUser.alamatuser');
	    $this->db->join('tblalamat_users as alamatUser', 'tblpesan_logistik.idalamatusers = alamatUser.idalamatusers', 'left');
	    $this->db->join('tblxxpropinsi as propuser', 'alamatUser.propuser = propuser.kodexxpropinsi', 'left');
	    $this->db->join('tblxxkotkab as kotkabuser', 'alamatUser.kotkabuser = kotkabuser.kodexxkotkab', 'left');
	    $this->db->join('tblxxkecamatan as kecuser', 'alamatUser.kecuser = kecuser.kodexxkecamatan', 'left');
	    $this->db->join('tblxxkelurahan as keluser', 'alamatUser.keluser = keluser.kodexxekelurahan', 'left');
	    
	    $this->db->where(array('tblpesan_logistik.idUsers' => $this->session->userdata('iduser')));
	    
	    return  parent::get_by(array ('alamatUser.idalamatusers' => $idAlamatuser, 'tblpesan_logistik.iddomorder'=>$id), $single);
	    
	} 
	

	public function get_with_penerima($idAlamatuser, $id, $single = FALSE)
	{
	    $this->db->select('tblpesan_logistik.iddomorder, alamatReceiver.idalamatreceiver,  propreceiver.namaxxpropinsi as nama_propinsi, kotkabreceiver.namaxxkotkab as nama_kotkab,
	                       kecreceiver.namaxxkecamatan as nama_kec, kelreceiver.namaxxkelurahan as nama_kel,  alamatReceiver.alamatreceiver');
	    $this->db->join('tblalamat_receiver as alamatReceiver', 'tblpesan_logistik.idalamatreceiver = alamatReceiver.idalamatreceiver', 'left');
	    $this->db->join('tblxxpropinsi as propreceiver', 'alamatReceiver.propreceiver = propreceiver.kodexxpropinsi', 'left');
	    $this->db->join('tblxxkotkab as kotkabreceiver', 'alamatReceiver.kotkabreceiver = kotkabreceiver.kodexxkotkab', 'left');
	    $this->db->join('tblxxkecamatan as kecreceiver', 'alamatReceiver.kecreceiver = kecreceiver.kodexxkecamatan', 'left');
	    $this->db->join('tblxxkelurahan as kelreceiver', 'alamatReceiver.kelreceiver = kelreceiver.kodexxekelurahan', 'left');
	     
	    $this->db->where(array('tblpesan_logistik.idUsers' => $this->session->userdata('iduser')));
	     
	    return  parent::get_by(array ('alamatReceiver.idalamatreceiver' => $idAlamatuser, 'tblpesan_logistik.iddomorder'=>$id), $single);
	     
	}
	
	
	public function hapus($id)
	{
	    // hapus halaman
	    parent::hapus($id);
	}
}
