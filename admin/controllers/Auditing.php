<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   信息审核
*/
class Auditing extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('user_model');
		
	}


	// 微信审核
	public function weixin()
	{
		// 审核用户提交信息
		$data['userpost'] = $this->user_model->UserWeixin();
		$this->load->view('auditing/weixinList',$data);
		$this->load->view('footer');
	}
	// 审核是否通过
	public function adoptuser()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['state'] = $_GET['state'];
			if($_GET['state'] == 1){
				$userid = $_GET['userid'];
				$user['groupId'] = '5';
				$this->user_model->editAdopt($id,$data);
				$this->user_model->GetWeixinUser($userid,$user);
				redirect('auditing/weixin');exit;
			}else{
				$this->user_model->editAdopt($id,$data);
				redirect('auditing/weixin');exit;
			}
		}
	}
	// 安监局发布审核
	public function safety()
	{
		// 获取安监局发布信息
		$data['safe'] = $this->user_model->SafetyList();


		$this->load->view('auditing/safetyList',$data);
		$this->load->view('footer');

	}

	// 安监局发布审核通过
	public function safetyadopt()
	{
		if($_GET){
			$id = $_GET['id'];
			
		}
	}
	// 安监局发布审核详情
	public function safetyInfo()
	{

		$this->load->view('auditing/safetyInfo');
		$this->load->view('footer');
	}


}



?>