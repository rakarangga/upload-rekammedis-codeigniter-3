<?php
class Accescontrol_m extends MY_Model {
	protected $_table_nama = 't_acs_ctrl';
	protected $_timestamp = TRUE;
	public $rules = array (
	    	
	    'ac_an_id' => array (
	        'field' => 'ac_an_id',
	        'label' => 'Hak Akses',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'ac_module_id' => array (
	        'field' => 'ac_module_id',
	        'label' => 'Menu',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    ),
	    'ac_create' => array (
	        'field' => 'ac_create',
	        'label' => 'Dapat Menambah',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	
	    ),
	    'ac_edit' => array (
	        'field' => 'ac_edit',
	        'label' => 'Dapat Mengedit',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	
	    ),
	    'ac_delete' => array (
	        'field' => 'ac_delete',
	        'label' => 'Dapat Menghapus',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    
	    ),
	    'ac_view' => array (
	        'field' => 'ac_view',
	        'label' => 'Dapat Melihat',
	        'rules' => 'trim|required',
	        'errors' => array (
	            'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
	        )
	    
	    )
	);

	public function get_new() {
		$accescontrol = new stdClass ();
		$accescontrol->ac_an_id = '';
		$accescontrol->ac_accescontrol_id = '';
		$accescontrol->ac_create= '';
		$accescontrol->ac_edit= '';
		$accescontrol->ac_delete= '';
		$accescontrol->ac_view= '';
		return $accescontrol;
	}
	
	public function get_with_module($id = NULL, $single = FALSE)
	{
	    $this->db->select('t_acs_ctrl.*, m.mod_modulename as mod_menu, m.mod_moduleid as mod_id');
	    $this->db->join('t_module as m', 't_acs_ctrl.ac_module_id = m.mod_moduleid', 'left');
	    return parent::get($id, $single);
	}

	public function acsControl($id = NULL, $single = FALSE) {
	    $this->db->select('ac_module_id, ac_create,ac_edit,ac_delete,ac_view');
	    $this->db->where('ac_an_id', $this->session->userdata('u_an_id'));
	
	    return parent::get($id, $single);
	}

	public function get_drowpdown_hakakses()
	{
	
	    $this->load->model('Hakakses_m');
	    $hakaksess = $this->Hakakses_m->get();
	
	    // Jika catagorie Tidak 0 Tampilkan Judul
	    $arr = array(
	        0 => 'Tidak Menggunakan Hak Akses'
	    );
	    if (count($hakaksess)) {
	        foreach ($hakaksess as $hakakses) :
	        $arr[$hakakses->an_id] = $hakakses->an_name;
	        endforeach;
	    }
	    return $arr;
	}
	
	public function get_drowpdown_module()
	{
	
	    $this->load->model('Module_m');
	    $modules = $this->Module_m->get();
	
	    // Jika catagorie Tidak 0 Tampilkan Judul
	    $arr = array(
	        0 => 'Tidak Menggunakan Module'
	    );
	    if (count($modules)) {
	        foreach ($modules as $module) :
	        $arr[$module->mod_moduleid] = $module->mod_modulename.' ('.$module->mod_moduleid.')';
	        endforeach;
	    }
	    return $arr;
	}
	
}
