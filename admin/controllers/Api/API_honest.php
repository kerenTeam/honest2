<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   API�ӿ�
*   
*/
class API_honest extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
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
			
			if(empty($data)){		
				echo "$callback(0)";
			}else{
				$json = json_encode($data);
				echo "$callback($json)";
			}
		}
	}
	// ��Ѷ��Ϣ
	public function findAllByInformation()
	{	
			
		if($_GET){
		
			$callback = $_GET['callback'];
			$limit = json_decode($_GET['informationData'],true);
			//��ҳ
			$size = $limit['pageSize'];
			if($limit['currentPage'] != 1){
				$page =$limit['currentPage']*$size-$size;
			}else{
				$page = $limit['currentPage'] -1;
			}
			// ��ȡ�û�ϲ����ǩ
			$user = $this->honestapi_model->Loginuser($limit['phoneNumber']);
			$tag = explode(',',$user['myTag']);
			//������תint��
			foreach ($tag as $key => $v) {
				$tag[$key] = intval($v);
			}
			$list = $this->honestapi_model->Consulting($page,$size,$tag);
		
			//��ͼƬ����ip
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

	//��������
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
				//��ȡ�û���������
				$user = $this->honestapi_model->Loginuser($limit['phoneNumber']);
				$ip = $user['address'];
				//��ȡ�ö���Ϣ
				$abc =  $this->honestapi_model->Government($ip);
				$size = $size - count($abc);
			}
			//��ȡ��������
			$interacting = $this->honestapi_model->Interacting($page,$size);
			//��һ�����ö���Ϣ
			if($page == 0){
				$interacting = array_merge($abc,$interacting);
			}
			//���б�ͼ����IP��ַ
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
	// ������������  + ��ѯ��Ϣ����
	public function InformationDeatil()
	{
		if($_GET){
			//file_put_contents('test.log', var_export($_GET,true)."\r\n",FILE_APPEND);
			$callback = $_GET['callback'];
			$get = json_decode($_GET['InformationDeatilData'],true);
			$id = $get['homeId'];
			// $id = $_GET['id'];
			// ������������ݼ�����
			$sql1 = "SELECT a.publishId, a.title, a.content, a.picImg, a.publishData, a.comments, b.userName, b.headPicImg FROM honest_member as b, honest_mypublish as a where a.userId = b.userId and a.publishId = $id";
			$query1 = $this->db->query($sql1);
			$interinfo = $query1->row_array();
			$interinfo['picImg'] = IP.$interinfo['picImg'];
			$interinfo['headPicImg'] = IP.$interinfo['headPicImg'];

			//$interinfo = $this->honestapi_model->InterInfo($id);
			// ����Ƿ�������
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

	// ������
	public function problem()
	{
		if($_GET){
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

	// ��������
	public function sendProblem()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$data = json_decode($_GET['sendProblemData'],true);
			$user = $this->honestapi_model->Loginuser($data['phoneNumber']);
			$tags = implode(',',$data['tags']);
			$consultant = $this->honestapi_model->RandConsult($tags);
			$arr = array(
				'fromId'=>$user['userId'],
				'toId'=>$consultant['userId'],
				'tag'=>$tags,
				'exchangeTitle'=>$data['Problem']['Title'],
				'exchangeContent'=>$data['Problem']['Content']
			);
			// ��������
			if($this->honestapi_model->QuestionData($arr)){
				echo "$callback(1)";
			}else{
				echo "$callback(0)";
			}
		}
	}

	// ɾ������
	public function delProblem()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$data = json_decode($_GET['delProblemData'],true);
			$arr['state'] = '2'; 
			if($this->honestapi_model->sendQublish($data['tags'],$arr)){
				echo "$callback(1)";
			}else{
				echo "$callback(0)";
			}

			//echo "$callback(1)";


		}
	}

	// ����Ƶ������
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
	// �ҵ�Ƶ��
	public function mychannels()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$phone = json_decode($_GET['phoneNumberData'],true);
			$channel = $this->honestapi_model->MyChannel($phone['phoneNumber']);
			//var_dump($channel['myTag']);
			$tag = explode(',',$channel['myTag']);
			$tags = $this->honestapi_model->Channel();
			$arr = array();
			foreach ($tags as $key => $value) {
				foreach ($tag as $k => $v) {
					if($value['tag'] == $v){
						$arr[] = $value;
					}
				}
			}
			$json = json_encode($arr);
			
			if(empty($json)){
				$tagList = json_encode($tags);
				echo "$callback($tagList)";
			}else{
				echo "$callback($json)";
			}
		}
	}


	// ע���û�
	public function register(){

		if($_GET){
			$callback = $_GET['callback'];
			$arr = json_decode($_GET['registerData'],true);
			//����tag
			$channel = $this->honestapi_model->Channel();
			foreach($channel as $val){
				$tags[] = $val['tag'];
			}
			$key = array_rand($tags, 4);
			foreach($key as $v){
				$tag[$v] = $tags[$v];
			}
			$mytag = implode(',',$tag);
			$data = array(
				'groupId' => '5',
				'phoneNumber' => $arr['phoneNumber'],
				'passWord' => md5($arr['passWord']),
				'myTag' => $mytag,
				'headPicImg' => 'upload/headPicImg/2016-08-12_171725.png',
			);
			$phone = $arr['phoneNumber'];
			 //echo "$callback($phone)";
			$user = $this->honestapi_model->Loginuser($phone);
			if($user != ''){
				 //���û���ע��
				echo "$callback(2)";
			}else{
				if($this->honestapi_model->Register($data)){
					 //ע��ɹ�
					echo "$callback(1)";
				}else{
					// ע��ʧ��
					echo "$callback(0)";
				}
			}
		}
	} 
	// ��������
	public function forgetpwd()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$arr = json_decode($_GET['modifyPasswordData'],true);
			$phone = $arr['phoneNumber'];
			$data = array(
					'passWord'=> md5($arr['newPassWord']),
				);
			$user = $this->honestapi_model->Loginuser($phone);
			if(!empty($user)){
				if($this->honestapi_model->NewPassword($data,$phone)){
					// �޸ĳɹ�
					echo "$callback(1)"; 
				}else{
					// �޸�ʧ��
					echo "$callback(2)";
				}
			}else{
				// û�и��û�
				echo "$callback(0)";
			}
		}
	}

	// ��½�û�
	public function login()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$data = json_decode($_GET['loginData'],true);
			$user = $this->honestapi_model->Loginuser($data['phoneNumber']);
			if(!empty($user)){
				if(md5($data['passWord']) != $user['passWord']){
					// �������
					echo "$callback(2)"; 
				}else{
					// ��½�ɹ�
					echo "$callback(1)";
				}
			}else{
				// û�и��û�
				echo "$callback(0)";
			}
		}
	}

	//��ȡ��֤��
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

	// ����
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

	// �����ϴ�ͼƬ
	public function chatImg()
	{
		if($_GET){
			// ��ѯ��ѯ�ʻ���
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
	        	$config['allowed_types']    = 'gif|jpg|png|jpeg';
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

	// ΢�Ű��ֻ���
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
				//�ɹ�
				echo "1";
			}else{
				// ʧ��
				echo "0";
			}
		}
	}

	// �û�ѡ���Լ���tag
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


	// ����洢����
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

	//������ѯʦ�б�
	public function consultantList()
	 {
	 	if($_GET){
	 		$callback = $_GET['callback'];
	 		$data = json_decode($_GET['consultantListData'],true);
	 		$size = $data['pageSize'];
			if($data['currentPage'] != 1){
				$page =$data['currentPage']*$size-$size;
			}else{
				$page = $data['currentPage'] -1;
			}
			$tag = explode(',', $data['tag']);
			//������תint��
			foreach ($tag as $key => $v) {
				$tag[$key] = intval($v);
			}
			// 
			$listData = $this->honestapi_model->GetConsultant($page,$size,$tag);
			if(empty($listData)){
				echo "$callback(0)";
			}else{
				$json = json_encode($listData);
				echo "$callback($json)";
			}

	 		

	 	}
	 } 
	


}



?>