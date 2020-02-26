<?php
class Propinsi_m extends MY_Model {
	protected $_table_nama = 'tblxxpropinsi';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'kodexxpropinsi';
	protected $_order_by = 'kodexxpropinsi';
	protected $_timepost = '';
	protected $_timeedit='';
	public $rules = array (
	    	
	    'kodexxpropinsi' => array (
	        'field' => 'kodexxpropinsi',
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
	    'namaxxpropinsi' => array (
	        'field' => 'namaxxpropinsi',
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
		$propinsi = new stdClass ();
		$propinsi->kodexxpropinsi = '';
		$propinsi->namaxxpropinsi = '';
	
		return $propinsi;
	}
	
	
	
}
