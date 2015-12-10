<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borrow_return_model extends CI_Model {

	private $table = 'borrow_return';

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

    public function insert($borrow_return)
    {
    	$result = $this->db->insert($this->table, $borrow_return);
    	return $result;
    }

    public function update($borrow_return, $condition)
    {
    	$result = $this->db->update($this->table, $borrow_return, $condition);
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

    public function copy_book($id)
    {
        $query = $this->db->query("SELECT `copy_book` FROM {$table} WHERE `c_id` = '{$id}'");
    	//$query = $this->db->get_where('copy_book', ['c_id' => $id);
    	return $query->result();
    }

    public function user($ssn)
    {
        $query = $this->db->get_where('user', ['ssn' => $ssn]);
        return $query->result();
    }
}