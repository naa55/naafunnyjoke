<?php

    try {
        include __DIR__ . '/includes/DatabaseConnection.php';
        include __DIR__ . '/includes/DatabaseFunction.php';

        

        ob_start();
    
        include __DIR__ . '/templates/SportBetting.html.php';
    
        $output = ob_get_clean();
        
    }catch(PDOException $e) {
    $title = "Unable to connect to server" ;
    $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFile() . ':' . $e->getLine();
    }


include __DIR__ . '/templates/layout.html.php';