<?php
try {
     include __DIR__ .'/autoloader.php';
    include __DIR__ . '/classes/Entrypoint.php';
    include __DIR__ . '/classes/scamRoutes.php';
    $route = $_GET['route'] ?? 'home';
    $entryPoint = new EntryPoint($route,  new scamRoute(),  $_SERVER['REQUEST_METHOD']);
    $entryPoint->run();
} catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage() . ' in '
        . $e->getFile() . ':' . $e->getLine();
}
