<?php

class Welcome extends EC_Controller {
    var $current_skin;
	var $root;
	function Welcome()
	{
		parent::EC_Controller();
		$this->config->load('skin');
		$this->current_skin = $this->config->item('admin_skin');
		$this->load->model('model_issn');
        $this->model_issn = new Model_issn();
		$this->lang->load('chinese');
		$this->load->helper('url');
	}
	function load_edit(){
		$this->load->model('model_mailto_data'); 
		$this->load->model('model_cate'); 
		$this->load->plugin('bill_uri');
        $this->model_mailto_data->load_mailer();
		$this->model_mailto_data->smtp_mail();
		$subject = 'hello';
		$html_content = bill_uri('http://iebook.t960.com/lvtuzhoukan/lt1.htm');
		$replyto = 'www.t960.com'; 
		$to = '412042627@qq.com'; 
		$this->model_mailto_data->send($subject ,$html_content,$replyto,$to);
		exit;

	}
	function init_fckedit(){
		echo FCPATH,BASEPATH;
		global $FCKeditor;
		$FCKeditor["class_name"] = 'fck';
		$FCKeditor["create_var_name"] = 'body';
		$this->load->plugins('fckeditor/fckeditor');
		$GLOBALS['fck']->ToolbarSet = 'Default';
		var_dump($GLOBALS['fck']);
		echo $GLOBALS['fck']->CreateHtml(); 

	}
	function show(){

	}
	function create_img(){
		$this->load->plugin('captcha');
		$this->load->config('config');
		$vals = array(
						'img_path'	 => '/captcha/',
						'img_url'	 => $this->config->item('base_url') 
					);
		
	$vals = array(
					//'word'		 => 'Random',
					'img_path'	 => './captcha/',
					'img_url'	 => $this->config->item('base_url').'captcha/',
					'img_width'	 => '150',
					'img_height' => 30,
					'expiration' => 50
				);
	
	$cap = create_captcha($vals);
	echo $cap['image'];
 
	}
	function index()
	{
	   $view_path = '/login';
	   $array['submit_login_url'] = '/index.php/welcome/do_login';
	   $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	   $array['title'] = $this->lang->line('admin_title');
       $this->load->view($this->current_skin.$view_path.'/login',$array);
	}
	function do_login(){
		$username = $this->input->xss_clean($this->input->post('username'));
		$password = $this->input->xss_clean($this->input->post('password'));
	    $re = $this->model_issn->select_user($username,$password);
		echo $re;
	}
	function main(){
	   $view_path = '/web';
	   $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	   $array['top'] = '/index.php/welcome/top';
	   $array['center'] = '/index.php/welcome/center';
	   $array['down'] = '/index.php/welcome/down';
	   $array['title'] = $this->lang->line('admin_title');
       $this->load->view($this->current_skin.'/'.$view_path.'/main',$array);
	}
	function down(){
	   $view_path = '/web';
	   $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
       $this->load->view($this->current_skin.'/'.$view_path.'/down',$array);
	}
	function top(){
	   $view_path = '/web';
	   $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
       $this->load->view($this->current_skin.'/'.$view_path.'/top',$array);
	}
	function center(){
	   $view_path = '/web';
	   $array['left'] = '/index.php/welcome/left';
	   $array['tab'] = '/index.php/welcome/tab';
	   $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
       $this->load->view($this->current_skin.'/'.$view_path.'/center',$array);
	}
	function left(){
	   $view_path = '/web';
	   $array['menu'] = array(
              '发信管理'=>array(
		               array(
		               'url'=>'index.php/mailer/send',
		               'name'=>'发送邮件'
	                   )
	          ) 
	   );
	   $array['current_up'] = '/skins/'.$this->current_skin;
	   $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
       $this->load->view($this->current_skin.'/'.$view_path.'/left',$array);
	}
	function tab(){
	   $view_path = '/web';
	   $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
       $this->load->view($this->current_skin.'/'.$view_path.'/tab',$array);
	}
	function contactus(){
	  $this->load->helper('url');
	  $this->load->model('MContacts','',true);
	  $this->MContacts->addContact();
	  redirect('welcome/thankyou','refresh');
	}
	function test(){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => '127.0.0.1',
			'smtp_port' => 25,
			'charset' => 'GBK',
			'mailtype' => 'html',
		);
		// $config_ssl = Array(
		// 'protocol' => 'smtp',
		// 'smtp_host' => 'ssl://smtp.gmail.com',
		// 'smtp_port' => '465',
		// 'smtp_user' => '123@gmail.com',
		// 'smtp_pass' => '123',
		// 'mailtype' => 'html',
		// );
		$this->load->library('email');
        $this->email = new CI_Email($config);
		$this->email->set_newline("rn");
		$this->email->_smtp_auth = false;
		$from_name = "YES";//发件人名称
		$email_subject ="注册";
		$email_msg="
		你好！请注意查收！";
		//解决乱码问题
		//$from_name = iconv('UTF-8','GBK',$from_name);
		//$email_subject = iconv('UTF-8','GBK',$email_subject);
		//$email_msg = iconv('UTF-8','GBK',$email_msg);
		//封装发送信息
		$this->email->from('baiyuxiong@163.com',$from_name);
		$this->email->to('ok@baiyuxiong.com');
		$this->email->subject($email_subject);
		$this->email->message($email_msg);
		//$this->email->attach("attachments/2009/01 /1.xls");//附件
		//发送
		if (!$this->email->send())
		{
			show_error($this->email->print_debugger());
			//return false;
		}
		else
		{
			echo"OK";
			//return true;
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */