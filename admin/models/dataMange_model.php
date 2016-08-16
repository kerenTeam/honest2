<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class dataMange_model extends CI_Model
{
	// 联动表
	const TBL_LINKAGE = "linkage";
	//公司表
	const TBL_COMPANY = "company";
	
	//获取院系
	public function FacultyList($majorId){
		$where = array(
			'typeId' => '1',
			'majorId' => $majorId
		);
		$query = $this->db->where($where)->get(self::TBL_LINKAGE);
		return $query->result_array();
	}
	//获取专业
	public function SpecialyList(){
		$sql = "SELECT * FROM honest_linkage where typeId = 1 and majorId != 0";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	//新增院系
	public function sendFaculty($data){
		return $this->db->insert(self::TBL_LINKAGE,$data);
	}
	//新增专业
	public function SpecialyAdd($data){
		return $this->db->insert(self::TBL_LINKAGE,$data); 
	}
	//修改专业
	public function SpecialyUp($id,$data){
		$where['id'] = $id;
		return $this->db->where($where)->update(self::TBL_LINKAGE,$data);
	}
	
	//删除专业
	public function deleteSpecialy($id){
		$where['id'] = $id;
		return $this->db->where($where)->delete(self::TBL_LINKAGE);
	}
	
	//公司列表
	public function CompanyList(){
		$query  = $this->db->get(self::TBL_COMPANY);
		return $query->result_array();
	}
	
	//公司详情
	public function CompanyInfo($id){
		$where['companyId'] = $id;
		$query = $this->db->where($where)->get(self::TBL_COMPANY);
		return $query->row_array();
	}
	
	//删除公司详情
	public function DeleteCompany($id){
		$where['companyId'] = $id;
		return $this->db->where($where)->delete(self::TBL_COMPANY);
	}
	
	//搜索公司信息
	public function SearCompany($data){
		$query = $this->db->like('companyName', $data, 'both')->get(self::TBL_COMPANY);
		return $query->result_array();
		
	}

}

?>
	