<?php
class Mailer extends EC_Controller{
	function Mailer(){
		parent::EC_Controller();
		$this->lang->load('chinese');
		$this->load->helper('url');
		$this->load->plugin('sms');
		$this->load->config('mailer');
		$this->load->model('model_mailto_data');
		$this->model_mailto_data = new Model_mailto_data();
		$this->model_mailto_data->load_mailer();
		$this->load->model('model_issn');
        $this->model_issn = new Model_issn();
		if( $this->config->item('smtp') === true){
		   $this->model_mailto_data->smtp_mail();
		}else{
		   $this->model_mailto_data->mx_mail(); 
		   
		}
		set_time_limit(0);
	}
	function mface(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['editor'] = $GLOBALS['fck']->CreateHtml(); 
		$array['submit_url'] ='/index.php/mailer/do_send'; 
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/mface',$array);
	}
	function test_send(){
		$this->model_issn->user_auth();
	  $result = $this->model_mailto_data->test_send($_POST['id'][0]);
	  var_dump($result);
	  if($result === true){
		  echo '测试成功';
	  }
	}
	function do_send(){
		$this->model_issn->user_auth();
		$mail_to = $this->input->xss_clean($this->input->post('mail_to'));

		if($mail_to){			
			$to = ico($this->input->xss_clean($this->input->post('mail_to')));
			$replyto = ico($this->input->xss_clean($this->input->post('mail_from')));
			$subject = ico($this->input->xss_clean($this->input->post('mail_subject')));
			if( get_magic_quotes_gpc()){
              $html_content = ico(stripslashes(urldecode($_POST['content'])));
			}
			

			$result = $this->model_mailto_data->send($subject ,$html_content,$replyto,$to);
			if($result === false){
				echo '发送失败';
				exit;
			} 
			echo '发送成功';
		}else{
		    echo '信息不完善!';
		}
		exit;
	}
	function set_type_face(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['editor'] = $GLOBALS['fck']->CreateHtml(); 
		$array['submit_url'] ='/index.php/mailer/do_send'; 
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/mailer_set_type_face',$array);
	}
	function set_type(){
		$this->model_issn->user_auth();
	       $send_type = $_POST['send_type'];
		   $from = $_POST['from'];

		   $this->config->send_type['send_type'] = $send_type;
		   $array = $this->config->send_type;
		   if($send_type === 'mx'){
			   $this->config->set_file_item('send_type', $array) or die('0');

		   }elseif($send_type === 'smtp'){
			    $this->config->set_file_item('send_type', $array) or die('0');

		   }else{
		       die('0');
		   }
		   
	}
	function imface(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
		$array['submit_url'] ='/index.php/mailer/do_sms'; 
		$array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/imface',$array);
	}
	function bat_mface(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
		$array['submit_url'] ='/index.php/mailer/do_bat_mail'; 
		$array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/bat_mface',$array);
	}
	function bat_sface(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
		$array['submit_url'] ='/index.php/mailer/do_bat_sms'; 
		$array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/bat_sface',$array);
	}
	function isface(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
		$array['submit_url'] ='/index.php/mailer/do_sms'; 
		$array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/isface',$array);
	}
	function put_file(){
		$this->model_issn->user_auth();
	  $subject = $_POST['subject'];
	  echo file_put_contents('ss.txt',$subject);

	}
	function sface(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
		$array['current_up'] = '/skins/'.$this->current_skin;
		$array['submit_url'] ='/index.php/mailer/do_sms'; 
        $this->load->view($this->current_skin.'/'.$view_path.'/sface',$array);
	}
	function do_sms(){
		$this->model_issn->user_auth();
	   $sms_to = ico($this->input->xss_clean($this->input->post('sms_to')));
	   $content = ico($this->input->xss_clean($this->input->post('content')));
	   if( ! empty($sms_to) &&  ! empty($content)){
           $this->load->plugin('sms');
		   $this->config->load('sms');
           $re = sms::send_sms($sms_to, $content,$this->config->item('uid'),$this->config->item('pwd'));		 
		   if( $re === true){
           die('<script>alert(\'发送成功\');location.replace("/index.php/mailer/sface")</script>');
		   }else{
			    
			   if( ! empty($error['error_user'])){
				   die('<script>alert(\'发送失败!原因'.$error['error_user'].'请联系客服\');location.replace("/index.php/mailer/sface")</script>');
			   }else{
			       log_message('Informational',$error['error_sys']);
			   }
		       
		   }
	   }else{
	      echo '<script>alert(\'信息不完善!\');history.go(-1)</script>';
	   }
	}
	function export_online_content($url){
		$this->model_issn->user_auth();
		 $this->load->plugin('bill_uri');
	     if(function_exists('file_get_contents')){
			return $c = bill_uri(file_get_contents($url));
	     }else{
			 $c = '';
		     $fh = fopen($url,'rb');
			 if( $fh !== false){
				 while( !feof($fh)){
					  $c .= fread($fh,8192);
				 }
				 return $c;
			 }else{
			     return	false; 
			 }
		 }
	}
	function do_bat_sms(){
		$this->model_issn->user_auth();
		$s_num = $this->input->xss_clean($this->input->post('s_num'));
		$content = ico($this->input->xss_clean($this->input->post('content')));
		if($s_num ==='all'){
            $q = $this->db->get(PHONE_TABLE);
		}else{
		  if( ! empty($s_num)){
             $q =$this->db->get(PHONE_TABLE,$s_num,0);
		  }else{
		     exit;
		  }
	    }
		$this->config->load('sms');
		if($q->num_rows() > 0){
			foreach($q->result_array() as $row){
                $sms_to = $row['phone_no'];
				$re = sms::send_sms($sms_to, $content,$this->config->item('uid'),$this->config->item('pwd'));	
                if($re !== true){
					//更新邮件成功率!
                }
			}
		}else{
		    die('手机号库中,没有任何信息');
		}
        echo '发送完毕';
	}
	function do_bat_mail(){
		$some_info = $this->uri->uri_to_assoc();
		$this->model_issn->user_auth();
		$s_num = $this->input->xss_clean($this->input->post('s_num'));
		$temp_id = $this->input->xss_clean($this->input->post('temp_id'));
		 if($some_info['temp_id']){
			 $temp_id=$some_info['temp_id'];
			 }
		//$s_num = 1;
		if($s_num ==='all'){
            $q = $this->db->get(EMAIL_TABLE);
		}else{
		  if( ! empty($s_num)||$s_num==0){
			$limi=$s_num;
			  $s_num=$s_num*1;
			  $data['track_v']=$s_num;
			  $this->db->insert('track',$data);
             $q =$this->db->get(EMAIL_TABLE,1,$s_num);
		  }
	    }
		if($some_info['li']){
			$limi=$some_info['li'];
			$s_num=$some_info['li'];
			  $data['track_v']=$s_num;
			  $this->db->insert('track',$data);
		$q =$this->db->get(EMAIL_TABLE,1,$s_num);
		}
		if( ! empty($temp_id)){
			 $select = array('temp_content','temp_subject');
			 $this->db->select($select);
			 $q_temp = $this->db->get_where(TEMPLATE_LIST_TABLE,array('temp_id'=>$temp_id),1,0);
		}
        $temp_info = $q_temp->result_array();
		$html_content =$temp_info[0]['temp_content'];
		$subject = stripslashes($temp_info[0]['temp_subject']);
		if($q->num_rows() > 0){
			foreach($q->result_array() as $row){
			    if( empty($replyto) ){
					$replyto = $this->config->item('replyto');
			    }
				//if($row['email_addr']==""||check_email(!$row['email_addr'])){
				//continue;
				//}
				$re =  $this->model_mailto_data->send($subject ,$html_content,$replyto,$row['email_addr'],$row['id'],$limi,$temp_id);
			}
		}
           // $result = $this->model_mailto_data->send($subject ,$html_content,$replyto,$to);
	}
	function modu(){
		$this->model_issn->user_auth();
		$result = $this->model_mailto_data->get_modu();
		if(!$result){
		echo "<script>alert('你没有添加接口，请添加接口；');document.location.href='/index.php/mailer/modu_add';</script>";
		}
		$array['re']=$result;
		$view_path = '/web';
		$this->load->view($this->current_skin.'/'.$view_path.'/modu',$array);
	}
	function modu_add(){
		$this->model_issn->user_auth();
		$view_path = '/web';
		$this->load->view($this->current_skin.'/'.$view_path.'/modu_add',$array);
	}
	function modu_add_insert(){
		$result = $this->model_mailto_data->add_insert($_POST);
		if($result){
			echo "<script>alert('添加成功');document.location.href='/index.php/mailer/modu';</script>";
		}
	}
	function modu_edit(){
		$this->model_issn->user_auth();
		$view_path = '/web';
		$some_info = $this->uri->uri_to_assoc();
		$result=$this->model_mailto_data->get_modu_one($some_info['id']);
		$array['re']=$result;
		$this->load->view($this->current_skin.'/'.$view_path.'/modu_edit',$array);
	}
	function modu_update(){
		$this->model_issn->user_auth();
		$result=$this->db->update(MODU_TABLE,$_POST,array('id' => $_POST['id']));
		if($result){
		echo "<script>alert('修改成功');document.location.href='/index.php/mailer/modu';</script>";
		}
	}
	function modu_del(){
		$this->model_issn->user_auth();
		$some_info = $this->uri->uri_to_assoc();
		$result=$this->db->delete(MODU_TABLE, array('id' => $some_info['id']));
		if($result){
		echo "<script>alert('删除成功');document.location.href='/index.php/mailer/modu';</script>";
		}
	}
	function subs(){
		$this->model_issn->user_auth();
	$some_info = $this->uri->uri_to_assoc();
	$date['receive_status']=$some_info['is'];
	$re=$this->db->update(EMAIL_TABLE,$date,array('id' => $some_info['mail']));
	if($some_info['is']==2){
		if($re){
			echo "<script>alert('订阅成功');document.location.href='http://www.t960.com';</script>";
		   }else{
		   echo "<script>alert('订阅失败');document.location.href='http://www.t960.com';</script>";
		   }
	}else{
		if($re){
			echo "<script>alert('退订成功');document.location.href='http://www.t960.com';</script>";
		   }else{
		   echo "<script>alert('退订失败');document.location.href='http://www.t960.com';</script>";
		   }
	}
	}
	function modu_load(){
		$this->model_issn->user_auth();
	$some_info = $this->uri->uri_to_assoc();
	$result=$this->model_mailto_data->get_modu_one($some_info['id']);
	$va=$this->model_mailto_data->get_va($result);
	if($result['cate']!=0){
		foreach($va as $value){
		 $this->db->insert(PHONE_TABLE,array('phone_no'=>$value));
		}
	}else{
		foreach($va as $value){
		 $this->db->insert(EMAIL_TABLE,array('email_addr'=>$value));
		}
	}
	}
};
