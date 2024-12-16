<?php
require_once('config.php');

require_once('./includes/functions.php');
require_once('./includes/connect.php');
require_once('./includes/database.php');
session_start();

// echo _WEB_HOST;
// echo'</br>';
// echo _WEB_HOST_TEMPLATES;
// echo'</br>';
// echo _WEB_PATH;
// echo'</br>';
// echo _WEB_PATH_TEMPLATES;
// echo'</br>';


$module = _MODULE;
$action = _ACTION;
if (!empty($_GET['module'])) {
    if (is_string($_GET['module'])) {
        $module = trim($_GET['module']);
    }
}
if (!empty($_GET['action'])) {
    if (is_string($_GET['action'])) {
        $action = trim($_GET['action']);
    }
}

$path = 'modules/'.$module.'/'.$action.'.php';

if (file_exists($path)) {
    require_once ($path);
}else {
    require_once ('modules/error/404.php');
}
