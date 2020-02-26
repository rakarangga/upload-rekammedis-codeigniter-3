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
	protected $_order_column = array(null, null, 'namalengkap', 'namauser', 'email', null, null, null);
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
		$pasien = new stdClass();

		$pasien->u_name_l = '';
		$pasien->u_name = '';
		$pasien->email = '';
		$pasien->no_hp = '';
		$pasien->u_pass = '';
		$pasien->u_an_id = '';
		$pasien->stts = '';
		return $pasien;
	}
	public function hash($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}


	/////////////////////////////
	/// WITH LIBRARY DATATABLE 
	//////////////////////////////
	public function getDatatable_init($id = NULL)
	{
		$dt_pasien = $this->datatables->init();
		$dt_pasien->select('*')->from($this->_table_nama);
		if ($id) {
			$dt_pasien->where(array('iddirectory' => $id));
			$this->data['u_an_id'] == 'super_admin' ? NULL : $dt_pasien->where(array('id_user' => $this->session->userdata($this->_userSession)));
		}
		$dt_pasien->style(array('class' => 'table table-hover table-striped',));
		//if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"])) {
		$dt_pasien->column(
			form_checkbox('btn_chk_all', " ", FALSE, 'class="icheckbox_flat-green checkall"'),
			'chk_all',
			function ($data, $row) {
				$is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"]) ? form_checkbox('check_id[]', $row['id'], FALSE, 'class="icheckbox_flat-green chk"') . '<filedset>' : '<filedset>';
				return $is_delete;
			}
		);
		//}
		$dt_pasien->column(
			' ',
			'icon_dire',
			function ($data, $row) {
				return '<span class="fa fa-file"></span> ';
			}
		);

		if (authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"])) {
			$dt_pasien->column(
				'No. RM',
				'namadirectory',
				function ($data, $row) {
					return anchor('backoffice/pasien/list_berkas/' . encrypting($row['id']), $row['norm']);
				}
			);
		} else {
			$dt_pasien->column(
				'No. RM',
				'namadirectory',
				function ($data, $row) {
					return $row['norm'];
				}
			);
		};

		$dt_pasien->column(
			'Nama Pasien',
			'namapasien',
			function ($data, $row) {
				return strtoupper($row['namapasien']);
			}
		);

		$dt_pasien->column(
			'Jenis Kelamin',
			'jeniskelamin',
			function ($data, $row) {
				return strtoupper($row['jeniskelamin']);
			}
		);

		if ($this->data['u_an_id'] == 'super_admin') {
			$dt_pasien->column(
				'Nama User',
				'id_user',
				function ($data, $row) {
					$id = $row['id_user'];
					$nama_user = $this->Settuser_m->get($id);
					return $nama_user->namalengkap;
				}
			);
		}
		// $dt_pasien->column(
		// 	'Terakhir diperbarui',
		// 	'modified',
		// 	function ($data, $row) {
		// 		return $data;
		// 	}
		// );

		$dt_pasien->column(
			'',
			'aksi',
			function ($data, $row) {
				$is_edit =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_edit"]) ? btn_koreksi_icon('backoffice/pasien/list_berkas/' . encrypting($row['id'])) : '';
				$is_delete =  authorize($_SESSION["access"]["manajemen_berkas"]["berkas"]["ac_delete"]) ? btn_hapus_icon('pasien/hapus/' . encrypting($row['id'])) : '';
				return '<div class="btn-group">' . $is_edit . $is_delete . '</div>';
			}
		);

		//option
		$dt_pasien->set_options('searching', 'true')      // searching : false
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
				"className": "text-center",
				"width": "4%"
				},{
				/* "targets": [4], //kolom user upload
				"orderable": false,
				},{ */
				"targets": [5], //kolom aksi
				"orderable": false,
				}]')
			->searchable('norm, namapasien', 'jeniskelamin');

		$this->datatables->create('dt_pasien', $dt_pasien);
	}
	/////////////////////////////
	/// END WITH LIBRARY DATATABLE 
	//////////////////////////////

	public function edit_status($id)
	{
		$stts = $this->db->where(array('iduser' => $id, 'stts' => '1'))->get($this->_table_nama)->result_array();
		// Reset parent Homepage
		$stts = $stts
			? $this->db->set(array('stts' => '0'))->where('iduser', $id)->update($this->_table_nama)
			: $this->db->set(array('stts' => '1'))->where('iduser', $id)->update($this->_table_nama);
		//print_r($sosmeds);
	}

	public function getWithSession($id)
	{

		$this->db->where(array('iddirectory' => $id));
		$this->data['u_an_id'] == 'super_admin' ? NULL : $this->db->where(array('id_user' => $this->session->userdata($this->_userSession)));
		$result = $this->db->get($this->_table_nama)->result_array();
		// Reset parent Homepage
		// $stts = $stts
		// 	? $this->db->set(array('stts' => '0'))->where('iduser', $id)->update($this->_table_nama)
		// 	: $this->db->set(array('stts' => '1'))->where('iduser', $id)->update($this->_table_nama);
		//print_r($sosmeds);
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
}
