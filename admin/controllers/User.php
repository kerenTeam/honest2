<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class User extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('user_model');
		$this->load->library('upload');
		
	}

	// 微信用户
	public function userInfo()
	{
		$data['users'] = $this->user_model->Users('4');
		$this->load->view('user/userInfo',$data);
		$this->load->view('footer');
	}

	// 微信用户编辑
	public function compile()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['users']= $this->user_model->WeixinUserInfo($id);
			$this->load->view('user/compileUser',$data);
			$this->load->view('footer');
		}
		
	}
	// 编辑用户处理
	public function editcompile()
	{
		if($_POST){
			$id = $_POST['id'];
			$data = array(
				'userName' => $_POST['userName'],
				'gender' => $_POST['gender'],
				'address'=>$_POST['address'],
				'occupation' => $_POST['occupation'],
				'summary' => $_POST['summary'],
			);
			if (!empty($_FILES['picImg']['tmp_name'])) {
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['headPicImg'] = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }else{
                $data['headPicImg']=$_POST['picImg'];
            }
          	if($this->user_model->uploaduser($id,$data)){
          		   echo "<script>alert('修改成功！');window.location.href='userInfo';</script>";exit;
          	}else{
          		  echo "<script>alert('修改失败！');history.go(-1);location.reload();</script>";exit;
          	}
		}
	}

	// 用户详情
	public function info()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['userinfo'] = $this->user_model->WeixinUserInfo($id);
			// var_dump($userinfo); 
			$this->load->view('user/lookuser',$data);
			$this->load->view('footer');
		}
	}
	// 用户资料审核
	public function Auditing()
	{
		$data['users'] = $this->user_model->AuditingUser();
		$this->load->view('user/auditing',$data);
		$this->load->view('footer');
	}
	//审核信息详情
	public function AudingInfo(){
			if($_GET){
				$id = $_GET['id'];
				$data['userinfo'] = $this->user_model->AuditingInfo($id);
				$this->load->view('user/audingInfo',$data);
				$this->load->view('footer');
			}
	}
	//审核通过
	public function OkAuding(){
		if($_GET){
			$id = $_GET['id'];
			$data = $this->user_model->AuditingInfo($id);
			unset($data['id']);
			$userid = $data['userId'];
			$arr = array_filter($data);
			if($this->user_model->uploaduser($userid,$arr)){
				$a = array('state'=>'1');
				$this->user_model->AudState($id,$a);
				echo "<script>alert('成功！');history.go(-1);location.reload();</script>";
			}else{
				echo "<script>alert('失败！');history.go(-1);location.reload();</script>";
			}
		}
	}
	//审核失败
	public function NoAuding(){
		if($_GET){
			$id = $_GET['id'];
			$a = array('state'=>'2');
			if($this->user_model->AudState($id,$a)){
				echo "<script>alert('拒绝成功！');history.go(-1);location.reload();</script>";
			}else{
				echo "<script>alert('失败！');history.go(-1);location.reload();</script>";
			}
		}
	}
	// 删除用户
	public function deluser()
	{
		if($_GET){
			$id = $_GET['id'];
			if($this->user_model->userdel($id)){
				echo "<script>alert('删除成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('删除失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	// 咨询师
	public function counselor()
	{
		$data['users'] = $this->user_model->Users('5');
		$this->load->view('user/counselor',$data);
		$this->load->view('footer');
	}

	// 新增咨询师
	public function addCounselor()
	{	
		if($_POST){
			$data = $_POST;
			$data['groupId'] = '5';
			if (!empty($_FILES['picImg']['tmp_name'])) {
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['headPicImg'] = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }
            
            if($this->user_model->Counseloradd($data)){
            		echo "<script>alert('新增成功！');window.location.href='counselor';</script>";exit;
            }else{
            	echo "<script>alert('新增失败！');history.go(-1);location.reload();</script>";exit;
            }


		}
	}	

	// 咨询师编辑
	public function complileCounselor()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['users'] = $this->user_model->WeixinUserInfo($id);
			// var_dump($userinfo); 
			$this->load->view('user/complileCounselor',$data);
			$this->load->view('footer');
		}
	
	}

	// 咨询师编处理
	public function editcounselor()
	{
		if($_POST){
			$id = $_POST['id'];
			$data = array(
				'userName' => $_POST['userName'],
				'gender' => $_POST['gender'],
				'address'=>$_POST['address'],
				'occupation' => $_POST['occupation'],
				'summary' => $_POST['summary'],
			);
			if (!empty($_FILES['picImg']['tmp_name'])) {
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['headPicImg'] = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }else{
                $data['headPicImg']=$_POST['picImg'];
            }
          	if($this->user_model->uploaduser($id,$data)){
          		   echo "<script>alert('修改成功！');window.location.href='counselor';</script>";exit;
          	}else{
          		  echo "<script>alert('修改失败！');history.go(-1);location.reload();</script>";exit;
          	}
		}
	}

	// 咨询师详情
	public function counselorinfo()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['userinfo'] = $this->user_model->WeixinUserInfo($id);
			$this->load->view('user/counselorinfo',$data);
			$this->load->view('footer');
		}
	}

	// 咨询记录
	public function search()
	{

		$this->load->view('user/search');
		$this->load->view('footer');
	}

	// 安监局
	public function safety()
	{
		$data['users'] = $this->user_model->Users('6');
		$this->load->view('user/safety',$data);
		$this->load->view('footer');
	}
	// 新增安监局用户
	public function addsafety($value='')
	{
		if($_POST){
			$data = $_POST;
			$data['groupId'] = '6';
			if (!empty($_FILES['picImg']['tmp_name'])) {
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['headPicImg'] = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }else{
                $data['headPicImg']='';
            }
            if($this->user_model->Counseloradd($data)){
            		echo "<script>alert('新增成功！');history.go(-1);location.reload();</script>";exit;
            }else{
            	echo "<script>alert('新增失败！');history.go(-1);location.reload();</script>";exit;
            }

		}
	}
	// 安监局编辑
	public function cSafety()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['users'] = $this->user_model->WeixinUserInfo($id);

			$this->load->view('user/compileSafety',$data);
			$this->load->view('footer');
		}
	}
	// 安监局编辑操作
	public function EditSafety()
	{
		if($_POST){
			$id = $_POST['id'];
			$data = array(
				'userName' => $_POST['userName'],
				'gender' => $_POST['gender'],
				'address'=>$_POST['address'],
				'occupation' => $_POST['occupation'],
				'summary' => $_POST['summary'],
			);
			if (!empty($_FILES['picImg']['tmp_name'])) {
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['headPicImg'] = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }else{
                $data['headPicImg']=$_POST['picImg'];
            }
          	if($this->user_model->uploaduser($id,$data)){
          		   echo "<script>alert('修改成功！');window.location.href='safety';</script>";exit;
          	}else{
          		  echo "<script>alert('修改失败！');history.go(-1);location.reload();</script>";exit;
          	}
		}
	}
	// 安监局详情
	public function safetyInfo()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['userinfo'] = $this->user_model->WeixinUserInfo($id);
			$this->load->view('user/safetyInfo',$data);
			$this->load->view('footer');
		}
	}
}



?>