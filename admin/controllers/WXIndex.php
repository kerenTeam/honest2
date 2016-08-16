<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Harris-Aaron
 * @Date:   2016-04-15 16:04:05
 * @Last Modified by:   Harris-Aaron
 * @Last Modified time: 2016-05-20 22:09:01
 */



    
class WXIndex extends CI_Controller { 

	function __construct()
	{
        parent::__construct();
        $this->load->library('IndexWxApi'); 
        $this->load->library('IndexValid');
        $this->load->model('user_model');
	}
	public function index() 
	{  
	 echo "<br><br><br><br><br><br><center><h3>这里是WXIndex控制器,管理 WXAPI 、TOKEN 和 INTERLOCUTION 及 EVENT 反馈</h3></center>";  
	}
	public function menu()
	{
		$reMenuData = $this->indexwxapi->wxMenuCreate(MENU);
        if ($reMenuData['errmsg'] == 'ok')
        { echo "<script>alert('自定义菜单修改成功！');</script>";}
       // $this->load->view('sdk/lookMe');
	}
	public function userOpenid(){
		if(!isset($_GET['userOpenidData'])){
			if(!isset($_GET['code']))
			{
				header("location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."/WXIndex/userOpenid&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect"); exit;
			} else
			{ $code = $_GET['code']; 
			}

			// 获取openid 用户令牌
			$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$code."&grant_type=authorization_code";
			$res =json_decode(file_get_contents($url));
			$openid = $res->openid;
			$_SESSION['openid'] = $openid;
			// 获取access_token
			$access = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
			$token =json_decode(file_get_contents($access),true);
			// 获取用户信息
			$url3 = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$token['access_token']."&openid=".$openid."&lang=zh_CN";
			$res2 = json_decode(file_get_contents($url3),true);
			$_SESSION['userInfo'] = $res2;
			$user = $this->user_model->OpenidUser($openid);
			
			if(empty($user)){
				echo "<script>window.location.href='http://chengshi.zlzmm.com/ACC/www/#/register';</script>";exit;
			}else{
				echo "<script>window.location.href='http://chengshi.zlzmm.com/ACC/www/#/home?phoneNumber=".$user['phoneNumber']."&ABP=1';</script>";exit;
			}
		}else{
			$callback = $_GET['callback'];
			$data = json_decode($_GET['userOpenidData'],true);
			$a = $this->user_model->GetUser($data['phoneNumber']);
			$b = $this->user_model->OpenidUser($_SESSION['openid']);
			if(!empty($a)){
				$array = array('openId'=>$_SESSION['openid']);
				$this->user_model->uploaduser($a['userId'],$array);
				$json ='{"phoneNumber":'.$a['phoneNumber'].',"ABP":1}';
				echo "$callback($json)";
				exit;
				
			}else if(!empty($b)){
					$json ='{"phoneNumber":'.$b['phoneNumber'].',"ABP":1}';
					echo "$callback($json)";exit;
			}else{
				$user = $_SESSION['userInfo'];
				if($user['sex'] == 1){
					$sex = "男";
				}else{
					$sex = "女";
				}
				//所有tag
				$channel = $this->honestapi_model->Channel();
				foreach($channel as $val){
					$tags[] = $val['tag'];
				}
				$key = array_rand($tags, 4);
				foreach($key as $v){
					$tag[$v] = $tags[$v];
				}
				$mytag = implode(',',$tag);
				// 下载头像
				$headimg = file_get_contents($user['headimgurl']);
				$name = date('Y-m-d_His');
				file_put_contents('upload/headPicImg/'.$name.'.jpg', $headimg);
				// 头像地址
				$headImgUrl =  'upload/headPicImg/'.$name.'.jpg';
				$arr = array(
					'groupId' => '4',
					'openId' => $_SESSION['openid'],
					'userName' => $user['nickname'],
					'gender' =>$sex,
					'address' =>$user['city'],
					'headPicImg' =>$headImgUrl,
					'phoneNumber' =>$data['phoneNumber'],
					'myTag' => $mytag
				);
				
				if($this->user_model->Counseloradd($arr)){
					$json ='{"phoneNumber":'.$data['phoneNumber'].',"ABP":1}';
					echo "$callback($json)";
				}else{
					echo "$callback(0)";
				}
			}
			
		}
	}
	



}

