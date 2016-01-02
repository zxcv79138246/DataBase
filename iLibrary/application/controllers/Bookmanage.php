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
		$this->load->model('author_model','author');
		$this->load->model('category_model','category');
		$this->load->model('publisher_model','publisher');
		$this->load->model('copy_book_model','copy');
		if ($this->session->userdata('priority')!=1) //判斷進入者權限權限
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

	public function destory($isbn)
	{
		if ($book = $this->book->destory(['isbn' => $isbn]))
		{
			$this->session->set_flashdata('message', "ISBN： {$book[0]->isbn} 書名：{$book[0]->name} 已被刪除");
			$this->session->set_flashdata('type', 'warning');

		}
		redirect('/bookmanage');

	}

	public function edit($isbn)
	{
		$authors = $this->author->all();
		$categorys = $this->category->all();
		$publishers = $this->publisher->all();
		$book = $this->book->findBookEdit($isbn);
		$copyNum=$this->copy->copyNum($isbn);
		$this->load->view('library/bookmanage/edit',compact('book','authors','categorys','publishers','copyNum'));
	}

	public function update ($isbn)
	{
		if ($this->verification())
		{
			$bookdata = $this->input->post();     //抓取頁面所有post

			$nowfield = $this->book->findNowField($isbn);
			$nameChange=0;
			if ($bookdata['isbn']!=$nowfield->isbn){
				$nameChange = 1;
			}
				
			if (!$this->book->duplicateCheck(['isbn' => $bookdata['isbn']],$nameChange)) 
			{
				$books = $this->book->update($bookdata,['isbn'=> $isbn]);
				if ($books)
				{
					$this->session->set_flashdata('message', "ISBN：{$bookdata['isbn']} 書名：{$bookdata['name']} 修改成功");
					$this->session->set_flashdata('type', 'success');

				}
			} else {
				$this->session->set_flashdata('message', "ISBN 重複");
				$this->session->set_flashdata('type', 'danger');

			}

		}
		redirect('/bookmanage');
	}

	public function create()
	{
		$authors = $this->author->all();
		$categorys = $this->category->all();
		$publishers = $this->publisher->all();
		$this->load->view('library/bookmanage/create',compact('authors','categorys','publishers'));
	}

	public function createdata()
	{
		$this->load->view('library/bookmanage/createdata');
	}

	public function storeOtherData()
	{
		$category=$this->input->post('category');
		$author=$this->input->post('author');
		$publisher=$this->input->post('publisher');
		$publisherAddress=$this->input->post('publisherAddress');
		$new=0;
		if ($category!=NULL)
		{
			$new=1;
			if (!$this->category->duplicateCheck(['category'=>$category],1))
			{
				$categoryResult = $this->category->insert(['category'=>$category]);
				if ($categoryResult)
				{
					$this->session->set_flashdata('message', "分類：{$category} 新增成功");
					$this->session->set_flashdata('type', 'success');
				}
			}else
			{
				$this->session->set_flashdata('message', "已有 {$category} 分類");
				$this->session->set_flashdata('type', 'danger');
			}
		}

		if ($author!=NULL)
		{
			$new=1;
			if (!$this->author->duplicateCheck(['name'=>$author],1))
			{
				$authorResult = $this->author->insert(['name'=>$author]);
				if ($authorResult)
				{
					$this->session->set_flashdata('message', "分類：{$author} 新增成功");
					$this->session->set_flashdata('type', 'success');
				}
			}else
			{
				$this->session->set_flashdata('message', "已有 {$author} 分類");
				$this->session->set_flashdata('type', 'danger');
			}
		}

		if ($publisher!=NULL && $publisherAddress!=Null)
		{
			$new=1;
			if (!$this->publisher->duplicateCheck(['name'=>$publisher],1))
			{
				$publisherResult = $this->publisher->insert(['name'=>$publisher,'address'=>$publisherAddress]);
				if ($publisherResult)
				{
					$this->session->set_flashdata('message', "分類：{$publisher} 新增成功");
					$this->session->set_flashdata('type', 'success');
				}
			}else
			{
				$this->session->set_flashdata('message', "已有 {$publisher} 分類");
				$this->session->set_flashdata('type', 'danger');
			}
		}else if (($publisher!=NULL && $publisherAddress==Null) || ($publisher==NULL && $publisherAddress!=Null) )
		{
			$new=1;
			$this->session->set_flashdata('message', "出版社資料不齊全");
			$this->session->set_flashdata('type', 'danger');
		}

		if ($new==0)
		{
			$this->session->set_flashdata('message', "未輸入任何資料");
			$this->session->set_flashdata('type', 'danger');
		}

		redirect('/bookmanage');

	}

	public function store()
	{
		if ($this->verification())
		{
			$newbookdata = $this->input->post();
			if (!$this->book->duplicateCheck(['isbn' => $newbookdata['isbn']], 1)) 
			{
				$book = $this->book->insert($newbookdata);
				if ($book)
				{
					$this->session->set_flashdata('message', "新增書本 ISBN：{$newbookdata['isbn']} 書名：{$newbookdata['name']} 成功");
					$this->session->set_flashdata('type', 'success');

				}
			} else {
				$this->session->set_flashdata('message', "ISBN重複");
				$this->session->set_flashdata('type', 'danger');

			}
		}
		redirect('/bookmanage');
	}

	public function verification()
	{
		$this->form_validation->set_rules('isbn','ISBN','required');
		$this->form_validation->set_rules('name','BookName','required');
		$this->form_validation->set_rules('category','Category','required');
		$this->form_validation->set_rules('author_id','Author','required');
		$this->form_validation->set_rules('publisher_id','Publisher','required');
		$this->form_validation->set_rules('publish_date','Publish_date','required');
		$this->form_validation->set_rules('cover','Cover','required');

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
		$books = $this->book->searchEdit(['book.isbn','book.name','author.name','publisher.name','category.category','book.publish_date'],$condition);
		if (!$books)
		{
			$this->session->set_flashdata('message', "搜尋不到相似資料或內容不存在");
			$this->session->set_flashdata('type', 'danger');

			redirect('/bookmanage');
		}else
		{
			$this->load->view('layout/header');
			$this->load->view('layout/navbar');			
			$this->load->view('library/bookmanage/bookmanage', compact('books'));
			$this->load->view('layout/footer');
		}
		
	}

	public function addCopy($isbn)
	{
		if($this->copy->insert(['isbn'=>$isbn]))
		{
			echo json_encode(['message'=>"ISBN：$isbn  新增一本copy",'status'=>'success']);
		}
	}

	public function deleteCopy($isbn)
	{
		if($this->copy->deleteOneCopy(['isbn'=>$isbn]))
		{
			echo json_encode(['message'=>"ISBN：$isbn  刪除一本copy",'status'=>'warning']);
		}else{
			echo json_encode(['message'=>"無法刪除 所有書都已被預約或借出",'status'=>'danger']);
		}
	}
}