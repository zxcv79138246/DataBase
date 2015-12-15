<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	private $table = 'book';

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
    	$query = $this->db->get_where($this->table, ['b_id' => $id]);
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

    public function insert($book)
    {
    	$result = $this->db->insert($this->table, $book);
    	return $result;
    }

    public function update($book, $condition)
    {
    	$result = $this->db->update($this->table, $book, $condition);
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

    public function author($id)
    {
    	$query = $this->db->get_where('author', ['id' => $id]);
    	return $query->result();
    }

    public function publisher($id)
    {
        $query = $this->db->get_where('publisher', ['id' => $id]);
        return $query->result();
    }
$
    public function copy_book($isbn)
    {
        $query = $this->db->get_where('copy_book', ['isbn' => $isbn]);
        return $query->result();
    }

    public function rate($isab)
    {
        $query = $this->db->get_where('rate', ['isbn' => $isbn]);
        return $query->result();
    }

}