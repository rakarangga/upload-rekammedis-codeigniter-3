<?php
class APIBerkas_m extends MY_Model
{
	protected $_table_nama = 't_berkas';
	protected $_primary_key = 'id';
	protected $_order_by = 't_berkas.orderby';
	protected $_sort = 'ASC';
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

	public function get_berkas_by_pasien($id)
	{
		$this->db->select('*');
		$this->db->where(array('idpasien' => decrypting($id), 'stts' => 1));
		$this->db->order_by('orderby', 'asc');
		$rows = $this->db->get('t_berkas')->result_array();
		$arr = array();
		foreach ($rows as $row) {
			$url = file_exists(FCPATH.$row['namaberkas']) ? base_url(str_replace('./assets','assets',$row['namaberkas'])) :  base_url('/assets/dist/img/user.png');
			$pathinfo = pathinfo(base_url($row['namaberkas']));
			$data['id'] = encrypting($row['id']);
			$data['namaberkas'] = $pathinfo['basename'];
			$data['url'] = $url;
			$arr[] = $data;
		}
		return $arr;
	}


}
