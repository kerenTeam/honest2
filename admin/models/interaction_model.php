<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Interaction_model extends CI_Model
{
	

	// 信息表
	const TBL_MYPUB = 'mypublish';
	// 评论表
	const TBL_COMMENT = 'comment';
	// 频道表
	const TBL_MYTAG = 'mytag';
	// 分类
	const TBL_CATE = 'cate';

	// 查询交流互动
	public function listinter()
	{
		$where['commend'] ='0';
		$query = $this->db->where($where)->order_by('publishData','desc')->get(self::TBL_MYPUB);
		return $query->result_array();
	}

	// 推荐到咨询
	public function Recommendconting($id,$commend)
	{
		$where['publishId'] = $id;
		return $this->db->where($where)->update(self::TBL_MYPUB,$commend);
	}
	// 返回所有频道
	public function listTag()
	{
		$query = $this->db->get(self::TBL_MYTAG);
		return $query->result_array();
	}
	//所有分类
	public function listCate()
	{
		$query = $this->db->order_by('sole','asc')->get(self::TBL_CATE);
		return $query->result_array();
	}
	// 新增交流互动
	public function addinter($data){
		return $this->db->insert(self::TBL_MYPUB,$data);
	}
	// 编辑交流互动
	public function interedit($id,$data)
	{
		$where['publishId'] = $id;
		return $this->db->where($where)->update(self::TBL_MYPUB,$data);
	}

	// 查询要编辑的
	public function setinter($id)
	{
		$where['publishId'] = $id;
		$query  = $this->db->where($where)->get(self::TBL_MYPUB);
		return $query->row_array();
	}
	// 删除交流互动
	public function interdel($id)
	{
		$where['publishId'] = $id;
		return $this->db->where($where)->delete(self::TBL_MYPUB);
	}
	// 插询回复
	public function replyinter($id)
	{
		//$where['commentId'] = $id;
		$sql = "SELECT a.commentId, a.comment, a.recommentId, a.commentTime, a.recommentId, b.userName, b.headPicImg FROM honest_member AS b, honest_comment AS a WHERE a.userId = b.userId AND a.questionId =$id ORDER BY commentTime desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// 删除回复
	public function repledel($id)
	{
		$where['commentId'] = $id;
		return $this->db->where($where)->delete(self::TBL_COMMENT); 
	}

	// 根据tag返回交流互动数据
	public function setTaglist($tag)
	{

		$sql ="SELECT a.userName,b.publishId, b.picImg, b.tag, b.title, b.content, b.publishData from honest_member as a, honest_mypublish as b where a.userId = b.userId and b.tag like '%$tag%' and b.commend = '0' order by b.publishData desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// search 搜索
	public function Searchlist($data)
	{
		$where['commend'] = '0';
		$query = $this->db->where($where)->like('title', $data, 'both')->order_by('publishData','desc')->get(self::TBL_MYPUB);
		return $query->result_array();
	}
	

}

?>