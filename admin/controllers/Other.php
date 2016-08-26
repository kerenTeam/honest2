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
		$this->load->model('dataMange_model');
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
	

	//新增专业
	public function Addspecialy(){
		if($_POST){
			$arr = array(
				'majorId' => $_POST['id'],
				'majorName' => $_POST['name'],
				'typeId' => 1
			);
			if($this->dataMange_model->SpecialyAdd($arr)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}


	//修改专业
	public function UpSpeecialy(){
		if($_POST){
			$id = $_POST['id'];
			$where = array('majorName'=>$_POST['name']);
			if($this->dataMange_model->SpecialyUp($id,$where)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}


	//上传图片
	public function UploadImg()
	{
		$base64_img = trim($_POST['img']);
	    $up_dir = 'upload/images/';
	 
	    if(!file_exists($up_dir)){
	        mkdir($up_dir,0777);
	    }
	    $base64_body = substr(strstr($base64_img,','),1);
	    $data= base64_decode($base64_img);
	 
	  

	            $new_file = $up_dir.date('YmdHis_').'.jpg';
	            if(file_put_contents($new_file,$data)){
	                $img_path =  $new_file;
	                echo  $img_path;
	            }else{
	            	echo "2345678";
	            }
	    
   	}


}



?>