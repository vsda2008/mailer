<?php 
class Model_smtp_ceo extends Model{
	var $table_name = SMTP_INFO_TABLE;
	function Model_smtp_ceo(){
	    parent::Model();
		$this->load->database();
	}
	function add($data){
		if(empty($data['id'])){
              $this->db->insert(SMTP_INFO_TABLE,$data);
		   if($this->db->insert_id() > 0){
			return true;
		   }
		}else{
           $this->db->where('id',intval($data['id']));
		   $this->db->update(SMTP_INFO_TABLE,$data);
		   if($this->db->affected_rows() > 0){
			   return true;
		   }
		}
		
       return false;
	}
	function get_the_one($id){
	    $q = $this->db->get_where(SMTP_INFO_TABLE,array('id'=>intval($id)),1,0);
		if($q->num_rows() > 0){
			$re = $q->result_array();
			return $re[0];
		}
		return false;
	}
	function del($ids){
		$this->db->where_in('id',$ids);
        $this->db->delete(SMTP_INFO_TABLE);
        if($this->db->affected_rows() > 0){
			return true;
        }
        return false;
	}
	function get_smtp_info($p=1,$limit=50){
		$temp = '';
		$q = $this->db->get(SMTP_INFO_TABLE,$limit,(intval($p)-1)*$limit);
	    if($q->num_rows() > 0){
			foreach($q->result_array() as $k => $row){
				$temp .= "<label> <input type=\"checkbox\" name=\"id[]\" value=\"{$row['id']}\" />用户名:{$row['username']}---SMTP地址:{$row['host']}</label><br />";
			}
			return $temp;
	    }
		return false;
	}
};