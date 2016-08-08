<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class Company extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
	}

	// 公司信息
	public function index()
	{

		$this->load->view('company/index');
		$this->load->view('footer');
	}

	// 新增公司信息
	public function add()
	{

		$this->load->view('company/add');
		$this->load->view('footer');
	}

	// 编辑公司信息
	public function edit()
	{

		$this->load->view('company/edit');
		$this->load->view('footer');
	}

	// 公司信息详情
	public function info()
	{

		$this->load->view('company/info');
		$this->load->view('footer');
	}

}



?>