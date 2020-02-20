<?php
class Berkas_m extends MY_Model {
	protected $_table_nama = 't_berkas';
	protected $_primary_key = 'id';
	protected $_order_by = 't_berkas.modified';
	protected $_timePost = 'created';
	protected $_timeedit='modified';
	protected $_timestamp = TRUE;
	protected $_userTag= TRUE;

	//Var untuk datatable Ajax
	protected $_order_column = array(null,null,'namalengkap', 'namauser','email', null, null, null);
	protected $_select_column = array('*');
	
	
	public $rules = array (
			
			'namalengkap' => array (
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
			'namauser' => array (
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
			'nomorhp' => array (
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
			'iduserlevel' => array (
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
			'userpass' => array (
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
						'matches' =>'<script>
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
			'u_pass_confirm' => array (
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
						'matches' =>'<script>
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
			'logo' => array (
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
	
	public function get_new() {
		$berkas = new stdClass ();
		
		$berkas->u_name_l = '';
		$berkas->u_name = '';
		$berkas->email = '';
		$berkas->no_hp = '';
		$berkas->u_pass = '';
		$berkas->u_an_id = '';
		$berkas->stts = '';
		return $berkas;
	}
	public function hash($string) {
		return hash ( 'sha512', $string . config_item ( 'encryption_key' ) );
	}
	


////////////////////////////////////////////
// FUNCTION FOR DATATABLE AJAX
////////////////////////////////////////////	
	public function getDataTable_Query() {
		$this->db->select($this->_select_column);
		$this->_or_like = array(
			$this->_table_nama.'.namalengkap' => $_POST["search"]["value"], 
			$this->_table_nama.'.email' => $_POST["search"]["value"], 
			$this->_table_nama.'.namauser'=> $_POST["search"]["value"],
			'b.an_name'=> $_POST["search"]["value"],
		);
		$this->db->join('t_acs_nm as b', $this->_table_nama.'.iduserlevel = b.id', 'left');
        $columnIndex = $_POST['order'][0]['column']; // Column index
	
		if(isset($_POST["search"]["value"]))
		{
			$this->db->or_like($this->_or_like,false);
		}
		if(isset($_POST["order"]))
		{
			$this->db->order_by($this->order_column[$columnIndex], $_POST['order']['0']['dir']);
			
		}else{
			$this->db->order_by($this->_order_by,$this->_sort);
		}
	}
	
	public function getDataTable() {
        $this->getDataTable_Query();
		if($_POST["length"] != -1)
		{
			$this->db->limit($_POST['length'],$_POST['start']);
		}
		$query = $this->db->get($this->_table_nama);
		return $query->result();
	}

    public function getFiltered(){
		$this->getDataTable_Query();
		$query = $this->db->get($this->_table_nama);
		return $query->num_rows();
	}

	public function getAllData(){
		$this->db->select('*');
		$this->db->get($this->_table_nama);
		return $this->db->count_all_results();
	}

////////////////////////////////////////////
// END FUNCTION FOR DATATABLE AJAX
////////////////////////////////////////////

	public function edit_status($id)
	{
		$stts = $this->db->where(array('iduser'=>$id,'stts'=>'1'))->get($this->_table_nama)->result_array();
        // Reset parent Homepage
        $stts = $stts
        ? $this->db->set(array( 'stts' => '0'))->where('iduser', $id)->update($this->_table_nama)
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
			$arr[$hakakses->id.':'.$hakakses->an_id] = $hakakses->an_name;
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
