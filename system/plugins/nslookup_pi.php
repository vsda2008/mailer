<?php
function get_mx($host){
    $gethost = 'nslookup -querytype=mx '.$host;
	$look_result = `$gethost`;
	if(PHP_OS === 'WINNT'){
		//163.com	MX preference = 10, mail exchanger = 163mx04.mxmail.netease.com
		//t96.com	MX preference = 10, mail exchanger = mail.t96.com
		//qq.com	MX preference = 5, mail exchanger = mx2.qq.com
		if(preg_match("/mail exchanger = (.*)/i",$look_result,$match)){
			return $match[1];
		}
		return false;
	}else{
		//163.com mail exchanger = 10 163mx04.mxmail.netease.com.
		//qq.com  mail exchanger = 10 mx1.qq.com.
		//tom.com mail exchanger = 10 tommx.cdn.163.net.
		if(preg_match("/mail exchanger = \d{1,2} (.*)\./i",$look_result,$match)){
			return $match[1];
		}
		return false;
	};
}