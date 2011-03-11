<?php

// --------------------------------------------------------------------------
// File name   : 文件名称.php
// Description : 文件说明
// Requirement : PHP4 (http://www.php.net)
//
// Copyright(C), liu_chen_rang, 2005, All Rights Reserved.
//
// Author: liu_chen_rang (umyba@qq.com) 
//
// --------------------------------------------------------------------------
class Page_model extends Model{
	  var $page_num;
	  var $list_num;
	  var $table_name = 't960_scenic';
	  function Page_model($p_num=30,$l_num=10){
	          parent::Model();
			  $this->page_num = $p_num; 
			  $this->list_num = $l_num; 
			  $this->load->database();
	  }
	  function get_page_nums(){ 
             return ceil($this->db->count_all($this->table_name)/$this->page_num); 
	  }
	  function get_page($cur_page){
	         $query = $this->db->get($this->table_name,$this->page_num,$cur_page*$this->page_num);
			 return $query->result_array();
	  }
	  function get_list_nums(){
		     return round($this->get_page_nums()/$this->list_num);  
	  }
	  function get_total(){
		     return $this->db->count_all($this->table_name);  
	  }
};
//end_file