<?php

date_default_timezone_get('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.uft-8', 'portuguese');

define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models')); // constantes das pastas do projeto

require_once(realpath(dirname(__FILE__) . '/database.php')); // será usado por todo o projeto