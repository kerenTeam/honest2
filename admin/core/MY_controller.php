<?php

/**
*     后台公用类库
*
*/
class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//登陆验证
		if (!$this->session->userdata('users')) {
			
			redirect('login/index');
		}
	}




	
}