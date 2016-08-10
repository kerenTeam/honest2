<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   数据管理
*/
class DataManage extends MY_Controller
{
	
	function __construct()
	{
		
		parent::__construct();
		$this->load->view('header');
	}

	// 人员规模
	public function staff()
	{

		$this->load->view('dataManage/staff');
		$this->load->view('footer');
	}

	// 生产规模
	public function produce()
	{

		$this->load->view('dataManage/produce');
		$this->load->view('footer');
	}

	// 部门
	public function branch()
	{

		$this->load->view('dataManage/branch');
		$this->load->view('footer');
	}

	// 职称
	public function workname()
	{

		$this->load->view('dataManage/workname');
		$this->load->view('footer');
	}

	// 专业
	public function specialty()
	{

		$this->load->view('dataManage/specialty');
		$this->load->view('footer');
	}

	// 安全评价师
	public function appraise()
	{

		$this->load->view('dataManage/appraise');
		$this->load->view('footer');
	}

	// 注册安全工程师
	public function register()
	{

		$this->load->view('dataManage/register');
		$this->load->view('footer');
	}


}



?>