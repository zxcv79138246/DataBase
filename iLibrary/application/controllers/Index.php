<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Index extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('book_model', 'book');

	}

	public function index()
	{
		$books = $this->book->getByPage(0);
		$bookCount = count($this->book->all());
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('library/index', compact('books','bookCount'));
		$this->load->view('layout/footer');
	}

	public function getPage()
	{
		$page = $this->input->get('page');
		$condition = $this->input->get('keyword');
		echo json_encode($this->book->search(['book.name','book.isbn','book.category','author.name','publisher.name'],urldecode($condition), $page - 1));
	}
}
