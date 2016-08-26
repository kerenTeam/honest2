<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class problem_model extends CI_Model
{
	

	// 问题表
	const TBL_MYQUESTION = 'myquestion';
	// 聊天记录
	const TBL_CHAT= 'chatrecord';
	// 安监局发布信息
	const TBL_GOVR = 'government';


	// 问题列表
	public function problemlist()
	{
		$query = $this->db->get(self::TBL_MYQUESTION);
		return $query->result_array();
	}

	// 新增问题
	public function addproblem($data)
	{
		return $this->db->insert(self::TBL_MYQUESTION,$data);
	}
	
	// 删除问提
	public function delProblem($id)
	{
		$where['questionId'] = $id;
		return $this->db->where($where)->delete(self::TBL_MYQUESTION);
	}

	//搜索
	public function ProSearch($sear)
	{
		$query = $this->db->like('exchangeTitle', $sear, 'both')->order_by('exchangeTime','desc')->get(self::TBL_MYQUESTION);
		return $query->result_array();
	}
	//聊天记录
	public function GetProblem($id)
	{
		$where['informationId'] = $id;
		$query = $this->db->where($where)->get(self::TBL_CHAT);
		return $query->result_array();


	}
	

	//安监局发布列表
	public function goverList($userid)
	{
		$where['userId'] = $userid;
		$query = $this->db->where($where)->order_by('publishData','desc')->get(self::TBL_GOVR);
		return $query->result_array();
	}


	//新增安监局发布
	public function ConsuleAdd($data)
	{
		return $this->db->insert(self::TBL_GOVR,$data);
	}
	
}

?>