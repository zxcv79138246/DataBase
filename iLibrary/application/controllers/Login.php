<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('user_model', 'user');
	}

	public function login()
	{
		$account = [
			'e-mail' => $this->input->post('e-mail'),
			'password' => $this->input->post('password'),
		];
		$login = $this->user->login($account);
		if ($login){
			$data =[
				'ssn' => $login->ssn,
				'name' => $login->name,
				'priority' => $login->proiorty,
			];
			$this->session->set_userdata($data);
			redirect('/index');
		}
		else{
			$this->session->set_flashdata('login_fail_message','登入失敗,帳號或密碼錯誤');
			redirect('/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/index');
	}
}