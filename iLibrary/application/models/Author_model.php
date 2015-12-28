<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author_model extends CI_Model {

	private $table = 'author';

	function __construct()		//constructer    繼承CI_Modle的constructer
    {
        parent::__construct();
    }

    public function all()
    {
    	$query = $this->db->get($this->table);
    	return $query->result();
    }

    public function find($id)
    {
    	$query = $this->db->get_where($this->table, ['id' => $id]);
    	if ($query->result())
    		return $query->result()[0];
    	else
    		return false;
    }

    public function where($condition)
    {
    	$query = $this->db->get_where($this->table, $condition);
    	return $query->result();
    }

    public function insert($author)
    {
    	$result = $this->db->insert($this->table, $author);
    	return $result;
    }

    public function update($author,$condition)
    {
    	$result = $this->db->update($this->table, $author, $condition);
    	return $result;
    }

    public function destory($condition)
    {
    	$data = $this->where($condition);
    	$result = $this->db->delete($this->table, $condition);
    	if ($result)
    		return $data;
    	else
    		return $result;
    }

    public function duplicateCheck($data, $is_create = 0)             //判斷是否已有值存在
    {
        $this->db->from($this->table);
        foreach ($data as $key => $value) {
            $this->db->or_where($key, $value);
        }
        $query = $this->db->get();
        return ($query->num_rows() + $is_create) > 1;
    }
    
}