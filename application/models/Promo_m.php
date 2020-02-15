<?php

class Promo_m extends MY_Model
{

    protected $_table_nama = 't_promoslider';

    protected $_timestamp = TRUE;

    public $rules = array(
        'judul' => array(
            'field' => 'judul',
            'label' => 'Judul',
            'rules' => 'trim|max_length[100]|required|xss_clean',
            'errors' => array(
                'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                   </button>
                   <strong>%s</strong> Harus Di isi.
                   </div>'
            )
        ),
        'url' => array(
            'field' => 'url',
            'label' => 'URL',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        ),
        
        'gambar' => array(
            'field' => 'gambar',
            'label' => 'gambar',
            'rules' => 'trim|xss_clean'
        ),
        
        'status' => array(
            'field' => 'status',
            'label' => 'Status',
            'rules' => 'trim',
            'errors' => array(
                'required' => '  <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>%s</strong> Harus Di isi.
              </div>'
            )
        )
        
    );

    public function get_new()
    {
        $promo = new stdClass();
        $promo->judul = '';
        $promo->link = '';
        $promo->ket = '';
        $promo->gambar = './assets/img_noimg/noimg_iklan.jpg';
        $promo->status = 'Y';
        return $promo;
    }

    public function get_nested()
    {
        $promos = $this->db->where('status', 'Y')
        ->get('t_promoslider')
        ->result_array();
    
        $array = array();
        foreach ($promos as $promo) {
            $array[$promo['id']] = $promo;
        }
        return $array;
    }
    
public function edit_status($id)
	{
		$stts = $this->db->where(array('id'=>$id,'status'=>'Y'))->get($this->_table_nama)->result_array();
        // Reset parent Homepage
        $stts = $stts
        ? $this->db->set(array( 'status' => 'N'))->where('id', $id)->update($this->_table_nama)
        : $this->db->set(array('status' => 'Y'))->where('id', $id)->update($this->_table_nama);
        //print_r($sosmeds);
	}

    public function hapus($id)
    {
        // hapus halaman
        parent::hapus($id);
    }
}
