<?php
class Model_link_respond extends Model{
	  
	  public Model_link_respond(){
	      parent::Model();
		  $this->load->database();
	  }
      public unbook_link($mail_id){
          $field = array('id'=>$mail_id,'receive_status'=0);
		  $this->db->update(EMAIL_TABLE,$field);
	  }
	  public click_link($mail_id,$click_url){
          $field = array('to_id'=>$mail_id,'click_url'=$click_url);
		  $this->db->update(SEO_RESULT_TABLE,$field);
		  redirect($url);
	  }
	  public redirect($url){
		  ob_end_clean();
		  header($url);
	  }

};



