<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class Problem extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('problem_model');
	}

	// 问题解答列表
	public function problem()
	{
		$data['problem'] = $this->problem_model->problemlist();

		$this->load->view('problem/problemList',$data);
		$this->load->view('footer');
	}

	// 新增问题解答
	public function add()
	{
		if($_POST){
			$data = $_POST;
			$data['fromId'] = $_SESSION['users']['userId'];
			var_dump($data);
			if($this->problem_model->addproblem($data)){
					echo "<script>alert('新增成功！');history.go(-1);location.reload();</script>";exit;
			}else{
					echo "<script>alert('新增失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	
	}

	// 编辑问题解答
	public function compile()
	{

		$this->load->view('problem/compileproblem');
		$this->load->view('footer');
	}

	// 删除问提解答
	public function delproblem()
	{
		if($_GET){
			$id = $_GET['id'];
			if($this->problem_model->delProblem($id)){
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
			$sear = $_POST['sear'];
			$data['problem'] = $this->problem_model->ProSearch($sear);
			$this->load->view('problem/problemList',$data);
			$this->load->view('footer');
		}
	}

	//查询聊天记录
	public function getLiaotian()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['info'] = $this->problem_model->GetProblem($id);

			$this->load->view('problem/liaotian',$data);

		}
	}

}



?>