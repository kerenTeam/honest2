<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   统计管理
*/
class System extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('user_model');
		$this->load->model('Systen_model');
		$this->load->library('upload');
	}

	// 后台用户管理
	public function user()
	{
		$data['users'] = $this->user_model->adminUser();
		$this->load->view('system/adminUser',$data);
		$this->load->view('footer');
	}
	// 新增后台管理用户
	public function addadminUser()
	{
		if($_POST){
			if($_POST['passWord'] != $_POST['pwd']){
				echo "<script>alert('确认密码错误！');history.go(-1);</script>";exit;
			}
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
			$data = array(
				'userName' => $_POST['userName'],
				'phoneNumber' => $_POST['phoneNumber'],
				'email' => $_POST['email'],
				'passWord' => md5($_POST['passWord']),
				'groupId' => '2',
			);
			if($this->user_model->Counseloradd($data)){
				echo "<script>alert('添加成功！');history.go(-1);</script>";exit;
			}else{
				echo "<script>alert('添加失败！');history.go(-1);</script>";exit;
			}
		}
	}


	// 删除管理账户
	public function deladminuser()
	{
		if($_GET){
			$id = $_GET['id'];
			if($this->user_model->userdel($id)){
					echo "<script>alert('删除成功！');history.go(-1);</script>";exit;
			}else{
				echo "<script>alert('删除失败！');history.go(-1);</script>";exit;
			}
		}
	}

	// 修改密码
	public function exitPassword()
	{
		if($_POST){
			$id = $_POST['id'];
			$user = $this->user_model->WeixinUserInfo($id);
			if(md5($_POST['passWord']) != $user['passWord']){
				echo "<script>alert('原密码输入错误！');history.go(-1);location.reload();</script>";exit;
			}
			if($_POST['newpassword'] != $_POST['pwd']){
				echo "<script>alert('确认密码和新密码不一致');history.go(-1);location.reload();</script>";exit;
			}
			$data['passWord'] = md5($_POST['newpassword']);
			if($this->user_model->EditPassWord($id,$data)){
				echo "<script>alert('修改成功！');history.go(-1);</script>";exit;
			}else{
				echo "<script>alert('修改失败！');history.go(-1);</script>";exit;
			}
		}
	}

	// 转出为微信用户
	public function getweixinuser()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['groupId'] = '4';
			if($this->user_model->GetWeixinUser($id,$data)){
				echo "<script>alert('成功！');history.go(-1);</script>";exit;
			}else{
				echo "<script>alert('失败！');history.go(-1);</script>";exit;
			}
		}
	}

	// banner  管理
	public function banners()
	{	
		// 获取所有banner
		$list = $this->Systen_model->Banners();
		$data['banner'] = json_decode($list['value'],true);

		$this->load->view('system/banners',$data);
		$this->load->view('footer');
	}
	// banner 修改
	public function editbanner()
	{
		if($_POST){
			if (!empty($_FILES['fileimg']['tmp_name'])) {
                if ($this->upload->do_upload('fileimg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $bannerImg = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }else{
            	 $bannerImg = $_POST['bannerImg'];
            }

			$list = $this->Systen_model->Banners();
			$banner = json_decode($list['value'],true);
			foreach ($banner as $key => $value) {
				if($value['bannerImg'] == $_POST['bannerImg']){
					$banner[$key]['bannerImg'] = $bannerImg;
				}
			}

			$data['value'] = json_encode($banner);
			if($this->Systen_model->EditBanner($data)){
				echo "<script>alert('修改成功');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('修改失败');history.go(-1);location.reload();</script>";exit;
			}
		}
	}
	// 角色管理
	public function role()
	{

		$this->load->view('system/role');
		$this->load->view('footer');
	}

	// 权限管理
	public function authority() 
	{

		$this->load->view('system/authority');
		$this->load->view('footer');
	}

	// 系统日志
	public function log()
	{

		$this->load->view('system/log');
		$this->load->view('footer');
	}


}



?>