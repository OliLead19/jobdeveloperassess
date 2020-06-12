<?php
require '../autoload.php';

$routes = new \TissueSampler\Routes();

$entryPoint = new \CSY2028\EntryPoint($routes);

$entryPoint->run();
