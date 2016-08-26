<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_honest extends CI_Controller
{


	function __construct()
	{
		parent::__construct(); 
		$this->load->model('honestapi_model');
	}


	//获取聊天记录
	public function getMessage()
	{
	
		 if($_GET){
		 	$callback = $_GET['callback'];
		 	// userId
		 	$where = json_decode($_GET['problemData'],true);
		 	$user = $this->honestapi_model->Loginuser($where['fromId']);
		 	$userid = $user['userId'];
		 	// 问题id
		 	$informationId = $where['informationId'];
		 	$data = $this->honestapi_model->GetChat($informationId);
		 	foreach($data as $k=>$val){
		 		$data[$k]['headPicImg'] = IP.$val['headPicImg'];
		 	}
		 	if(empty($data)){
		 		$a = 0;
		 		echo "$callback($a)";
		 	}else{
		 		$json = json_encode($data);
		 		echo "$callback($json)";
		 	}
		 }
	}



}
 ?>