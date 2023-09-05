<?php

session_start();
$fruits = array("Mango", "Coconut", "Apple", "Orange");
$_SESSION['fruits'] = $fruits;

echo "List of fruits: <br>";
foreach ($_SESSION['fruits'] as $fruit) {
    echo "{$fruit} <br>";
}

$_SESSION ['errorSel']  = "Please select a fruit";
$_SESSION['errorAdd']  = "Please add a fruit";

?>
