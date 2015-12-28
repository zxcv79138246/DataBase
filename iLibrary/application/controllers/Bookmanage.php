<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Bookmanage extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('book_model', 'book');
		if ($this->session->userdata('priority')!=2) //判斷進入者權限權限
		{
			$this->session->set_flashdata('message', '權限不足');
			$this->session->set_flashdata('type', 'danger');
			redirect('/index');     
		}
	}

	public function index()
	{
		$books = $this->book->all();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('library/bookmanage/bookmanage', compact('books'));
		$this->load->view('layout/footer');
	}

	public function destory($ssn)
	{
		if ($books = $this->book->destory(['ssn' => $ssn]))
		{
			$this->session->set_flashdata('message', "{$books[0]->name} 已被刪除");
			$this->session->set_flashdata('type', 'warning');

		}
		redirect('/bookmanage');

	}

	public function edit($ssn)
	{
		$book = $this->book->find($ssn);
		$this->load->view('library/bookmanage/edit',compact('book'));
	}

	public function update ($ssn)
	{
		if ($this->verification())
		{
			$userdata = $this->input->post();     //抓取頁面所有post
			if (!$this->book->duplicateCheck(['ssn' => $userdata['ssn'], 'email' => $userdata['email']])) 
			{
				if ($books = $this->book->update($userdata,['ssn'=> $ssn]))
				{
					$this->session->set_flashdata('message', "{$userdata['name']} 修改成功");
					$this->session->set_flashdata('type', 'success');

				}
			} else {
				$this->session->set_flashdata('message', "SSN,Email重複");
				$this->session->set_flashdata('type', 'danger');

			}

		}
		redirect('/bookmanage');
	}

	public function create()
	{
		$this->load->view('library/bookmanage/create');
	}

	public function store()
	{
		if ($this->verification())
		{
			$userdata = $this->input->post();
			if (!$this->book->duplicateCheck(['ssn' => $userdata['ssn'], 'email' => $userdata['email']], 1)) 
			{
				if ($books = $this->book->insert($userdata))
				{
					$this->session->set_flashdata('message', "新增使用者：{$userdata['name']} 成功");
					$this->session->set_flashdata('type', 'success');

				}
			} else {
				$this->session->set_flashdata('message', "SSN,Email重複");
				$this->session->set_flashdata('type', 'danger');

			}
		}
		redirect('/bookmanage');
	}

	public function verification()
	{
		$this->form_validation->set_rules('ssn','SSN','required');
		$this->form_validation->set_rules('sex','Sex','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('priority','Priority','required');

		if (!$this->form_validation->run())
		{
			$this->session->set_flashdata('message', "有欄位為空值");
			$this->session->set_flashdata('type', 'danger');
		}
		else
			return true;
	}

	public function search()
	{
		$condition = $this->input->get('search');
		$books = $this->book->search(['ssn','name','email'],$condition);
		if (!$books)
		{
			$this->session->set_flashdata('message', "搜尋不到相似資料或內容不存在");
			$this->session->set_flashdata('type', 'danger');

			redirect('/bookmanage');
		}else
		{
			$this->load->view('layout/header');
			$this->load->view('layout/navbar');			
			$this->load->view('library/bookmanage/bookmanage', compact('users'));
			$this->load->view('layout/footer');
		}
		
	}
}