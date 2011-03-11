<?php
class Customers extends EC_Controller{
	function Customers(){
	    parent::EC_Controller();
		$this->load->model('model_customers_cate');
        $this->model_customers_cate = new Model_customers_cate();
		$this->load->model('model_customers');
        $this->model_customers = new Model_customers();
	    //error_reporting(E_ALL);
	}
	function index(){
        $all_issn = $this->model_customers->get_issn_all();
        //var_dump($all_issn);//取得期数
		$array['issn'] = $all_issn;
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/type_list_issn_face.php',$array);
	}
	function type_list_face(){
		$this->model_customers->user_auth();
	    $some_info = $this->uri->uri_to_assoc();
		$array['issn'] = $some_info['issn'];
		$cate_tree = $this->model_customers_cate->get_cate($array['issn']);
		$array['cates'] = $cate_tree;
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/type_list_face',$array);
	}
	function add(){
		$this->model_customers->user_auth();
		$some_info = $this->uri->uri_to_assoc();
		$type_info = $this->model_customers->get_type(intval($some_info['tid']));
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
		$array['issn'] = $some_info['issn'];
		$array['tid'] = $some_info['tid'];
		$array['editor'] = $GLOBALS['fck']->CreateHtml();
		$array['tname'] = $type_info ['tname'];
		$array['res_type'] = $type_info['res_type'];
		switch($some_info['tid']){
			case 1:
				$page='/aplink_face1';
				break;
			case 2:
				$page='/aplink_face2';
				break;
			case 3:
				$page='/aplink_face3';
				break;
			case 4:
				$page='/aplink_face4';
				break;
			case 5:
				$page='/aplink_face5';
				break;
			case 10:
				$page='/aplink_face10';
				break;
			case 11:
				$page='/aplink_face11';
				break;
			case 12:
				$page='/aplink_face12';
				break;
		}
		$type = intval($type_info['res_type']);
			$this->load->view($this->current_skin.'/'.$view_path.$page,$array);
	}
	function do_add(){
		$this->model_customers->user_auth();
	    $insert['issn'] = $this->input->xss_clean($this->input->post('issn'));
	    $insert['tid'] = $this->input->xss_clean($this->input->post('tid'));
		$array['res_type'] = $this->input->xss_clean($this->input->post('res_type'));
            $insert['title'] = ico($this->input->xss_clean($this->input->post('title')));
			$insert['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			$insert['content'] = ico( addslashes($_POST['content']) );
			$this->model_customers->add_aplink($insert);
	}
	function del_bro_face(){
		$this->model_customers->user_auth();
        $some_info = $this->uri->uri_to_assoc(); 
		$array['issn'] = $some_info['issn'];
		$cate_tree = $this->model_customers_cate->get_cate($array['issn']);
		$array['cates'] = $cate_tree;
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/del_bro_face',$array);
	}
	function del_select_face(){
		$this->model_customers->user_auth();
        $all_issn = $this->model_customers->get_issn_all();
        //var_dump($all_issn);//取得期数
		$array['issn'] = $all_issn;
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/del_select_face',$array);
	}
	function del(){
		$this->model_customers->user_auth();
        $some_info = $this->uri->uri_to_assoc(); 
		$array['issn'] = $some_info['issn'];
		//$type_info = $this->model_customers->get_type(intval($some_info['tid']));
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
		$array['issn'] = $some_info['issn'];
		$array['tid'] = $some_info['tid'];
		//$array['tname'] = $type_info ['tname'];
		//$array['res_type'] = $type_info['res_type'];
		$array['submit_url'] = '/index.php/customers/do_del';
		//$type = intval($type_info['res_type']);
		/*if($type === TLINK ){
            $ap_list = $this->model_customers->get_all_tlink($array['tid'],$some_info['issn']);
			$array['list'] = $ap_list; 
		    $this->load->view($this->current_skin.'/'.$view_path.'/del_link_face',$array);
		}
		if($type === PLINK ){
            $ap_list = $this->model_customers->get_all_plink($array['tid'],$some_info['issn']);
			$array['list'] = $ap_list; 
		    $this->load->view($this->current_skin.'/'.$view_path.'/del_link_face',$array);
		}
		if($type === APLINK ){*/
			$ap_list = $this->model_customers->get_all_aplink($array['tid'],$some_info['issn']);
			$array['list'] = $ap_list;
			$this->load->view($this->current_skin.'/'.$view_path.'/del_link_face',$array);
		//}
	}
	function do_del(){
		 $this->model_customers->user_auth();
	    $insert['issn'] = $this->input->xss_clean($this->input->post('issn'));
	    $insert['tid'] = $this->input->xss_clean($this->input->post('tid'));
			$re = $this->model_customers->del_aplink($insert['tid'],$_POST['lid']);
			if($re){
				echo '删除成功';
			}else{
			    echo '删除失败';
			}
	}
	function mod_select_face(){
		$this->model_customers->user_auth();
	    $array['issn'] = $this->input->xss_clean($this->input->post('issn'));
	    $array['tid'] = $this->input->xss_clean($this->input->post('tid'));
		$a_lid = $this->input->xss_clean($this->input->post('lid'));
		$array['lid'] = $a_lid[0];
		$array['res_type'] = $this->input->xss_clean($this->input->post('res_type'));
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $array['submit_url'] = '/index.php/brochure/do_update_select';
		$type = intval($array['res_type']);
			$re = $this->model_customers->get_aplink($array['lid']);
			$GLOBALS['fck']->Value = stripslashes($re['content']);
            $array = array_merge($re,$array);
			$array['editor'] = $GLOBALS['fck']->CreateHtml();
            $this->load->view($this->current_skin.'/'.$view_path.'/mod_aplink_face',$array);
	}
	function do_update_select(){
		$this->model_customers->user_auth();
	    $insert['issn'] = $this->input->xss_clean($this->input->post('issn'));
	    $insert['tid'] = $this->input->xss_clean($this->input->post('tid'));
	    $insert['lid'] = $this->input->xss_clean($this->input->post('lid'));
		$array['res_type'] = $this->input->xss_clean($this->input->post('res_type'));
		$type = intval($array['res_type']);  
			$re = $this->model_customers->get_aplink($insert['tid'],$_POST['lid']);
            $update['title'] = $this->input->xss_clean($this->input->post('title'));
			$update['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			//$update['p_link'] = $this->input->xss_clean($this->input->post('p_link'));
			$update['content'] = addslashes($_POST['content']);
			$re = $this->model_customers->mod_aplink($insert['lid'],$update);
			if($re){
				echo '更新成功';
			}else{
			    echo '更新失败';
		}
	}
	function preview_list_issn_face(){
		$this->model_customers->user_auth();
        $all_issn = $this->model_customers->get_issn_all();
        //var_dump($all_issn);//取得期数
		$array['issn'] = $all_issn;
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/preview_list_issn_face',$array);
	}
	function show_cur_isn(){
		$this->model_customers->user_auth();
	  $params = $this->uri->uri_to_assoc();
	  $issn = $params['issn'];
	  $issn_info = $this->model_customers->get_issn($issn);//期数
	  $array['issn_title'] = $issn_info['title'];
	  $view_path = '/customers';
	  $public = $this->model_customers->get_public(1,$issn);//公告
	  $array['public'] = $public;
	  $detail = $this->model_customers->get_public(2,$issn);//团购详情
	  $array['detail'] = $detail;
	  $tips = $this->model_customers->get_public(3,$issn);//铁别提示
	  $array['tips'] = $tips;
	  $they = $this->model_customers->get_public(4,$issn);//他们说
	  $array['they'] = $they;
	  $we = $this->model_customers->get_public(5,$issn);//我们说
	  $array['we'] = $we;
	   $hr = $this->model_customers->get_public(11,$issn);//购买链接
	  $array['hr'] = $hr['url_link'];
	  $price = $this->model_customers->get_public(10,$issn);//价格
	  $array['price'] = $price['title'];//原价
	$array['s_price'] = $price['url_link'];//店铺价
	$array['price_save'] =$array['price']-$array['s_price'];//节省
	$array['price_save1']=sprintf("%.2f",($array['s_price'])/$array['price'])*10;//折扣
	$array['info']=$price['content'];
	  /*$senice = $this->model_customers->get_senice(2,$issn);//景区推荐
	  $array['digg_senice'] = $senice;
      $hd = $this->model_customers->get_hd(3,$issn);//活动
	  $array['last_week_hd'] = $hd;//上周精彩活动
      $xl = $this->model_customers->get_xl(4,$issn);//活动
	  $array['digg_xl'] = $xl;//精彩线路
      $bbs = $this->model_customers->get_bbs(5,$issn);//热帖推荐
	  $array['digg_bbs'] = $bbs;//上周精彩活动
      $sying = $this->model_customers->get_sying(6,$issn);//热帖推荐
	  $array['digg_sying'] = $sying;//摄影
      $xl_1 = $this->model_customers->get_xl_1(8,$issn);//近期线路短途
	  $array['digg_xl_1'] = $xl_1;//上周精彩活动
      $xl_2 = $this->model_customers->get_xl_2(9,$issn);//长线
	  $array['digg_xl_2'] = $xl_2;//上周精彩活动*/
	  $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	  $array['current_up'] = '/skins/'.$this->current_skin;
	  $c = $this->load->view($this->current_skin.'/'.$view_path.'/tuan',$array,true);
	  echo stripslashes(stripslashes($c));
	}
	function add_issn_face(){
		$this->model_customers->user_auth();
	    $view_path = '/customers';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/add_issn_face.php',$array); 
	}
	function do_add_issn(){
		$this->model_customers->user_auth();
	   $issn_title = $this->input->xss_clean($this->input->post('input_issn'));
	   $re = $this->model_customers->add_issn(ico($issn_title));
	   if($re){
		   echo '添加成功';
	   }else{
	      echo '添加失败';
	   }
	}
	function manage(){
		$this->model_customers->user_auth();
		$re = $this->model_customers->select_manage();
		$array['re']=$re;
		$view_path = '/customers';
		$this->load->view($this->current_skin.'/'.$view_path.'/manage.php',$array);
	}
	function add_manage(){
		
		$this->model_customers->user_auth();
		$view_path = '/customers';
		$this->load->view($this->current_skin.'/'.$view_path.'/add_manage.php',$array);
	}
	function insert_manage(){
		$this->model_customers->user_auth();
		$this->load->library('encrypt');
		$data["username"]=$_POST['username'];
		$data["password"]=md5($_POST['password']);
		//var_dump($data["password"]);
		$this->db->insert(USER_INFO_TABLE, $data);
		if($this->db->insert_id()){
			echo "<script>alert('添加成功');document.location.href='/index.php/brochure/manage';</script>";
		}
	}
	function del_manage(){
		$this->model_customers->user_auth();
		$some_info = $this->uri->uri_to_assoc();
		$data['user_id']=$some_info['id'];
		$re=$this->db->delete(USER_INFO_TABLE,$data);
		if($re){
			echo "<script>alert('删除成功');document.location.href='/index.php/brochure/manage';</script>";
		}else{
			echo "<script>alert('删除失败');document.location.href='/index.php/brochure/manage';</script>";
		}
	}
	function add_cur_info(){		
		$this->model_customers->user_auth();
		$view_path = '/customers';
		$this->load->view($this->current_skin.'/'.$view_path.'/add_cur_info.php',$array);
	}
	function do_add_cur_info(){
		$this->model_customers->user_auth();
		$view_path = '/customers';
		$this->load->view($this->current_skin.'/'.$view_path.'/add_cur_info.php',$array);
	}
};