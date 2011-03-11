<?php
//$host = '163.com';
//$gethost = 'nslookup -querytype=mx '.$host;
//$look_result = `$gethost`;
//if(PHP_OS === 'WINNT'){
//	//163.com	MX preference = 10, mail exchanger = 163mx04.mxmail.netease.com
//    //t96.com	MX preference = 10, mail exchanger = mail.t96.com
//    //qq.com	MX preference = 5, mail exchanger = mx2.qq.com
//	if(preg_match("/mail exchanger = (.*)/i",$look_result,$match)){
//		var_dump($match[1]);
//	}
//	echo 'NT';
//}else{
//	//163.com mail exchanger = 10 163mx04.mxmail.netease.com.
//	//qq.com  mail exchanger = 10 mx1.qq.com.
//    //tom.com mail exchanger = 10 tommx.cdn.163.net.
//	if(preg_match("/mail exchanger = (.*)\./i",$look_result,$match)){
//		var_dump($match[1]);
//	}
//    echo 'UNNT';
//};
//echo $os = PHP_OS;
//echo $look_result;exit;
//echo bin2hex(iconv('GBK','UTF-8','浏览'));
//$ps='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
//<html xmlns="http://www.w3.org/1999/xhtml">
//<head>
//<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
//<link href="css/css.css" type="text/css" rel="stylesheet" />
//<title>旅途周刊</title>
//</head>
//
//<body>
//<div id="allpages">
//  <div class="main">
//    <div class="up_0">
//	  <div class="up_1"><span style=""><img src="/images/zktou.jpg" /></span><span style="font-size:14px;">《第一期》</span></div>';
//eregi('src=(["\']/)?([^"\' ><]+)',$ps,$m);
//var_dump($m);exit;
//$ucsalt ='54914b';
//$ucfounderw = 'sunwayt960';
//echo $ucfounderpw= md5(md5($ucfounderw).$ucsalt);
/*
|---------------------------------------------------------------
| PHP ERROR REPORTING LEVEL
|---------------------------------------------------------------
|
| By default CI runs with error reporting set to ALL.  For security
| reasons you are encouraged to change this when your site goes live.
| For more info visit:  http://www.php.net/error_reporting
|
*/
	//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
/*
|---------------------------------------------------------------
| SYSTEM FOLDER NAME
|---------------------------------------------------------------
|
| This variable must contain the name of your "system" folder.
| Include the path if the folder is not in the same  directory
| as this file.
|
| NO TRAILING SLASH!
|
*/
	$system_folder = "system";

/*
|---------------------------------------------------------------
| APPLICATION FOLDER NAME
|---------------------------------------------------------------
|
| If you want this front controller to use a different "application"
| folder then the default one you can set its name here. The folder 
| can also be renamed or relocated anywhere on your server.
| For more info please see the user guide:
| http://codeigniter.com/user_guide/general/managing_apps.html
|
|
| NO TRAILING SLASH!
|
*/
	$application_folder = "app";

/*
|===============================================================
| END OF USER CONFIGURABLE SETTINGS
|===============================================================
*/


/*
|---------------------------------------------------------------
| SET THE SERVER PATH
|---------------------------------------------------------------
|
| Let's attempt to determine the full-server path to the "system"
| folder in order to reduce the possibility of path problems.
| Note: We only attempt this if the user hasn't specified a 
| full server path.
|
*/
if (strpos($system_folder, '/') === FALSE)
{
	if (function_exists('realpath') AND @realpath(dirname(__FILE__)) !== FALSE)
	{
		$system_folder = realpath(dirname(__FILE__)).'/'.$system_folder;
	}
}
else
{
	// Swap directory separators to Unix style for consistency
	$system_folder = str_replace("\\", "/", $system_folder);
}


/*
|---------------------------------------------------------------
| DEFINE APPLICATION CONSTANTS
|---------------------------------------------------------------
|
| EXT		- The file extension.  Typically ".php"
| SELF		- The name of THIS file (typically "index.php")
| FCPATH	- The full server path to THIS file
| BASEPATH	- The full server path to the "system" folder
| APPPATH	- The full server path to the "application" folder
|
*/
define('EXT', '.php');
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('FCPATH', str_replace(SELF, '', __FILE__));
define('BASEPATH', $system_folder.'/');

if (is_dir($application_folder))
{
	define('APPPATH', $application_folder.'/');
}
else
{
	if ($application_folder == '')
	{
		$application_folder = 'application';
	}

	define('APPPATH', BASEPATH.$application_folder.'/');
}

/*
|---------------------------------------------------------------
| LOAD THE FRONT CONTROLLER
|---------------------------------------------------------------
|
| And away we go...
|
*/
require_once BASEPATH.'codeigniter/CodeIgniter'.EXT;
log_message('info', 'The purpose of some variable is to provide some value.');

/* End of file index.php */
/* Location: ./index.php */