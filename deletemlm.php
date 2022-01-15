<?php

try {
    include __DIR__ . "/includes/DatabaseConnection.php";
    // include __DIR__ . "/includes/DatabaseFunction.php";
    include __DIR__ . '/classes/DatabaseTable.php';

    $mlmsTable = new DatabaseTable($pdo, 'mlm', 'id');
    
    $mlmsTable->delete($_POST['id']);



    // delete($pdo, 'mlm', 'id', $_POST['id']);
    header('location:MLM.php');

} catch(PDOException $e) {
    $title = "An error has occurred";
    $output = "An error has occurred";

        $output = "Unable to connect to server" 
        . $e->getMessage() . " in " 
        .$e->getFile()
        . $e->getLine();
}


include __DIR__ . "/templates/layout.html.php";