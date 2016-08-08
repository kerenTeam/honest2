<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   运营工具
*/
class Operating extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
	}

	// 素材管理
	public function material()
	{

		$this->load->view('operating/material');
		$this->load->view('footer');
	}

	// 关注后自动回复
	public function autoReply()
	{

		$this->load->view('operating/autoReply');
		$this->load->view('footer');
	}

	// 关键词自动回复
	public function autoReply1()
	{

		$this->load->view('operating/autoReply1');
		$this->load->view('footer');
	}

	// 智能自动回复
	public function autoReply2()
	{

		$this->load->view('operating/autoReply2');
		$this->load->view('footer');
	}

	// 消息群发
	public function mass()
	{

		$this->load->view('operating/mass');
		$this->load->view('footer');
	}

	// 自定义菜单
	public function menu()
	{

		$this->load->view('operating/customMenu');
		$this->load->view('footer');
	}

}



?>