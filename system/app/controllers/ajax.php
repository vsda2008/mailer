<?php
class ajax extends EC_Controller{
	function ajax(){
	    parent::EC_Controller();
	    $this->load->plugin('bill_uri');
		$this->load->model('model_mailto_data');
		$this->model_mailto_data = new Model_mailto_data();
	   //X-Requested-With	XMLHttpRequest
	}
	function up_file_js(){
//		extract($_REQUEST);
//		var_dump($_REQUEST);
//		// servlet that handles uploadprogress requests:
//		if ($upload_id) {
//			$data = uploadprogress_get_info($upload_id);
//			if (!$data)
//				$data['error'] = 'upload id not found';
//			else {		
//				$avg_kb = $data['speed_average'] / 1024;
//				if ($avg_kb<100)
//					$avg_kb = round($avg_kb,1);
//				else if ($avg_kb<10)
//					$avg_kb = round($avg_kb,2);
//				else $avg_kb = round($avg_kb);
//				
//				// two custom server calculations added to return data object:
//				$data['kb_average'] = $avg_kb;
//				$data['kb_uploaded'] = round($data['bytes_uploaded'] /1024);
//			}
//			
//			echo json_encode($data);
//			exit;
//		}
//
//
//		// display on completion of upload:
//		if ($UPLOAD_IDENTIFIER) {
//			echo "<pre>";
//			print_r($_FILES);
//			unlink($_FILES['file1']['tmp_name']);
//			unlink($_FILES['file2']['tmp_name']);
//			unlink($_FILES['file3']['tmp_name']);
//			echo "</pre>";
//			exit;
//		}
	}
	function upfile(){
		if (!empty($_FILES)) {
			$file = $_FILES['Filedata']['name'];//
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
			$re_name = time() . strrchr($file ,'.');
			$targetFile = $targetPath . $re_name;
			$data = array(
			    'up_name'=>$file ,
				're_name'=>$targetFile
			);
			$q = $this->db->get_where(UPFILE_TABLE,array('up_name'=>$file),1,0);
			if($q->num_rows() > 0){
                if( move_uploaded_file($tempFile,$targetFile) !== false ){
					$result = $q->result_array();
					$re = $result[0];
					unlink($re['re_name']);
					$this->db->where('up_name',$file);
					$this->db->update(UPFILE_TABLE,$data);
					echo '1';
					exit;
				}
			}		


            if( move_uploaded_file($tempFile,$targetFile) !== false ){
				$this->db->insert(UPFILE_TABLE,$data);
				if( $this->db->insert_id() > 0  ){
				  echo '1';
				}
            }else{
			     echo '0';
			}
	         
		}
	}
	function get_url_content(){

        $url = $_POST['url'];
	   $c=bill_uri($url);
		preg_match_all("/href=[\W]([^<>\'\"]*)[\W]/",$c,$arr);
	preg_match_all("/<title>([^<>]*)<\/title>/",$c,$arr1);
	//var_dump($arr1);
	//break;
	$data = array('f_name'=>$arr1[1][0],'up_f'=>'0');
		$this->db->insert('f_hit',$data);
		$up=mysql_insert_id();
	$au=array_unique($arr[1]);
	foreach($au as $url){
		$data = array('f_name'=>$url,'up_f'=>$up);
		$this->db->insert('f_hit',$data);
		$hit_url=mysql_insert_id();
		$c=str_replace($url,"http://www.mailer.com/index.php/mailer/click/url/".$hit_url,$c);
	}
	echo $c;
	}
	function get_file_content(){
		$name = $this->input->xss_clean($this->input->post('file_name'));
		$q = $this->db->get_where(UPFILE_TABLE, array('up_name'=>$name),1,0);
		$r = $q->result_array();
		if (file_exists($r[0]['re_name'])) {
			echo file_get_contents($r[0]['re_name']);
		}else{
		    echo '0';
		}
	}
	function _get_file_path($name){
		$q = $this->db->get_where(UPFILE_TABLE, array('up_name'=>$name),1,0);
		$r = $q->result_array();
		if (file_exists($r[0]['re_name'])) {
			return $r[0]['re_name'];
		}else{
		    return false;
		}
	}
	function add_one_mail(){
		  $email = $this->input->xss_clean($this->input->post('email'));
		  if(!empty($email)){
		  
			  $array = array(
				  'email_addr'=>ico($email),
			  );
			  $q = $this->db->get_where(EMAIL_TABLE,$array,1,0);
			  if($q->num_rows() > 0){
				  die('已经存在!');
			  }
			  if(check_email($email)){
				  $this->db->insert(EMAIL_TABLE,$array);
			  }
			  
			  
		  }
		  if($this->db->insert_id() > 0){
			  echo '添加成功!';
		  }else{
		      echo '添加失败!';
		  }
	}
	function add_one_phone(){
		  $phone = $this->input->xss_clean($this->input->post('phone'));
		  if(!empty($phone)){
		  
			  $array = array(
				  'phone_no'=>ico($phone),
			  );
			  $q = $this->db->get_where(PHONE_TABLE,$array,1,0);
			  if($q->num_rows() > 0){
				  die('已经存在!');
			  }
			  if(check_phone($phone)){
				   $this->db->insert(PHONE_TABLE,$array);
			  }
			 
			  
		  }
		  if($this->db->insert_id() > 0){
			  echo '添加成功!';
		  }else{
		      echo '添加失败!';
		  }
	}
	function del_temp(){
	    echo 'del';
	}
	function get_temp(){
	      $page = $this->input->xss_clean($this->input->post('page'));
		  $ac = $this->input->xss_clean($this->input->post('ac'));
		  if(empty($page) ){
			  $page = 1;
		  }
		  if(empty($ac)){
              $ac = 'list';
		  }
          
		  $select = array('temp_id','temp_name');
		  $this->db->select($select);
		  $q = $this->db->get(TEMPLATE_LIST_TABLE,20,$page*($page-1));
	      $temp_list = '';
		  if($ac === 'list'){
			  foreach($q->result_array() as $row){
					$temp_list .= "<label> <input type=\"radio\" name=\"temp_id\" id=\"temp_id\" value=\"{$row['temp_id']}\" />{$row['temp_name']}</label><br />";
			  }
		  }elseif($ac === 'del_temp'){
			  foreach($q->result_array() as $row){
					$temp_list .= "<label> <input type=\"checkbox\" name=\"temp_id[]\" value=\"{$row['temp_id']}\" />{$row['temp_name']}</label><br />";
			  }
		  }

		  echo $temp_list;
	}
	function save_temp(){ 
	  if( ! empty($_POST)){
		  $temp_name = $this->input->xss_clean($this->input->post('temp_name'));
		  $temp_id = $this->input->xss_clean($this->input->post('temp_id'));
		  $mail_subject = $this->input->xss_clean($this->input->post('mail_subject'));
		  $content = $this->input->post('content');
		  //$mail_to = $this->input->xss_clean($this->input->post('mail_to'));
		  $array = array(
		      'temp_name'=>ico($temp_name),
			  'temp_subject'=>ico($mail_subject),
			  'temp_content'=>urldecode(ico($content)),
		  );
		  //file_put_contents('ss.txt',ico($content));
		  if( ! empty($temp_id)){
			  $where = 'temp_id='.$temp_id;
              $update = $this->db->update_string(TEMPLATE_LIST_TABLE,$array,$where);
			  $q = $this->db->query($update);
			  if($q){
				  echo '更新完成';
			  }
		  }else{
			  $this->db->insert(TEMPLATE_LIST_TABLE,$array);
			  if($this->db->insert_id() > 0){
				   
				  echo '保存成功!'; 
			  }else{
				 echo '保存失败!'; 
			  }
		  }
	  }

	}
	function export_email(){
		set_time_limit(0);
		$type = $this->input->xss_clean($this->input->post('export_type'));
			  var_dump($type );
		if( $type === 'csv'){
			  $file = $this->input->xss_clean($this->input->post('file_name'));
			  $file_path = $this->_get_file_path($file);
			  $result = $this->model_mailto_data->csv_to_email_data($file_path);
			  $this->db->where(array('up_name'=>$file));
			  $this->db->delete(UPFILE_TABLE);

			  if( $result !== true){
                 die($result);
			  }else{
			     die('添加成功');
			  }
		}
		if( $type === 'sql'){
            $hostname = $this->input->xss_clean($this->input->post('hostname'));
			$username = $this->input->xss_clean($this->input->post('username'));
			$password = $this->input->xss_clean($this->input->post('password'));
			$database = $this->input->xss_clean($this->input->post('database'));
			$dbdriver = $this->input->xss_clean($this->input->post('dbdriver'));
			$char_set = $this->input->xss_clean($this->input->post('char_set'));
			$table_name = $this->input->xss_clean($this->input->post('table_name'));
			$mail = $this->input->xss_clean($this->input->post('mail'));
			$phone = $this->input->xss_clean($this->input->post('phone'));
			$db['dbmail']['hostname'] = ico($hostname);
			$db['dbmail']['username'] = ico($username);
			$db['dbmail']['password'] = ico($password);
			$db['dbmail']['database'] = ico($database);
			$db['dbmail']['dbdriver'] = ico($dbdriver);
			$db['dbmail']['char_set'] = ico($char_set);
            $db['dbmail']['table_name'] = ico($table_name);
			$db['dbmail']['mail'] = ico($mail);
			$db['dbmail']['phone'] = ico($phone);
			$array['cfg_name'] = ico($hostname);
			$array['cfg_value'] = m_serialize($db);
			$this->db->insert(CONFIG_TABLE,$array);
			$re = $this->model_mailto_data->sql_email_to_data($hostname);
			exit( $re . '完成导入,并保存配置');
		}
	    //echo $_POST['export_type'] . $_POST['file_name'];
	}
	function export_phone(){
        set_time_limit(0);
		$type = $this->input->xss_clean($this->input->post('export_type'));
		if( $type === 'csv'){
			  $file = $this->input->xss_clean($this->input->post('file_name'));
			  $file_path = $this->_get_file_path($file);
			  $result = $this->model_mailto_data->csv_to_phone_data($file_path);
			  $this->db->where(array('up_name'=>$file));
			  $this->db->delete(UPFILE_TABLE);
			  if( $result !== true){
                 die($result);
			  }else{
			     die('添加成功');
			  }
		}
		if( $type === 'sql'){
            $hostname = $this->input->xss_clean($this->input->post('hostname'));
			$username = $this->input->xss_clean($this->input->post('username'));
			$password = $this->input->xss_clean($this->input->post('password'));
			$database = $this->input->xss_clean($this->input->post('database'));
			$dbdriver = $this->input->xss_clean($this->input->post('dbdriver'));
			$char_set = $this->input->xss_clean($this->input->post('char_set'));
			$table_name = $this->input->xss_clean($this->input->post('table_name'));
			$mail = $this->input->xss_clean($this->input->post('mail'));
			$phone = $this->input->xss_clean($this->input->post('phone'));
			$db['dbmail']['hostname'] = ico($hostname);
			$db['dbmail']['username'] = ico($username);
			$db['dbmail']['password'] = ico($password);
			$db['dbmail']['database'] = ico($database);
			$db['dbmail']['dbdriver'] = ico($dbdriver);
			$db['dbmail']['char_set'] = ico($char_set);
            $db['dbmail']['table_name'] = ico($table_name);
			$db['dbmail']['mail'] = ico($mail);
			$db['dbmail']['phone'] = ico($phone);
			$array['cfg_name'] = ico($hostname);
			$array['cfg_value'] = m_serialize($db);
			//$this->db->get_where(CONFIG_TABLE,)
			$this->db->insert(CONFIG_TABLE,$array);
			$re = $this->model_mailto_data->sql_to_phone_data($hostname);
			exit( $re . '完成导入,并保存配置');
		}
	    //echo $_POST['export_type'] . $_POST['file_name'];
	}
};