<?php
    ini_set('session.name', 'key');
    defined('LOCAL_LIB_PATH') || define('LOCAL_LIB_PATH', realpath(__DIR__) . '/');
    require_once(realpath(__DIR__) . '/../../../lib/init.php');