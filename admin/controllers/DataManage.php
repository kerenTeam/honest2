<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   ??ݹ??
*/
class DataManage extends MY_Controller
{
	
	function __construct()
	{
		
		parent::__construct();
		$this->load->view('header');
		$this->load->model('dataMange_model');
	}

	// ?Ա???
	public function staff()
	{
		//?Ա????б?
		//$stafflist = $this->dataManage_model->getStaff();
		$this->load->view('dataManage/staff');
		$this->load->view('footer');
	}

	// ??????
	public function produce()
	{

		$this->load->view('dataManage/produce');
		$this->load->view('footer');
	}

	// ???
	public function branch()
	{

		$this->load->view('dataManage/branch');
		$this->load->view('footer');
	}

	// ְ??
	public function workname()
	{

		$this->load->view('dataManage/workname');
		$this->load->view('footer');
	}

	//专业列表
	public function specialty()
	{
		//??Ժϵ
		$data['faculty'] = $this->dataMange_model->FacultyList('0');
		//??Ժϵ??רҵ
		$data['specialy'] = $this->dataMange_model->SpecialyList();
	
		$this->load->view('dataManage/specialty',$data);
		$this->load->view('footer');
	}
	//新增专业
	public function Addfaculty(){
		if($_POST){
			$arr = array(
				'majorName'=> $_POST['majorName'],
				'typeId'=> 1,
				'majorId'=> 0,
			);
			if($this->dataMange_model->sendFaculty($arr)){
				echo "<script>alert('???ɹ?');history.go(-1);location.reload();</script>";
			}else{
				echo "<script>alert('??ʧ??);history.go(-1);location.reload();</script>";
			}
		}
	}
	
	//修改专业
	public function UpSpeecialy(){
		if($_POST){
			$id = $_POST['id'];
			$where = array('majorName'=>$_POST['name']);
			if($this->dataMange_model->SpecialyUp($id,$where)){
				echo "<script>alert('成功');history.go(-1);location.reload();</script>";
			}else{
				echo "<script>alert('失败');history.go(-1);location.reload();</script>";
			}
		}
	}
	//删除专业
	public function Delspecialy(){
		if($_GET){
			$id = $_GET['id'];
			if($this->dataMange_model->deleteSpecialy($id)){
				echo "<script>alert('成功');history.go(-1);location.reload();</script>";
			}else{
				echo "<script>alert('失败');history.go(-1);location.reload();</script>";
			}
		}
	}
	
	// ??ȫ????
	public function appraise()
	{

		$this->load->view('dataManage/appraise');
		$this->load->view('footer');
	}

	// ע?ᰲȫ?????
	public function register()
	{

		$this->load->view('dataManage/register');
		$this->load->view('footer');
	}


}



?>