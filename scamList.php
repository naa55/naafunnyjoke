<?php

try {

    $pdo = new PDO('mysql:host=localhost;dbname=scams;charset=utf8',
    'userscam',
    'userscam123');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    // include __DIR__ . '/includes/DatabaseConnection.php';

    $sql = 'SELECT `scamtype` FROM `scamlist`';
    $result = $pdo->query($sql);

    while($row = $result->fetch()) {
        $scams[] = $row['scamtype'];
    }

    ob_start();

    include __DIR__ . '/templates/scamList.html.php';

    $output = ob_get_clean();

// $output = 'Database is connected';


} catch(PDOException $e) {
        $output = "Unable to connect to server" 
        . $e->getMessage() . " in " 
        .$e->getFile()
        . $e->getLine();
}


include __DIR__ . "/templates/layout.html.php";