<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*   城事安全API模型
*/
class Honestapi_model extends CI_Model
{

	// 信息表
	const TBL_MYPUBLISH = 'mypublish';
	// 用户表
	const TBL_MEMBER = 'member';
	// 问题解答
	const TBL_MYQYESTION = 'myquestion';
	// 评论表
	const TBL_COMMENT = "comment";
	// 频道
	const TBL_TAG = "mytag";
	// 用户资料审核
	const TBL_USERINFO = "userinfo";
	// 系统设置
	const TBL_SYATEM = "system";
	// 聊天记录表
	const TBL_CHAT = "chatrecord";
	//公司信息表
	const TBL_COMPANY = "company";
	// 联动表
	const TBL_LINKAGE = "linkage";
	// 分类
	const TBL_CATE = "cate";
	// 政府信息
	const TBL_GOVE = "government";

	// 返回banner 和网站 关键字
	public function Banners()
	{
		$where['name'] = "banner";
		$query = $this->db->where($where)->get(self::TBL_SYATEM);
		return $query->row_array();
	}

	//根据用户喜好标签返回咨询信息
	public function Consulting($page,$size,$tag){
		$contion['commend'] = '1';	

		$query = $this->db->where($contion)->where_in('tag',$tag)->order_by('publishData','desc')->limit($size,$page)->get(self::TBL_MYPUBLISH);
		return $query->result_array();
	}
	#咨询详情
	public function ConsultingInfo($id){
		$contion['publishId'] = $id;
		$query = $this->db->where($contion)->get(self::TBL_MYPUBLISH);
		return $query->row_array();
	}
	//安监局发布置顶
	public function Government($ip)
	{
		$sql = "SELECT a.userId,a.address,b.publishId,b.userId,b.tag,b.title,b.content,b.picImg,b.publishData,b.state FROM honest_member as a,honest_mypublish as b where b.state = 1 and a.address = '$ip' and a.userId = b.userId order by b.publishData desc";
		$query = $this->db->query($sql);
		return $query->result_array();
				
	}
	// 交流互动
	public function Interacting($page,$size)
	{
		$where['state'] = '2';
		$query = $this->db->where($where)->order_by('publishData','desc')->limit($size, $page)->get(self::TBL_MYPUBLISH);
		return $query->result_array();
	}

	// 微信用户问题解答
	public function Problem($id)
	{
		$sql = "SELECT a.questionId, a.fromId, a.toId, a.exchangeTitle,a.exchangeTime,a.state, b.userId,b.userName, b.headPicImg FROM honest_myquestion as a, honest_member as b where a.fromId = b.userId and a.fromId = $id and a.state = 1 order by a.exchangeTime desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	//咨询师问题解答
	public function ConsultationWen($id){
		$sql = "SELECT a.questionId, a.fromId, a.toId, a.exchangeTitle,a.exchangeTime,a.state, b.userId,b.userName, b.headPicImg FROM honest_myquestion as a, honest_member as b where a.toId = b.userId and a.toId = $id and a.state = 1 order by a.exchangeTime desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	
	}
	// 频道管理
	public function Channel()
	{
		  $query = $this->db->get(self::TBL_TAG);
		  return $query->result_array();
	}
	// 我的频道
	public function MyChannel($phone)
	{
		$where['phoneNumber'] = $phone;
		$query = $this->db->where($where)->get(self::TBL_MEMBER);
		return $query->row_array(); 
	}

	//注册用户
	public function Register($data){
		return $this->db->insert(self::TBL_MEMBER,$data);
	} 
	
	//登陆用户
	public function Loginuser($data)
	{
		$where['phoneNumber'] = $data;
		$query = $this->db->where($where)->get(self::TBL_MEMBER);
		return $query->row_array();
 	}

 	//咨询师和安监局登陆
 	public function LogUser($data)
 	{
 		$where['phoneNumber'] = $data;
		$array = array(
			'5','6'
		);
		$query = $this->db->where($where)->where_in('groupId',$array)->get(self::TBL_MEMBER);
		return $query->row_array();
 	}

 	// 修改密码
 	public function NewPassword($data,$phone)
 	{
 		$where['phoneNumber'] = $phone;
 		return $this->db->where($where)->update(self::TBL_MEMBER,$data); 

 	}

 	// 根据tag
 	public function TagConsulting($data)
 	{
 		$where['tag'] = $data['tag'];
 		$size = $data['size'];
 		if($data['page'] != 1){
 			$page = $data['page'] * $data['size'] - $data['size'];
 		}else{
 			$page = $data['page'] -1;
 		}
 		$query = $this->db->where($where)->order_by('publishData',"desc")->limit($size,$page)->get(self::TBL_MYPUBLISH);
 		return $query->result_array();
 	}
 	// 根据评论返回的id查询
 	public function MyReply($data)
 	{

 		$where['publishId'] = $data['publishId'];
 		
 		$query = $this->db->where($where)->order_by('publishData','desc')->get(self::TBL_MYPUBLISH);
 		return $query->row_array();
 	}

 	// 我的发布
 	public function MyRelease($data)
 	{
 		$where['userId'] = $data['userId'];
 		$query = $this->db->where($where)->order_by('publishData','desc')->get(self::TBL_MYPUBLISH);
 		return $query->result_array();
  	}
  

  	// p评论
  	public function AddComment($data)
  	{
  		return $this->db->insert(self::TBL_COMMENT,$data);
  	}
  	// 更爱问题品论
  	public function updatepublish($id,$data)
  	 {
  	 	$where['publishId'] = $id;
  	 	return $this->db->where($where)->update(self::TBL_MYPUBLISH,$data);
  	 } 
  	 
  	 // 发布信息
  	 public function InformationeReleas($data)
  	 {
  	 	return $this->db->insert(self::TBL_MYPUBLISH,$data);
  	 }

  	 // 更改用户信息
  	 public function EditUser($id,$data)
  	 {
  	 	$where['userId'] = $id;
  	 	return $this->db->where($where)->update(self::TBL_MEMBER,$data);
  	 }

  	//提交用户资料
  	public function UserInfo($data)
  	{
  		return $this->db->insert(self::TBL_USERINFO,$data);
  	}

  	// 问题新增插入
 	public function QuestionData($data)
 	{
 		return $this->db->insert(self::TBL_MYQYESTION,$data);
 	}
 	
 	// 新增聊天记录
 	public function SendChat($data)
 	{
 		return $this->db->insert(self::TBL_CHAT,$data);
 	}
 	// 查询聊天记录
 	public function GetChat($informactionid)
 	{

 		$sql = "SELECT a.userId,a.phoneNumber,a.userName, a.headPicImg, b.fromId,b.informationId,b.toId,b.content,b.datatime FROM honest_member as a, honest_chatrecord as b where a.userId = b.fromId and b.informationId=$informactionid order by datatime asc";
 		//$where = array('fromId'=>$formid,'informationId'=>$informactionid,);
 		$query = $this->db->query($sql);
 		return $query->result_array();
 	}

 	// 返回用户公司详情
 	public function GetCompany($id)
 	{
 		$where['userId'] = $id;
 		$query = $this->db->where($where)->get(self::TBL_COMPANY);
 		return $query->row_array();
 	}
 	// 返回公司设置
 	public function CompanySyemen($name)
	{
		$sql = "SELECT value from honest_system where name='$name'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	// 修改公司信息
	public function EditCompany($id,$data)
	{
		$where['companyId'] = $id;
		return $this->db->where($where)->update(self::TBL_COMPANY,$data);
	}

	// 返回所有专业
	public function GetMajor($id)
	{
		$where =array(
			'majorId' => $id,
			'typeId' => '1',
		);
		// $sql = "SELECT * from honest_linkage where majorId != 0 and typeId = 1";
		//$query = $this->db->query($sql);
		$query = $this->db->where($where)->get(self::TBL_LINKAGE);
		return $query->result_array();

	}
	// 返回所有院系
	public function GetFaculty()
	{
		$where =array(
			'majorId' => '0',
			'typeId' => '1',
		);
		$query = $this->db->where($where)->get(self::TBL_LINKAGE);
		return $query->result_array();
	}
	//返回注安师
	public function GetSecurity()
	{
		$where['typeId'] = '2';
		$query = $this->db->where($where)->get(self::TBL_LINKAGE);
		return $query->result_array();
	}

	// 咨询师证书修改
	public function sendCertificate($id,$data)
	{
		$where['userId'] = $id;
		return $this->db->where($where)->update(self::TBL_USERINFO,$data);
	}

	//返回咨询师列表
	public function GetConsultant($tag)
	{
		$where['groupId'] = '5';
		$query = $this->db->where($where)->where_in('myTag',$tag)->limit($size,$page)->get(self::TBL_MEMBER);
		return $query->result_array();
	}

	// 根据tag随机返回一位咨询师
	public function RandConsult($tag)
	{
		$sql = "SELECT userId FROM `honest_member` WHERE groupId = '5' and myTag IN ($tag) ORDER BY rand() LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	// 修改问题状态
	public function sendQublish($id,$data)
	{
		$where['questionId'] = $id; 
		return $this->db->where($where)->update(self::TBL_MYQYESTION,$data);

	}
	
	//新增公司信息
	public function AddCompany($data){
		return $this->db->insert(self::TBL_COMPANY,$data);
	}

	//返回分类信息
	public function GetCate()
	{
		$query = $this->db->order_by('sole asc')->get(self::TBL_CATE);
		return $query->result_array();
	}
	//根据分类返回数据
	public function GetCateContent($id,$nub)
	{
		$where = array(
			'cateId' => $id,
			'state' => '2'
		);
		$query = $this->db->where($where)->order_by('publishData','desc')->limit($nub)->get(self::TBL_MYPUBLISH);
		return $query->result_array();
	}
	//首页返回数据
	public function HomeContent($nub){
		$query = $this->db->order_by('publishData','desc')->limit($nub)->get(self::TBL_MYPUBLISH);
		return $query->result_array();
	}
	
	//搜索tag
	public function SearchTag($data){
		$query = $this->db->like('tagName',$data,'both')->get(self::TBL_TAG);
		return $query->result_array();
	}
	
	//搜索文章
	public function SearchCont($data){
		  $sql = "SELECT * FROM honest_mypublish where CONCAT(title,content) like '%$data%'";
		  $query = $this->db->query($sql);
		  return $query->result_array();
	}
		//根据tagid 返回文章
	public function SendTagContent($tag)
	{
		$where['state'] = '2'; 
		$sql = "SELECT * FROM honest_mypublish where state = 2 and tag in($tag) order by('publishData desc')";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	//发布政府信息
	public function GoveContent($data)
	{
		return $this->db->insert(self::TBL_GOVE,$data);
	}
	
	//获取用户发布的问题
	public function GetProblem($id)
	{
		$where['toId'] = $id;
		$query = $this->db->where($where)->get(self::TBL_MYQYESTION);
		return $query->result_array();
	}
	
	//根据用户id 返回用户信息
	public function GetUserInfo($id){
		$where['userId'] = $id;
		$query = $this->db->where($where)->get(self::TBL_MEMBER);
		return $query->row_array();
	}

	//返回政府发布的最新消息id
	public function GetGoverId()
	{
		$sql = "SELECT id FROM honest_government WHERE id = ( SELECT MAX( id ) FROM honest_government )";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	//返回咨询是发布最新id
	public function GetConsuleId()
	{
		$sql = "SELECT publishId FROM honest_mypublish WHERE state='0' and publishId = ( SELECT MAX( publishId ) FROM honest_mypublish )";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
}	

?>