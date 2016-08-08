<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   统计管理
*/
class Other extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('interaction_model');
		$this->load->model('consulting_model');
	}

	// 访问数据详情
	public function visitInfo()
	{

		$this->load->view('statistics/visitInfo');
	}

	// 用户行为详情
	public function actionInfo()
	{

		$this->load->view('statistics/actionInfo');
	}

	// 资讯数据详情
	public function zixunInfo()
	{

		$this->load->view('statistics/zixunInfo');
	}

	// 根据tag返回交流互动数据
	public function taglist()
	{
		if($_POST){
			$tag = $_POST['tag'];
			if($tag == 0){
				$data = $this->interaction_model->listinter();
			}else{
				$data = $this->interaction_model->setTaglist($tag);
			}
			$json = json_encode($data);
			echo $json;
		}
	}

	// 根据tag返回咨询数据
	public function tagConsulting()
	{
		if($_POST){
			$tag = $_POST['tag'];
			if($tag == 0){
				$data = $this->consulting_model->consulting();
			}else{
				$data = $this->consulting_model->setTagconsult($tag,'1');
			}
			$json = json_encode($data);
			echo $json;
		}
	}


}



?>