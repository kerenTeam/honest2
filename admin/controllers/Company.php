<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class Company extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('dataMange_model');
	}

	// 公司信息
	public function index()
	{
		//获取公司信息
		$data['company'] = $this->dataMange_model->CompanyList();
		$this->load->view('company/index',$data);
		$this->load->view('footer');
	}

	// 新增公司信息
	public function add()
	{

		$this->load->view('company/add');
		$this->load->view('footer');
	}

	// 编辑公司信息
	public function edit()
	{

		$this->load->view('company/edit');
		$this->load->view('footer');
	}

	// 公司信息详情
	public function info()
	{
		if($_GET){
			$id = $_GET['id'];
			//公司详细信息
			$data['company'] = $this->dataMange_model->CompanyInfo($id);
			$this->load->view('company/info',$data);
			$this->load->view('footer');
			
		}
		
	}
	//删除公司信息
	public function delcompany(){
		if($_GET){
			$id = $_GET['id'];
			if($this->dataMange_model->DeleteCompany($id)){
				echo "<script>alert('删除成功！');history.go(-1);location.reload();</script>";
			}else{
				echo "<script>alert('删除失败！');history.go(-1);location.reload();</script>";
			}
		}
	}
	
	//搜索公司信息
	public function SeacheCompany(){
		if($_POST){
			$search = $_POST['search'];
			$data['company'] = $this->dataMange_model->SearCompany($search);
			
			$this->load->view('company/index',$data);
			$this->load->view('footer');
			
			
		}
	}
	

}



?>