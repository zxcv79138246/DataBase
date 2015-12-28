<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Returnbook extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('borrow_return_model','borrow');
		if ($this->session->userdata('priority') < 1)  	//判斷進入者權限
		{
			$this->session->set_flashdata('message', '權限不足');
			$this->session->set_flashdata('type', 'danger');
			redirect('/index');     
		}
	}

	public function index()
	{
		$borrows = NULL;
		$condition = NULL;
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('library/borrow/returnbook',compact('borrows','condition'));
		$this->load->view('layout/footer');
	}

	public function search()
	{
		$condition = $this->input->get('search');
		$borrows = $this->borrow->returnSearch(['user.ssn','user.name','book.isbn','book.name','borrow_return.c_id'],$condition);
		if (!$borrows)
		{
			$this->session->set_flashdata('message', "搜尋不到借書記錄");
			$this->session->set_flashdata('type', 'danger');

			redirect('/returnbook');
		}else
		{
			$this->load->view('layout/header');
			$this->load->view('layout/navbar');			
			$this->load->view('library/borrow/returnbook', compact('borrows','condition'));
			$this->load->view('layout/footer');
		}
	}

	public function returnbook($c_id,$ssn)
	{
		$reselt = $this->borrow->returnBook($c_id,$ssn);
		if ($reselt)
		{
			$this->session->set_flashdata('message', "已歸還書籍 C_ID: {$c_id}");
			$this->session->set_flashdata('type', 'success');
			redirect('/returnbook');
		}
		
	}
}