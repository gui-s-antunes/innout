<?php

loadModel('Login');

if(count($_POST) > 0){
    $login = new Login($_POST);
    try{
        $user = $login->checkLogin();
        echo "Usuário {$user->name} ok!";
    }
    catch(Exception $e){
        echo 'Login falhou :c';
    }
}

loadView('login', $_POST);