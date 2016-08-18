<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*  咨询信息
*/
class consulting_model extends CI_Model
{
	// 信息表
	const TBL_MYPUB = 'mypublish';
	// p频到
	const TBL_TAG = 'mytag';
	// 分类
	const TBL_CATE = 'cate';

	// 返回咨询信息列表
	public function consulting()
	{
		$where['commend'] = '1';
		$query = $this->db->where($where)->order_by('publishData','desc')->get(self::TBL_MYPUB);
		return $query->result_array();
	}
	// 返回所有频道
	public function tags()
	{	
		$query = $this->db->get(self::TBL_TAG);
		return $query->result_array();
	}
	// 新增
	public function addconsulting($data)
	{
		return $this->db->insert(self::TBL_MYPUB,$data);
	}

	// 返回要编辑的
	public function setconsult($id)
	{
		$where['publishId'] = $id;
		$query = $this->db->where($where)->get(self::TBL_MYPUB);
		return $query->row_array();
	}
	// 编辑
	public function consuletedit($id,$data)
	{
		$where['publishId'] = $id;
		return $this->db->where($where)->update(self::TBL_MYPUB,$data);
	}

	// 删除
	public function deleteconsulet($id)
	{
		$where['publishId'] = $id;
		return $this->db->where($where)->delete(self::TBL_MYPUB);
	}

	// 根据tag返回数据
	public function setTagconsult($tag,$commend)
	{

		$sql ="SELECT a.userName,b.publishId, b.picImg, b.tag, b.title, b.content, b.publishData from honest_member as a, honest_mypublish as b where a.userId = b.userId and b.tag like '%$tag%' and b.commend = $commend order by b.publishData desc";
			$query = $this->db->query($sql);
			return $query->result_array();
	}

	// 咨询搜索
	public function ConsuleSearch($sear)
	{
		$where['commend'] = '1';
		$query = $this->db->where($where)->like('title', $sear, 'both')->order_by('publishData','desc')->get(self::TBL_MYPUB);
		return $query->result_array();
	}

	//分类列表
	public function listCate()
	{
		$query = $this->db->order_by('sole asc')->get(self::TBL_CATE);
		return $query->result_array();
	}

	//新增分类
	public function AddCate($data)
	{
		return $this->db->insert(self::TBL_CATE,$data);
	}

	//修改分类
	public function UpdataCate($id,$data)
	{
		$where['cateId'] = $id;
		return $this->db->where($where)->update(self::TBL_CATE,$data); 
	}

	//删除分类
	public function DeleteCate($id)
	{
		$where['cateId'] = $id;
		return $this->db->where($where)->delete(self::TBL_CATE);
	}

	//更新分类
	public function SendCateData($id,$data)
	{
		$where['cateId'] = $id;
		return $this->db->where($where)->update(self::TBL_CATE,$data);
	}

	//删除分类下所有文章
	public function delContent($id)
	{
		$where['cateId'] = $id;
		return $this->db->where($where)->delete(self::TBL_MYPUB);
	}

}

 ?>