<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   信息审核
*/
class Auditing extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('user_model');
		$this->load->model('consulting_model');
		$this->load->library('Jpush');
		
	}
	// 微信审核
	public function weixin()
	{
		// 审核用户提交信息
		$data['userpost'] = $this->user_model->UserWeixin();
		$this->load->view('auditing/weixinList',$data);
		$this->load->view('footer');
	}
	// 审核是否通过
	public function adoptuser()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['state'] = $_GET['state'];
			if($_GET['state'] == 1){
				$userid = $_GET['userid'];
				$user['groupId'] = '5';
				$this->user_model->editAdopt($id,$data);
				$this->user_model->GetWeixinUser($userid,$user);
				redirect('auditing/weixin');exit;
			}else{
				$this->user_model->editAdopt($id,$data);
				redirect('auditing/weixin');exit;
			}
		}
	}
	// 安监局发布审核
	public function safety()
	{
		// 获取安监局发布信息
		$data['safe'] = $this->user_model->SafetyList();
		$this->load->view('auditing/safetyList',$data);
		$this->load->view('footer');

	}

	// 安监局发布审核通过
	public function safetyadopt()
	{
		if($_GET){
			$id = $_GET['id'];
			$state = array('state'=>$_GET['state']);
			$safe = $this->user_model->setSafety($id);
			$data = array(
				'title' => $safe['title'],
				'content' => $safe['content'],
				'picImg' => $safe['picImg'],
				'userId' => $safe['userId'],
				'tag' => $safe['tag'],
				'grade' => $safe['grade'],
				'company' => $safe['company'],
				'state' => '1',
				'publishData' => $safe['publishData'],
				);
			if(!empty($safe['file'])){
				$data['file'] = $safe['file'];
			}
			if($this->consulting_model->addconsulting($data)){
				if($this->user_model->SafetyEdit($id,$state)){
				$a = $this->consulting_model->GetNewPubId();

				 $receive = 'all';$content = mb_substr($safe['content'],0,20,'utf-8');$m_type = 'http';$m_txt ='tab/homeDeatil/'.$a['publishId'];$m_time = '1000';$title = $safe['title'];
				 $result = $this->jpush->push($receive,$content,$title,$m_type,$m_txt,$m_time);
				echo "<script>alert('成功！');window.location.href='safety';</script>";exit;
				}
			}else{
					echo "<script>alert('失败！');window.location.href='safety';</script>";exit;
			}
			
		}
	}
	// 安监局发布审核详情
	public function safetyInfo()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['safe'] = $this->user_model->setSafety($id);
			$this->load->view('auditing/safetyInfo',$data);
			$this->load->view('footer');
		}
	}

	//审核不通过
	public function dieSafe()
	{
		if($_GET){
			$id = $_GET['id'];
			$state = array('state'=>$_GET['state']);
			
			if($this->user_model->SafetyEdit($id,$state)){
				echo "<script>alert('成功！');window.location.href='safety';</script>";exit;
			}else{
				echo "<script>alert('失败！');window.location.href='safety';</script>";exit;
			}
			
		}
	}

	//安监局发布搜索
	public function safeSearch()
	{
		if($_POST){
			$sear = $_POST['search'];
			$data['safe'] = $this->user_model->SafeSearch($sear);
			$this->load->view('auditing/safetyList',$data);
			$this->load->view('footer');
		}
	}

	//咨询师发布
	public function conulting()
	{
		$data['conul'] = $this->consulting_model->GetConsult();
		$this->load->view('auditing/consultList',$data);
		$this->load->view('footer');
	}

	//咨询师发布详情
	public function consultInfo()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['conulting'] = $this->consulting_model->setconsult($id);
			$this->load->view('auditing/consultInfo',$data);
			$this->load->view('footer');
		}
	}

	//咨询师发布审核通过
	public function consultOk()
	{
		if($_GET){
			$id= $_GET['id'];
			$consule = $this->consulting_model->setconsult($id);
			$data =array('state'=>$_GET['state']);
			if($this->consulting_model->consuletedit($id,$data)){
				$receive = 'all';$content = mb_substr($consule['content'],0,20,'utf-8');$m_type = 'http';$m_txt ='tab/homeDeatil/'.$id;$m_time = '1000';$title = $consule['title'];
			    $result = $this->jpush->push($receive,$content,$title,$m_type,$m_txt,$m_time);
				echo "<script>alert('成功！');window.location.href='conulting';</script>";exit;
			}else{
				echo "<script>alert('失败！');window.location.href='conulting';</script>";exit;
			}
		}
	}

}



?>