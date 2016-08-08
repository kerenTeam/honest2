<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Tag_model extends CI_Model
{
	// 频道表
	const TBL_TAG = "mytag";

	// 所有频道
	public function taglist()
	{
		$query = $this->db->get(self::TBL_TAG);
		return $query->result_array();
	}
	// 新增频道
	public function addtag($data)
	{
		$arr = array('tagName'=>$data,);
		return $this->db->insert(self::TBL_TAG,$arr);
	}
	// 删除频道
	public function deltag($id)
	{
		$where['tag'] = $id;
		return $this->db->where($where)->delete(self::TBL_TAG);
	}
}


 ?>