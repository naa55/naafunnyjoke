<?php

    try {
        include __DIR__ . '/includes/DatabaseConnection.php';
        include __DIR__ . '/classes/DatabaseTable.php';

        $mlmsTable = new DatabaseTable($pdo, 'mlm', 'id');

        $result = $mlmsTable->findAll();

        $mlms = [];
        foreach($result as $mlm) {
            $mlms[] = [
                'id'=> $mlm['id'],
                'name'=> $mlm['name']
            ];
        }

        ob_start();
    
        include __DIR__ . '/templates/MLM.html.php';
    
        $output = ob_get_clean();
        
    }catch(PDOException $e) {
    $title = "Unable to connect to server" ;
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
    }


include __DIR__ . '/templates/layout.html.php';