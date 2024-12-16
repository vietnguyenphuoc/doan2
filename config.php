<?php
const _MODULE = 'home';
const _ACTION = 'dashboard';
const _CODE = true;

//hằng số localhost
define('_WEB_HOST','http://'.$_SERVER['HTTP_HOST'].'/doan2');
define('_WEB_HOST_TEMPLATES',_WEB_HOST.'/templates');
define('_WEB_PATH',__DIR__);
define('_WEB_PATH_TEMPLATES',_WEB_PATH.'\templates');
// define('_WEB_FILE',__FILE__);


// thông tin kết nối database
$servername = "localhost";
$dbname = "doan2";
$username = "root";
$password = "";