<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class API_problem extends CI_Controller
{


	function __construct()
	{
		parent::__construct(); 
		$this->load->library('Jpush');
	}




	// $receiver = '',   接受者
	// $isvip = '', isVip
	// $time = '',  时间
	// $content = '', 内容
	// $value = '', 参数
	// $m_type = '',
	// $title = '', 标题
	// $platform = '' android 、 iOS ro all

	// public function pushData(receiver,isvip,time,content,value,m_type,title,platform) {


	public function send_pub(){
			$receive = 'all';//全部
           // $receive = array('tag'=>array('2401','2588','9527'));//标签
         //  $receive = array('alias'=>array('13512345678'));//别名
            $content = '这是一个测试的推送数据....测试....Hello World...';
            $m_type = 'http';//推送附加字段的类型
            $m_txt = 'tab/homeDeatil/29';//推送附加字段的类型对应的内容(可不填) 可能是url,可能是一段文字。
            $m_time = '1000';//离线保留时间
            $title = 'wr4etyuio';
  

            $message="";//存储推送状态
            $result = $this->jpush->push($receive,$content,$title,$m_type,$m_txt,$m_time);
			echo $result;
   
    }

    public function getUserIp()
    {
        $ip = $this->input->ip_address();
        var_dump($ip);
        $reIP=$_SERVER["REMOTE_ADDR"]; 
        echo $reIP; 

         $unknown = 'unknown'; 
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){ 
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
        }elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) { 
            $ip = $_SERVER['REMOTE_ADDR']; 
        } 
        /**
         * 处理多层代理的情况
         * 或者使用正则方式：$ip = preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : $unknown;
         */
        if (false !== strpos($ip, ',')) $ip = reset(explode(',', $ip)); 
        var_dump($ip); 
    }

    public function sendFrom()
    {
        file_put_contents('test.log', var_export($_POST,true)."\r\n",FILE_APPEND);
        file_put_contents('test.log', var_export($_FILES,true)."\r\n",FILE_APPEND);
        
    }



}
 ?>