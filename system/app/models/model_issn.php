<?php
class Model_issn extends Model{
	var $table_name = ISSN_ALL_TABLE;
	function Model_issn(){
	   parent::Model();
	}
	function get_issn_all(){
	   $q = $this->db->get($this->table_name);
	   foreach($q->result_array() as $v){
	     $array[] = $v;
	   }
	   return $array;
	}
	function add_type($tye,$isn,$array){
	   $sql = 'SELECT `res_type` FROM `'.CATESYS_TABLE."` WHERE `tid` = $tye LIMIT 1";
	   $q = $this->db->query($sql);
	   if($q->num_rows() >0){
		   $type = $q->result_array();
		   $type = $type[0];
		   $type = intval($type['res_type']);
		   if($type === TLINK ){
			   $array[''] = 
			   $this->add_tlink($tye,$isn,$array);exit;
		   }
		   if($type === PLINK ){
			   $this->add_plink($tye,$isn,$array);exit;
		   }
		   if($type === APLINK ){
			   $this->add_aplink($tye,$isn,$array);exit;
		   }
	   }

	}
	function get_type($tye){
	   $sql = 'SELECT `tname`,`res_type` FROM `'.CATESYS_TABLE."` WHERE `tid` = $tye LIMIT 1";
	   $q = $this->db->query($sql);
	   if($q->num_rows() >0){
		   $type = $q->result_array();
		   $type = $type[0];
		  return $type;
	   }else{
	      return false;
	   }
	}
	function add_tlink($array){ 
		$this->db->insert(TLINK_TABLE,$array);
		if($this->db->insert_id() > 0){
			echo '添加成功！';
		}else{
		    echo '添加失败！';
		}
	}
	function add_plink($array){
		$this->db->insert(PLINK_TABLE,$array);
		if($this->db->insert_id() > 0){
			echo '添加成功！';
		}else{
		    echo '添加失败！';
		}
	}
	function add_aplink($array){
		$this->db->insert(PARTLINK_TABLE,$array);
		if($this->db->insert_id() > 0){
			echo '添加成功！';
		}else{
		    echo '添加失败！';
		}
	}
	function add_goodslink($array){
		$this->db->insert(GOODSLINK_TABLE,$array);
		if($this->db->insert_id() > 0){
			echo '添加成功！';
		}else{
		    echo '添加失败！';
		}
	}
	function mod_tlink($lid,$array){
		$this->db->where('lid',intval($lid));
		$this->db->update(TLINK_TABLE,$array);
		if($this->db->affected_rows() > 0){
			return true;
		}
	}
	function mod_plink($lid,$array){
		$this->db->where('lid',intval($lid));
		$this->db->update(PLINK_TABLE,$array);
		if($this->db->affected_rows() > 0){
			return true;
		}
	}
	function mod_aplink($lid,$array){
		$this->db->where('lid',intval($lid));
		$this->db->update(PARTLINK_TABLE,$array);
		if($this->db->affected_rows() > 0){
			return true;
		}
	}
	function mod_goodslink($lid,$array){
		$this->db->where('lid',intval($lid));
		$this->db->update(GOODSLINK_TABLE,$array);

		if($this->db->affected_rows() > 0){
			return true;
		}
	}
	function add_issn($isn_name){
		 $fiedls = array('title'=>$isn_name);
	     $this->db->insert(ISSN_ALL_TABLE,$fiedls);
		 if($this->db->insert_id() > 0){
			 return true;
		 }
	}

	function get_issn($id){
		$q = $this->db->get_where(ISSN_ALL_TABLE,array('id'=>$id),1,0);
		$result = $q->result_array();
		if($q->num_rows() > 0){
			return $result[0];
		}else{
		    return false;
		}
	}
	function get_aplink($lid){
		$q = $this->db->get_where(PARTLINK_TABLE,array('lid'=>$lid),1,0);
		$result = $q->result_array();
		if($q->num_rows() > 0){
			return $result[0];
		}else{
		    return false;
		}

	}
	function get_tlink($lid){
		$q = $this->db->get_where(TLINK_TABLE,array('lid'=>$lid),1,0);
		$result = $q->result_array();
		if($q->num_rows() > 0){
			return $result[0];
		}else{
		    return false;
		}

	}
	function get_plink($lid){
		$q = $this->db->get_where(PLINK_TABLE,array('lid'=>$lid),1,0);
		$result = $q->result_array();
		if($q->num_rows() > 0){
			return $result[0];
		}else{
		    return false;
		}

	}
	function get_goodslink($lid){
		$q = $this->db->get_where(GOODSLINK_TABLE,array('lid'=>$lid),1,0);
		$result = $q->result_array();
	
		if($q->num_rows() > 0){
			return $result[0];
		}else{
		    return false;
		}

	}
	function get_public($id,$issn){
		$q = $this->db->get_where(PARTLINK_TABLE,array('tid'=>$id,'issn'=>$issn),1,0);
		$result = $q->result_array();
		if($q->num_rows() > 0){
			return $result[0];
		}else{
		    return false;
		}

	}
	function get_senice($id,$issn){
		$q = $this->db->get_where(PLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $all_senice[] = $v;
		   
		   }
		}
		return $all_senice;
	}
	function get_hd($id,$issn){
		$q = $this->db->get_where(PARTLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $all_hd[] = $v;
		   
		   }
		}
		return $all_hd;
	}
	function get_xl($id,$issn){
		$q = $this->db->get_where(PARTLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $all_xl[] = $v;
		   
		   }
		}
		return $all_xl;
	}
	function get_bbs($id,$issn){
		$q = $this->db->get_where(PARTLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $all_bbs[] = $v;
		   
		   }
		}
		return $all_bbs;
	}
	function get_sying($id,$issn){
		$q = $this->db->get_where(PLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $all_sying[] = $v;
		   
		   }
		}
		return $all_sying;
	}
	function get_xl_1($id,$issn){//短线
		$q = $this->db->get_where(GOODSLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);

		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $all_xl_1[] = $v;
		   
		   }
		}
		return $all_xl_1;
	}
	function get_items_data($id,$issn,$table){//短线
		$q = $this->db->get_where($table,array('tid'=>$id,'issn'=>$issn),6,0);

		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $all_xl_1[] = $v;
		   
		   }
		}
		return $all_xl_1;
	}
	function get_xl_2($id,$issn){//长线
		$q = $this->db->get_where(GOODSLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $all_xl_1[] = $v;
		   
		   }
		}
		return $all_xl_1;
	}
	function get_all_aplink($id,$issn){
		$q = $this->db->get_where(PARTLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $aplink[] = $v;
		   
		   }
		}
		return $aplink;
	}
	function get_all_tlink($id,$issn){
		$q = $this->db->get_where(TLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $tlink[] = $v;
		   
		   }
		}
		return $tlink;
	}
	function get_all_plink($id,$issn){
		$q = $this->db->get_where(PLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $tlink[] = $v;
		   
		   }
		}
		return $tlink;
	}
	function get_all_goodslink($id,$issn){
		$q = $this->db->get_where(GOODSLINK_TABLE,array('tid'=>$id,'issn'=>$issn),6,0);
		if($q->num_rows() > 0){
           foreach( $q->result_array() as $v ){
			    $goodslink[] = $v;
		   
		   }
		}
		return $goodslink;
	}
	function del_aplink($tid,$lids){
	      $ids = implode(',',$lids);
		  $sql = 'DELETE FROM `'.PARTLINK_TABLE.'` WHERE `lid` in('.$ids.')';
		  $q = $this->db->query($sql);
		  if( $this->db->affected_rows() > 0){
			  return true;
		  }
	}
	function del_tlink($tid,$lids){
	      $ids = implode(',',$lids);
		  $sql = 'DELETE FROM `'.TLINK_TABLE.'` WHERE `lid` in('.$ids.')';
		  $q = $this->db->query($sql);
		  if( $this->db->affected_rows() > 0){
			  return true;
		  }
	}

	function del_plink($tid,$lids){
	      $ids = implode(',',$lids);
		  $sql = 'DELETE FROM `'.PLINK_TABLE.'` WHERE `lid` in('.$ids.')';
		  $q = $this->db->query($sql);
		  if( $this->db->affected_rows() > 0){
			  return true;
		  }
	}
		function select_manage(){
		$result=$this->db->query("select * from user_info");
		return $result->result_array();
	}
	function select_user($user,$pass){
		
		$res=$this->db->query("select * from user_info where username='".$user."'");
		$res=$res->result_array();
		
		if($res){
			$res=$res['0']['password'];
			$input=md5($pass);
			if($res==$input){
				session_start();
				$_SESSION['user'] = $user;
			return"<script>alert('登录成功');document.location.href='/index.php/welcome/main';</script>";
			}else{
			return"<script>alert('密码错误');document.location.href='/index.php/welcome';</script>";
			}
		}
		else{
			return "<script>alert('用户名不存在');document.location.href='/index.php/welcome';</script>";
		}
	}
	function user_auth(){
		session_start();
	if(!$_SESSION['user']){
	echo "<script>alert('你没有登录请先登录');document.location.href='/index.php/welcome';</script>";
	}
	}
	//获得所有栏目 获得栏目的类型 根据 显示顺序 在根据类型调用试图
};
?>