<?php
define ('ROOT',	dirname(__DIR__) . DIRECTORY_SEPARATOR);

define ('PUBLICFOLDER', ROOT . 'public'      . DIRECTORY_SEPARATOR);

define ('APP',			ROOT . 'application' . DIRECTORY_SEPARATOR);
define ('VIEW',			ROOT . 'application' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define ('MODEL',		ROOT . 'application' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR);
define ('DATA',			ROOT . 'application' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR);
define ('CORE',			ROOT . 'application' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR);
define ('CONTROLLER',	ROOT . 'application' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR);

define ('CONFIG',       ROOT . 'config'      . DIRECTORY_SEPARATOR);

define ('ACTION',       CONTROLLER . 'action' . DIRECTORY_SEPARATOR);

define ('SQL',          MODEL . 'sql' . DIRECTORY_SEPARATOR);
define ('DYNAMIC',      MODEL . "dynamic" . DIRECTORY_SEPARATOR);

$modules = [ROOT,PUBLICFOLDER, APP, CORE, CONTROLLER, DATA, SQL, DYNAMIC, ACTION];

set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));

spl_autoload_register('spl_autoload',false);    
//spl_autoload_register();