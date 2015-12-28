<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	private $table = 'book';

	function __construct()		//constructer    繼承CI_Modle的constructer
    {
        parent::__construct();
    }

    public function all()
    {
    	$this->db->select('*');
        $this->db->select('author.name as authorName');
        $this->db->select('publisher.name as publisherName');
        $this->db->select('book.name as name');
        $this->db->select('category.id as categoryId');
        $this->db->from($this->table);
        $this->db->join('author','author.id = book.author_id');
        $this->db->join('publisher','publisher.id = book.publisher_id');
        $this->db->join('category','category.id = book.category');
        $this->db->order_by('b_id');
        $query = $this->db->get();
        return ($query->result()) ? $query->result() : false;
    }

    public function findBookEdit($isbn)
    {
        $query = $this->db->get_where($this->table,['isbn' => $isbn]);
        if ($query->result())
            return $query->result()[0];
        else
            return false;
    }

    public function find($id)
    {
    	$this->db->select('*');
        $this->db->select('author.name as authorName');
        $this->db->select('publisher.name as publisherName');
        $this->db->select('book.name as name');
        $this->db->from($this->table);
        $this->db->join('author','author.id = book.author_id');
        $this->db->join('publisher','publisher.id = book.publisher_id');
        $this->db->join('category','category.id = book.category');   
        $this->db->where('isbn', $id);   
        $query = $this->db->get();
    	if ($query->result())
    		return $query->result()[0];
    	else
    		return false;
    }

    public function getByPage($page)        //拿取當前頁數所要的書籍資料(6本)
    {
    	$query = $this->db->get($this->table, 6, $page * 6);
    	return $query->result();
    }

    public function search($fields, $condition, $page)     //搜尋書籍
    {
        $this->db->select('*');
        $this->db->select('author.name as authorName');
        $this->db->select('publisher.name as publisherName');
        $this->db->select('book.name as name');
        $this->db->select('category.id as categoryId');
        $this->db->select('book.category as bookCategoryId');
        $this->db->from($this->table);
        $this->db->join('author','author.id = book.author_id');
        $this->db->join('publisher','publisher.id = book.publisher_id');
        $this->db->join('category','category.id = book.category');
        $this->db->order_by('b_id');
        $this->db->limit(6,$page * 6);
        foreach ($fields as $field) {
            $this->db->or_like($field, $condition);
        }
        $query = $this->db->get();
        return ($query->result()) ? $query->result() : false;
    }

    public function searchCount($fields, $condition, $page)
    {
        $this->db->select('*');
        $this->db->select('author.name as authorName');
        $this->db->select('publisher.name as publisherName');
        $this->db->select('book.name as name');
        $this->db->from($this->table);
        $this->db->join('author','author.id = book.author_id');
        $this->db->join('publisher','publisher.id = book.publisher_id');
        $this->db->join('category','category.id = book.category');
        $this->db->order_by('b_id');
        foreach ($fields as $field) {
            $this->db->or_like($field, $condition);
        }
        $query = $this->db->get();
        return ($query->result()) ? $query->num_rows() : false;
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

    public function searchEdit($fields, $condition)
    {
        $this->db->select('*');
        $this->db->select('author.name as authorName');
        $this->db->select('publisher.name as publisherName');
        $this->db->select('book.name as name');
        $this->db->select('category.id as categoryId');
        $this->db->from($this->table);
        $this->db->join('author','author.id = book.author_id');
        $this->db->join('publisher','publisher.id = book.publisher_id');
        $this->db->join('category','category.id = book.category');
        $this->db->order_by('b_id');
        foreach ($fields as $field) {
            $this->db->or_like($field, $condition);
        }
        $query = $this->db->get();
        return ($query->result()) ? $query->result() : false;
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
    
    public function rate($isab)
    {
        $query = $this->db->get_where('rate', ['isbn' => $isbn]);
        return $query->result();
    }

}
