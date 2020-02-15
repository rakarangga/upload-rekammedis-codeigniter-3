<?php
class Itemdetail_m extends MY_Model {
	protected $_table_nama = 'tblitemdom';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'iditemdom';
	protected $_order_by = 'idusers';
	protected $_timepost = '';
	protected $_timeedit='';
	public $rules = array(
	    'namaitem' => array(
	        'field' => 'namaitem',
	        'label' => 'Nama Detail Item',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'currency' => array(
	        'field' => 'currency',
	        'label' => 'Currency Detail Item',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'priceitem' => array(
	        'field' => 'priceitem',
	        'label' => 'Price Detail Item',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    
	    'qty' => array(
	        'field' => 'qty',
	        'label' => 'Qty Detail Item',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    
	    'totalprice' => array(
	        'field' => 'totalprice',
	        'label' => 'Total Price Detail Item',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array(
	            'required' => '  <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	     

	);
}
