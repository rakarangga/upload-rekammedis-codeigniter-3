<?php
class Crdomestic_m extends MY_Model {
	protected $_table_nama = 'tblpesan_logistik';
	protected $_primary_key = 'iddomorder';
	protected $_timepost = 'waktuorder';
	protected $_timeedit='';
	protected $_timestamp = TRUE;
	protected $_order_by = 'waktuorder';
	public $rules = array (
	    	
	    'propuser' => array (
	        'field' => 'propuser',
	        'label' => 'Provinsi',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'kotkabuser' => array (
	        'field' => 'kotkabuser',
	        'label' => 'Kota / Kabupaten',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'kecuser' => array (
	        'field' => 'kecuser',
	        'label' => 'Kecamatan',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	
	    ),
	    'keluser' => array (
	        'field' => 'keluser',
	        'label' => 'Kelurahan',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	
	    ),
	    'kodeposuser' => array (
	        'field' => 'kodeposuser',
	        'label' => 'Kode Pos',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    
	    ),
	    'alamatuser' => array (
	        'field' => 'alamatuser',
	        'label' => 'Alamat Pengirim',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    
	    )
	);

	public function get_new() {
		$crdomestic = new stdClass ();
		$crdomestic->propuser = '';
		$crdomestic->kotkabuser = '';
		$crdomestic->kecuser= '';
		$crdomestic->keluser= '';
		$crdomestic->kodeposuser= '';
		$crdomestic->alamatuser= '';
		return $crdomestic;
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
	  
	   // $alamat = $this->db->get('tblalamat_users');
	   /*  $queriesss = $this->db->select('tblalamat_users.*, propuser.namaxxpropinsi as nama_propinsi, kotkabuser.namaxxkotkab as nama_kotkab, 
	                       kecuser.namaxxkecamatan as nama_kec, keluser.namaxxkelurahan as nama_kel')
	    ->join('tblxxpropinsi as propuser', 'tblalamat_users.propuser = propuser.kodexxpropinsi', 'left')
	    ->join('tblxxkotkab as kotkabuser', 'tblalamat_users.kotkabuser = kotkabuser.kodexxkotkab', 'left')
	    ->join('tblxxkecamatan as kecuser', 'tblalamat_users.kecuser = kecuser.kodexxkecamatan', 'left')
	    ->join('tblxxkelurahan as keluser', 'tblalamat_users.keluser = keluser.kodexxekelurahan', 'left')
	    ->where('tblalamat_users.idUsers', $this->session->userdata('iduser'));
	 */
	 
	   /*  $str = '';
	    foreach ($alamat as $q) {
	      
	         $str .= "<tr class='even pointer'><td>". PHP_EOL;
	         $str .= "<td>".$q->nama_propinsi."</td>". PHP_EOL;
	         $str .= "<td>".$q->nama_kotkab."</td>". PHP_EOL;
	         $str .= "<td>".$q->nama_kec."</td>". PHP_EOL;
	         $str .= "<td>".$q->kodeposuser."</td>". PHP_EOL;
	         $str .= "<td>".anchor('backoffice/crdomestic/form/'.$q->idalamatusers, $q->alamatuser)."</td>". PHP_EOL;
	         $str .="<td class='last'><div class='btn-group-vertical'>".PHP_EOL;
	         $str .= btn_pilih('backoffice/crdomestic/form/'.$q->idalamatusers);
	         if(authorize($_SESSION["access"]["pengaturan_umum"]["accescontrol"]["ac_edit"])){
	         $str .= btn_koreksi('backoffice/crdomestic/form/'.$q->idalamatusers);
             }
             if(authorize($_SESSION["access"]["pengaturan_umum"]["accescontrol"]["ac_delete"])){
                $str .= btn_hapus('crdomestic/hapus/'.$q->idalamatusers);
             }
             $str .= "</div></td></tr>";
	    }
	    return $str; */
	 //  return parent::get($id, $single);
	   
	}
	
	
	public function get_dropdown_hakakses()
	{
	
	    $this->load->model('Hakakses_m');
	    $hakaksess = $this->Hakakses_m->get();
	
	    // Jika catagorie Tidak 0 Tampilkan Judul
	    $arr = array(
	        0 => 'Tidak Menggunakan Hak Akses'
	    );
	    if (count($hakaksess)) {
	        foreach ($hakaksess as $hakakses) :
	        $arr[$hakakses->an_id] = $hakakses->an_name;
	        endforeach;
	    }
	    return $arr;
	}
	
	public function get_drowpdown_module()
	{
	
	    $this->load->model('Module_m');
	    $modules = $this->Module_m->get();
	
	    // Jika catagorie Tidak 0 Tampilkan Judul
	    $arr = array(
	        0 => 'Tidak Menggunakan Module'
	    );
	    if (count($modules)) {
	        foreach ($modules as $module) :
	        $arr[$module->mod_moduleid] = $module->mod_modulename;
	        endforeach;
	    }
	    return $arr;
	}
	
	function getWilayah($suggest){
	    $this->db->select('tblxxpropinsi.namaxxpropinsi as namaPropinsi,
		tblxxkotkab.namaxxkotkab as namaKotkab,
        tblxxkecamatan.namaxxkecamatan as namaKec,
        tblxxkelurahan.namaxxkelurahan as namaKel');
	     $this->db->join('tblxxkotkab ', 'tblxxpropinsi.kodexxpropinsi = tblxxkotkab.kodexxpropinsi', 'LEFT');
	    $this->db->join('tblxxkecamatan ', 'tblxxkotkab.kodexxkotkab = tblxxkecamatan.kodexxkotkab', 'LEFT');
	    $this->db->join('tblxxkelurahan ', 'tblxxkecamatan.kodexxkecamatan = tblxxkelurahan.kodexxkecamatan', 'LEFT');
	  //  $this->db->join('tbl_kodepos', 'tbl_kodepos.kelurahan = tblxxkelurahan.kodexxekelurahan', 'LEFT'); 
	   /*  $this->db->join('tblxxpropinsi ', 'tblxxkotkab.kodexxpropinsi = tblxxpropinsi.kodexxpropinsi', 'LEFT');
	    $this->db->join('tblxxkotkab ', 'tblxxkecamatan.kodexxkotkab = tblxxkotkab.kodexxkotkab', 'LEFT');
	    $this->db->join('tblxxkecamatan ', 'tblxxkelurahan.kodexxkecamatan = tblxxkecamatan.kodexxkecamatan', 'LEFT');
	    $this->db->join('tblxxkelurahan ', 'kodepos.kelurahan = tblxxkelurahan.kodexxekelurahan', 'RIGTH'); */
	  //  $this->db->join('tblxxkelurahan as kel', 'tbl_kodepos.kelurahan = tblxxkelurahan.kodexxekelurahan', 'LEFT');
	    
	    $this->db->where('1=1');
	   // $this->db->like('namaxxpropinsi', $suggest);
	    $this->db->like('tblxxkotkab.namaxxkotkab', $suggest);
	  //  $this->db->like('namaxxkecamatan', $suggest);
	  //  $this->db->like('namaxxkelurahan', $suggest);
	    
	  // $this->db->like('tblxxkotkab.namaxxkotkab', $kotkab , 'both');
	   // $this->db->order_by('tblxxkotkab.namaxxkotkab', 'ASC');
	    $this->db->limit(30);
	    return $this->db->get('tblxxpropinsi')->result();
	}
	
}
