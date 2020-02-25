<?php

class MY_Model extends CI_Model
{

    protected $_table_nama = '';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'intval';
    protected $_timePost = 'tgl_posting';
    protected $_timeedit = 'tgl_update';
    protected $_userInput = 'id_user';
    protected $_userSession = 'iduser';
    protected $_order_by = 'tgl_posting';
    protected $_sort = 'DESC';

    public $rules = array();

    protected $_timestamp = TRUE;
    protected $_userTag = FALSE;

    // protected $_order_column = array();
    // protected $_select_column = array();
    // protected $_or_like = array();

    function __construct()
    {
        parent::__construct();
    }

    public function array_from_post($fields)
    {
        $data = array();
        foreach ($fields as $field) {

            $data[$field] = $this->input->post($field);
        }
        return $data;
    }



    public function get($id = NULL, $single = FALSE)
    {
        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } elseif ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        if (!count($this->db->_order_by)) {
            $this->db->order_by($this->_order_by, $this->_sort);
        }
        return $this->db->get($this->_table_nama)->$method();
    }

    public function get_by($where, $single = FALSE)
    {
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    public function simpan($data, $id = NULL)
    {
        // timestamp
        if ($this->_timestamp == TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data[$this->_timePost] = $now;
            $this->_timeedit == True ? $data[$this->_timeedit] = $now : "";
        }

        // userInput
        if ($this->_userTag == TRUE) {
            if ($this->session->userdata($this->_userSession) != null) {
                $userID = $this->session->userdata($this->_userSession);
                $id || $data[$this->_userInput] = $userID;
                $this->_userInput == True ? $data[$this->_userInput] = $userID : "";
            }
        }

        // insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_nama);
            $id = $this->db->insert_id();
        }  // update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_nama);
        }
        return $id;
    }

    public function simpanMultiple($data)
    {
        //  $this->db->set($data);
        $this->db->insert_batch($this->_table_nama, $data);
    }

    public function hapus($id)
    {
        $filter = $this->_primary_filter;
        $id = $filter($id);
        if (!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_nama);
    }

    public function hapusAll()
    {
        $this->db->truncate($this->_table_nama);
    }
}
