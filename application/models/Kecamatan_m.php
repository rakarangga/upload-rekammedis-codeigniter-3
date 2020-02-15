<?php
class Kecamatan_m extends MY_Model {
	protected $_table_nama = 'tblxxkecamatan';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'kodexxkecamatan';
	protected $_order_by = 'kodexxkecamatan';
	protected $_timepost = '';
	protected $_timeedit='';
	public $rules = array (
	    	
	    'kodexxkecamatan' => array (
	        'field' => 'kodexxkecamatan',
	        'label' => 'Kode',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'namaxxkecamatan' => array (
	        'field' => 'namaxxkecamatan',
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
	    'kodexxkotkab' => array (
	        'field' => 'kodexxkotkab',
	        'label' => 'Kota / Kabupaten',
	        'rules' => 'trim|required|xss_clean',
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
		$kecamatan = new stdClass ();
		$kecamatan->kodexxkecamatan = '';
		$kecamatan->kodexxkotkab = '';
		$kecamatan->namaxxkecamatan = '';
	
		return $kecamatan;
	}
	
public function get_join($id = NULL, $single = FALSE)
	{
	    $this->db->select('tblxxkecamatan.kodexxkecamatan as kode, tblxxkecamatan.namaxxkecamatan as nama, kotkab.kodexxkotkab');
	    $this->db->join('tblxxkotkab as kotkab', 'tblxxkecamatan.kodexxkotkab = kotkab.kodexxkotkab', 'left');
	    $this->db->where('kotkab.kodexxkotkab',$id);
	     
	      
	    return parent::get_by('kotkab.kodexxkotkab='.$id, $single);
	}
	
	
	
}
