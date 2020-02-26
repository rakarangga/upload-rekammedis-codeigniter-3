<?php
class Kelurahan_m extends MY_Model {
	protected $_table_nama = 'tblxxkelurahan';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'kodexxekelurahan';
	protected $_order_by = 'kodexxekelurahan';
	protected $_timepost = '';
	protected $_timeedit='';
	public $rules = array (
	    	
	    'kodexxkelurahan' => array (
	        'field' => 'kodexxkelurahan',
	        'label' => 'Kode',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'namaxxkelurahan' => array (
	        'field' => 'namaxxkelurahan',
	        'label' => 'Kelurahan',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '<div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'kodexxkecamatan' => array (
	        'field' => 'kodexxkecamatan',
	        'label' => 'Kecamatan',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '<div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    )
	);

	public function get_new() {
		$kelurahan = new stdClass ();
		$kelurahan->kodexxekelurahan = '';
		$kelurahan->kodexxkecamatan = '';
		$kelurahan->namaxxkelurahan = '';
	
		return $kelurahan;
	}
	
public function get_join($id = NULL, $single = FALSE)
	{
	    $this->db->select('tblxxkelurahan.kodexxekelurahan as kode, tblxxkelurahan.namaxxkelurahan as nama, kecamatan.kodexxkecamatan');
	    $this->db->join('tblxxkecamatan as kecamatan', 'tblxxkelurahan.kodexxkecamatan = kecamatan.kodexxkecamatan', 'left');
	    $this->db->where('kecamatan.kodexxkecamatan',$id);
	     
	      
	    return parent::get_by('kecamatan.kodexxkecamatan='.$id, $single);
	}
	
	
	
}
