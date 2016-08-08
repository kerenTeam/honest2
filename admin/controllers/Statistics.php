<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   统计管理
*/
class Statistics extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
	}

	// 访问数据
	public function visit()
	{

		$this->load->view('statistics/visit');
		$this->load->view('footer');
	}

	// 访问数据
	public function action()
	{

		$this->load->view('statistics/action');
		$this->load->view('footer');
	}

	// 资讯数据
	public function zixun()
	{

		$this->load->view('statistics/zixun');
		$this->load->view('footer');
	}

	


}



?>