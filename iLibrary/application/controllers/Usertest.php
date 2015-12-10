<?php

/**
* 
*/
class Usertest extends CI_Controller
{
	
	function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
	}

	function index ()
	{
		$model = 'user_model';
		$data = [
			'ssn' => time(),
			'sex' => 'man',
			'name' => '測試者1',
			'address' => '台北市',
			'phone' => '09123456789',
			'email' => time().'@123',
			'password' => '123456',
			'priority' => '0',
		];
		$this->load->model($model,'usertest');
		/**  insert
		*$test = $this->usertest->insert($data);
		*$this->unit->run($test,1,'user_insert');
		**/
		$test = $this->usertest->find(111111);
		$this->unit->run($test->name,'劉至峻','user_find');
		echo $this->unit->report();
	}
}