<?php

// --------------------------------------------------------------------------
// File name   : mod_send_msg.php
// Description : 短信发送模块
// Requirement : PHP4 (http://www.php.net)

// Copyright(C), HonestQiao, 2005, All Rights Reserved.

// Author: 刘臣让 (honestqiao@hotmail.com)

// --------------------------------------------------------------------------
/**
 * $cfg_sms_uid = '660428';配置账号及密码
 * $cfg_sms_pwd = '660428';
 * 
 * $result_send = sendsms::send_msg('15024439499','猪 干吗呢');
 * var_dump($result_send);
 */
 // 成功返回true 失败返回一个数组 array('error_user'=>$error_user,'error_sys'=>$error_sys);
// error_user 用户可以看到的 error_sys 系统保留的
class sms{
     // gs8oyi1mOVgKcWJi
    // 19800701
    static function send_sms($mobile, $content,$uid,$pwd){

         $http = 'http://http.c123.com/tx/';
         $data = array
         (
            'uid' => $uid, // 用户账号
            'pwd' => $pwd, // MD5位32密码
            'mobile' => $mobile, // 号码
            'content' => $content, // 内容
            'time' => '', // 定时发送
            'mid' => '' // 子扩展号
            );
         $re = self :: post_sms($http, $data); //POST方式提交
         if(trim($re) == '100')
            {
             return true;
             }
        else
            {
             return self :: parse_error($re);
             }
         }
     static function parse_error($re){
         $error_user = '';
         $error_sys = '';
         switch($re){
         case '101': $error_sys = '验证失败';
            break;
         case '102': $error_sys = '短信不足';
            break;
         case '103': $error_sys = '操作失败';
            break;
         case '104': $error_user = '非法字符';
            break;
         case '105': $error_user = '内容过多';
            break;
         case '106': $error_user = '号码过多';
            break;
         case '107': $error_user = '频率过快';
            break;
         case '108': $error_user = '号码内容空';
            break;
         case '109': $error_sys = '账号冻结';
            break;
         case '110': $error_user = '禁止频繁单条发送';
            break;
         case '111': $error_sys = '系统暂定发送';
            break;
         case '120': $error_sys = '系统升级';
            break;
             }
         return $error = array('error_user' => $error_user, 'error_sys' => $error_sys);
         }
     static function post_sms($url, $data = '')
    {    $post = '';
	     $port = '';
         $row = parse_url($url);
         $host = $row['host'];
         $port = $row['port'] ? $row['port']:80;
         $file = $row['path'];
         while (list($k, $v) = each($data))
        {
             $post .= rawurlencode($k) . "=" . rawurlencode($v) . "&"; //转URL标准码
             }
         $post = substr($post , 0 , -1);
         $len = strlen($post);
         $fp = @fsockopen($host , $port, $errno, $errstr, 10);
         if (!$fp){
             return "$errstr ($errno)\n";
             }else{
             // 15900492318
            $receive = '';
             $out = "POST $file HTTP/1.1\r\n";
             $out .= "Host: $host\r\n";
             $out .= "Content-type: application/x-www-form-urlencoded\r\n";
             $out .= "Connection: Close\r\n";
             $out .= "Content-Length: $len\r\n\r\n";
             $out .= $post;
             fwrite($fp, $out);
             while (!feof($fp)){
                 $receive .= fgets($fp, 128);
                 }
             fclose($fp);
             $receive = explode("\r\n\r\n", $receive);
             unset($receive[0]);
             return implode("", $receive);
             }
         }
    };
?>