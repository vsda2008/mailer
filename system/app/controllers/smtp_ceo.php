<?php
class Smtp_ceo extends EC_Controller{
	  function Smtp_ceo(){
	       parent::EC_Controller();
		   $this->load->model('model_smtp_ceo');
		   $this->model_smtp_ceo = new Model_smtp_ceo();
		   $this->load->model('model_issn');
        $this->model_issn = new Model_issn();
	  }
	  function add_face(){
		  $this->model_issn->user_auth();
		//$some_info = $this->uri->uri_to_assoc()
		//if($some_info)
		$id = $_POST['id'][0];
		if( ! empty($id)){
           $re = $this->model_smtp_ceo->get_the_one($id);
		   if($re !== false){
			   $array['re'] = $re;
		   }
		}
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
		$array['submit_url'] ='/index.php/smtp_ceo/add'; 
		$array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/smtp_ceo_add_face',$array);
	  }
	  function add(){
		  $this->model_issn->user_auth();
	      $result = $this->model_smtp_ceo->add($_POST);
		  if($result === true){
			  if($_POST['id'] > 0 ){
				   echo '更新成功!' ;
			  }else{
			       echo '添加成功';
			  }
		  }else{
		       echo '添加失败';
		  }
	  }
	  function edit_face(){
		  $this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
		$array['submit_url'] ='/index.php/smtp_ceo/add'; 
		$array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/smtp_ceo_edit_face.php',$array);
	  }
	  function get_smtp_list(){
		  $this->model_issn->user_auth();
	  	          $all = $this->model_smtp_ceo->get_smtp_info();
              echo $all;
	  }
	  function del(){
		  $this->model_issn->user_auth();
		  $ids = $this->input->xss_clean($this->input->post('id'));
		  $re = $this->model_smtp_ceo->del($ids);
		  if($re === true){
			  echo '删除成功';
		  }else{
		      echo '删除失败';
		  }
	  }
	  function show_face(){
	  
	  }
	  function mod_face(){
	  
	  }
	  function mod(){
	  
	  }
};