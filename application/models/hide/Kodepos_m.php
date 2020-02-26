<?php
class Kodepos_m extends MY_Model {
	protected $_table_nama = 'tbl_kodepos';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'id';
	protected $_order_by = 'id';
	protected $_timepost = '';
	protected $_timeedit='';
	public $rules = array (
	    	
	     'kelurahan' => array (
	        'field' => 'kelurahan',
	        'label' => 'kelurahan',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'kecamatan' => array (
	        'field' => 'kecamatan',
	        'label' => 'Kecamatan',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'kabupaten' => array (
	        'field' => 'kabupaten',
	        'label' => 'KotaKabupaten',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ), 
	    'provinsi' => array (
	        'field' => 'provinsi',
	        'label' => 'Provinsi',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'kodepos' => array (
	        'field' => 'kodepos',
	        'label' => 'kodepos',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	);

	public function get_new() {
		$kodepos = new stdClass ();
		$kodepos->kelurahan = '';
		$kodepos->kecamatan = '';
		$kodepos->kabupaten = '';
		$kodepos->provinsi = '';
		$kodepos->kodepos = '';
	
		return $kodepos;
	}
	
	public function get_join($id = NULL, $single = FALSE)
	{
	    $this->db->select('tbl_kodepos.id as kode, tbl_kodepos.kodepos as nama, kelurahan.kodexxekelurahan');
	    $this->db->join('tblxxkelurahan as kelurahan', 'tbl_kodepos.kelurahan = kelurahan.kodexxekelurahan', 'left');
	    $this->db->where('kelurahan.kodexxekelurahan',$id);
	
	    return parent::get_by('kelurahan.kodexxekelurahan='.$id, $single);
	}
	
}
