<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>In 'n Out</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/comum.css">
        <link rel="stylesheet" href="assets/css/icofont.min.css">
        <link rel="stylesheet" href="assets/css/template.css">
    </head>
<body class="hide-sidebar">
    <header class='header'>
        <div class="logo">
            <i class="icofont-travelling mr-2"></i>
            <span class="font-weight-light">In</span>
            <span class="font-weight-bold mx-1">'n</span>
            <span class="font-weight-light">Out</span>
            <i class="icofont-runner-alt-1 ml-2"></i>
        </div>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <img class="avatar" src="<?= 'https://www.gravatar.com/avatar.php?gravatar_id=' . md5((strtolower(trim($_SESSION['user']->email)))) ?>" alt="">
                <span class="ml-1"> <?= $_SESSION['user']->name ?></span>
                <i class='icofont-simple-down mx-2'></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout mr-2">
                                Sair
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>