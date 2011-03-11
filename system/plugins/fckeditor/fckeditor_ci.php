<?php
/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2010 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * This is the integration file for PHP (All versions).
 *
 * It loads the correct integration file based on the PHP version (avoiding
 * strict error messages with PHP 5).
 */
include_once 'fckeditor.php';

$FCKeditor = $GLOBALS['FCKeditor'];
if( ! empty($FCKeditor)){
   extract($FCKeditor);
   if(!$class_name){die('you hasn\'s set classname');}
   if(!$create_var_name){die('you hasn\'s set create_var_name');}
}else{
    echo 'you hasn\'t set $FCKeditor variable<br />';
	echo 'global $FCKeditor;<br />$FCKeditor["class_name"] = \'fck\';<br />$FCKeditor["create_var_name"] = \'body\';<br />$this->load->plugins(\'fckeditor/fckeditor\');<br />$GOLBALS[\'fck\']->CreateHtml();<br />';
	exit;
}


$fc = str_replace('\\','/',FCPATH);
$base = str_replace('\\','/',BASEPATH);
$web_root = str_replace($fc,'',$base); 
global $$class_name;
$$class_name = new FCKeditor($create_var_name);
$fc = str_replace('\\','/',FCPATH);
$$class_name->BasePath = '/'.$web_root.'plugins/fckeditor/';