<?php

include __DIR__ . "/includes/DatabaseConnection.php";
// include __DIR__ . "/includes/DatabaseFunction.php";
include __DIR__ . '/classes/DatabaseTable.php';
try {
    $mlmsTable = new DatabaseTable($pdo, 'mlm', 'id');

    if (isset($_POST['name'])) {

    //  $mlm = $_POST["name"];

        
        $mlmsTable->update(['id'=>$_POST['mlmid'], 'name'=>$_POST['name']]);

        // update($pdo, 'mlm', 'id', 
        // ['id' => $_POST['mlmid'],'name' => $_POST['name']]);
        
       
        header('location: MLM.php');
        } else {
            if(isset($_GET['id'])) {
                $mlm = $mlmsTable->findById($_GET['id']);
                // $joke = findById($pdo, 'jokes', 'id', $_GET['id']);
            }
            // $mlm = findById($pdo, 'mlm', 'id', $_GET['id']);
        $title = 'Edit joke';
        ob_start();
        include __DIR__ . "/templates/editmlm.html.php";
        }
}catch(PDOException $e) {
    $output = "Unable to connect to server" 
    . $e->getMessage() . " in " 
    .$e->getFile()
    . $e->getLine();
}

// include __DIR__ . "/templates/layout.html.php";