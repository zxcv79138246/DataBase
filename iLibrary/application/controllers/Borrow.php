<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Borrow extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('reserve_model','reserve');
		$this->load->model('borrow_return_model','borrow');
		if ($this->session->userdata('priority') > 1)  	//判斷進入者權限權限
		{
			$this->session->set_flashdata('message', '權限不足');
			$this->session->set_flashdata('type', 'danger');
			redirect('/index');     
		}
	}

	public function index()
	{
		$reserves = NULL;
		$condition = NULL;
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('library/borrow/borrow',compact('reserves','condition'));
		$this->load->view('layout/footer');
	}

	public function search()
	{
		$condition = $this->input->get('search');
		$reserves = $this->reserve->borrowSearch(['user.ssn','user.name','book.isbn','book.name','reserve.c_id'],$condition);
		if (!$reserves)
		{
			$this->session->set_flashdata('message', "搜尋不到預約記錄");
			$this->session->set_flashdata('type', 'danger');

			redirect('/borrow');
		}else
		{
			$this->load->view('layout/header');
			$this->load->view('layout/navbar');			
			$this->load->view('library/borrow/borrow', compact('reserves','condition'));
			$this->load->view('layout/footer');
		}
	}

	public function destory($c_id,$isborrow=0,$isrecord=0)
	{
		if ($copy = $this->reserve->destory(['c_id' => $c_id]))
		{
			if ($isrecord ==0)
			{
				if ($isborrow ==0)
				{
					$this->session->set_flashdata('message', "已刪除預約記錄 C_ID: {$c_id}");
					$this->session->set_flashdata('type', 'warning');
				}else{
					$this->session->set_flashdata('message', "已借出 C_ID: {$c_id}");
					$this->session->set_flashdata('type', 'success');
				}
				redirect('/borrow');
			}else{
				$this->reserveRecord();
			}
		}	
	}

	public function borrowbook($c_id,$ssn)
	{
		$borrowCount = $this->borrow->borrowCount($ssn);
		$filed = 'count(id)';
		if ($borrowCount[0]->filed < 10)
		{
			$this->borrow->insert($c_id,$ssn);
			$this->destory($c_id,1);
		}else
		{
			$this->session->set_flashdata('message', "已借10本書,請歸還書籍後才能再借其他書");
			$this->session->set_flashdata('type', 'danger');
			redirect('/borrow');
		}
	}

	public function reserveRecord()
	{
		$reserves = $this->reserve->reserveRecord($this->session->userdata('ssn'));
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');			
		$this->load->view('library/reserve/reserverecord', compact('reserves'));
		$this->load->view('layout/footer');
	}
}