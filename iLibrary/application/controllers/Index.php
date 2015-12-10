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
	}

	public function index(){
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('library/index', compact('library'));
		$this->load->view('layout/footer');
	}
}