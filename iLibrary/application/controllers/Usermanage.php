<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Usermanage extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user');
		if ($this->session->userdata('priority')!=2)
		{
			redirect('/index');     //權限不足頁面
		}
	}

	public function index()
	{
		$users = $this->user->all();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('library/usermanage/usermanage', compact('users'));
		$this->load->view('layout/footer');
	}

	public function destory($ssn)
	{
		if ($users = $this->user->destory(['ssn' => $ssn]))
		{
			$this->session->set_flashdata('user_message', "{$users[0]->name} 已被刪除");
		}
		redirect('/usermanage');

	}

	public function edit($ssn)
	{
		$user = $this->user->find($ssn);
		$this->load->view('library/usermanage/edit',compact('user'));
	}

	public function update ($ssn)
	{
		if ($this->verification())
		{
			$userdata = $this->input->post();     //抓取頁面所有post
			if (!$this->user->duplicateCheck(['ssn' => $userdata['ssn'], 'email' => $userdata['email']])) {
				if ($users = $this->user->update($userdata,['ssn'=> $ssn]))
					$this->session->set_flashdata('user_message', "{$users[0]->name} 修改成功");
			} else {
				$this->session->set_flashdata('user_message', "SSN,Email重複");
			}

		}
		redirect('/usermanage');
	}

	public function create()
	{
		$this->load->view('library/usermanage/create');
	}

	public function store()
	{
		$userdata = $this->input->post();
		if (!$this->user->duplicateCheck(['ssn' => $userdata['ssn'], 'email' => $userdata['email']])) {
			if ($users = $this->user->insert($userdata))
				$this->session->set_flashdata('user_message', "新增使用者：{$userdata['name']} 成功");
		} else {
			$this->session->set_flashdata('user_message', "SSN,Email重複");
		}
		redirect('/usermanage');
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
			$this->session->set_flashdata('user_message', "有欄位為空值");
		else
			return true;
	}

	public function search()
	{
		$condition = $this->input->get('search');
		$users = $this->user->search(['ssn','name'],$condition);
		if (!$users)
		{
			$this->session->set_flashdata('user_message', "搜尋不到相似資料或內容不存在");
			redirect('/usermanage');
		}else
		{
			$this->load->view('layout/header');
			$this->load->view('layout/navbar');			
			$this->load->view('library/usermanage/usermanage', compact('users'));
			$this->load->view('layout/footer');
		}
		
	}
}