<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*   微信端接口
*/
class API_weixin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('honestapi_model');
	}

	// 微信修改头像
	public function sendWeixinImg()
	{
		if($_FILES){
			$user = $this->honestapi_model->Loginuser($_GET['page']);
			$id = $user['userId'];
			if (!empty($_FILES['file']['tmp_name'])){
				$config['upload_path']      = './upload/headPicImg/';
	        	$config['allowed_types']    = 'gif|jpg|png|jpeg';
	        	$config['max_size']     = 3072;
				$config['file_name']     =date("Y-m-d_His");
	        	$this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('file'))
		        {
		            echo 0;exit;
		        }
		        else
		        {
		         	$fileinfo = $this->upload->data();
		         	$data['headPicImg'] = 'upload/headPicImg/'.$fileinfo['file_name'];
		        }
    		}
    		$this->honestapi_model->EditUser($id,$data);
		}
	}
	
	//获取用户openid 和用户个人信息
	public function getOpenId(){
		if($_GET){
			
		}
	}
	


}








 ?>