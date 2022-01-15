<?php

class scamRoute {

    public function getRoutes() {
        include __DIR__ . '/DatabaseTable.php';
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/Controllers/Mlm.php';
        $mlmsTable = new DatabaseTable($pdo, 'mlm', 'id');
        $favoriateTable = new DatabaseTable($pdo, 'favoriate', 'id');
        $userTable = new DatabaseTable($pdo, 'user', 'id');
        $mlmsController = new Mlm($mlmsTable, $userTable, $favoriateTable);

        $routes = [
            'mlm/edit' => [
            'POST' => [
                'controller' => $mlmsController,
                'action' => 'saveEdit'
            ],
                'GET' => [
                'controller' => $mlmsController,
                'action' => 'edit'
                ]
            ],
            'mlm/edit/id'=>[
                'POST'=>[
                    'controller'=>$mlmsController,
                    'action'=>'edit'
                ]
                ],
            'mlm/delete' => [
                'POST' => [
                'controller' => $mlmsController,
                'action' => 'delete'
                ]
            ],
            'mlm/list' => [
                'GET' => [
                'controller' =>$mlmsController,
                'action' => 'list'
                ]
            ],
            'mlm/home' => [
                'GET' => [
                'controller' =>$mlmsController,
                'action' => 'home'
                ]
                ],
            'mlm/search'=>[
                'POST'=>[
                    'controller'=>$mlmsController,
                    'action'=>'search'
                ]
                ],
            'mlm/favlist'=>[
                'GET'=>[
                    'controller'=>$mlmsController,
                    'action'=>'Favlist'
                ]
                ],
            'mlm/favoriate'=>[
                'POST'=>[
                    'controller'=>$mlmsController,
                    'action'=>'favoriate'
                ]
                ],
            'fav/delete'=>[
                'POST'=>[
                    'controller'=>$mlmsController,
                    'action'=>'deleteFav'
                ]
            ]
        ];
        return $routes;
    }
}