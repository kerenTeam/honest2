<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   发布
*/
class Publish extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
	}

	// 发布管理
	public function index()
	{

		$this->load->view('publish/index');
		$this->load->view('footer');
	}

}



?>