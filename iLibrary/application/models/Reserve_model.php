<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserve_model extends CI_Model {

	private $table = 'reserve';

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

    public function hasReserveNum($isbn)
    {
        $this->db->select('count(id) as reserveNum');
        $this->db->from($this->table);
        $this->db->join('copy_book','copy_book.c_id = reserve.c_id');
        $this->db->join('book','copy_book.isbn = book.isbn');
        $this->db->where('book.isbn',$isbn);
        $query = $this->db->get();
        return $query->result();
    }

    public function where($condition)
    {
    	$query = $this->db->get_where($this->table, $condition);
    	return $query->result();
    }

    public function insert($reserve)
    {
    	$result = $this->db->insert($this->table, $reserve);
    	return $result;
    }

    public function update($reserve,$condition)
    {
    	$result = $this->db->update($this->table, $reserve, $condition);
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
    	$query = $this->db->get_where('copy_book', ['c_id' => $id]);
    	return $query->result();
    }

    public function user($ssn)
    {
        $query = $this->db->get_where('user', ['ssn' => $ssn]);
        return $query->result();
    }
}