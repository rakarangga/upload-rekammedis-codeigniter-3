<?php
class Kotkab_m extends MY_Model {
	protected $_table_nama = 'tblxxkotkab';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'kodexxkotkab';
	protected $_order_by = 'kodexxkotkab';
	protected $_timepost = '';
	protected $_timeedit='';
	public $rules = array (
	    	
	    'kodexxkotkab' => array (
	        'field' => 'kodexxkotkab',
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
	    'namaxxkotkab' => array (
	        'field' => 'namaxxkotkab',
	        'label' => 'Kota / Kabupaten',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '<div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'kodexxpropinsi' => array (
	        'field' => 'kodexxpropinsi',
	        'label' => 'Provinsi',
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
		$kotkab = new stdClass ();
		$kotkab->kodexxkotkab = '';
		$kotkab->kodexxpropinsi = '';
		$kotkab->namaxxkotkab = '';
	
		return $kotkab;
	}
	
public function get_join($id = NULL, $single = FALSE)
	{
	    $this->db->select('tblxxkotkab.kodexxkotkab as kode, tblxxkotkab.namaxxkotkab as nama, propinsi.kodexxpropinsi');
	    $this->db->join('tblxxpropinsi as propinsi', 'tblxxkotkab.kodexxpropinsi = propinsi.kodexxpropinsi', 'left');
	    $this->db->where('propinsi.kodexxpropinsi',$id);
	    return parent::get_by('propinsi.kodexxpropinsi='.$id, $single);
	}
	
	
	
}
