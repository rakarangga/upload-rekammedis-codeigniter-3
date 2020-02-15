<?php
class Payment_m extends MY_Model {
	protected $_table_nama = 'tblpayment';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'idpayment';
	protected $_order_by = 'idpayment';
	protected $_timepost = '';
	protected $_timeedit='';
	

	public $rules = array(
	    'idmp' => array(
	        'field' => 'idmp',
	        'label' => 'Metode Pembayaran',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    )
	    ,
	    'namabank' => array(
	        'field' => 'namabank',
	        'label' => 'Nama Bank Pengguna',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    )
	    ,
	    'norek' => array(
	        'field' => 'norek',
	        'label' => 'Nomor Rekening',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    )
	    ,
	    'atasnama' => array(
	        'field' => 'atasnama',
	        'label' => 'Nama Lengkap',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    )
	    ,
	    'kerekper' => array(
	        'field' => 'kerekper',
	        'label' => 'Rekening Perusahaan',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'fotobukti' => array(
	        'field' => 'fotobukti',
	        'label' => 'Upload Foto Bukti Transfer',
	        'rules' => 'trim|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Periksa <strong>%s</strong>.
              </div>'
	        )
	    )
	
	);
	
	public $rulesTunaiVouch = array(
	    'idmp' => array(
	        'field' => 'idmp',
	        'label' => 'Metode Pembayaran',
	        'rules' => 'trim|required',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    )
	);
	

	public function get_new()
	{
	    $payment = new stdClass();
	    $payment->idmp = '';
	    $payment->namabank = '';
	    $payment->norek = '';
	    $payment->atasnama = '';
	    $payment->kerekper = '';
	    $payment->fotobukti = '';
	
	    return $payment;
	}
}
