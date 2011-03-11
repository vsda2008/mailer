<?php
class Brochure extends EC_Controller{
	function Brochure(){
	    parent::EC_Controller();
		$this->load->model('model_cate');
        $this->model_cate = new Model_cate();
		$this->load->model('model_issn');
        $this->model_issn = new Model_issn();
	    //error_reporting(E_ALL);
	}
	function index(){
        $all_issn = $this->model_issn->get_issn_all();
        //var_dump($all_issn);//取得期数
		$array['issn'] = $all_issn;
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/type_list_issn_face.php',$array);
	}
	function type_list_face(){
		$this->model_issn->user_auth();
	    $some_info = $this->uri->uri_to_assoc();
		$array['issn'] = $some_info['issn'];
		$cate_tree = $this->model_cate->get_cate($array['issn']);
		$array['cates'] = $cate_tree;
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/type_list_face',$array);
	}
	function add(){
		$this->model_issn->user_auth();
		$some_info = $this->uri->uri_to_assoc();
		$type_info = $this->model_issn->get_type(intval($some_info['tid']));
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
		$array['issn'] = $some_info['issn'];
		$array['tid'] = $some_info['tid'];
		$array['editor'] = $GLOBALS['fck']->CreateHtml();
		$array['tname'] = $type_info ['tname'];
		$array['res_type'] = $type_info['res_type'];
		$type = intval($type_info['res_type']);
		if($type === TLINK ){
		    $this->load->view($this->current_skin.'/'.$view_path.'/tlink_face',$array);
		}
		if($type === PLINK ){
		    $this->load->view($this->current_skin.'/'.$view_path.'/plink_face',$array);
		}
		if($type === APLINK ){
			$this->load->view($this->current_skin.'/'.$view_path.'/aplink_face',$array);
		}
		if($type === GOODSLINK ){
			$this->load->view($this->current_skin.'/'.$view_path.'/goodslink_face',$array);
		}
	}
	function do_add(){
		$this->model_issn->user_auth();
	    $insert['issn'] = $this->input->xss_clean($this->input->post('issn'));
	    $insert['tid'] = $this->input->xss_clean($this->input->post('tid'));
		$array['res_type'] = $this->input->xss_clean($this->input->post('res_type'));
		$type = intval($array['res_type']);
		if($type === TLINK ){
            $insert['title'] = ico($this->input->xss_clean($this->input->post('title')));
			$insert['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
		    $this->model_issn->add_tlink($insert);
		}
		if($type === PLINK ){
            $insert['title'] = ico($this->input->xss_clean($this->input->post('title')));
			$insert['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			$insert['p_link'] = $this->input->xss_clean($this->input->post('p_link'));
            $this->model_issn->add_plink($insert);
		}
		if($type === APLINK ){
            $insert['title'] = ico($this->input->xss_clean($this->input->post('title')));
			$insert['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			$insert['p_link'] = $this->input->xss_clean($this->input->post('p_link'));
			$insert['content'] = ico( addslashes($_POST['content']) );
			$this->model_issn->add_aplink($insert);
		}
		if($type === GOODSLINK ){
            $insert['title'] = ico($this->input->xss_clean($this->input->post('title')));
			$insert['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			$insert['p_link'] = $this->input->xss_clean($this->input->post('p_link'));
			$insert['list_price'] = $this->input->xss_clean($this->input->post('list_price'));
			$insert['sell_price'] = $this->input->xss_clean($this->input->post('sell_price'));
		
			$this->model_issn->add_goodslink($insert);
		}
	}
	function del_bro_face(){
		$this->model_issn->user_auth();
        $some_info = $this->uri->uri_to_assoc(); 
		$array['issn'] = $some_info['issn'];
		$cate_tree = $this->model_cate->get_cate($array['issn']);
		$array['cates'] = $cate_tree;
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/del_bro_face',$array);
	}
	function del_select_face(){
		$this->model_issn->user_auth();
        $all_issn = $this->model_issn->get_issn_all();
        //var_dump($all_issn);//取得期数
		$array['issn'] = $all_issn;
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/del_select_face',$array);
	}
	function del(){
		$this->model_issn->user_auth();
        $some_info = $this->uri->uri_to_assoc(); 
		$array['issn'] = $some_info['issn'];
		$type_info = $this->model_issn->get_type(intval($some_info['tid']));
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
		$array['issn'] = $some_info['issn'];
		$array['tid'] = $some_info['tid'];
		$array['tname'] = $type_info ['tname'];
		$array['res_type'] = $type_info['res_type'];
		$array['submit_url'] = '/index.php/brochure/do_del';
		$type = intval($type_info['res_type']);
		if($type === TLINK ){
            $ap_list = $this->model_issn->get_all_tlink($array['tid'],$some_info['issn']);
			$array['list'] = $ap_list; 
		    $this->load->view($this->current_skin.'/'.$view_path.'/del_link_face',$array);
		}
		if($type === PLINK ){
            $ap_list = $this->model_issn->get_all_plink($array['tid'],$some_info['issn']);
			$array['list'] = $ap_list; 
		    $this->load->view($this->current_skin.'/'.$view_path.'/del_link_face',$array);
		}
		if($type === APLINK ){
			$ap_list = $this->model_issn->get_all_aplink($array['tid'],$some_info['issn']);
			$array['list'] = $ap_list;
			$this->load->view($this->current_skin.'/'.$view_path.'/del_link_face',$array);
		}
		if($type === GOODSLINK ){
			$ap_list = $this->model_issn->get_all_goodslink($array['tid'],$some_info['issn']);
			$array['list'] = $ap_list;
			$this->load->view($this->current_skin.'/'.$view_path.'/del_link_face',$array);
		}
	}
	function do_del(){
		 $this->model_issn->user_auth();
	    $insert['issn'] = $this->input->xss_clean($this->input->post('issn'));
	    $insert['tid'] = $this->input->xss_clean($this->input->post('tid'));
		$array['res_type'] = $this->input->xss_clean($this->input->post('res_type'));
		$type = intval($array['res_type']);
		if($type === TLINK ){
			$re = $this->model_issn->del_tlink($insert['tid'],$_POST['lid']);
			if($re){
				echo '删除成功';
			}else{
			    echo '删除失败';
			}
		}
		if($type === PLINK ){
			$re = $this->model_issn->del_plink($insert['tid'],$_POST['lid']);
			if($re){
				echo '删除成功';
			}else{
			    echo '删除失败';
			}
		}
		if($type === APLINK ){
             
			$re = $this->model_issn->del_aplink($insert['tid'],$_POST['lid']);
			if($re){
				echo '删除成功';
			}else{
			    echo '删除失败';
			}
		}
	}
	function mod_select_face(){
		$this->model_issn->user_auth();
	    $array['issn'] = $this->input->xss_clean($this->input->post('issn'));
	    $array['tid'] = $this->input->xss_clean($this->input->post('tid'));
		$a_lid = $this->input->xss_clean($this->input->post('lid'));
		$array['lid'] = $a_lid[0];
		$array['res_type'] = $this->input->xss_clean($this->input->post('res_type'));
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $array['submit_url'] = '/index.php/brochure/do_update_select';
		$type = intval($array['res_type']);
		if($type === TLINK ){
			$re = $this->model_issn->get_tlink($array['lid']);
            $array = array_merge($re,$array);
			$this->load->view($this->current_skin.'/'.$view_path.'/mod_tlink_face',$array);
	       
		}
		if($type === PLINK ){
			
			$re = $this->model_issn->get_plink($array['lid']);
            $array = array_merge($re,$array);
			$this->load->view($this->current_skin.'/'.$view_path.'/mod_plink_face',$array);
		}
		if($type === APLINK ){
             
			$re = $this->model_issn->get_aplink($array['lid']);
			$GLOBALS['fck']->Value = stripslashes($re['content']);
            $array = array_merge($re,$array);
			$array['editor'] = $GLOBALS['fck']->CreateHtml();
            $this->load->view($this->current_skin.'/'.$view_path.'/mod_aplink_face',$array);
		}
		if($type === GOODSLINK ){
             
			$re = $this->model_issn->get_goodslink($array['lid']);
			$array = array_merge($re,$array);
            $this->load->view($this->current_skin.'/'.$view_path.'/mod_goodslink_face',$array);
		}
	}
	function do_update_select(){
		$this->model_issn->user_auth();
	    $insert['issn'] = $this->input->xss_clean($this->input->post('issn'));
	    $insert['tid'] = $this->input->xss_clean($this->input->post('tid'));
	    $insert['lid'] = $this->input->xss_clean($this->input->post('lid'));
		$array['res_type'] = $this->input->xss_clean($this->input->post('res_type'));
		$type = intval($array['res_type']);
		if($type === TLINK ){
			$re = $this->model_issn->get_tlink($insert['tid'],$_POST['lid']);
            $update['title'] = ico($this->input->xss_clean($this->input->post('title')));
			$update['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			$this->model_issn->mod_tlink($insert['lid'],$update);
			if($re){
				echo '更新成功';
			}else{
			    echo '更新失败';
			}
		}
		if($type === PLINK ){
			$re = $this->model_issn->get_plink($insert['tid'],$_POST['lid']);
		    $update['title'] = ico($this->input->xss_clean($this->input->post('title')));
			$update['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			$update['p_link'] = $this->input->xss_clean($this->input->post('p_link'));
			
			$this->model_issn->mod_plink($insert['lid'],$update);
			if($re){
				echo '更新成功';
			}else{
			    echo '更新失败';
			}
		}
		if($type === APLINK ){
            
			$re = $this->model_issn->get_aplink($insert['tid'],$_POST['lid']);
            $update['title'] = $this->input->xss_clean($this->input->post('title'));
			$update['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			$update['p_link'] = $this->input->xss_clean($this->input->post('p_link'));
			$update['content'] = addslashes($_POST['content']);
			$re = $this->model_issn->mod_aplink($insert['lid'],$update);
			if($re){
				echo '更新成功';
			}else{
			    echo '更新失败';
			}
		}
		if($type === GOODSLINK ){
            
			$re = $this->model_issn->get_goodslink($insert['tid'],$_POST['lid']);
            $update['title'] = $this->input->xss_clean($this->input->post('title'));
			$update['url_link'] = $this->input->xss_clean($this->input->post('url_link'));
			$update['p_link'] = $this->input->xss_clean($this->input->post('p_link'));
	        $update['list_price'] = $this->input->xss_clean($this->input->post('list_price'));
			$update['sell_price'] = $this->input->xss_clean($this->input->post('sell_price'));
		 
			$re = $this->model_issn->mod_goodslink($insert['lid'],$update);
			if($re){
				echo '更新成功';
			}else{
			    echo '更新失败';
			}
		}
	}
	function preview_list_issn_face(){
		$this->model_issn->user_auth();
        $all_issn = $this->model_issn->get_issn_all();
        //var_dump($all_issn);//取得期数
		$array['issn'] = $all_issn;
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/preview_list_issn_face',$array);
	}
	function show_cur_isn(){
		$this->model_issn->user_auth();
	  $params = $this->uri->uri_to_assoc();
	  $issn = $params['issn'];
	  $issn_info = $this->model_issn->get_issn($issn);//期数
	  $array['issn_title'] = $issn_info['title'];
	  $view_path = '/zhoukan';
	  $public = $this->model_issn->get_public(1,$issn);//公告
	  $array['public'] = $public['content'];
	  $senice = $this->model_issn->get_senice(2,$issn);//景区推荐
	  $array['digg_senice'] = $senice;
      $hd = $this->model_issn->get_hd(3,$issn);//活动
	  $array['last_week_hd'] = $hd;//上周精彩活动
      $xl = $this->model_issn->get_xl(4,$issn);//活动
	  $array['digg_xl'] = $xl;//精彩线路
      $bbs = $this->model_issn->get_bbs(5,$issn);//热帖推荐
	  $array['digg_bbs'] = $bbs;//上周精彩活动
      $sying = $this->model_issn->get_sying(6,$issn);//热帖推荐
	  $array['digg_sying'] = $sying;//摄影
      $xl_1 = $this->model_issn->get_xl_1(8,$issn);//近期线路短途
	  $array['digg_xl_1'] = $xl_1;// 
      $hotel = $this->model_issn->get_items_data(10,$issn,GOODSLINK_TABLE);//酒店
	  $array['digg_hotel'] = $hotel;// 
      $tuan = $this->model_issn->get_items_data(11,$issn,GOODSLINK_TABLE);//酒店
	  $array['digg_tuan'] = $tuan;// 
      $xl_2 = $this->model_issn->get_xl_2(9,$issn);//长线
	  $array['digg_xl_2'] = $xl_2;//上周精彩活动
	  $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	  $array['current_up'] = '/skins/'.$this->current_skin;
	  $c = $this->load->view($this->current_skin.'/'.$view_path.'/index',$array,true);
	  echo stripslashes(stripslashes($c));
	}
	function add_issn_face(){
		$this->model_issn->user_auth();
	    $view_path = '/web';
	    $array['current_skin'] = '/skins/'.$this->current_skin.$view_path;
	    $array['current_up'] = '/skins/'.$this->current_skin;
        $this->load->view($this->current_skin.'/'.$view_path.'/add_issn_face.php',$array); 
	}
	function do_add_issn(){
		$this->model_issn->user_auth();
	   $issn_title = $this->input->xss_clean($this->input->post('input_issn'));
	   $re = $this->model_issn->add_issn(ico($issn_title));
	   if($re){
		   echo '添加成功';
	   }else{
	      echo '添加失败';
	   }
	}
	function manage(){
		$this->model_issn->user_auth();
		$re = $this->model_issn->select_manage();
		$array['re']=$re;
		$view_path = '/web';
		$this->load->view($this->current_skin.'/'.$view_path.'/manage.php',$array);
	}
	function add_manage(){
		
		$this->model_issn->user_auth();
		$view_path = '/web';
		$this->load->view($this->current_skin.'/'.$view_path.'/add_manage.php',$array);
	}
	function insert_manage(){
		$this->model_issn->user_auth();
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
		$this->model_issn->user_auth();
		$some_info = $this->uri->uri_to_assoc();
		$data['user_id']=$some_info['id'];
		$re=$this->db->delete(USER_INFO_TABLE,$data);
		if($re){
			echo "<script>alert('删除成功');document.location.href='/index.php/brochure/manage';</script>";
		}else{
			echo "<script>alert('删除失败');document.location.href='/index.php/brochure/manage';</script>";
		}
	}
};