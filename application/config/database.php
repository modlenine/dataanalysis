<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

// Dynamic server selection: local vs production
$host = explode(':', $_SERVER['HTTP_HOST'] ?? '')[0];
$is_local = in_array($host, ['localhost', '127.0.0.1', '::1']);
if ($is_local) {
	$mysqlServer         = 'localhost:3307';
	$username            = 'aek';
	$password            = 'Aek1234';
	$mysql_saleeServer   = 'localhost:3307';
	$mysql_saleeUsername = 'aek';
	$mysql_saleePassword = 'Aek1234';
} else {
	$mysqlServer         = '192.168.20.36';
	$username            = 'pdintra';
	$password            = 'Pdin1234';
	$mysql_saleeServer   = '192.168.20.34';
	$mysql_saleeUsername = 'ofintra';
	$mysql_saleePassword = 'Ofin1234';
}

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $mysqlServer,
	'username' => $username,
	'password' => $password,
	'database' => 'data_analysis',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


$db['saleecolour'] = array(
	'dsn'	=> '',
	'hostname' => $mysql_saleeServer,
	'username' => $mysql_saleeUsername,
	'password' => $mysql_saleePassword,
	'database' => 'saleecolour',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['intranet'] = array(
	'dsn'	=> '',
	'hostname' => $mysql_saleeServer,
	'username' => $mysql_saleeUsername,
	'password' => $mysql_saleePassword,
	'database' => 'intranet',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
