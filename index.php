<?php

set_time_limit(0);
ini_set('display_errors', 'on');

$config = parse_ini_file('config.ini', true);
$global = $config['global'];
$config = parse_ini_file('bots.ini', true)[$config['bot']] + $config['default'];
$config['token'] = parse_ini_file('accounts.ini')[$config['nick']];
foreach ($global as $key => $val) {
	if (!isset($config[$key])) $config[$key] = [];
	$config[$key] += $val;
}
$class = $config['class'];
unset($config['class'], $global);

require_once "classes/$class.php";
new $class(...array_values(array_merge(array_flip($class::order), $config)));