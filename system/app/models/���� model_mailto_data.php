<?php
class Model_mailto_data extends Model{
	  public $mailer=null;
	  public function Model_mailto_data(){
	      parent::Model();
		  $this->load->database();
	  }
      public function import_to_data($type){
		  if($type =='csv'){
			  csv_to_data();
		  }else if($type =='sql'){
		      sql_to_data();
		  }
	  
	  }
	  public function csv_to_email_data($file){
	         $f_lines = file($file);
			 array_shift($f_lines); 
			 if(is_array($f_lines)){
				 foreach($f_lines as $k=>$line){
                     if(! check_email(trim($line))  ){
						 $k = $k + 2;
						 return "录入的邮件地址不正确！在 $k  行";
                     } 
				    $array['email_addr']=trim($line);
				    $where = array('email_addr'=>trim($line));
				    $q = $this->db->get_where(EMAIL_TABLE,$where,1,0);
					 if($q->num_rows() > 0){
						 continue;
					 }
					 $this->db->insert(EMAIL_TABLE,$array);
				 }
			 }
			 return true;
	  }
	  public function csv_to_phone_data($file){
	         $f_lines = file($file);
			 array_shift($f_lines); 
			 if(is_array($f_lines)){
				 foreach($f_lines as $k=>$line){
                     if(! check_phone(trim($line))  ){
						 $k = $k + 2;
						 return "录入的手机号不正确！在 $k  行";
                     } 
					 $array['phone_no']=trim($line);
					 $where = array('phone_no'=>trim($line));
					 $q = $this->db->get_where(PHONE_TABLE,$where,1,0);
						 if($q->num_rows() > 0){
							 continue;
						 }
						 $this->db->insert(PHONE_TABLE,$array);
						 if($this->db->insert_id() < 0){
							 echo '插入数据失败';
						 }
					 }
			 }
			 return true;
	  }
	  public function sql_email_to_data($hostname){
		  $this->db->select('cfg_value');
		  $q = $this->db->get_where(CONFIG_TABLE,array('cfg_name'=>$hostname),1,0);
		  if($q->num_rows() > 0 ){
			  $r = $q->result_array(); 
			  $db_config= m_unserialize($r[0]['cfg_value']);
			  $db_config=$db_config['dbmail'];
	          $my_db = mysql_connect($db_config['hostname'],$db_config['username'],$db_config['password'],true) or die('link fail ' . mysql_error());
			  mysql_select_db($db_config['database'],$my_db) or die('query ' . mysql_error());
			  mysql_query('SET NAMES '.$db_config['char_set'],$my_db) or die('query ' . mysql_error());
			  $sql="SELECT `{$db_config['mail']}` as `email` FROM `{$db_config['table_name']}` WHERE LENGTH({$db_config['mail']}) > 0 ";
			  $result = mysql_query($sql,$my_db);
			  while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
                     $email = $row['email'];
					 $this->db->where('email_addr',$email);
					 $this->db->get(EMAIL_TABLE,1,0);
					 if($this->db->affected_rows()>0){
						   continue;
					 }
					 if( check_email($email) === true ){
                        $this->db->insert(EMAIL_TABLE,array('email_addr'=>$email));
					 }
					
			  }
			  return true;
		  }else{
		      return false;
		  }
		  //extract($config);
	  }
	  public function sql_to_phone_data($hostname){
		  $this->db->select('cfg_value');
		  $q = $this->db->get_where(CONFIG_TABLE,array('cfg_name'=>$hostname),1,0);
		  if($q->num_rows() > 0 ){
			  $r = $q->result_array(); 
			  $db_config= m_unserialize($r[0]['cfg_value']);
			  $db_config=$db_config['dbmail'];
	          $my_db = mysql_connect($db_config['hostname'],$db_config['username'],$db_config['password'],true) or die('link fail ' . mysql_error());
			  mysql_select_db($db_config['database'],$my_db) or die('query ' . mysql_error());
			  mysql_query('SET NAMES '.$db_config['char_set'],$my_db) or die('query ' . mysql_error());
			  $sql="SELECT `{$db_config['mail']}` as `email`,`{$db_config['phone']}` as `phone` FROM `{$db_config['table_name']}` WHERE LENGTH({$db_config['phone']}) > 0 ";
			  $result = mysql_query($sql,$my_db);
			  while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
					 $phone = $row['phone'];
					 if( check_phone($phone) === true ){
					   $this->db->where('phone_no',$phone);
					   $q = $this->db->get(PHONE_TABLE,1,0);
					   if($this->db->affected_rows()>0){
						   continue;
					   }
                       $this->db->insert(PHONE_TABLE,array('phone_no'=>$phone));
					 }
			  }
			  return true;
		  }else{
		      return false;
		  }
		  //extract($config);
	  }
	  public function load_mailer(){
	      $this->load->plugin('mailer/phpmailer');
		  $this->mailer = new PHPMailer();
          $this->load->config('mailer');
		  $this->mailer->CharSet = "gb2312"; // 这里指定字符集！
          $this->mailer->Encoding = "base64"; 

	  }
	  public function smtp_mail(){
		  $this->mailer->IsSMTP();
		  $this->mailer->IsHTML(true); // send as HTML

	  }
	  public function mx_mail(){
		    $this->mailer->IsHTML(true); // send as HTML
			$this->mailer->SMTPAuth = false;
			$this->mailer->IsSMTP();
	  }
	  public function test_send($id,$subject='test subject',$html_content='test content weleocme',$replyto='',$to='',$from='auto',$word_wrap=50,$altbody='您的邮箱不支持html!',$replyto_name='旅途中国',$from_name='旅途中国'){
			$send_type =  $this->load->config('send_type');
			if($send_type === 'mx'){
			   $host = ltrim(strrchr($to,'@'),'@');
			   $this->mailer->Host = get_mx($host);
			   
			}else{
			   $sql = ' SELECT *'
				. ' FROM `'.SMTP_INFO_TABLE.'`'
				. ' WHERE id='.$id . ' LIMIT 1 '; 
				
			  $q = $this->db->query($sql);
			  if($q->num_rows() > 0){
				  $re = $q->result_array();
				  
				  $smtp_info = $re[0];
			  }else{
				  die('smtp 您还没有设置!');
			  }
			  $this->mailer->SMTPAuth = (boolean)$smtp_info['is_auth'];
			  $this->mailer->Host =  $smtp_info['host'];
			  $this->mailer->Username =  $smtp_info['username'];
			  $this->mailer->Password =  $smtp_info['pwd'];
			}
			$from == 'auto' ? $from = str_replace('smtp.',$smtp_info['username'].'@', $smtp_info['host']) : $from = $from;
			$this->mailer->From       = $from;
			$this->mailer->FromName   = $from_name;
			$this->mailer->Subject    = $subject;
			$this->mailer->AltBody    = $altbody; //Text Body
			$this->mailer->WordWrap   = $word_wrap; // set word wrap
			$this->mailer->MsgHTML($html_content);
			$this->mailer->AddReplyTo($replyto,$replyto_name);
			$this->mailer->AddAddress("648896840@qq.com","648896840@qq.com");
			$re = $this->mailer->send();
			if( ! $re){
			   echo $this->mailer->ErrorInfo;
			   log_message('debug','fail '.$to.$this->mailer->ErrorInfo);
			   return false;
			}
			return $re;
	  } 
	  public function send($subject,$html_content,$replyto,$to,$tid,$from='auto',$word_wrap=50,$altbody='您的邮箱不支持html!',$replyto_name='旅途中国',$from_name='旅途中国',$limi,$temp_id){
		  $this->mailer->ClearAddresses();
		    $this->load->config('send_type');
		    $send_type = $this->config->item('send_type');
			if($send_type === 'mx'){
			   $host = ltrim(strrchr($to,'@'),'@');
			   $this->mailer->Host = get_mx($host);
			   $from = 'admin@t960.com';
			}else{
			   $sql = ' SELECT *'
				. ' FROM `'.SMTP_INFO_TABLE.'`'
				. ' ORDER BY rand( )'
				. ' LIMIT 1 '; 
				
			  $q = $this->db->query($sql);
			  if($q->num_rows() > 0){
				  $re = $q->result_array();
				  
				  $smtp_info = $re[0];
			  }else{
				  die('smtp 您还没有设置!');
			  }
			  $this->mailer->SMTPAuth = (boolean)$smtp_info['is_auth'];
			  $this->mailer->Host =  $smtp_info['host'];
			  $this->mailer->Username =  $smtp_info['username'];
			  $this->mailer->Password =  $smtp_info['pwd'];
              $from == 'auto' ? $from = str_replace('smtp.',$smtp_info['username'].'@', $smtp_info['host']) : $from = $from;
			}
			$html_content=str_replace('@ding@',$tid,$html_content);
			$html_content=stripslashes($html_content);
			$this->mailer->From       = $from;
			$this->mailer->FromName   = $from_name;
			$this->mailer->Subject    = $subject;
			$this->mailer->AltBody    = $altbody; //Text Body
			$this->mailer->WordWrap   = $word_wrap; // set word wrap
			$this->mailer->MsgHTML($html_content);
			$this->mailer->AddReplyTo($replyto,$replyto_name);
			$this->mailer->AddAddress($to,$to);
			$re = $this->mailer->send();
			if($re){
				echo "<script>alert('成功');document.location.href='/index.php/mailer/do_bat_mail/li/".++$limi."/temp_id/".$temp_id."';</script>";
			}else
				{
			   echo $this->mailer->ErrorInfo;
			   log_message('debug','fail '.$to.$this->mailer->ErrorInfo);
			   return false;
			}
	  } 
	  function get_modu(){
		$sql="SELECT id,modu_name,cate FROM ".MODU_TABLE;
		$q=$this->db->query($sql);
		if($q->num_rows() >0){
		   $type = $q->result_array();
		  return $type;
	   }else{
	      return false;
	   }
	  }
	  function get_modu_one($value){
	  $result=$this->db->query("SELECT * FROM ".MODU_TABLE." WHERE id=".$value);
	  if($result->num_rows()>0){
		$type = $result->result_array();
		return $type['0'];
	  }else{
		return false;
	  }
	  }
	  function add_insert($data){
	   $this->db->insert(MODU_TABLE,$data);
			if($this->db->insert_id() > 0){
			return true;
		   }
		   return false;
	  }
	  function get_va($s){
		$hostname = $s['address'];
			$username = $s['user'];
			$password = $s['pwd'];
			$database = $s['db_name'];
			$dbdriver = $s['db'];
			$char_set = $s['cod'];
			$table_name = $s['table_name'];
			$mail = $s['field'];
			$array['cfg_name'] = ico($hostname);
			$array['cfg_value'] = m_serialize($db);
			//$this->db->get_where(CONFIG_TABLE,)
			$my_db = mysql_connect($hostname,$username,$password,true) or die('link fail ' . mysql_error());
			mysql_select_db($database,$my_db) or die('query ' . mysql_error());
			mysql_query('SET NAMES '.$char_set,$my_db) or die('query ' . mysql_error());
			  $sql="SELECT $mail FROM $table_name";
			  $result = mysql_query($sql,$my_db);
			 while($re=mysql_fetch_array($result,MYSQL_ASSOC)){
				$res[]=$re[$mail];
			 }
			  return $res;
	  }
	  public function export_mail(){
	     $this->db->query('');
	  }
	  public function export_photo(){
	  
	  }
	  
};



