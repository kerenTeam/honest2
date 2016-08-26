<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   安监局发布
*/
class Government extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('problem_model');
		$this->load->model('consulting_model');
	}

	public function index()
	{

		//获取发布的信息
		$userId = $_SESSION['users']['userId'];
		$data['list'] = $this->problem_model->goverList($userId);
		$this->load->view('government/index',$data);
		$this->load->view('footer');
	}
	
	//新增信息
	public function add()
	{
		//tag
		$data['tags'] = $this->consulting_model->tags();

		//分类
		$data['cates'] = $this->consulting_model->listCate();
		$this->load->view('government/addConsult',$data);
		$this->load->view('footer');
	}

	//新增处理
	public function addConsult(){

		if($_POST){
			$data = $_POST;
			if (!empty($_FILES['picImg']['tmp_name'])) {
				$config['upload_path']      = './upload/imgs/';
	        	$config['allowed_types']    = 'gif|jpg|png|jpeg';
				$config['file_name']     =date("Y-m-d_His");
				$this->load->library('upload', $config);
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['picImg'] = 'upload/imgs/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }
            $data['userId'] = $_SESSION['users']['userId'];
            $data['tag'] = implode(',', $data['tag']);
            $data['publishData'] = date('y-m-d H:i',time());
            if($this->problem_model->ConsuleAdd($data)){
            	echo "<script>alert('成功！');window.location.href='index';</script>";
            }else{
            	echo "<script>alert('失败！');window.location.href='add';</script>";
            }


		}
		
	}

	//信息详情
	public function Search()
	{
		if($_GET){
			
		}
	}

}



?>