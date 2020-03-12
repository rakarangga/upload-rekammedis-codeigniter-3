<?php
class Berkas_m extends MY_Model
{
	protected $_table_nama = 't_berkas';
	protected $_primary_key = 'id';
	protected $_order_by = 't_berkas.modified';
	protected $_timePost = 'created';
	protected $_timeedit = 'modified';
	protected $_timestamp = TRUE;
	protected $_userTag = TRUE;

	//Var untuk datatable Ajax
	protected $_order_column = array(null, null, 'namalengkap', 'namauser', 'email', null, null, null);
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
	);

	public function get_new()
	{
		$berkas = new stdClass();

		$berkas->u_name_l = '';
		$berkas->u_name = '';
		$berkas->email = '';
		$berkas->no_hp = '';
		$berkas->u_pass = '';
		$berkas->u_an_id = '';
		$berkas->stts = '';
		return $berkas;
	}
	public function hash($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}





	public function edit_status($id)
	{
		$stts = $this->db->where(array('iduser' => $id, 'stts' => '1'))->get($this->_table_nama)->result_array();
		// Reset parent Homepage
		$stts = $stts
			? $this->db->set(array('stts' => '0'))->where('iduser', $id)->update($this->_table_nama)
			: $this->db->set(array('stts' => '1'))->where('iduser', $id)->update($this->_table_nama);
		//print_r($sosmeds);
	}

	public function HapusBerkas($id)
	{
		$filter = $this->_primary_filter;
		$id = $filter($id);
		if (!$id) {
			return FALSE;
		}
		$this->_deleteFile(array('idpasien'=> $id));
		// exit();
		$this->db->where('idpasien', $id);
		$this->db->delete($this->_table_nama);
	}
	
	public function GetDataBerkas_ID($arr)
	{
		return $this->db->get_where($this->_table_nama, $arr)->result();
	}

	private function _deleteFile($array)
	{
		$dt = $this->GetDataBerkas_ID($array);
	
		// $filename = explode(".", $dt['namaberkas'])[1];
		// dump($filename);
		// if ($dt['namaberkas'] != "") {
		
		// }
		$arr = array();
		foreach ($dt as $dts) :
			// $exName[] = explode(".", $dts->namaberkas)[1];
			$arr[] = glob(FCPATH . ".".explode(".", $dts->namaberkas)[1].".*")[0];
		endforeach;

		// dump($exName);	
		// dump($arr);	
		// exit();
		return array_map('unlink', $arr);
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
		$this->_deleteFile(array('id'=> $id));
		// hapus halaman
		parent::hapus($id);
	}
}
