<?php
declare(strict_types=1);
$option = include_once('../config.php');
(new \esp\core\Dispatcher($option, 'www'))->run();

