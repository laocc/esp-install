<?php
declare(strict_types=1);
ini_set('error_reporting', strval(E_ALL));
ini_set('display_errors', 'true');
ini_set('date.timezone', 'Asia/Shanghai');

define("_ROOT", dirname(__DIR__, 1));
try {
    is_readable($auto = (_ROOT . "/vendor/autoload.php")) ? include($auto) : exit('composer install');
} catch (\Error $error) {
    http_response_code(500);
    header("Status: 500 Internal Server Error", true);
    print_r($error);
    exit;
}

$option = array();
$option['error'] = ['display' => 'html'];
$option['before'] = function (&$option) {

};

return $option;