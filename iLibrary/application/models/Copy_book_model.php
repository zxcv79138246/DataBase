<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Copy_book_model extends CI_Model {

	private $table = 'copy_book';

	function __construct()		//constructer    繼承CI_Modle的constructer
    {
        parent::__construct();
    }

    public function all()
    {
    	$query = $this->db->get($this->table);
    	return $query->result();
    }

    public function find($isbn)  //尋找同isbn之copy_book 
    {
    	$query = $this->db->get_where($this->table,['isbn' => $isbn]);
        return $query->result()[0];
    }

    public function copyNum($isbn)
    {
        $query = $this->db->query("SELECT count(`c_id`) as `copyNum` FROM {$this->table} WHERE `isbn` = '{$isbn}'");
        return $query->result();
    }

    public function where($condition)
    {
    	$query = $this->db->get_where($this->table, $condition);
    	return $query->result();
    }

    public function insert($copy_book)
    {
    	$result = $this->db->insert($this->table, $copy_book);
    	return $result;
    }

    public function update($copy_book, $condition)
    {
    	$result = $this->db->update($this->table, $copy_book, $condition);
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
    	$query = $this->db->get_where('book', ['isbn' => $id]);
    	return $query->result();
    }
}