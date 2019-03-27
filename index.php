<?php

require_once "vendor/autoload.php";

use \Slim\Slim;
use \Project\DB\Sql;
use \Project\Page;
use \Project\Model\User;
use \Project\FileManagement;


$app = new Slim();

$app->config('debug', true);


$app->get('/', function() {

   header('Location: /users');
   exit;

});


$app->get('/users' , function() {

    //Pagina Atual
    $currentPage = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $search = (isset($_GET['search'])) ? $_GET['search'] : "";

    if ($search != '') {

        $pagination = User::getPaginationSearch($search, $currentPage);

    } else {

        $pagination = User::getPagination($currentPage);

    }

    $pages = [];

    for ($x = 0; $x < $pagination['pages']; $x++) {

        array_push($pages, [
            'url' => '/users?' . http_build_query([
                'page' => $x + 1,
                'search' => $search
                
            ]),
            'item' => $x + 1
        ]);

    }

    $page = new Page();

    $page->setTpl('users', [
        'users'     => $pagination['data'],
        'search'    => $search,
        'pages'     => $pages,
        'page'      => $currentPage,
        'totalPages'=> $pagination['pages']
    ]);

});

$app->get('/users/create', function() {

    $page = new Page();

    $page->setTpl('create');

});

$app->post('/users/create', function() {

    $user = new User();

    if(isset($_POST) && $_POST !== '') {

        $user->setData($_POST);

        $user->save();

        header('Location: /users');
        exit;
    }
});

$app->get('/users/:iduser', function($iduser) {

    $user = new User();

    $user->get((int)$iduser);

    $page = new Page();

    $page->setTpl('details', [
        'user' => $user->getValues()
    ]);

});

$app->get('/users/:iduser/update', function($iduser) {

    $page = new Page();

    $user = new User();

    $user->get($iduser);

    $page->setTpl('update', [
        'user' => $user->getValues()
    ]);

});

$app->post('/users/:iduser/update' ,function($iduser) {

    if (!isset($_POST) || $_POST === '') {

        throw new \Exception('Nenhuma informação foi passada no formulario');

    }

    $user = new User();

    $user->get($iduser);

    $user->setData($_POST);

    $user->update();

    header('Location: /users');
    exit;

});

$app->get('/users/:iduser/update_photo', function($iduser) {

    $page = new Page();

    $user = new User();

    $user->get((int)$iduser);

    $page->setTpl('upload-photo', [
        'user'  =>  $user->getValues()
    ]);

});

$app->post('/users/:iduser/update_photo', function($iduser) {

    $user = new User();

    $user->get((int)$iduser);

    $file = (isset($_FILES['user_photo']) ? $_FILES['user_photo'] : null);

    if ($file) {

        $upload = FileManagement::uploadPhoto($file, $user->getiduser(), 'user_profile_');

        if ($upload) {

            $user->setavatar_url($upload['url']);

            $user->update();

        } else {
            echo 'Erro no upload'; exit;
        }

    }

    header('Location: /users/'. $user->getiduser(). '/update' );
    exit;

});


$app->get('/users/:iduser/delete', function($iduser) {

    $user = new User();

    $user->get($iduser);

    $user->delete();

    header('Location: /users');
    exit;

});

// ================= login e autenticação ===========

$app->get('/login', function() {

    $page = new Page([
        'header' => false,
        'footer' => false
    ]);

    $page->setTpl('login');

});

$app->post('/login', function() {

    //Processa o login, verifica se foi uma senha valida e faz o redirect

});

$app->run();

?>