<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "default";
$active_record = TRUE;

$db['default']['hostname'] = "localhost";
$db['default']['username'] = "root";
$db['default']['password'] = "vertrigo";
$db['default']['database'] = "mailer2";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "gbk";
$db['default']['dbcollat'] = "gbk_chinese_ci";

$db['dbmail']['hostname'] = "localhost";
$db['dbmail']['username'] = "root";
$db['dbmail']['password'] = "vertrigo";
$db['dbmail']['database'] = "t960-";
$db['dbmail']['dbdriver'] = "mysql";
$db['dbmail']['dbprefix'] = "";
$db['dbmail']['pconnect'] = TRUE;
$db['dbmail']['db_debug'] = TRUE;
$db['dbmail']['cache_on'] = FALSE;
$db['dbmail']['cachedir'] = "";
$db['dbmail']['char_set'] = "gbk";
$db['dbmail']['dbcollat'] = "gbk_chinese_ci";
/* End of file database.php */
/* Location: ./system/application/config/database.php */