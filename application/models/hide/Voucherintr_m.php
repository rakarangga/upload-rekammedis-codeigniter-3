<?php
class Voucherintr_m extends MY_Model {
	protected $_table_nama = 'tblvoucerintr';
	protected $_timestamp = FALSE;
	protected $_primary_key = 'tblvoucerintr.idvoucherintr';
	protected $_order_by = 'tblvoucerintr.idvoucherintr';
	protected $_timepost = '';
	protected $_timeedit='';
	


    public function get_with_join($id = NULL, $single = FALSE)
	{
	    $this->db->select('tblvoucerintr.*,tblpromointr.idvoucherintr as idvoucherpromorintr,tblpromointr.idpromointr,tblpromointr.idusers as idusers');
        $this->db->join('tblpromointr', 'tblvoucerintr.idvoucherintr = tblpromointr.idvoucherintr', 'left');
	    $this->db->where('curdate() between tblvoucerintr.startdate and tblvoucerintr.enddate');
	    $this->db->group_by('tblvoucerintr.kodevoucher');
	    return parent::get($id, $single); 
	}

   
}
