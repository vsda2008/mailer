<?php
function ico($c,$s='UTF-8',$t='GBK'){
      if(function_exists('iconv')){
		  return iconv($s,$t,$c);
      }else{
	      return $c;
	  }
}
function m_serialize($a){
        return urlencode(serialize($a));
}
function m_unserialize($str){
        return unserialize(urldecode($str));
}
function check_phone($phone){
	if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$|^15[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$|^18[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/",$phone)){    
	   return true;    
	}else{    
	   return false;
	}   
}
function check_email($email){
	if(eregi('^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4}$',$email)){    
	   return true;    
	}else{    
	   return false;
	}   
}
function get_c_img($c,$default){
	if(eregi('<img[^>]*src=["\']?([^"\' ><]+)',$c,$match)){
		//<img[^>]*scr["\']?([^"\' ><]+)
		//var_dump($match);
	  return $match[1];
	}else{
	  return $default;
	} 
}
?>