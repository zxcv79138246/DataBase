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
		if ($this->session->userdata('priority')!=2) //判斷進入者權限權限
		{
			$this->session->set_flashdata('message', '權限不足');
			$this->session->set_flashdata('type', 'danger');
			redirect('/index');     
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
			$this->session->set_flashdata('message', "{$users[0]->name} 已被刪除");
			$this->session->set_flashdata('type', 'warning');

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

			$nowfield = $this->user->find($ssn);
			$nameChange=0;
			if ($userdata['ssn']!=$nowfield->ssn){
				$nameChange = 1;
			}

			if (!$this->user->duplicateCheck(['ssn' => $userdata['ssn'], 'email' => $userdata['email']],$nameChange)) 
			{
				if ($users = $this->user->update($userdata,['ssn'=> $ssn]))
				{
					$this->session->set_flashdata('message', "{$userdata['name']} 修改成功");
					$this->session->set_flashdata('type', 'success');

				}
			} else {
				$this->session->set_flashdata('message', "SSN,Email重複");
				$this->session->set_flashdata('type', 'danger');

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
		if ($this->verification())
		{
			$userdata = $this->input->post();
			if (!$this->user->duplicateCheck(['ssn' => $userdata['ssn'], 'email' => $userdata['email']], 1)) 
			{
				if ($users = $this->user->insert($userdata))
				{
					$this->session->set_flashdata('message', "新增使用者：{$userdata['name']} 成功");
					$this->session->set_flashdata('type', 'success');

				}
			} else {
				$this->session->set_flashdata('message', "SSN,Email重複");
				$this->session->set_flashdata('type', 'danger');

			}
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
		$users = $this->user->search(['ssn','name','email'],$condition);
		if (!$users)
		{
			$this->session->set_flashdata('message', "搜尋不到相似資料或內容不存在");
			$this->session->set_flashdata('type', 'danger');

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