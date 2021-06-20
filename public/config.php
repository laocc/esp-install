<?php
declare(strict_types=1);

ini_set('error_reporting', strval(E_ALL));
ini_set('display_errors', 'true');
ini_set('date.timezone', 'Asia/Shanghai');

try {

    (include(__DIR__ . "/../vendor/autoload.php")) or exit('Please RUN:<h3 style="color:red;">composer install</h3>');

} catch (\Error $error) {
    http_response_code(500);
    header("Status: 500 Internal Server Error", true);
    print_r($error);
    exit;
}

/**
 * 是否每次都加载所有config文件，
 * 定义成false值将先从redis中读取
 * 但databases都会被先读取
 */
define('_CONFIG_LOAD', _DEBUG);


$option = array();

/**
 * @param $option
 * 框架基本常量定义完成，框架正式启动之前执行，
 * 在此处可以重新定义config，这儿已经可以使用框架常量
 */
$option['before'] = function (&$option) {

    $option['error'] = ['display' => 'html'];

    //系统定义文件存放的目录，如果需要放在其他目录，在这里重写，
    $option['config']['path'] = '/common/config';

    //除了前面定义的目录之外，还需要引入其他地方的配置文件，可以配置任意多个
    $option['config']['extra'] = ['../custom'];

    /**
     * 不同环境下读取不同目录里的配置文件，这里面的所有文件内容都会合并到已加载过的所有同名文件数据中
     * 仅合并在path中的同名文件，
     * 例：有path/set.ini时，将合并path/debug/set.ini
     * 例：无path/conf.ini时，即便存在path/debug/conf.ini，也不会合并
     */
    $option['config']['folder'] = _DEBUG ? 'debug' : 'production';

    //直接指定需要合并的配置值，注意数组键名与上述配置文件的文件名及变量名，执行的是array_merge
    $option['config']['merge'] = [];

    //直接指定需要合并的配置值，注意数组键名与上述配置文件的文件名及变量名，执行的是array_replace_recursive
    $option['config']['replace'] = [];

};

/**
 * @param $option
 * 框架启动完成，执行控制器之前调用这儿，
 * 如果有启用bootstrap或setPlugin，也在此之前执行
 */
$option['after'] = function (&$option) {

};

return $option;