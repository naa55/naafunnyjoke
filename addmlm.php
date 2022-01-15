<?php

if(isset($_POST['name'])) {
    try {
        include __DIR__ . '/includes/DatabaseConnection.php';
        // include __DIR__ . '/includes/DatabaseFunction.php';
        include __DIR__ . '/classes/DatabaseTable.php';

        $mlmsTable = new DatabaseTable($pdo, 'mlm', 'id');

        $mlmsTable->insert(['name'=>$_POST['name']]);

        // $sql = 'INSERT INTO
        //  `scamlist` SET 
        //  `scamtype` = :scamtype,
        // `scamdate` = CURDATE()';

        // $stmt = $pdo->prepare($sql);

        // $stmt->bindValue(':scamtype', $_POST['scamtype']);

        // $stmt->execute();

        // insert($pdo, 'mlm', ['name'=>$_POST['name']]);

        header('location: MLM.php');
    }catch(PDOException $e) {
    $title = "Unable to connect to server" ;
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
    }
} else {
    $title = 'Add new mlm name';

    ob_start();

    include __DIR__ . '/templates/addmlm.html.php';

    $output = ob_get_clean();
}

include __DIR__ . '/templates/layout.html.php';