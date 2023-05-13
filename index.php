<?php

define('_ROOTPATH_',__DIR__);

spl_autoload_register();

use App\Controller\Controller;

$controller = new controller();
$controller->route();

?>