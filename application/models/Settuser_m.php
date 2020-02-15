<?php
class Settuser_m extends MY_Model {
	protected $_table_nama = 'logis_users';
	protected $_primary_key = 'iduser';
	protected $_order_by = 'modified';
	protected $_timePost = 'created';
	protected $_timeedit='modified';
	protected $_timestamp = TRUE;

	var $_order_column = array(null,'namalengkap', 'email','namauser', null, null);
	var $_select_column = array('namalengkap', 'email', 'namauser');
	
	public $rules = array (
			
			'namalengkap' => array (
					'field' => 'namalengkap',
					'label' => 'Nama Lengkap',
					'rules' => 'trim|required|xss_clean',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>' 
					) 
			),
			'namauser' => array (
					'field' => 'namauser',
					'label' => 'Username',
					'rules' => 'trim|required|xss_clean',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>' 
					) 
			),
	    'nomorhp' => array (
	        'field' => 'nomorhp',
	        'label' => 'Nomor Handphone',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    
			'userpass' => array (
					'field' => 'userpass',
					'label' => 'Password',
					'rules' => 'trim|matches[u_pass_confirm]',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>',
							'matches' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>%s</strong> Tidak Sesuai.
                  </div>' 
					)
					 
			),
			'u_pass_confirm' => array (
					'field' => 'u_pass_confirm',
					'label' => 'Konfirmasi Password',
					'rules' => 'trim|matches[userpass]',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>',
							'matches' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>%s</strong> Tidak Sama.
                </div>' 
					)
					 
			),
			'namabisnis' => array (
					'field' => 'namabisnis',
					'label' => 'Nama Bisnis',
					'rules' => 'trim|required|xss_clean',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>' 
					)
					 
			),
			'logo' => array (
					'field' => 'logo',
					'label' => 'Foto Upload',
					'rules' => 'trim',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>' 
					)
					 
			) 
	);
	
	public $rules_OSEDE = array (
	    	
	    'namalengkap' => array (
	        'field' => 'namalengkap',
	        'label' => 'Nama Lengkap',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'namauser' => array (
	        'field' => 'namauser',
	        'label' => 'Username',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'nomorhp' => array (
	        'field' => 'nomorhp',
	        'label' => 'Nomor Handphone',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	     
	    'namabisnis' => array (
	        'field' => 'namabisnis',
	        'label' => 'Nama Bisnis',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	
	    ),
	    'linktoko' => array(
	        'field' => 'linktoko',
	        'label' => 'Link / URL Toko',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '<script>swal({
                                    title: "%s Harus Di isi.",
                                    type: "error",
                                  });</script>'
	        ),
	    ),
	    'logo' => array (
	        'field' => 'logo',
	        'label' => 'Foto Upload',
	        'rules' => 'trim|xss_clean',
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
		$user = new stdClass ();
		
		$user->u_name_l = '';
		$user->u_name = '';
		$user->email = '';
		$user->no_hp = '';
		$user->u_pass = '';
		$user->u_an_id = '';
		$user->stts = '';
		return $user;
	}
	public function hash($string) {
		return hash ( 'sha512', $string . config_item ( 'encryption_key' ) );
	}
	

	function getAjax(){
	
        // $this->db->join('t_acs_nm as b', $this->_table_nama.'.iduserlevel = b.id', 'left');
		$this->db->select('*');
		$this->db->from($this->_table_nama);
		
		if(isset($_POST["search"]["value"]))
		{
			$this->db->like('namalengkap', $_POST["search"]["value"]);
			$this->db->or_like('namauser', $_POST["search"]["value"]);
			$this->db->or_like('email', $_POST["search"]["value"]);
		}
		if(isset($_POST["order"]))
		{
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}else{
			$this->db->order_by($this->_order_by,$this->_sort);
		}
	}

	function getDataTable(){
		$this->getAjax();
		if($_POST["length"] != -1)
		{
			$this->db->limit($_POST['length'],$_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function getFiltered(){
		$this->getAjax();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function getAllData(){
		$this->db->select('*');
		$this->db->get($this->_table_nama);
		return $this->db->count_all_results();
	}

	public function edit_status($id)
	{
		$stts = $this->db->where(array('iduser'=>$id,'stts'=>'Y'))->get($this->_table_nama)->result_array();
        // Reset parent Homepage
        $stts = $stts
        ? $this->db->set(array( 'stts' => 'T'))->where('iduser', $id)->update($this->_table_nama)
        : $this->db->set(array('stts' => 'Y'))->where('iduser', $id)->update($this->_table_nama);
        //print_r($sosmeds);
	}
	
	public function getData($suggest)
	{
		$this->db->select('u_nip');
		$this->db->like('u_nip', $suggest);
		$query = $this->db->get($this->_table_nama);
		return $query->result();
	}
	
	public function get_drowpdown_hakakses()
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
	
	public function hapus($id)
	{
	    // hapus halaman
	    parent::hapus($id);
	}
	
}
