<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   交流互动
*/
class Interaction extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('interaction_model');
		 $this->load->library('upload');
	}

	// 根据tag返回数据
	public function tagretutn()
	{
		$tag = '5';
		$sql ="SELECT a.userName,b.publishId, b.picImg, b.tag, b.title, b.content, b.publishData from honest_member as a, honest_mypublish as b where a.userId = b.userId and b.commend = '0' and b.tag like '%$tag%'  order by b.publishData desc";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		echo "<pre>";
		var_dump($list); 
	}
	// 交流互动列表
	public function iList()
	{	
		$data['interaction'] = $this->interaction_model->listinter();
		// 获取所有频道
		$data['tags'] = $this->interaction_model->listTag();
		$this->load->view('interaction/interactionList',$data);
		$this->load->view('footer');
	}
	// 推荐到咨询
	public function recommend()
	{
		if($_GET){
			$id = $_GET['id'];
			$commend['commend']= '1';
			if($this->interaction_model->Recommendconting($id,$commend)){
				echo "<script>alert('成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	// 新增交流互动
	public function add()
	{
		if($_POST){
			$data = array(
				'title' => $_POST['title'],
				'userId' => $_SESSION['users']['userId'],
				'content'=>$_POST['content'],
				
			);
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
                $data['picImg']='';
            }
			if($this->interaction_model->addinter($data)){
				echo "<script>alert('新增成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('新增失败！');history.go(-1);location.reload();</script>";exit;
			}

		}
	}

	// 编辑交流互动
	public function compile()
	{
		if($_POST){
			$id = $_POST['id'];
			$data = array(
				'title' =>$_POST['title'],
				'content' =>$_POST['content'],
				// 'userId' => $_SESSION['users']['userId'],
			);
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
	
			if($this->interaction_model->interedit($id,$data)){
				echo "<script>alert('修改成功！');window.location.href='iList';</script>";exit;
			}else{
				echo "<script>alert('修改失败！');history.go(-1);location.reload();</script>";exit;
			}
		}else{
			$id = $_GET['id'];
			$data['inters'] = $this->interaction_model->setinter($id);
			// 获取所有频道
			$data['tags'] = $this->interaction_model->listTag();
			$this->load->view('interaction/compileInteraction',$data);
			$this->load->view('footer');
		}
	}

	// 交流互动回复列表
	public function reply()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['comments'] = $this->interaction_model->replyinter($id); 
			$this->load->view('interaction/reply',$data);
			$this->load->view('footer');
		}
		
	}
	// 删除回复
	public function delreoly()
	{
		if($_GET){
			$id = $_GET['id'];
			if($this->interaction_model->repledel($id)){
				echo "<script>alert('删除成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('删除是失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	// 删除交流互动
	public function delinter()
	{
		if($_GET){
			$id = $_GET['id'];
			if($this->interaction_model->interdel($id)){
				echo "<script>alert('删除成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('删除失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	// 搜索
	public function Search()
	{
		if($_POST){
			$sear = $_POST['searname'];
			$data['interaction'] = $this->interaction_model->Searchlist($sear);
			// 获取所有频道
			$data['tags'] = $this->interaction_model->listTag();
			$this->load->view('interaction/interactionList',$data);
			$this->load->view('footer');

		}
	}
}



?>