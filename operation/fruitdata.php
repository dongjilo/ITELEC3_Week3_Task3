<?php

session_start();
$fruits = array("Mango", "Coconut", "Apple", "Orange");
$_SESSION['fruits'] = $fruits;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fruit Data</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 70px;
            background-color: #eee;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="col-sm-4">
        <div class="card p-3">
            <div class="card-body">
                <h3 class="card-title">Available Fruits:</h3>
                <ul>
                    <?php
                    foreach ($_SESSION['fruits'] as $fruit) {
                        echo "<li>{$fruit}</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
