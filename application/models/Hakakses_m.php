<?php
class Hakakses_m extends MY_Model {
	protected $_table_nama = 't_acs_nm';
	
	protected $_timestamp = TRUE;
	public $rules = array (
			'an_id' => array (
					'field' => 'an_id',
					'label' => 'Kode',
					'rules' => 'required|callback__unique_id|xss_clean',
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
					'rules' => 'trim|required|xss_clean',
					'errors' => array (
							'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>' 
					) 
			),
	);
	public function get_new() {
		$hakakses = new stdClass ();
		$hakakses->an_id = '';
		$hakakses->an_name = '';
		return $hakakses;
	}
	
	public function hapus($id)
	{
	    // hapus halaman
	    parent::hapus($id);
	}
}
