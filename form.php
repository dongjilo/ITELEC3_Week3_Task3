<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src=""></script>
    <title>Document</title>
</head>
<body>
<div class="container col-sm-4">
    <h3>Select Fruits</h3>
    <form action="<?php $_PHP_SELF?>" method="post">
        <label for="selFruits">Select Fruits here</label>
        <select name="selFruits" id="selFruits" class="form-control">
            <option value=""></option>
            <?php
                $fruitSess =  $_SESSION['fruits'];
                foreach ($fruitSess as $fruit) {
                    echo "<option value='$fruit'>$fruit</option>";
                }
            ?>
            <input type="submit" value="Select" class="btn btn-success">
            <?php
                if (isset($_POST['selFruits'])) {
                    $fruit = $_POST['selFruits'];
                    if ($fruit<>"") {
                        echo "You have selected {$fruit}";
                        unset($_SESSION['errorSel']);
                    }else {
                        echo $_SESSION['errorSel'] = "Please select a fruit";
                    }
                }
            ?>
        </select>
    </form>
</div>
<br>
<div class="container col-sm-4">
    <h3>Add Fruits</h3>
    <form action="<?php $_PHP_SELF ?>" method="post">
        <label for="addFruit">Add a fruit</label>
        <input type="text" name="addFruit" id="addFruit" class="form-control">
        <input type="submit" value="Add" class="btn btn-primary">

        <?php
            if (isset($_POST['addFruit'])) {
                $newFruit = $_POST['addFruit'];
                if ($newFruit<>"") {
                    echo "You have added {$newFruit}";
                    array_push($fruitSess, $newFruit);
                    $_SESSION['fruits'] = $fruitSess;
                    header('Location: form.php');
                    unset($_SESSION['errorAdd']);
                }else {
                    echo $_SESSION['errorAdd'] = "Please add a fruit";
                }
            }
        ?>
    </form>
</div>
</body>
</html>
