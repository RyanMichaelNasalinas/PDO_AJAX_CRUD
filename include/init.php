<?php 

include './class/Database.php';

function autoloadClass($classname) {
    include './class/'. $classname .'.php';
}

spl_autoload_register('autoloadClass');

global $pdo;

$user = new User($pdo);



?>