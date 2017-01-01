<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Codeigniter CRUD template model
 *
 * @author Halit Yurttaş
 */

class MY_Model extends CI_Model {

    /*
    * @var string $table - Table Name
    */
    protected $table = "";
    
    public function __construct($table) {
        $this->table = $table;
        parent::__construct();
    }
    
    /*
    * Find records
    * @param Array $where
    * @param Array $like
    * @param String or Array $order
    * @param Array $limit
    * @param bool $as_array - either return object or return array
    * @return object or array
    */
    public function find($where = NULL, $like = NULL, $order = NULL, $limit = NULL, $as_array = FALSE) {
        $this->db->select("*");
        $this->db->from($this->table);
        if ($where !== NULL) {
            $this->db->where($where);
        }
        if ($like !== NULL) {
            $this->db->like($like);
        }
        if ($order !== NULL) {
            $this->order_by($order);
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
    
    /*
    * Get query total record count if need to use paging
    * @param Array $where
    * @param Array $like
    * @return int
    */
    public function query_count($where = NULL, $like = NULL)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        if ($where !== NULL) {
            $this->db->where($where);
        }
        if ($like !== NULL) {
            $this->db->like($like);
        }
        return $this->db->count_all_results();
    }
    
    /*
    * Get single row result by id
    * @param int or string $id
    * @return int
    */
    public function get($id) {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where(array("id" => $id));
        $result = $this->db->get();
        return $result->first_row();
    }
    
    /*
    * Insert record
    * @param Array $model
    * @param bool $get_id - get inserted id value if set TRUE that
    * @return void or int
    */
    public function insert($model, $get_id = FALSE) {
        $this->db->set($model);
        $this->db->insert($this->table);
        if ($get_id === TRUE) {
            return $this->db->insert_id();
        }
    }
    
    /*
    * Update record
    * @param Array $model
    * @param Array $where
    * @return void
    */
    public function update($model, $where) {
        $this->db->set($model);
        $this->db->where($where);
        $this->db->update($this->table);
    }
    
    /*
    * Delete record
    * @param int or string $id
    * @return void
    */
    public function delete($id) {
        $this->db->where(array("id" => $id));
        $this->db->delete($this->table);
    }
    
}
