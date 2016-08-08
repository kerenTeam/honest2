<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   API接口
*   
*/
class API_honest extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin:*'); 
		$this->load->model('honestapi_model');

		 // $this->load->library('upload');
	}
	// banner
	public function banner()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$banners = $this->honestapi_model->Banners();
			$data = json_decode($banners['value'],true);
			foreach ($data as $key => $value) {
				$data[$key]['bannerImg'] = IP.$value['bannerImg'];
			}
			$json = json_encode($data);
			if(empty($banners)){		
				echo "$callback(0)";
			}else{
				echo "$callback($json)";
			}
		}
	}
	// 资讯信息
	public function findAllByInformation()
	{	
			
		if($_GET){
		
			$callback = $_GET['callback'];
			$limit = json_decode($_GET['informationData'],true);
			//分页
			$size = $limit['pageSize'];
			if($limit['currentPage'] != 1){
				$page =$limit['currentPage']*$size-$size;
			}else{
				$page = $limit['currentPage'] -1;
			}
			// 获取用户喜爱标签
			$user = $this->honestapi_model->Loginuser($limit['phoneNumber']);
			$tag = json_decode($user['myTag'],true);
			foreach ($tag as $key => $v) {
				$arr[] = $v['myTagId'];
			}
			//获取信息
			$list = $this->honestapi_model->Consulting($page,$size,$arr);
			//给图片加上ip
			foreach ($list as $key => $value) {
				$list[$key]['picImg'] = IP.$value['picImg'];
			}
			$json = json_encode($list);
			if(empty($list)){
				//var_dump(NULL);
				$a = 0;
				echo "$callback($a)";
			}else{
				echo "$callback($json)";
			}
		}
	}

	//交流互动
	public function findAll()
	{		

		if($_GET){
			$callback = $_GET['callback'];
			$limit = json_decode($_GET['pageData'],true);
			$page = $limit['currentPage'];
			$size = $limit['pageSize'];
			if($page != 1){
				$page =$page*$size-$size;
			}else{
				$page = $page -1;
				//获取用户所在区域
				$user = $this->honestapi_model->Loginuser($limit['phoneNumber']);
				$ip = $user['address'];
				//获取置顶消息
				$abc =  $this->honestapi_model->Government($ip);
				$size = $size - count($abc);
			}
			//获取交流互动
			$interacting = $this->honestapi_model->Interacting($page,$size);
			//第一次有置顶消息
			if($page == 0){
				$interacting = array_merge($abc,$interacting);
			}
			//给列表图加上IP地址
			foreach ($interacting as $key => $value) {
					$interacting[$key]['picImg'] = IP.$value['picImg'];
			}
			$json = json_encode($interacting);
			if(empty($interacting)){
				$a = 0;
				echo "$callback($a)";
			}else{
				echo "$callback($json)";
			}
		}
	}
	// 交流互动详情  + 咨询信息详情
	public function InformationDeatil()
	{
		if($_GET){
			//file_put_contents('test.log', var_export($_GET,true)."\r\n",FILE_APPEND);
			$callback = $_GET['callback'];
			$get = json_decode($_GET['InformationDeatilData'],true);
			$id = $get['homeId'];
			// $id = $_GET['id'];
			// 查出该文章内容及作者
			$sql1 = "SELECT a.publishId, a.title, a.content, a.picImg, a.publishData, a.comments, b.userName, b.headPicImg FROM honest_member as b, honest_mypublish as a where a.userId = b.userId and a.publishId = $id";
			$query1 = $this->db->query($sql1);
			$interinfo = $query1->row_array();
			$interinfo['picImg'] = IP.$interinfo['picImg'];
			$interinfo['headPicImg'] = IP.$interinfo['headPicImg'];

			//$interinfo = $this->honestapi_model->InterInfo($id);
			// 查出是否有评论
			$pinid = json_decode($interinfo['comments'],true);
			if(!empty($pinid)){
				foreach ($pinid as $key => $value) {
					$sql = "SELECT a.commentId, a.comment, a.recommentId, a.commentTime, b.userName, b.headPicImg,b.userId FROM honest_member AS b, honest_comment AS a WHERE a.userId = b.userId AND a.commentId =$value";
					$query = $this->db->query($sql);
					$comment[$key] = $query->row_array(); 
				}
				foreach ($comment as $k => $v) {
					$comment[$k]['headPicImg'] = IP.$v['headPicImg'];
				}
				$interinfo['comment'] = $comment;
				$interinfo['number'] = count($comment);
			}else{
				$interinfo['comment'] = '';
				$interinfo['number'] = '0';
			}
	
			if(empty($interinfo)){ 
				echo "$callback(0)";
			}else{ 
				$json = json_encode($interinfo);
				echo "$callback($json)";
			}
		}
	}

	// 问题解答
	public function problem()
	{
		if($_GET){
			//file_put_contents('test.log', var_export($_GET,true)."\r\n",FILE_APPEND);
			$callback = $_GET['callback'];
			$phone = json_decode($_GET['problemData'],true);
			$user = $this->honestapi_model->Loginuser($phone['phoneNumber']);
			$id = $user['userId'];
			if($user['groupId'] == 4){
				$problem = $this->honestapi_model->Problem($id);
			}else if($user['groupId'] == 5){
				$problem = $this->honestapi_model->ConsultationWen($id);
			}
		
			foreach ($problem as $key => $value) {
				$problem[$key]['headPicImg'] = IP.$value['headPicImg'];
			}
			$json = json_encode($problem);
			if(empty($problem)){
				echo "$callback(0)";
			}else{
				echo "$callback($json)";
			}
		}
	}

	// 所有频道管理
	public function channelTag()
	{
		$callback = $_GET['callback'];
		$channel = $this->honestapi_model->Channel();
		$json = json_encode($channel);
		if(empty($channel)){
			echo "$callback(0)";
		}else{
			echo "$callback($json)";
		}
	}
	// 我的频道
	public function mychannels()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$phone = json_decode($_GET['phoneNumberData'],true);
			$channel = $this->honestapi_model->MyChannel($phone['phoneNumber']);
			$json = $channel['myTag'];
			// echo $json;
			if(empty($json)){
				$tag = $this->honestapi_model->Channel();
				$tags = json_encode($tag);
				echo "$callback($tags)";
			}else{
				echo "$callback($json)";
			}
		}
	}


	// 注册用户
	public function register(){

		if($_GET){
			$callback = $_GET['callback'];
			$arr = json_decode($_GET['registerData'],true);
			$data = array(
				'phoneNumber' => $arr['phoneNumber'],
				'passWord' => $arr['passWord'],
			);
			$phone = $arr['phoneNumber'];
			// echo "$callback($phone)";
			$user = $this->honestapi_model->Loginuser($phone);
			if($user != ''){
				// 该用户已注册
				echo "$callback(2)";
			}else{
				if($this->honestapi_model->Register($data )){
					// 注册成功
					echo "$callback(1)";
				}else{
					// 注册失败
					echo "$callback(0)";
				}
			}
		}
	} 
	// 忘记密码
	public function forgetpwd()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$arr = json_decode($_GET['modifyPasswordData'],true);
			$phone = $arr['phoneNumber'];
			$data = array(
					'passWord'=> $arr['newPassWord'],
				);
			$user = $this->honestapi_model->Loginuser($phone);
			if(!empty($user)){
				if($this->honestapi_model->NewPassword($data,$phone)){
					// 修改成功
					echo "$callback(1)"; 
				}else{
					// 修改失败
					echo "$callback(2)";
				}
			}else{
				// 没有该用户
				echo "$callback(0)";
			}
		}
	}

	// 登陆用户
	public function login()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$data = json_decode($_GET['loginData'],true);
			$user = $this->honestapi_model->Loginuser($data['phoneNumber']);
			if(!empty($user)){
				if($data['passWord'] != $user['passWord']){
					// 密码错误
					echo "$callback(2)"; 
				}else{
					// 登陆成功
					echo "$callback(1)";
				}
			}else{
				// 没有该用户
				echo "$callback(0)";
			}
		}
	}

	//获取验证码
	public function send()
	{
		if($_GET){
			$callback= $_GET['callback'];
			$phone = json_decode($_GET['sendData'],true);
			if(empty($phone['phoneNumber'])){
				  echo "$callback(0)";
			}else{
			// $ch = curl_init();
		 //    $url = 'http://apis.baidu.com/kingtto_media/106sms/106sms?mobile='.$phone['phoneNumber'].'&content=%e3%80%90%e5%a4%a7%e5%8e%a8%e5%88%b0%e5%ae%b6%e3%80%91%e6%82%a8%e7%9a%84%e6%b3%a8%e5%86%8c%e9%aa%8c%e8%af%81%e7%a0%81%e4%b8%ba%ef%bc%9a'.randNms;
		 //    $header = array('apikey: f8ae5ba4094b4d5134303eb87f7a115d');
		 //    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
		 //    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 //    curl_setopt($ch , CURLOPT_URL , $url);
		 //    $res = curl_exec($ch);
		    $code = randNms;
		    echo "$callback($code)";
		    }
		}
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

	// 评论
	public function goComment()
	{	
		if($_GET){
			$callback = $_GET['callback'];
			$get = json_decode($_GET['goCommentData'],true);
			
			if(strlen($get['phoneNumber']) == 11){
				$user = $this->honestapi_model->Loginuser($get['phoneNumber']);
				$menterid = $user['userId'];
				$recommentId = $get['recommentId'];
			}else{
				$user = $this->honestapi_model->Loginuser($get['recommentId']);
				$menterid = $user['userId'];
				$recommentId = $get['phoneNumber'];
			}
			$data = array(
				'questionId' => $get['publishId'],
				'userId' => $menterid,
				'recommentId' =>$recommentId,
				'comment' => $get['res']
			);
			if(empty($menterid) && empty($userId)){
				$a = 0;
				echo "$callback($a)";
			}else{
				if($this->honestapi_model->AddComment($data)){
					$a= 1;
					$sql2 = "select last_insert_id() as insertId";
					$query = $this->db->query($sql2);
					$id = $query->row_array();
					$commentid = $id['insertId'];
					$pubid = $get['publishId'];
					$sql3 = "SELECT comments FROM honest_mypublish where publishId =$pubid";
					$query = $this->db->query($sql3);
					$interinfo = $query->row_array();
					if(empty($interinfo)){
						$commtdata['1'] = $commentid;
					}else{
						$commtdata = json_decode($interinfo['comments'],true);
						$commtdata[] = $commentid;
					}
					$json = array('comments'=>json_encode($commtdata),);
					// var_dump($json);
					$this->honestapi_model->updatepublish($pubid,$json);
					echo "$callback($a)";
				}else{
					$a = 0;
					echo "$callback($a)";
				}
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

	

	// 聊天上传图片
	public function chatImg()
	{
		if($_GET){
			// 查询出询问话题
			$id = $_GET['informationId'];
			$user = $this->honestapi_model->Loginuser($_GET['fromId']);
			$data = array(
				'fromId' =>$user['userId'],
				'toId' =>$_GET['toId'],
				'informationId' =>$_GET['informationId'],
				'datatime' =>date('Y-m-d H:i:s'),
			);
			if (!empty($_FILES['file']['tmp_name'])) {
				$config['upload_path']      = './upload/charimg/';
	        	$config['allowed_types']    = 'gif|jpg|png';
				$config['file_name']     =date("Y-m-d_His");
	        	$this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('file'))
		        {
		            echo 0;
		        }
		        else
		        {  
		         	$fileinfo = $this->upload->data();
		        	$url = IP.'upload/charimg/'.$fileinfo['file_name'];
		        	$data['content'] = "<img src='".$url."' style='width:100%;'/>";
	 	        }
	    	}
	    	if($this->honestapi_model->SendChat($data)){
	    		echo "1";
	    		//echo $url;
	    	}else{
	    		echo '0';
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

	// 微信绑定手机号
	public function bindingWeixin()
	{
		if($_POST){
			$data =array(
				'openId' => $_POST['openId'],
				'userName' => $_POST['openId'],
				'headPicImg' => $_POST['headPicImg'],
				'email' => $_POST['email'],
				'phoneNumber' => $_POST['phoneNumber'],
				'gender' => $_POST['gender'],
				'address' => $_POST['address'],
			);

			if($this->honestapi_model->Register($data)){
				//成功
				echo "1";
			}else{
				// 失败
				echo "0";
			}
		}
	}

	// 用户选择自己的tag
	public function choiceTag()
	{
		if($_POST){
			$user = $this->honestapi_model->Loginuser($_POST['phoneNumber']);
			$id = $user['userId'];
			
			$tags = $_POST;
			foreach($tags as  $k=>$val){
				$tags[$k]['myTagId']  = $val['tagId'];
				$tags[$k]['tagName']  = $val['tagName'];
			}
			$json = json_encode($tags);
			$data['myTag'] = $json;
			if($this->honestapi_model->EditUser($id,$data)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}


	// 聊天存储数据
	public function sendMessage()
	{
		// header('content-type:text/html;charset=utf-8');
		if($_GET){
			$callback = $_GET['callback'];
			$data = json_decode($_GET['problemData'],true);
			$arr = array(
				'toId' => $data['toId'],
				'informationId' => $data['informationId'],
				'datatime' =>date('Y-m-d H:i:s'),
				'content' =>$data['Message'],
				);
			$user = $this->honestapi_model->Loginuser($data['fromId']);
			$arr['fromId'] = $user['userId'];
			if($this->honestapi_model->SendChat($arr)){
				echo "$callback(1)";
			}else{
				echo "$callback(0)";
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



	// 公司设置
	public function companySyemen()
	{
		$callback = $_GET['callback'];
		// 公司产出规模
		$enterprise = $this->honestapi_model->CompanySyemen('enterpriseInfo');
		$ent = explode('|',$enterprise['value']);
		$json = json_encode($ent);
		echo "$callback($json)";
		// 公司人员规模
		//$company['production'] = $production = $this->honestapi_model->CompanySyemen('production');
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
	 		if(!empty($data['checkboxTag'])){
	 			$arr['tag'] = str_replace(']','',str_replace('"','',str_replace('[','',$data['checkboxTag'])));
	 		}
	    	//修改
    		if($this->honestapi_model->EditCompany($id,$arr)){
    			echo "$callback(1)";
    		}else{
    			echo "$callback(0)";
    		}
	 	}
	 } 
	 // 修改公司logo
	 public function sendCompanyLogo()
	 {
	 	file_put_contents('test.log',var_export($_FILES,true)."\r\n",FILE_APPEND);
	 	// if($_FILES){
	 	// 	// 公司logo
	 	// 	if (!empty($_FILES['ffile']['tmp_name'])) {
			// 	$config['upload_path']      = './upload/imgs/';
	  //       	$config['allowed_types']    = 'gif|jpg|png';
			// 	$config['file_name']     =date("Y-m-d_His");
	  //       	$this->load->library('upload', $config);
		 //        if ( ! $this->upload->do_upload('ffile'))
		 //        {
		 //            echo 0;exit;
		 //        }
		 //        else
		 //        {
		 //         	$fileinfo = $this->upload->data();
		 //         	$data['headPicImg'] = 'upload/imgs/'.$fileinfo['file_name'];
		 //        }
   //  		}else{
   //  			$data['headPicImg'] = $_POST['headPicImg'];
   //  		}
	
	 	// }
	 }

	// 修改微信用户资料
	public function sendWeixinUser()
	{
		if($_POST){
			//用户id
			$id = $_POST['id'];
			//用户信息
	 		$data = $_POST;
	 		// 用户头像
	 		if (!empty($_FILES['ffile']['tmp_name'])) {
				$config['upload_path']      = './upload/imgs/';
	        	$config['allowed_types']    = 'gif|jpg|png';
				$config['file_name']     =date("Y-m-d_His");
	        	$this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('ffile'))
		        {
		            echo 0;exit;
		        }
		        else
		        {
		         	$fileinfo = $this->upload->data();
		         	$data['headPicImg'] = 'upload/imgs/'.$fileinfo['file_name'];
		        }
    		}else{
    			$data['headPicImg'] = $_POST['headPicImg'];
    		}

    		// 修改用户资料
    		if($this->honestapi_model->EditUser($id,$data)){
    			echo "1";
    		}else{
    			echo "2";
    		}
		}
	}
	//  咨询师证书上传
	public function ConsultantFile()
	{
		// file_put_contents('test.log', var_export($_GET,true)."\r\n",FILE_APPEND);
		// $a = json_encode($_FILES);
		// file_put_contents('text.txt',$a);
		// echo "1";
		// exit;
		// // file_put_contents('test.log', $_POST,FILE_APPEND);
		// // file_put_contents('test.log', var_export($_FILES,true)."\r\n",FILE_APPEND);
		//   if(move_uploaded_file($_FILES['file']['tmp_name'], './upload/charimg/'.$_FILES["file"]["name"])){
		//   	echo "1";
		//   }else{
		//   	echo "0";
		//   }
	}
	// 咨询师资料修改
	public function sendConsultant()
	{
		if($_POST){




		}
	}



	// 修改个人资料
	public function ExitUserInfo()
	{
		if($_POST){
			$userid = $_POST['userid'];
			$data= array(
				'userName'=>$_POST['userName'],
				'userName'=>$_POST['userName'],
				'userName'=>$_POST['userName'],
				'userName'=>$_POST['userName'],
			);
			if (!empty($_FILES['ffile']['tmp_name'])) {
				$config['upload_path']      = './upload/imgs/';
	        	$config['allowed_types']    = 'gif|jpg|png';
				$config['file_name']     =date("Y-m-d_His");
	        	$this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('ffile'))
		        {
		            echo 0;exit;
		        }
		        else
		        {
		         	$fileinfo = $this->upload->data();
		         	$data['headPicImg'] = 'upload/imgs/'.$fileinfo['file_name'];
		        }
    		}else{
    			$data['headPicImg'] = $_POST['headPicImg'];
    		}
    		if($this->honestapi_model->EditUser($id,$data)){
    			echo "1";
    		}else{
    			echo "2";
    		}

		}
	}



















}



?>