<?php
class BukuAlamat_m extends MY_Model {
	protected $_table_nama = 'tblalamat_users';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'idalamatusers';
	protected $_order_by = '';
	public $rules = array (
	    	
	    'propuser' => array (
	        'field' => 'propuser',
	        'label' => 'Provinsi',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<strong>%s</strong> Harus Di isi.'
	        )
	    ),
	    'kotkabuser' => array (
	        'field' => 'kotkabuser',
	        'label' => 'Kota / Kabupaten',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<strong>%s</strong> Harus Di isi.'
	        )
	    ),
	    'kecuser' => array (
	        'field' => 'kecuser',
	        'label' => 'Kecamatan',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<strong>%s</strong> Harus Di isi.'
	        )
	
	    ),
	    'keluser' => array (
	        'field' => 'keluser',
	        'label' => 'Kelurahan',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<strong>%s</strong> Harus Di isi.'
	        )
	
	    ),
	    'kodeposuser' => array (
	        'field' => 'kodeposuser',
	        'label' => 'Kode Pos',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<strong>%s</strong> Harus Di isi.'
	        )
	    
	    ),
	    'alamatuser' => array (
	        'field' => 'alamatuser',
	        'label' => 'Alamat Pengirim',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<strong>%s</strong> Harus Di isi.'
	        )
	    
	    )
	);

	public function get_new() {
		$bukualamat = new stdClass ();
		$bukualamat->propuser = '';
		$bukualamat->kotkabuser = '';
		$bukualamat->kecuser= '';
		$bukualamat->keluser= '';
		$bukualamat->kodeposuser= '';
		$bukualamat->alamatuser= '';
		return $bukualamat;
	}
	
	 public function get_with_join($id = NULL, $single = FALSE)
	{
	    $this->db->select('tblalamat_users.*, propuser.namaxxpropinsi as nama_propinsi, kotkabuser.namaxxkotkab as nama_kotkab, 
	                       kecuser.namaxxkecamatan as nama_kec, keluser.namaxxkelurahan as nama_kel');
	    $this->db->join('tblxxpropinsi as propuser', 'tblalamat_users.propuser = propuser.kodexxpropinsi', 'left');
	    $this->db->join('tblxxkotkab as kotkabuser', 'tblalamat_users.kotkabuser = kotkabuser.kodexxkotkab', 'left');
	    $this->db->join('tblxxkecamatan as kecuser', 'tblalamat_users.kecuser = kecuser.kodexxkecamatan', 'left');
	    $this->db->join('tblxxkelurahan as keluser', 'tblalamat_users.keluser = keluser.kodexxekelurahan', 'left');
	    $this->db->where('tblalamat_users.idUsers', $this->session->userdata('iduser'));
	    
	    return parent::get($id, $single);
	    
	} 
	
	public function get_with_join_all($id = NULL, $single = FALSE)
	{
	    $this->db->select('tblalamat_users.*, propuser.namaxxpropinsi as nama_propinsi, kotkabuser.namaxxkotkab as nama_kotkab,
	                       kecuser.namaxxkecamatan as nama_kec, keluser.namaxxkelurahan as nama_kel');
	    $this->db->join('tblxxpropinsi as propuser', 'tblalamat_users.propuser = propuser.kodexxpropinsi', 'left');
	    $this->db->join('tblxxkotkab as kotkabuser', 'tblalamat_users.kotkabuser = kotkabuser.kodexxkotkab', 'left');
	    $this->db->join('tblxxkecamatan as kecuser', 'tblalamat_users.kecuser = kecuser.kodexxkecamatan', 'left');
	    $this->db->join('tblxxkelurahan as keluser', 'tblalamat_users.keluser = keluser.kodexxekelurahan', 'left');
	   
	     
	    return parent::get($id, $single);
	     
	}
	
/* 
	public function acsControl($id = NULL, $single = FALSE) {
	    $this->db->select('ac_module_id, ac_create,ac_edit,ac_delete,ac_view');
	    $this->db->where('ac_an_id', $this->session->userdata('u_an_id'));
	
	    return parent::get($id, $single);
	} */

	public function get_dropdown_propinsi()
	{
	
	    $this->load->model('Propinsi_m');
	    $propinsis = $this->Propinsi_m->get();
	    
	
	    // Jika catagorie Tidak 0 Tampilkan Judul
	    $arr = array(
	        "" => ' - PILIH PROVINSI'
	    );
	    if (count($propinsis)) {
	        foreach ($propinsis as $propinsi) :
	        $arr[$propinsi->kodexxpropinsi] = ' - '.$propinsi->namaxxpropinsi;
	        endforeach;
	    }
	    return $arr;
	}
	
	public function get_dropdown_kotkab($id)
	{
	
	    $this->load->model('Kotkab_m');
	    $kotkabs = $this->Kotkab_m->get_join($id);
	    
	       $str = "<option value=''> - PILIH KOTA / KABUPATEN</option>";
	       if (count($kotkabs)) {
          foreach ($kotkabs as $kotkab) {
              $str .= "<option value='".$kotkab->kode."'> - ".$kotkab->nama."</option>".PHP_EOL ;
          }
	      }
          echo $str;
          return $str;  
	}
	
	public function get_dropdown_kecamatan($id)
	{
	
	    $this->load->model('Kecamatan_m');
	    $kecamatans = $this->Kecamatan_m->get_join($id);
	     
	    $str = "<option value=''> - PILIH KECAMATAN</option>";
	    foreach ($kecamatans as $kecamatan) {
	        $str .= "<option value='".$kecamatan->kode."'> - ".$kecamatan->nama."</option>".PHP_EOL ;
	    }
	    echo $str;
	    return $str;
	}
	
	public function get_dropdown_kelurahan($id)
	{
	
	    $this->load->model('Kelurahan_m');
	    $kelurahans = $this->Kelurahan_m->get_join($id);
	
	    $str = "<option value=''> - PILIH KELURAHAN </option>";
	    foreach ($kelurahans as $kelurahan) {
	        $str .= "<option value='".$kelurahan->kode."'> - ".$kelurahan->nama."</option>".PHP_EOL ;
	    }
	    echo $str;
	    return $str;
	}
	
	public function get_kodepos($id)
	{
	
	    $this->load->model('Kodepos_m');
	    $kelurahans = $this->Kodepos_m->get_join($id);
	
	    $str = "";
	    foreach ($kelurahans as $kelurahan) {
	        $str .= $kelurahan->nama ;
	    }
	    echo $str;
	    return $str;
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
	
}
