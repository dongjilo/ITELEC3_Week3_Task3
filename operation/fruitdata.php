<?php

session_start();
$fruits = array("Mango", "Coconut", "Apple", "Orange");
$_SESSION['fruits'] = $fruits;

foreach ($_SESSION['fruits'] as $fruit) {
    echo $fruit;
}

$_SESSION ['errorSel'];
$_SESSION['errorAdd'];

?>
