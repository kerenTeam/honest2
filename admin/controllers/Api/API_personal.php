<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户中心接口
*   
*/

class API_personal extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('honestapi_model');

	}

	// 个人中心
	public function personalcenter() 
	{
		if($_GET){
			$callback= $_GET['callback'];
			header('content-type:text/html;charset=utf8');
			$phone = json_decode($_GET['accountData'],true);
			$user = $this->honestapi_model->Loginuser($phone['phoneNumber']);
			$user['headPicImg'] = IP.$user['headPicImg'];
			// 返回公司信息
			$userId = $user['userId'];
			$sql = "SELECT companyId from honest_company where userId = $userId";
			$query = $this->db->query($sql);
			$companyid= $query->row_array();
			if(!empty($companyid)){
				$user['companyId'] = $companyid['companyId'];
			}else{
				$data = array('userId' => $userId,'logo'=> 'upload/companylogo/2016-08-15_111231.jpg','tag'=>'4,3,2');
				if($this->honestapi_model->AddCompany($data)){
					$sql = "SELECT companyId from honest_company where userId = $userId";
					$query = $this->db->query($sql);
					$companyid= $query->row_array();
					$user['companyId'] = $companyid['companyId'];
				}
			}
			
			//个人证书
			if(!empty($user['myCertificate'])){
				$myCertifi= json_decode($user['myCertificate'],true);
				foreach ($myCertifi as $k => $v) {
					$myCertifi[$k]['certificateImg'] = IP.$v['certificateImg']; 
				}
				$user['myCertificate'] = $myCertifi;
			}else{
				$user['myCertificate'] = '';
			}
			$json = json_encode($user);
			if($user){
				echo "$callback($json)";
			}else{
				$a = 0;
				echo "$callback($a)";
			}
		}
	}

	// 返回所有专业
	public function getMajorList()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$get = json_decode($_GET['getMajorListData'],true);
			if(!isset($get['id'])){
				$user = $this->honestapi_model->Loginuser($get['phoneNumber']);
				$major = $this->honestapi_model->GetMajor($user['faculty']);
				if(empty($major)){
					echo "$callback(0)";exit;
				}else{
					$json = json_encode($major);
					echo "$callback($json)";exit;
				}
			}{
				$major = $this->honestapi_model->GetMajor($get['id']);
				if(empty($major)){
					echo "$callback(0)";exit;
				}else{
					$json = json_encode($major);
					echo "$callback($json)";exit;
				}
			}
		}
	}
	// 返回所有院系
	public function getFacultyList()
	{
		if($_GET){
			$callback = $_GET['callback'];
			// 所有院系
			$faculty = $this->honestapi_model->GetFaculty();
			if(empty($faculty)){
				echo "$callback(0)";
			}else{
				$json = json_encode($faculty);
				echo "$callback($json)";
			}
		}
	}

	// 返回注安师规则
	public function SecurityDivision()
	{
		if($_GET){
			$callback = $_GET['callback'];
			//获取所有注安师
			$secur = $this->honestapi_model->GetSecurity();
			if(empty($secur)){
				echo "$callback(0)";
			}else{
				$json = json_encode($secur);
				echo "$callback($json)";
			}
		}
	}
	// 关于我的  
	public function tagformAll()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$get = json_decode($_GET['myData'],true);
			
				// 获取用户id
			$user = $this->honestapi_model->Loginuser($get['phoneNumber']);
				// 1 是我的回复  0是我的发布
			if($get['state'] != 0){
				// 我的发布
				 $where['userId'] = $user['userId'];
				 $postlist = $this->honestapi_model->MyRelease($where);
			}else{
				// 我的回复
				$userid = $user['userId'];
				$sql = "select questionId from honest_comment where userId = $userid group by questionId";
				$query = $this->db->query($sql);
				$comment = $query->result_array();

				foreach($comment as $v){
					$where['publishId'] = $v['questionId'];
					$con[] = $this->honestapi_model->MyReply($where);
				}
				$list = array_filter($con);
				foreach ($list as $key => $value) {
					$postlist[] = $value;
				}
			}
			// // 返回数据
			if($postlist){
				$json = json_encode($postlist);
				echo "$callback($json)";
			}else{
				$a = 0;
				echo "$callback($a)";
			}
		}
	}

	// 咨询记录
	public function consultingRecords()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$phone = json_decode($_GET['informationAllData'],true);
			$user = $this->honestapi_model->Loginuser($phone['phoneNumber']);
			$userid = $user['userId'];
			$sql = "SELECT a.questionId, a.fromId, a.toId, a.exchangeTitle, a.exchangeTime, b.userName from honest_myquestion as a, honest_member as b where a.toId=b.userId and a.fromId = $userid";
			$query = $this->db->query($sql);
			$post = $query->result_array();
			if($post){
				$json = json_encode($post);
				echo "$callback($json)";
			}else{
				$a = 0;
				echo "$callback($a)";
			}
		}
	}


	// 咨询发布
	public function ReleasInformatione()
	{
		if($_POST){
			$data =array('title'=>$_POST['title'],'content'=>$_POST['content'],'state'=>'2',);
			$user = $this->honestapi_model->Loginuser($_POST['phoneNumber']);
			$data['userId'] = $user['userId'];
			if($user['groupId'] == 6){
				$data['state'] = '3';
			}
			if (!empty($_FILES['ffile']['tmp_name'])) {
				$config['upload_path'] = './upload/umeditor/';
	        	$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name']     =date("Y-m-d_His");
	        	$this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('ffile')){
		            echo 0;
		        }
		        else{
		         	$fileinfo = $this->upload->data();
		        	$data['picImg'] = 'upload/umeditor/'.$fileinfo['file_name'];
	 	        }
    		}
			$data['tag'] =str_replace('}','',str_replace('{','',$_POST['tag']));
    		if($this->honestapi_model->InformationeReleas($data)){
    			echo "1";
    		}else{
    			echo "0";
    		} 
		}

	}


	// 返回个人公司信息
	public function companyInfo()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$phone = json_decode($_GET['problemData'],true);
			$user = $this->honestapi_model->Loginuser($phone['phoneNumber']);
			$company = $this->honestapi_model->GetCompany($user['userId']);
			$company['logo'] = IP.$company['logo'];
			// $company['region'] = explode('|',$company['region']);
			//var_dump($company);
			
			if(empty($company)){
				echo "$callback(0)";
			}else{
				$json = json_encode($company);
				echo "$callback($json)";
			}
		}
	}

	// 返回公司tag
	public function companyTag()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$phone = json_decode($_GET['problemData'],true);
			$user = $this->honestapi_model->Loginuser($phone['phoneNumber']);
			$company = $this->honestapi_model->GetCompany($user['userId']);
			//公司标签
			$tag = explode(',',$company['tag']);
			// 所有标签
			$tags = $this->honestapi_model->Channel();

			foreach ($tags as $key => $value) {
				$tags[$key]['checked'] = false;
				foreach ($tag as $k => $v) {
					if($value['tag'] == $v){
						$tags[$key]['checked'] = true;
					}
				}
			}
			if(empty($tags)){
				echo "$callback(0)";
			}else{
				$json = json_encode($tags);
				echo "$callback($json)";
			}
		}
	}
	// 返回用户tag
	public function userTag()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$phone = json_decode($_GET['userTagData'],true);
			$user = $this->honestapi_model->Loginuser($phone['phoneNumber']);
			$tag = explode(',',$user['myTag']);
			// 所有标签
			$tags = $this->honestapi_model->Channel();

			foreach ($tags as $key => $value) {
				$tags[$key]['checked'] = false;
				foreach ($tag as $k => $v) {
					if($value['tag'] == $v){
						$tags[$key]['checked'] = true;
					}
				}
			}
			if(empty($tags)){
				echo "$callback(0)";
			}else{
				$json = json_encode($tags);
				echo "$callback($json)";
			}

		}
	}
	
	//用户公司资料修改
	public function sendCompany()
	 {
	 	
	 	if($_GET){
	 		//公司所有信息
	 		$callback = $_GET['callback'];
	 		$data = json_decode($_GET['sendCompanyData'],true);
	 		$id =  $data['companyId'];
	 		$arr = array(
	 			'companyName' => $data['companyName'],
	 			'enterpriseInfo' => $data['enterpriseInfo'],
	 			'address' => $data['address'],
	 			'device' => $data['device'],
	 			'technology' => $data['technology'],
	 			'safety' => $data['safety'],
	 			'health' => $data['health'],
	 			'scale' => $data['scale'],
	 			'production' => $data['production']
	 		);
	 		//公司所属tag
	 		if(!empty($data['checkboxTag'])){
	 			$arr['tag'] = implode(',',$data['checkboxTag']);
	 		}
	 		// 行政区
	 		if(!empty($data['region'])){
	 			$arr['region'] = implode('-',$data['region']);
	 		}
			
				$a = array_filter($arr);
	    	//修改
			if($this->honestapi_model->EditCompany($id,$a)){
				echo "$callback(1)";
			}else{
				echo "$callback(0)";
			}
	 	}
	 } 
	 // 修改公司logo
	 public function sendCompanyLogo()
	 { 
	 	if($_FILES){
	 		$id = $_GET['companyId'];
	 		// 公司logo
	 		if (!empty($_FILES['file']['tmp_name'])){
				$config['upload_path']      = './upload/companylogo/';
	        	$config['allowed_types']    = 'gif|jpg|png|jpge';
	        	$config['max_size']     = 3072;
				$config['file_name']     =date("Y-m-d_His");
	        	$this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('file'))
		        {
		            echo 0;exit;
		        }
		        else
		        {
		         	$fileinfo = $this->upload->data();
		         	$data['logo'] = 'upload/companylogo/'.$fileinfo['file_name'];
		        }
    		}
    		if(!empty($data)){
    			//修改
	    		if($this->honestapi_model->EditCompany($id,$data)){
	    			echo "1";
	    		}else{
	    			echo "0";
	    		}
			}else{
				echo "$callback(0)";
			}
	 	}
	 }

	// 修改微信用户资料
	public function sendWeixinUser()
	{
		if($_GET){
			$callback = $_GET['callback'];
			// 接收资料
			$userData = json_decode($_GET['sendUserData'],true);
			file_put_contents('test.log', var_export($userData,true)."\r\n",FILE_APPEND);
			$id = $userData['userId'];
			if(!empty($userData['myTag'])){
				$userData['myTag'] = implode(',',$userData['myTag']);
			}
    		// 修改用户资料
    		if($this->honestapi_model->EditUser($id,$userData)){
    			echo "1";
    		}else{
    			echo "0";
    		}
		}
	}


	//  咨询师证书上传
	public function ConsultantFile()
	{
		
		// 上传图片
		if (!empty($_FILES['file']['tmp_name'])){
			$config['upload_path']      = './upload/certificate/';
        	$config['allowed_types']    = 'gif|jpg|png|jpeg';
        	$config['max_size']     = 3072;
			$config['file_name']     =date("Y-m-d_His");
        	$this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('file'))
	        {
	            echo 0;exit;
	        }
	        else
	        { 
	         	$fileinfo = $this->upload->data();
	         	$url= 'upload/certificate/'.$fileinfo['file_name'];
	        }
		}

		$phone = $_GET['page'];
		$user = $this->honestapi_model->Loginuser($phone);
		$myCertificate = json_decode($user['myCertificate'],true);

		$myCertificate[] = array(
			'certificateId' => count($myCertificate)+1,
			'certificateImg' => $url,
			'certificateName' => '咨询师证书',
			); 

		
		$arr['myCertificate'] = json_encode($myCertificate);
		$this->honestapi_model->sendCertificate($user['userId'],$arr);
	}
	// 修改头像
	public function sendUserImg()
	{
		if($_FILES){
			$user = $this->honestapi_model->Loginuser($_POST['phoneNumber']);
			$id = $user['userId'];
			
			if (!empty($_FILES['ffile']['tmp_name'])){
				$config['upload_path']      = './upload/headPicImg/';
	        	$config['allowed_types']    = 'gif|jpg|png|jpeg';
	        	$config['max_size']     = 3072;
				$config['file_name']     =date("Y-m-d_His");
	        	$this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('ffile'))
		        {
		            echo 0;exit;
		        }
		        else
		        {
		         	$fileinfo = $this->upload->data();
		         	$data['headPicImg'] = 'upload/headPicImg/'.$fileinfo['file_name'];
		        }
    		}
    		$this->honestapi_model->EditUser($id,$data);
		}
	}

	// 咨询师资料修改
	public function sendConsultant()
	{
		
		header('Content-type:application/json;charset=UTF-8');
		$a = file_get_contents('php://input');
		if(!empty($a)){
			$postData = json_decode($a,true);
			$data = json_decode($postData['params']['sendConsultantData'],true);
		
			$arr = $data['userData'];
			// 删除不需要改的字段
			unset(
				$arr['groupId'],
				$arr['openId'],
				$arr['headPicImg'],
				$arr['passWord'],
				$arr['phoneNumber'],
				$arr['companyId']
			);
			
			//我的标签
			if(!empty($data['userTag'])){
				$arr['myTag'] = implode(',',$data['userTag']);
			}else{
				$arr['myTag'] = '';
			}
			//咨询师证书
			if(!empty($data['myCertificate'])){
			$arr['myCertificate'] = json_encode($arr['myCertificate']);
			
			}else{
				$arr['myCertificate'] ='';
			}
			// // 修改资料
			$a = array_filter($arr);
			if($this->honestapi_model->UserInfo($a)){
				$a = 1;
				echo $a;
			}else{
				echo 0;
			}
		}
	}






}