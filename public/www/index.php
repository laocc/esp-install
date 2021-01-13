<?php
declare(strict_types=1);
try {

    $option = include_once('../config.php');
    (new \esp\core\Dispatcher($option, 'www'))->run();

} catch (\esp\core\ext\EspError $error) {
    http_response_code(500);
    header("Status: 500 Internal Server Error", true);
    print_r($error->display());
    exit;
}

