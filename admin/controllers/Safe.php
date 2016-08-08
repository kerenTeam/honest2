<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class Safe extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
	}

	// 安全查询
	public function index()
	{

		$this->load->view('Safe/index');
		$this->load->view('footer');
	}

}



?>