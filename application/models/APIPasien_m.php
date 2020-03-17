<?php
class APIPasien_m extends MY_Model
{
	protected $_table_nama = 't_pasien';
	protected $_primary_key = 'id';
	protected $_order_by = 't_pasien.modified';
	protected $_timePost = 'created';
	protected $_timeedit = 'modified';
	protected $_timestamp = TRUE;
	protected $_userTag = TRUE;



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

	public function get_pasien_with_berkas($norm = NULL, $api = TRUE)
	{
		$this->load->model('APIBerkas_m');
		if ($norm) {
			$this->db->where('norm', $norm);
		}
		$this->db->where('stts', 1);
		$rows =  parent::get(NULL, FALSE, $api);
		$arr = [];
		foreach ($rows as $row) {
			$berkas = [];
			$berkas = $this->APIBerkas_m->get_berkas_by_pasien(encrypting($row['id']));
			$data['id'] = encrypting($row['id']);
			$data['nomor_rm'] = $row['norm'];
			$data['nama'] = $row['namapasien'];
			$data['jenis_kelamin'] = $row['jeniskelamin'];
			$data['tgl_rm'] = $row['tgl_directory'];
			$data['berkas'] = $berkas == null ? "-" : $berkas;
			$arr[] = $data;
		}
		return $arr;
	}
}
