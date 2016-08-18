<?php 

	// 获取用户名
	function get_username($id)
	{
			$CI = &get_instance();
			$sql = "select userName from honest_member where userId = '$id'";
			$query = $CI->db->query($sql);
			$name = $query->row_array();
			return $name['userName'];
	}

	//获取分类名
	function get_cateName($id){
		$CI = &get_instance();
		$sql = "select cateName from honest_cate where cateId = '$id'";
		$query = $CI->db->query($sql);
		$name = $query->row_array();
		return $name['cateName'];
	}

	//获取tag名称
	function get_tagName($id){
		$CI = &get_instance();
		$sql = "select tagName from honest_mytag where tag = '$id'";
		$query = $CI->db->query($sql);
		$name = $query->row_array();
		return $name['tagName'];
	}

 ?>