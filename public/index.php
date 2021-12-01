<!-- <h1>HEHE BOI :)2</h1> -->

<?php
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);
require_once(dirname(__FILE__, 2) . '/src/config/config.php');
// require_once(CONTROLLER_PATH . '/login.php');
// require_once(CONTROLLER_PATH . '/day_records.php');
// loadView('login', ['piece' => 'roger']);

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) // o request do uri pega os parametros passados na url tb, e com parse_url pegamos apenas a url
);

if($uri === '/' || $uri === '' || $uri === '/index.php'){
    $uri = '/day_records.php';
}

require_once(CONTROLLER_PATH . "/{$uri}");



























// require_once(VIEW_PATH . '/login.php');
// require_once(MODEL_PATH . '/Login.php');

// $login = New Login([
//     'email' => 'admin@cod3r.com.br',
//     'password' => 'a'
// ]);

// try{
//     $login->checkLogin();
//     echo 'Tudo certo!';
// }
// catch(Exception $e){
//     echo 'Problema...';
// }







































// require_once(dirname(__FILE__, 2) . '/src/models/User.php');


// exemplo de implmementação abaixo
// $usuario = new User(['name' => 'Lucas', 'email' => 'lucas@cod3r.com.br']); // User Object ( [values:protected] => Array ( [name] => Lucas [email] => lucas@cod3r.com.br ) )
// print_r($usuario); // User Object ( [values:protected] => Array ( [name] => Lucas [email] => lucas@cod3r.com.br ) )

// // usando os métodos mágicos de get e set, eles agora não precisam de um função própria, usando a reação do php
// $usuario->email = 'novoemaildelucas.com';
// echo '<br>';
// print_r($usuario); // User Object ( [values:protected] => Array ( [name] => Lucas [email] => novoemaildelucas.com ) )
// echo '<br>' . $usuario->email; // novoemaildelucas.com

// echo '<br>Fim';

// echo $usuario->getSelect(['name' => 'Chaves', 'email' => 'chaves@cod3r.com.br'], 'id, name');
// echo '<br>';
// echo User::getSelect(['name' => 'gui', 'email' => 'gui@email.com'], 'id, name');

// print_r(User::get(['name' => 'Chaves', 'email' => 'chaves@cod3r.com.br'], 'name, email'));

// echo '<br>fim';



// $sql = "SELECT * FROM users";
// $result = Database::getResultFromQuery($sql);

// while($row = $result->fetch_assoc()){
//     print_r($row);
//     echo '<br>';
// }

