<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT. '/public');
define("CORE", ROOT. '/core');
define("CONTROLLERS", ROOT. '/controllers');
define("VIEWS", ROOT. '/views');
define("CONFIG", ROOT. '/config');
define("ERRORS", VIEWS . '/errors');
define("CLASSES", CORE . '/classes');

require CLASSES . '/Db.php';
$db_config = require CONFIG. '/db.php';
$db = new Db($db_config);

require CONFIG .'/routes.php';
require CORE .'/router.php';