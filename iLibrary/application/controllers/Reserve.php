<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Reserve extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('reserve_model', 'reserve');
		$this->load->model('copy_book_model','copy');
		$this->load->model('borrow_return_model','borrow_return');
	}

	public function reserveBook($isbn)  //預約
	{
		$ssn = $this->session->userdata('ssn');
		$copyNum = $this->copy->copyNum($isbn);
		$reserveNum = $this->reserve->hasReserveNum($isbn);
		$reserveCount = $this->reserve->reserveCount($ssn);
		if (!$ssn){
			echo json_encode(['message'=>'請先登入帳號','status'=>'danger']);
		}else if ($copyNum[0]->copyNum == $reserveNum[0]->reserveNum)
		{
			echo json_encode(['message'=>'已被預約滿,無法預約','status'=>'danger']);
		}else if($reserveCount>2)
		{
			echo json_encode(['message'=>'已預約3本書,無法再預約書籍','status'=>'danger']);
		}else{			
			$hasbook = false;
			$borroweds=$this->borrow_return->hasborrow($isbn);
			$reserveds=$this->reserve->hasReserve($isbn);
			foreach ($borroweds as $key => $borrowed) {		//判斷是否正在借閱
				if ($borrowed->ssn == $ssn)
				{
					$hasbook = true;
				}
			}
			foreach ($reserveds as $key => $reserved) {		//判斷是否正在預約
				if ($reserved->ssn == $ssn)
				{
					$hasbook = true;
				}
			}
			if (!$hasbook){
				$c_id=null;
				$copyBooks = $this->copy->find($isbn);
				foreach ($copyBooks as $key => $copyBook) {					//	找尋可預約之copy_book
					if ($this->reserve->find($copyBook->c_id) == false){
						$c_id=$copyBook->c_id;
						break;
					}
				}
				if ($this->reserve->insert($c_id,$ssn))
					echo json_encode(['message'=>'預約成功','status'=>'success']);
				else
					echo json_encode(['message'=>'系統維修中,目前無法預約','status'=>'danger']);
			}else{
				echo json_encode(['message'=>'已借閱或預約這本書,無法重複預約','status'=>'danger']);
			}
		}
	}
}