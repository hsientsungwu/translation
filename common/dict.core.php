<?php
mb_internal_encoding('utf-8');
header("Content-Type: text/html; charset=utf-8");

// configuration
require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/master_config.php');

// special functions
require_once($_SERVER['DOCUMENT_ROOT'] . '/common/chinese.convert.php');

// common functions
require_once($_SERVER['DOCUMENT_ROOT'] . '/common/import.func.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/class/enum.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/common/search.func.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/common/common.func.php');

function __autoload($className) { 
	$classRoot = $_SERVER['DOCUMENT_ROOT'] . '/class/';
	
	// classes
	$class['dbMysqli']    	 = $classRoot . 'dbMysqli.class.php';
	$class['Dict']       	 = $classRoot . 'dict.class.php';
	$class['StarDictImport'] = $classRoot . 'dictimport.class.php';
	$class['CeDictSearch']	 = $classRoot . 'dictsearch.class.php';

    if (file_exists($class[$className])) {
          require_once $class[$className]; 
          return true; 
    } 
      
    return false; 
}

$mysql = new MysqlSetting();
$dbFacile = new dbMysqli();
$dbFacile->open($mysql->database, $mysql->username, $mysql->password, $mysql->host);
$dbFacile->execute("SET CHARACTER SET utf8");