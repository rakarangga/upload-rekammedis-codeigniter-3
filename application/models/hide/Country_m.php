<?php
class Country_m extends MY_Model {
	protected $_table_nama = 'tbl_countries';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'idcountries';
	protected $_order_by = 'country_code';
	protected $_sort = 'ASC';
	protected $_timepost = '';
	protected $_timeedit='';
	public $rules = array (
	    	
	    'country_code' => array (
	        'field' => 'country_code',
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
	    'country_name' => array (
	        'field' => 'country_name',
	        'label' => 'country',
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
		$country = new stdClass ();
		$country->country_code = '';
		$country->country_name = '';
	
		return $country;
	}
	
	
	
}
