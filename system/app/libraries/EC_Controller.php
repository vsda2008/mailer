<?php
class EC_Controller extends Controller{
	  function EC_Controller(){
	      parent::Controller();
		  $this->config->load('skin');
		  $this->current_skin = $this->config->item('admin_skin');
	      global $FCKeditor;
		  $FCKeditor["class_name"] = 'fck';
		  $FCKeditor["create_var_name"] = 'content';
		  $this->load->plugins('fckeditor/fckeditor');
		  $GLOBALS['fck']->ToolbarSet = 'Default';
          $GLOBALS['fck']->FullPage = false;
		  header('Content-type:text/html; charset=gbk');
	  }
};