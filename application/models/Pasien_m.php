<?php
class Pasien_m extends MY_Model
{
	protected $_table_nama = 't_pasien';
	protected $_primary_key = 'id';
	protected $_order_by = 't_pasien.modified';
	protected $_timePost = 'created';
	protected $_timeedit = 'modified';
	protected $_timestamp = TRUE;
	protected $_userTag = TRUE;

	//Var untuk datatable Ajax
	protected $_order_column = array(null, null, 'norm', 'namapasien', 'jeniskelamin', null, null);
	protected $_select_column = array('*');


	public $rules = array(
		'namapasien' => array(
			'field' => 'namapasien',
			'label' => 'Nama Pasien',
			'rules' => 'trim|required|xss_clean',
			'errors' => array(
				'required' => '*<strong>%s</strong> Harus diisi.'
			)
		),
		'jeniskelamin' => array(
			'field' => 'jeniskelamin',
			'label' => 'Jenis Kelamin',
			'rules' => 'trim|required|xss_clean',
			'errors' => array(
				'required' => '*<strong>%s</strong> Harus diisi.'
			)
		),
		'iddirectory' => array(
			'field' => 'iddirectory',
			'label' => 'Direktori',
			'rules' => 'trim|required|xss_clean',
			'errors' => array(
				'required' => '*<strong>%s</strong> Harus diisi.'
			)
		),
		'tgl_directory' => array(
			'field' => 'tgl_directory',
			'label' => 'Tanggal Direktori',
			'rules' => 'trim|required|xss_clean',
			'errors' => array(
				'required' => '*<strong>%s</strong> Harus diisi.'
			)
		),
		'norm' => array(
			'field' => 'norm',
			'label' => 'Nomor Rekam Medis',
			'rules' => 'trim|required|xss_clean|callback__unique_norm',
			'errors' => array(
				'required' => '*<strong>%s</strong> Harus diisi.'
			)
		),
	);

	public function get_new()
	{
		$pasien = new stdClass();
		$pasien->namapasien = '';
		$pasien->norm = '';
		$pasien->jeniskelamin = '';
		$pasien->iddirectory = '';
		$pasien->tgl_directory = '';
		return $pasien;
	}
	public function get_berkas_by($id = NULL, $res_array = true)
	{
		$this->db->select('*');
		$this->db->where(array('idpasien' => $id, 'stts' => 1));
		$this->db->order_by('orderby', 'asc');
		$query = $this->db->get('t_berkas');
		return $res_array == true ? $query->result_array() : $query->result();
	}
	////////////////////////////////////////////
	// FUNCTION FOR DATATABLE AJAX MANUAL
	////////////////////////////////////////////	
	public function _getDataTable_Query($arr = NULL)
	{
		// $this->db->select('*');
		// $this->db->from('t_pasien');

		$data = $arr;
		$order_by    = $_POST['order'][0]['column'];
		$order_dir    = $_POST['order'][0]['dir'];

		if ($data['id'] != "") {
			$query = $this->data['u_an_id'] == 'super_admin' ? NULL : $this->db->where(array('id_user' => $this->session->userdata($this->_userSession)));
			if ($data['kategori'] == 'draf') {
				$query = $this->db->where_not_in('id', $this->getWhereIn());
				$query = $this->db->where(array('iddirectory' => $data['id'], 'stts' => 1));
			} elseif ($data['kategori'] == 'sampah') {
				$query = $this->db->where(array('iddirectory' => $data['id'], 'stts' => 0));
			} else {
				$query = $this->db->where(array('iddirectory' => $data['id'], 'stts' => 1));
			}
		}
		if ($_POST["search"]["value"] != "") {

			$_or_like = array(
				'namapasien' => $_POST["search"]["value"],
				'norm' => $_POST["search"]["value"],
			);
			// $this->db->where(array('iddirectory' => $data['id'], 'stts' => 1));
			$query = $this->db->group_start();
			$query = $this->db->like('jeniskelamin', $_POST["search"]["value"]);
			$query = $this->db->or_like($_or_like);
			$query = $this->db->group_end();
		}

		if ($order_by != "") {
			$query = $this->db->order_by($this->order_column[$order_by], $order_dir);
		} else {
			$query = $this->db->order_by($this->_order_by, $this->_sort);
		}

		$query = $this->db->select($this->_select_column);
		return $query;
	}


	public function getDataTables($arr)
	{
		$data = $arr;
		$this->_getDataTable_Query($arr);
		if ($_POST["length"] != -1) {
			$query = $this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get($this->_table_nama);
		return $query->result();
	}

	public function getFiltered($arr)
	{
		$this->_getDataTable_Query($arr);
		$query = $this->db->get($this->_table_nama);
		return $query->num_rows();
	}

	public function getAllData($arr)
	{
		$this->db->select('*');
		if ($arr['id'] != NULL) {
			$this->db->where('iddirectory', $arr['id']);
			$this->data['u_an_id'] == 'super_admin' ? NULL : $this->db->where(array('id_user' => $this->session->userdata($this->_userSession)));
		}
		$this->db->get($this->_table_nama);
		return $this->db->count_all_results();
	}
	public function getWhereIn()
	{
		$this->load->model('Berkas_m');
		$datas = $this->Berkas_m->get();
		// Jika catagorie Tidak 0 Tampilkan Judul
		$arr = array(0 => 0);
		if (count($datas)) {

			foreach ($datas as $data) :
				$arr[] = $data->idpasien;
			endforeach;
		}
		return $arr;
	}
	////////////////////////////////////////////
	// END FUNCTION FOR DATATABLE AJAX
	////////////////////////////////////////////
	public function edit_status($id)
	{
		$stts = $this->db->where(array('id' => $id, 'stts' => '1'))->get($this->_table_nama)->result_array();
		// Reset parent Homepage
		$stts = $stts
			? $this->db->set(array('stts' => '0'))->where('id', $id)->update($this->_table_nama)
			: $this->db->set(array('stts' => '1'))->where('id', $id)->update($this->_table_nama);
	}

	public function getWithSession($id)
	{

		$this->db->where(array('iddirectory' => $id));
		$this->data['u_an_id'] == 'super_admin' ? NULL : $this->db->where(array('id_user' => $this->session->userdata($this->_userSession)));
		$result = $this->db->get($this->_table_nama)->result_array();
		return $result;
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
				$arr[$hakakses->id . ':' . $hakakses->an_id] = $hakakses->an_name;
			endforeach;
		}
		return $arr;
	}

	public function hapus($id)
	{
		// hapus halaman
		parent::hapus($id);
	}




	/////////////////////////////
	/// WITH LIBRARY DATATABLE 
	//////////////////////////////
	// public function getDatatable_init($id = NULL)
	// {
	// 	$dt_pasien = $this->datatables->init();
	// 	$dt_pasien->select('*')->from($this->_table_nama);
	// 	if ($id) {
	// 		$dt_pasien->where(array('iddirectory' => $id));
	// 		$this->data['u_an_id'] == 'super_admin' ? NULL : $dt_pasien->where(array('id_user' => $this->session->userdata($this->_userSession)));
	// 	}

	// 	// $this->db->order_by($this->_order_by, $this->_sort);
	// 	// $dt_pasien->set_order_by($this->_order_by, $this->_sort);
	// 	$dt_pasien->style(array('class' => 'table table-hover table-striped',));
	// 	//if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"])) {
	// 	$dt_pasien->column(
	// 		form_checkbox('btn_chk_all', " ", FALSE, 'class="icheckbox_flat-green checkall"'),
	// 		'chk_all',
	// 		function ($data, $row) {
	// 			$is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"]) ? form_checkbox('check_id[]', $row['id'], FALSE, 'class="icheckbox_flat-green chk"') . '<filedset>' : '<filedset>';
	// 			return form_checkbox('check_id[]', $row['id'], FALSE, 'class="icheckbox_flat-green chk"') . '<filedset>';
	// 		}
	// 	);
	// 	//}
	// 	$dt_pasien->column(
	// 		' ',
	// 		'icon_dire',
	// 		function ($data, $row) {
	// 			return '<span class="fa fa-file"></span> ';
	// 		}
	// 	);

	// 	if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) {
	// 		$dt_pasien->column(
	// 			'No. RM',
	// 			'norm',
	// 			function ($data, $row) {
	// 				return anchor('backoffice/pasien/list_berkas/' . encrypting($row['id']), $row['norm']);
	// 			}
	// 		);
	// 	} else {
	// 		$dt_pasien->column(
	// 			'No. RM',
	// 			'norm',
	// 			function ($data, $row) {
	// 				return $row['norm'];
	// 			}
	// 		);
	// 	};

	// 	$dt_pasien->column(
	// 		'Nama Pasien',
	// 		'namapasien',
	// 		function ($data, $row) {
	// 			return strtoupper($row['namapasien']);
	// 		}
	// 	);

	// 	$dt_pasien->column(
	// 		'Jenis Kelamin',
	// 		'jeniskelamin',
	// 		function ($data, $row) {
	// 			return strtoupper($row['jeniskelamin']);
	// 		}
	// 	);

	// 	if ($this->data['u_an_id'] == 'super_admin') {
	// 		$dt_pasien->column(
	// 			'Nama User',
	// 			'id_user',
	// 			function ($data, $row) {
	// 				$id = $row['id_user'];
	// 				$nama_user = $this->Settuser_m->get($id);
	// 				return $nama_user->namalengkap;
	// 			}
	// 		);
	// 	}
	// 	$dt_pasien->column(
	// 		'',
	// 		'aksi',
	// 		function ($data, $row) {
	// 			$is_edit =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"]) ? btn_koreksi_icon('backoffice/pasien/list_berkas/' . encrypting($row['id'])) : '';
	// 			$is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"]) ? btn_hapus_icon('pasien/hapus/' . encrypting($row['id'])) : '';
	// 			return '<div class="btn-group">' . $is_edit . $is_delete . '</div>';
	// 		}
	// 	);

	// 	//option
	// 	$dt_pasien->set_options('searching', 'true')      // searching : false
	// 		->set_options('order', '[]')      // searching : false
	// 		// ->set_options('ajax.data', "d.dt_id = 'simple'")
	// 		// ->set_options('lengthMenu', '[ 10, 25, 50, 75, 100 ]')
	// 		->set_options('bLengthChange', "false")
	// 		->set_options('columnDefs', '[
	// 			{
	// 			"targets": [0], //kolom ceklis
	// 			"orderable": false,
	// 			"className": "text-left",
	// 			"width": "4%"
	// 			},{ 
	// 			"targets": [1], //kolom icon
	// 			"orderable": false,
	// 			"className": "text-center",
	// 			"width": "4%"
	// 			},{
	// 			/* "targets": [4], //kolom user upload
	// 			"orderable": false,
	// 			},{ */
	// 			"targets": [5], //kolom aksi
	// 			"orderable": false,
	// 			}]')
	// 		->searchable('norm, namapasien', 'jeniskelamin');

	// 	$this->datatables->create('dt_pasien', $dt_pasien);
	// }
	/////////////////////////////
	/// END WITH LIBRARY DATATABLE 
	//////////////////////////////

}
