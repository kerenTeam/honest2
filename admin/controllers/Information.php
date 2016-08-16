<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   资讯
*/
class Information extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('tag_model');
		$this->load->model('consulting_model');
		$this->load->library('upload');
	}

	// 列表
	public function lists()
	{
		// 咨询
		$data['consulting'] = $this->consulting_model->consulting();
		// 频道
		$data['tags'] = $this->consulting_model->tags();
		// var_dump($data);
		$this->load->view('information/list',$data);
		$this->load->view('footer');
	}

	// 新增资讯
	public function add()
	{
		if($_POST){
			$data = $_POST;
			$data['commend'] = 1;
			$data['userId'] = $_SESSION['users']['userId'];
			
			$data['tag'] = implode(',',$_POST['tag']);
			if (!empty($_FILES['picImg']['tmp_name'])) {
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['picImg'] = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }else{
                $data['picImg']='';
            }
			if($this->consulting_model->addconsulting($data)){
				echo "<script>alert('新增成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('新增失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
		
	}

	// 编辑资讯
	public function compile()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['cons'] = $this->consulting_model->setconsult($id);
			// 频道
			$data['tags'] = $this->consulting_model->tags();
			$this->load->view('information/compileInformation',$data);
			$this->load->view('footer');
		}
	
	}
	// 编辑咨询处理
	public function editconsulet()
	{
		if($_POST){
			$data = $_POST;
			$data['userId'] = $_SESSION['users']['userId'];
			$id = $_POST['publishId'];
			foreach ($_POST['tag'] as $key => $value) {
				$tag[$key]['tagid'] = $value;
			}
			$data['tag'] = json_encode($tag);
		
			if (!empty($_FILES['picImg']['tmp_name'])) {
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['picImg'] = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }else{
                $data['picImg']=$_POST['picImg'];
            }
			if($this->consulting_model->consuletedit($id,$data)){
				echo "<script>alert('编辑成功！');window.location.href='lists';</script>";exit;
			}else{
				echo "<script>alert('编辑失败！');history.go(-1);location.reload();</script>";exit;
			}

		}
	}
	// 删除咨询
	public function delconsulet()
	{
		if($_GET){
			$id = $_GET['id'];
			if($this->consulting_model->deleteconsulet($id)){
				echo "<script>alert('删除成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('删除失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	// 频道管理
	public function channel()
	{
		$data['tags'] = $this->tag_model->taglist();

		$this->load->view('information/channel',$data);
		$this->load->view('footer');
	}
	// 新增频道
	public function addchannel(){
		if($_POST){

			$tag = $this->input->post('tagName');
			if($this->tag_model->addtag($tag)){
				echo "<script>alert('新增成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('新增失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	// 删除频道
	public function delchannel()
	 {
	 	if($_GET['id']){
	 		$id = $_GET['id'];
	 		if($this->tag_model->deltag($id)){
	 			echo "<script>alert('删除成功！');history.go(-1);location.reload();</script>";exit;
	 		}else{
	 			echo "<script>alert('删除失败！');history.go(-1);location.reload();</script>";exit;
	 		}
	 	}
	 } 

	 // 频道搜索
	 public function channelsearch()
	 {
	 	if($_POST){
	 		$seac = $this->input->post('search');
	 		$sql = "select * from honest_mytag where tagName like '%$seac%'";
	 		$query = $this->db->query($sql);
	 		$data['tags'] = $query->result_array();

	 		$this->load->view('information/channel',$data);
			$this->load->view('footer');
	 	}
	 }

	 // 搜索咨询
	 public function search()
	 {
	 	if($_POST){
	 		$sear = $_POST['sare'];
	 		$data['consulting'] = $this->consulting_model->ConsuleSearch($sear);
			// 频道
			$data['tags'] = $this->consulting_model->tags();
			$this->load->view('information/list',$data);
			$this->load->view('footer');
	 	}
	 }

	 // 分类管理
	 public function classify()
	 {
	 	$this->load->view('information/classify');
	 	$this->load->view('footer');
	 }
}



?>