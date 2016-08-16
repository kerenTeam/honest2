<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   统计管理
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	// 登录
	public function index()
	{
		$this->load->view('login');
	}
	// 登陆操作
	public function adminlogin()
	{
		if($_POST){
			$phone = $this->input->post('phoneNumber');
			$pwd = md5($this->input->post('passWord'));
			$user = $this->user_model->Login($phone);
			if($user){
				if($pwd != $user['passWord']){
					echo "<script>alert('密码输入错误！');history.go(-1);location.reload();</script>";exit;
				}else{
					$_SESSION['users'] = $user;
					$_SESSION['groupId'] = $user['groupId'];
					echo "<script>alert('登录成功！');window.location.href='".site_url('admin/index')."'</script>";exit;
				}
			}else{
				echo "<script>alert('用户不存在！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	public function loginOut()
	{
		unset($_SESSION['users'],$_SESSION['groupId']);
		redirect('login/index');
	}

}



?>