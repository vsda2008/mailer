<?php

// --------------------------------------------------------------------------
// File name   : mod_send_msg.php
// Description : ���ŷ���ģ��
// Requirement : PHP4 (http://www.php.net)

// Copyright(C), HonestQiao, 2005, All Rights Reserved.

// Author: ������ (honestqiao@hotmail.com)

// --------------------------------------------------------------------------
/**
 * $cfg_sms_uid = '660428';�����˺ż�����
 * $cfg_sms_pwd = '660428';
 * 
 * $result_send = sendsms::send_msg('15024439499','�� ������');
 * var_dump($result_send);
 */
 // �ɹ�����true ʧ�ܷ���һ������ array('error_user'=>$error_user,'error_sys'=>$error_sys);
// error_user �û����Կ����� error_sys ϵͳ������
class sms{
     // gs8oyi1mOVgKcWJi
    // 19800701
    static function send_sms($mobile, $content,$uid,$pwd){

         $http = 'http://http.c123.com/tx/';
         $data = array
         (
            'uid' => $uid, // �û��˺�
            'pwd' => $pwd, // MD5λ32����
            'mobile' => $mobile, // ����
            'content' => $content, // ����
            'time' => '', // ��ʱ����
            'mid' => '' // ����չ��
            );
         $re = self :: post_sms($http, $data); //POST��ʽ�ύ
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
         case '101': $error_sys = '��֤ʧ��';
            break;
         case '102': $error_sys = '���Ų���';
            break;
         case '103': $error_sys = '����ʧ��';
            break;
         case '104': $error_user = '�Ƿ��ַ�';
            break;
         case '105': $error_user = '���ݹ���';
            break;
         case '106': $error_user = '�������';
            break;
         case '107': $error_user = 'Ƶ�ʹ���';
            break;
         case '108': $error_user = '�������ݿ�';
            break;
         case '109': $error_sys = '�˺Ŷ���';
            break;
         case '110': $error_user = '��ֹƵ����������';
            break;
         case '111': $error_sys = 'ϵͳ�ݶ�����';
            break;
         case '120': $error_sys = 'ϵͳ����';
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
             $post .= rawurlencode($k) . "=" . rawurlencode($v) . "&"; //תURL��׼��
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