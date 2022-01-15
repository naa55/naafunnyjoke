<?php

class Mlm {
    private $mlmsTable;
    private $userTable;
    private $favoriateTable;


    public function __construct(DatabaseTable $mlmsTable, DatabaseTable $userTable, DatabaseTable $favoriateTable) {
        $this->mlmsTable = $mlmsTable;
        $this->userTable = $userTable;
        $this->favoriateTable = $favoriateTable;
    }

    public function list() {
        $result = $this->mlmsTable->findAll();

        $mlms = [];
        foreach($result as $mlm) {
            $mlms[] = [
                'id'=> $mlm['id'],
                'name'=> $mlm['name'],
            ];
        }

        $title = 'Scam List';
        return ['template' => 'MLM.html.php', 'title'=>$title, 'variables'=>['mlms'=> $mlms]];

    }

    public function Favlist() {
        $favoriate = $this->favoriateTable->findAll();
        
        $title = 'Favoriate List';
        return ['template' => 'favoriate.html.php', 'title'=>$title, 'variables'=>['favoriate'=> $favoriate]];

    }

   
    public function saveEdit() {
       $mlm = $_POST['mlm'];
       $this->mlmsTable->save($mlm);
        header('location:index.php?route=mlm/list');
    }

    public function edit() {
        if (isset($_POST['id'])) {
            $mlm = $this->mlmsTable->findById($_POST['id']);
            }
            $title = 'Edit joke';
            return ['template' => 'editmlm.html.php', 'title' => $title,'variables' => ['mlm' => $mlm ?? null,  'id'=>$_POST['id']]
            ];
    }

    public function delete() {
        $this->mlmsTable->delete($_POST['id']);
        header('location:index.php?route=mlm/list');

    }

   
    public function deleteFav() {
        $this->favoriateTable->delete($_POST['id']);
        header('Location:index.php?route=mlm/favlist');
    }
    public function home() {
        $title = 'Internet Mlm Database';
     
        return ['template' => 'home.html.php', 'title' => $title];

    }

    // public function search() {
    //     if(isset($_POST['submit-search'])) {
    //         $search = $_POST['search'];
    //         $result = $this->mlmsTable->search($_POST['name'], $search);
    //     }
    //  return ['template' => 'search.html.php', 'result'=>$result];

    // }

    public function favoriate() {
        $result =$this->mlmsTable->findById($_POST['id']);
        // $user = $this->userTable->findById($result['id']);

        $favs = [
            'name'=>$result['name'],
            'userid'=> 2
        ];
        $this->favoriateTable->inserts($favs);
        // var_dump($user);


        // $result = $this->mlmsTable->findAll();
        // $favoriate=[];
        // foreach($result as $fav) {
        //     $user = $this->userTable->findById($fav['id']);
        //     $favoriate[]=[
        //         'id'=>$fav['id'],
        //         'name'=>$fav['name'],
        //         'userid'=> $user['id']
        //     ];
        // }

        // var_dump($favoriate);


        header('Location: MLM.php');


    }
}



























  

// class Mlm {
//     private $mlmsTable;

//     public function __construct(DatabaseTable $mlmsTable)
//     {
//         $this->mlmsTable = $mlmsTable;
      
//     }
//     public function list() {
//         $result = $this->mlmsTable->findAll();

//         $mlms = [];
//         foreach($result as $mlm) {
//                 $mlms[] = [
//                         'id'=>$mlm['id'],
//                         'name'=>$mlm['name'],
//                 ];
//         }
       

//         $title = 'Mlm';
         
//         return ['template' => 'MLM.html.php', 'title' => $title, 'variables'=>[ 'mlms'=>$mlms]];
//     }

//     public function home() {
//         $title = 'Internet MLM Database';
        
//         return ['template' => 'MLM.html.php', 'title' => $title];
//         }

//     public function delete() {
//         $this->jokesTable->delete($_POST['id']);
    
//         header('location:index.php?route=mlm/list');
        
//     }

  

//     public function saveEdit() {
//             $mlm = $_POST['mlm'];
//             $this->jokesTable->save($mlm);
//             // header('location: index.php?route=joke/list');
            
//     }

//     public function edit() {
//             if (isset($_POST['id'])) {
//                 $mlm = $this->mlmsTable->findById($_POST['id']);
//             }
//             $title = 'Edit mlm';
        
   
//             return ['template' => 'editmlm.html.php',
//             'title' => $title, 'variables'=>['mlm'=>$mlm?? null, 'id'=>$_POST['id']]];
        
//     } 
// }