<?php
class Template extends EC_Controller{
	function Template(){
	    parent::EC_Controller();
		$this->load->model('model_issn');
        $this->model_issn = new Model_issn();
	}
	function temp_delface(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
		$array['submit_url'] ='/index.php/template/del_temp'; 
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/temp_delface',$array);
	}
	function del_temp(){
		$this->model_issn->user_auth();
	    $del_group = $this->input->xss_clean($this->input->post('temp_id'));
		if(is_array($del_group)){
			$del_ids = implode(',',$del_group);
		}
		$sql = 'DELETE FROM `'. TEMPLATE_LIST_TABLE .'` WHERE `temp_id` IN ('.$del_ids.') ';
		$this->db->query($sql);
		if($this->db->affected_rows() > 0){//location.replace="/index.php/template/temp_delface"
			echo '<script>alert("删除成功!");history.go(-1)</script>';
		}else{
		    echo '<script>alert("删除失败!");history.go(-1)</script>';
		}
	}
	function temp_addface(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['editor'] = $GLOBALS['fck']->CreateHtml(); 
		//$array['submit_url'] ='/index.php/ajax/save_temp'; 
		//$array['submit_url'] ='/index.php/template/temp_modface'; 
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/temp_addface',$array);
	}
	function temp_modface(){
		$this->model_issn->user_auth();
		$temp_id = $this->input->xss_clean($this->input->post('temp_id'));
		if( ! empty($temp_id)){
			$q = $this->db->get_where( TEMPLATE_LIST_TABLE ,array('temp_id'=>$temp_id[0]),1,0);
		}else{
		    die('不能为空!');
		}
		if($q->num_rows() >0){
			$this->model_issn->user_auth();
			$temp = $q->result_array();
			
			$temp = $temp[0];
			$view_path = '/web';
			$array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
			$GLOBALS['fck']->Value=stripslashes($temp['temp_content']);
			$array['editor'] = $GLOBALS['fck']->CreateHtml(); 
			$array['submit_url'] ='/index.php/ajax/save_temp'; 
			$array['current_up'] = '/skins/'.$this->current_skin;
			$array = array_merge($array,$temp);
			
			$this->load->view($this->current_skin.'/'.$view_path.'/temp_modface',$array);
		}

	}
};