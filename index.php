<?php


define('PHPCMS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

if (strpos($_SERVER['REQUEST_URI'], 'phpsso_server')!==false) {
    include_once PHPCMS_PATH.'/phpsso_server/index.php';
    exit;
}


include PHPCMS_PATH.'/phpcms/base.php';

pc_base::creat_app();

?>