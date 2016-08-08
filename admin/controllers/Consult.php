<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class Consult extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
	}

	// 咨询管理
	public function index()
	{

		$this->load->view('consult/index');
		$this->load->view('footer');
	}

}



?>