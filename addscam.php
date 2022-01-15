<?php

if(isset($_POST['scamtype'])) {
    try {
        include __DIR__ . '/includes/DatabaseConnection.php';
        // include __DIR__ . '/includes/DatabaseFunction.php';
        $mlmsTable = new DatabaseTable($pdo, 'scamlist', 'id');
        // $mlmsTable->insert(['scamtype'=>$_POST['scamtype'], 'scamdate'=> 'CURDATE']);
        // $sql = 'INSERT INTO
        //  `scamlist` SET 
        //  `scamtype` = :scamtype,
        // `scamdate` = CURDATE()';

        // $stmt = $pdo->prepare($sql);

        // $stmt->bindValue(':scamtype', $_POST['scamtype']);

        // $stmt->execute();

        // insert($pdo, 'scamlist', ['scamtype'=>$_POST['scamtype'], 'scamdate'=>new DateTime()]);

        header('location: scamList.php');
    }catch(PDOException $e) {
    $title = "Unable to connect to server" ;
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
    }
} else {
    $title = 'Add new scam type';

    ob_start();

    include __DIR__ . '/templates/addscam.html.php';

    $output = ob_get_clean();
}

include __DIR__ . '/templates/layout.html.php';