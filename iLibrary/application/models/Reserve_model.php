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

    public function find($c_id)     //  尋找c_id之預約
    {
    	$query = $this->db->get_where($this->table, ['c_id' => $c_id]);
    	if ($query->result())
    		return $query->result()[0];
    	else
    		return false;
    }

    public function hasReserveNum($isbn)        //被預約數
    {
        $this->db->select('count(id) as reserveNum');
        $this->db->from($this->table);
        $this->db->join('copy_book','copy_book.c_id = reserve.c_id');
        $this->db->join('book','copy_book.isbn = book.isbn');
        $this->db->where('book.isbn',$isbn);
        $query = $this->db->get();
        return $query->result();
    }

    public function hasReserve($isbn){          //預約者
        $this->db->select('ssn');
        $this->db->from($this->table);
        $this->db->join('copy_book','copy_book.c_id = reserve.c_id');
        $this->db->join('book','copy_book.isbn = book.isbn');
        $this->db->where('book.isbn',$isbn);
        $query = $this->db->get();
        return $query->result();
    }

    public function borrowSearch($fields, $condition)
    {
        $this->db->select('*');
        $this->db->select('book.name as bookName');
        $this->db->select('user.name as userName');
        $this->db->select('user.ssn as userSSN');
        $this->db->select('reserve.ssn as reserveSSN');
        $this->db->select('reserve.c_id as reserveC_id');
        $this->db->from($this->table);
        $this->db->join('copy_book','copy_book.c_id = reserve.c_id');
        $this->db->join('book','book.isbn = copy_book.isbn');
        $this->db->join('user','user.ssn = reserve.ssn');
        $this->db->join('borrow_return','borrow_return.c_id=reserve.c_id','left');
        foreach ($fields as $field) {
            $this->db->or_where($field, $condition);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function reserveCount($ssn)
    {
        //$this->db->query("SELECT 'count(`id`)' FROM {$this->table} WHERE `ssn` = '{$ssn}'");
        $this->db->select('count(id)');
        $this->db->from($this->table);
        $$this->db->where('ssn',$ssn);
    }

    public function where($condition)
    {
    	$query = $this->db->get_where($this->table, $condition);
    	return $query->result();
    }

    public function insert($c_id,$ssn)
    {
    	$result = $this->db->insert($this->table,['c_id' => $c_id, 'ssn' => $ssn]);
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

    public function user($ssn)
    {
        $query = $this->db->get_where('user', ['ssn' => $ssn]);
        return $query->result();
    }
}