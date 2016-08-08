<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*   后台
*/
class Admin extends MY_Controller {


	function __construct()
	{
		
		parent::__construct();
		$this->load->view('header');
	}
	// 后台首页
	public function index()
	{
		//var_dump($_SESSION['username']);
		$this->load->view('admin_index');
		$this->load->view('footer');
	}

	// 首页Banner
	public function banner()
	{
		$this->load->view('admin_banner');
		$this->load->view('footer');
	}

	// 资讯列表
	public function zixun()
	{
		$this->load->view('zixunList');
		$this->load->view('footer');
	}
}
