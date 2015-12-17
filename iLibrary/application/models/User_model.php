<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = 'user';

	function __construct()		//constructer    繼承CI_Modle的constructer
    {
        parent::__construct();
    }

    public function all()
    {
    	$query = $this->db->get($this->table);
    	return $query->result();
    }

    public function find($ssn)
    {
    	$query = $this->db->get_where($this->table, ['ssn' => $ssn]);
    	if ($query->result())
    		return $query->result()[0];
    	else
    		return false;
    }

    public function duplicateCheck($data)
    {
        $this->db->from($this->table);
        foreach ($data as $key => $value) {
            $this->db->or_where($key, $value);
        }
        $query = $this->db->get();
        return $query->num_rows() > 1;
    }

    public function login($account)
    {
        $query = $this->db->get_where($this->table,['email' => $account['e-mail'], 'password' => $account['password']]);
        if ($query->result()){
            return $query->result()[0];
        }else
        {
            return false;
        }
    }

    public function where($condition)
    {
    	$query = $this->db->get_where($this->table, $condition);
    	return $query->result();
    }

    public function insert($user)
    {
    	$result = $this->db->insert($this->table, $user);
    	return $result;
    }

    public function update($user, $condition)
    {
        $result = $this->db->update($this->table, $user, $condition);
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

    public function search($fields, $condition)
    {
        $this->db->from($this->table);
        foreach ($fields as $field) {
            $this->db->or_like($field, $condition);
        }
        $query = $this->db->get();
        return ($query->result()) ? $query->result() : false;
    }

    public function borrow_return($ssn)
    {
    	$query = $this->db->get_where('borrow_return', ['ssn' => $ssn]);
    	return $query->result();
    }

    public function reserve($ssn)
    {
        $query = $this->db->get_where('reserve', ['ssn' => $ssn]);
        return $query->result();
    }

    public function rate($ssn)
    {
        $query = $this->db->get_where('rate', ['ssn' => $ssn]);
        return $query->result();
    }
}