<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publisher_model extends CI_Model {

	private $table = 'publisher';

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

    public function insert($publisher)
    {
    	$result = $this->db->insert($this->table, $publisher);
    	return $result;
    }

    public function update($publisher,$condition)
    {
    	$result = $this->db->update($this->table, $publisher, $condition);
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

    public function book($id)
    {
    	$query = $this->db->get_where('book', ['publisher_id' => $id]);
    	return $query->result();
    }
}