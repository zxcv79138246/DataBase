<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Usermanage extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('user_model', 'user');
	}

	public function index(){
		$users = $this->user->all();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('library/usermanage', compact('users'));
		$this->load->view('layout/footer');
	}
}