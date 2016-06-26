<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Codeigniter CRUD template model
 *
 * @author Halit Yurttaş
 */

class MY_Model extends CI_Model {

    protected $table = "";
    
    public function __construct($table) {
        $this->table = $table;
        parent::__construct();
    }
    
    public function find($where = NULL, $limit = NULL, $as_array = FALSE) {
        $this->db->select("*");
        $this->db->from($this->table);
        if ($where !== NULL) {
            $this->db->where($where);
        }
        if ($limit !== NULL) {
            $this->db->limit($limit[0], $limit[1]);
        }
        $result = $this->db->get();
        if ($as_array == TRUE) {
            return $result->result_array();
        } else {
            return $result->result();
        }
    }
    
    public function query_count($where = NULL)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        if ($where !== NULL) {
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }
    
    public function get($id) {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where(array("id" => $id));
        $result = $this->db->get();
        return $result->first_row();
    }
    
    public function insert($model) {
        $this->db->set($model);
        $this->db->insert($this->table);
    }
    
    public function update($model, $where) {
        $this->db->set($model);
        $this->db->where($where);
        $this->db->update($this->table);
    }
    
    public function delete($id) {
        $this->db->where(array("id" => $id));
        $this->db->delete($this->table);
    }
    
}
