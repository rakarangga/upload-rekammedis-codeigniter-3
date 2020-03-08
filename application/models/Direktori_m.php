<?php
class Direktori_m extends MY_Model
{
	protected $_table_nama = 't_directory';
	protected $_primary_key = 'id';
	protected $_order_by = 't_directory.modified';
	protected $_timePost = 'created';
	protected $_timeedit = 'modified';
	protected $_timestamp = TRUE;
	protected $_userTag = TRUE;

	//Var untuk datatable Ajax
	protected $_order_column = array(null, null, 'namadirectory', 'tgldirectory', null, null, null, null);
	protected $_select_column = array('*');


	public $rules = array(

		'namalengkap' => array(
			'field' => 'namalengkap',
			'label' => 'Nama Lengkap',
			'rules' => 'trim|required|xss_clean',
			'errors' => array(
				'required' => '<script>
										$(document).ready(function() {
											$.toast({
												heading: "Error",
												text: "<strong>%s</strong> Harus diisi.",
												showHideTransition: "fade",
												icon: "error",
												hideAfter: 5000,
											})
										});
										</script>'
			)
		),
		'namauser' => array(
			'field' => 'namauser',
			'label' => 'Username',
			'rules' => 'trim|required|xss_clean',
			'errors' => array(
				'required' => '<script>
										$(document).ready(function() {
											$.toast({
												heading: "Error",
												text: "<strong>%s</strong> Harus diisi.",
												showHideTransition: "fade",
												icon: "error",
												hideAfter: 5000,
											})
										});
										</script>'
			)
		),
		'nomorhp' => array(
			'field' => 'nomorhp',
			'label' => 'Nomor Handphone',
			'rules' => 'trim|required|xss_clean',
			'errors' => array(
				'required' => '<script>
									$(document).ready(function() {
										$.toast({
											heading: "Error",
											text: "<strong>%s</strong> Harus diisi.",
											showHideTransition: "fade",
											icon: "error",
											hideAfter: 5000,
										})
									});
									</script>'
			)
		),
		'iduserlevel' => array(
			'field' => 'iduserlevel',
			'label' => 'Hak Akses',
			'rules' => 'trim|required|xss_clean',
			'errors' => array(
				'required' => '<script>
									$(document).ready(function() {
										$.toast({
											heading: "Error",
											text: "<strong>%s</strong> Harus Dipilih.",
											showHideTransition: "fade",
											icon: "error",
											hideAfter: 5000,
										})
									});
									</script>'
			)
		),
		'userpass' => array(
			'field' => 'userpass',
			'label' => 'Password',
			'rules' => 'trim|matches[u_pass_confirm]',
			'errors' => array(
				'required' => '<script>
										$(document).ready(function() {
											$.toast({
												heading: "Error",
												text: "<strong>%s</strong> Harus diisi.",
												showHideTransition: "fade",
												icon: "error",
												hideAfter: 5000,
											})
										});
										</script>',
				'matches' => '<script>
										$(document).ready(function() {
											$.toast({
												heading: "Error",
												text: "<strong>%s</strong> Tidak Sama.",
												showHideTransition: "fade",
												icon: "error",
												hideAfter: 5000,
											})
										});
										</script>'
			)

		),
		'u_pass_confirm' => array(
			'field' => 'u_pass_confirm',
			'label' => 'Konfirmasi Password',
			'rules' => 'trim|matches[userpass]',
			'errors' => array(
				'required' => '<script>
										$(document).ready(function() {
											$.toast({
												heading: "Error",
												text: "<strong>%s</strong> Harus diisi.",
												showHideTransition: "fade",
												icon: "error",
												hideAfter: 5000,
											})
										});
										</script>',
				'matches' => '<script>
										$(document).ready(function() {
											$.toast({
												heading: "Error",
												text: "<strong>%s</strong> Tidak Sama.",
												showHideTransition: "fade",
												icon: "error",
												hideAfter: 5000,
											})
										});
										</script>'
			)

		),
		'logo' => array(
			'field' => 'logo',
			'label' => 'Foto Upload',
			'rules' => 'trim',
			'errors' => array(
				'required' => '<script>
										$(document).ready(function() {
											$.toast({
												heading: "Error",
												text: "<strong>%s</strong> Harus diisi.",
												showHideTransition: "fade",
												icon: "error",
												hideAfter: 5000,
											})
										});
										</script>'
			)

		)
	);

	public function get_new()
	{
		$directory = new stdClass();

		$directory->u_name_l = '';
		$directory->u_name = '';
		$directory->email = '';
		$directory->no_hp = '';
		$directory->u_pass = '';
		$directory->u_an_id = '';
		$directory->stts = '';
		return $directory;
	}
	public function hash($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
	/////////////////////////////
	/// WITH LIBRARY DATATABLE 
	//////////////////////////////
	public function getDatatable_init()
	{
		$dt_direktori = $this->datatables->init();
		$dt_direktori->select('*')->from($this->_table_nama);
		$dt_direktori->style(array('class' => 'table table-hover table-striped',));
		//if (authorize($_SESSION["access"]["manajemen_berkas"]["direktori"]["ac_delete"])) {
		$dt_direktori->column(
			form_checkbox('btn_chk_all', " ", FALSE, 'class="icheckbox_flat-green checkall"'),
			'chk_all',
			function ($data, $row) {
				$is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["direktori"]["ac_delete"]) ? form_checkbox('check_id[]', $row['id'], FALSE, 'class="icheckbox_flat-green chk"') . '<filedset>' : '<filedset>';
				return $is_delete;
			}
		);
		//}
		$dt_direktori->column(
			'<span class="fa fa-folder"></span> ',
			'icon_dire',
			function ($data, $row) {
				return '<span class="fa fa-folder"></span> ';
			}
		);

		if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) {
			$dt_direktori->column(
				'Direktori / Tanggal Berkas',
				'namadirectory',
				function ($data, $row) {
					return anchor('backoffice/berkas/list_berkas/' . encrypting($row['id']), $row['namadirectory']);
				}
			);
		} else {
			$dt_direktori->column(
				'Direktori / Tanggal',
				'namadirectory',
				function ($data, $row) {
					return $row['namadirectory'];
				}
			);
		};

		$dt_direktori->column(
			'Terakhir diperbarui',
			'modified',
			function ($data, $row) {
				return $data;
			}
		);
		
		$dt_direktori->column(
			'',
			'aksi',
			function ($data, $row) {
				$is_edit =  authorize($_SESSION["access"]["manajemen_berkas"]["direktori"]["ac_edit"]) ? btn_koreksi_icon('backoffice/berkas/list_berkas/' . encrypting($row['id'])) : '';
				$is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["direktori"]["ac_delete"]) ? btn_hapus_icon('berkas/hapus/' . encrypting($row['id'])) : '';
				return '<div class="btn-group">' . $is_edit . $is_delete . '</div>';
			}
		);

		//option
		$dt_direktori->set_options('searching', 'true')      // searching : false
			->set_options('order', '[]')      // searching : false
			->set_options('ajax.data', "d.dt_id = 'simple'")
			// ->set_options('lengthMenu', '[ 10, 25, 50, 75, 100 ]')
			->set_options('bLengthChange', "false")
			->set_options('columnDefs', '[
				{
				"targets": [0], //kolom ceklis
				"orderable": false,
				"className": "text-left",
				"width": "4%"
				},{ 
				"targets": [1], //kolom icon
				"orderable": false,
				"className": "text-left",
				"width": "4%"
				},{
				"targets": [4], //kolom aksi
				"orderable": false,
				},]')
			->searchable('namadirectory, modified');

		$this->datatables->create('dt_direktori', $dt_direktori);
	}

	////////////////////////////////////////////
	// FUNCTION FOR DATATABLE AJAX MANUAL
	////////////////////////////////////////////	
	public function getDataTable_Query()
	{
		$this->db->select($this->_select_column);
		$this->_or_like = array(
			$this->_table_nama . '.namadirectory' => $_POST["search"]["value"],
			$this->_table_nama . '.tgldirectory' => $_POST["search"]["value"],
		);
		// $this->db->join('t_acs_nm as b', $this->_table_nama.'.iduserlevel = b.id', 'left');
		$columnIndex = $_POST['order'][0]['column']; // Column index

		if (isset($_POST["search"]["value"])) {
			$this->db->or_like($this->_or_like, false);
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$columnIndex], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by($this->_order_by, $this->_sort);
		}
	}

	public function getDataTable()
	{
		$this->getDataTable_Query();
		if ($_POST["length"] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get($this->_table_nama);
		return $query->result();
	}

	public function getFiltered()
	{
		$this->getDataTable_Query();
		$query = $this->db->get($this->_table_nama);
		return $query->num_rows();
	}

	public function getAllData()
	{
		$this->db->select('*');
		$this->db->get($this->_table_nama);
		return $this->db->count_all_results();
	}

	////////////////////////////////////////////
	// END FUNCTION FOR DATATABLE AJAX
	////////////////////////////////////////////

	public function edit_status($id)
	{
		$stts = $this->db->where(array('iduser' => $id, 'stts' => '1'))->get($this->_table_nama)->result_array();
		// Reset parent Homepage
		$stts = $stts
			? $this->db->set(array('stts' => '0'))->where('iduser', $id)->update($this->_table_nama)
			: $this->db->set(array('stts' => '1'))->where('iduser', $id)->update($this->_table_nama);
		//print_r($sosmeds);
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

	public function get_dropdown_tahun()
	{

		// $this->load->model('Hakakses_m');
		$this->db->select('YEAR(tgldirectory) as year, id');
		$this->db->group_by("year");
		$querys = $this->db->get($this->_table_nama)->result();
		// dump($querys);
		// Jika catagorie Tidak 0 Tampilkan Judul
		$arr = array(
			0 => 'Tahun'
		);
		if (count($querys)) {
			foreach ($querys as $query) :
				$arr[encrypting($query->year)] = $query->year;
			endforeach;
		}
		return $arr;
	}


	public function get_dropdown_tanggal()
	{

		// $this->load->model('Hakakses_m');
		$this->db->select('tgldirectory');
		// $this->db->group_by("year"); 
		$querys = $this->db->get($this->_table_nama)->result();
		// dump($querys);
		// Jika catagorie Tidak 0 Tampilkan Judul
		$arr = array(
			0 => 'Select Tanggal'
		);
		if (count($querys)) {
			foreach ($querys as $query) :
				$arr[encrypting($query->tgldirectory)] = $query->tgldirectory;
			endforeach;
		}
		return $arr;
	}
	public function hapus($id)
	{
		// hapus halaman
		parent::hapus($id);
	}
}
