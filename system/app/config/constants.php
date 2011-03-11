<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
//database table;
define('UPFILE_TABLE','upfile');
define('EMAIL_TABLE','email');
define('CONFIG_TABLE','config');
define('TEMPLATE_LIST_TABLE','template_list');
define('SEO_RESULT_TABLE','seo_result');
define('PHONE_TABLE','phone');
define('USER_INFO_TABLE','user_info');
define('ISSN_ALL_TABLE','issn_all');
define('CATESYS_TABLE','catesys');//partlink
define('PARTLINK_TABLE','partlink');//
define('TLINK_TABLE','tlink');//
define('PLINK_TABLE','plink');//
define('GOODSLINK_TABLE','goodslink');//
define('SMTP_INFO_TABLE','smtp_info');//
define('C_CATESYS_TABLE','c_catesys');
define('CUSTOMERS_TABLE','customers ');//
define('C_TLINK_TABLE','c_tlink');//


define('MODU_TABLE','modu');
define('TLINK',1);
define('PLINK',2);
define('APLINK',4);
define('GOODSLINK',7);

/* End of file constants.php 栏目类型，连接（1），图片连接（2），图文（4） 7 商品 */
/* Location: ./system/application/config/constants.php */