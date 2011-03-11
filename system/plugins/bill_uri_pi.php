<?php
function bill_uri($url){
	 $url_info = parse_url($url);
     $host = $url_info['host']; 
	 $path = $url_info['path']; 

	 $c = file_get_contents($url);
	 //var_dump($url_info);exit;path
	// $c = '<img width=44 height=44 src="lt1.files/image002.jpg" border=0 v:shapes="_x0000_i1026"><![endif]><o:p></o:p></span></b></p><span style=\'color:#FF6600\'><a href="http://www.t960.com/shibo" target="_blank">';
    if( empty( $path ) ){
    $c = eregi_replace('src=([\'"])?([^\'"http <>/]+[^\'"<>]+)','src=\\1http://'.$host.$path.'/\\2',$c);   
	$c = eregi_replace('href=([\'"])?([^\'"http <>/]+[^\'"<>]+)','href=\\1http://'.$host.$path.'/\\2',$c);   
    }else{
    $c = eregi_replace('src=([\'"])?([^\'"http <>/]+[^\'"<>]+)','src=\\1http://'.$host.$path.'/\\2',$c);   
	$c = eregi_replace('href=([\'"])?([^\'"http <>/]+[^\'"<>]+)','href=\\1http://'.$host.$path.'/\\2',$c);   
    }
	$c = eregi_replace('href=(["\'])?/([^"\' ><]+)','href=\\1http://'.$host.'/\\2',$c);
	$c = eregi_replace('src=(["\'])?/([^"\' ><]+)','href=\\1http://'.$host.'/\\2',$c);
//$c=preg_match_all("/[^<>\'\"]*[\'\"]>/",$string,$arr);
    return $c;
}
?>