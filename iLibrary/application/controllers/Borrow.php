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
		if ($this->session->userdata('priority') < 1)  	//判斷進入者權限權限
		{
			$this->session->set_flashdata('message', '權限不足');
			$this->session->set_flashdata('type', 'danger');
			redirect('/index');     
		}
	}

	public function index()
	{
		$reserves = NULL;
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('library/borrow/borrow',compact('reserves'));
		$this->load->view('layout/footer');
	}
}