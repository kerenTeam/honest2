<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class Counselor extends MY_Controller
{
	
	function __construct()
	{
		
		parent::__construct();
		$this->load->view('header');
	}

	// 用户管理
	public function index()
	{

		$this->load->view('counselor/index');
		$this->load->view('footer');
	}

	// 用户详情
	public function info()
	{

		$this->load->view('counselor/info');
		$this->load->view('footer');
	}

	// 备忘录
	public function memorandum()
	{

		$this->load->view('counselor/memorandum');
		$this->load->view('footer');
	}

	// 备忘录详情
	public function memorandumInfo()
	{

		$this->load->view('counselor/memorandumInfo');
		$this->load->view('footer');
	}

	// 工作历史
	public function work()
	{

		$this->load->view('counselor/work');
		$this->load->view('footer');
	}

}



?>