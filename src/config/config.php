<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.uft-8', 'portuguese');

define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models')); // constantes das pastas do projeto
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));

require_once(realpath(dirname(__FILE__) . '/database.php')); // será usado por todo o projeto