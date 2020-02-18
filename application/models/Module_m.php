<?php
class Module_m extends MY_Model {
	protected $_table_nama = 't_module';
	protected $_timestamp = TRUE;
	protected $_order_by = 'tgl_posting';
	protected $_sort ='DESC';
	public $rules = array (
	    	
	    'mod_modulegroupid' => array (
	        'field' => 'mod_modulegroupid',
	        'label' => 'Kode Menu Utama',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'mod_modulegroupname' => array (
	        'field' => 'mod_modulegroupname',
	        'label' => 'Menu Utama',
	        'rules' => 'trim|required|xss_clean',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    
	    'mod_moduleid' => array (
	        'field' => 'mod_moduleid',
	        'label' => 'Kode Submenu',
	        'rules' => 'trim|required|callback__unique_moduleid',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	
	    ),
	    'mod_modulename' => array (
	        'field' => 'mod_modulename',
	        'label' => 'Submenu',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    
		),  
		'ico' => array (
	        'field' => 'ico',
	        'label' => 'Submenu',
	        'rules' => 'trim',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    
	    ),
	    'mod_modulegrouporder' => array (
	        'field' => 'mod_modulegrouporder',
	        'label' => 'Urutan Menu Utama',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	
	    ),
	    'mod_moduleorder' => array (
	        'field' => 'mod_moduleorder',
	        'label' => 'Urutan Submenu',
	        'rules' => 'trim|required',
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
		$module = new stdClass ();
		// $module->ico = '';
		$module->mod_modulegroupid = '';
		$module->mod_modulegroupname = '';
		$module->mod_moduleid= '';
		$module->mod_modulename= '';
		$module->mod_modulegrouporder= '';
		$module->mod_moduleorder= '';
		return $module;
	}
	
	public function modulesGroup($id = NULL, $single = FALSE) {
	    $this->db->select('mod_modulegroupid, mod_modulegroupname');
	    $this->db->order_by('mod_modulegrouporder','asc');
	    $this->db->order_by('mod_moduleorder','asc');
	    $this->db->where('1 group by', 'mod_modulegroupid');
	
	    return parent::get($id, $single);
	}
	
	public function allModules($id = NULL, $single = FALSE) {
	    $this->db->select('mod_modulegroupid, mod_modulegroupname,mod_modulepagename,mod_moduleid,mod_modulename,ico');
	    $this->db->order_by('mod_modulegrouporder','ASC');
	    $this->db->order_by('mod_moduleorder','ASC');
	    
	  //  $this->db->where('1', 'mod_modulegroupid');
	
	    return parent::get($id, $single);
	}
	
	public function acsControl($id = NULL, $single = FALSE) {
	    $this->db->select('ac_module_id, ac_create,ac_edit,ac_delete,ac_view');
	    $this->db->where('ac_an_id', $this->session->userdata('u_an_id'));
	
	    return parent::get($id, $single);
	}

	public function hapus($id)
	{
	    parent::hapus($id);
	}
	
}
