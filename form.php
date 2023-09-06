<?php
session_start();

$fruitSess =  $_SESSION['fruits'];

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
    <title>Fruit Manager</title>

    <style>
        body {
            padding-top: 70px;
            padding-bottom: 70px;
        }

    </style>

</head>
<body>
<div class="container">
    <div class="row">
        <!-- Select Fruits Card -->
        <div class="col-sm-4">
            <div class="card w-100">
                <div class="card-body">
                    <h3 class="card-title">Select Fruits</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <label for="selFruits">Select Fruits here</label>
                        <select name="selFruits" id="selFruits" class="form-control">
                            <option value=""></option>
                            <?php
                            foreach ($fruitSess as $fruit) {
                                echo "<option value='$fruit'>$fruit</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Select" class="btn btn-success">

                        <hr>
                        <?php
                        if (isset($_POST['selFruits'])) {
                            $fruit = $_POST['selFruits'];
                            if ($fruit <> "") {
                                echo "You have selected {$fruit}";
                                unset($_SESSION['errorSel']);
                            } else {
                                echo $_SESSION['errorSel'] = "Please select a fruit.";
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>

<!-- Add Fruits Card -->
        <div class="col-sm-4">
            <div class="card w-100">
                <div class="card-body">
                    <h3 class="card-title">Add Fruits</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <label for="addFruit">Add a fruit</label>
                        <input type="text" name="addFruit" id="addFruit" class="form-control">
                        <br>
                        <input type="submit" value="Add" class="btn btn-primary">
                        <hr>
                        <?php
                        if (isset($_POST['addFruit'])) {
                            $newFruit = $_POST['addFruit'];
                            if ($newFruit <> "") {
                                echo "You have added {$newFruit}";
                                array_push($fruitSess, $newFruit);
                                $_SESSION['fruits'] = $fruitSess;
                                header('Location: form.php');
                                unset($_SESSION['errorAdd']);
                            } else {
                                echo $_SESSION['errorAdd'] = "Please enter a fruit to add.";
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>

<!--Delete Fruits-->
        <div class="col-sm-4">
            <div class="card w-100">
                <div class="card-body">
                    <h3 class="card-title">Delete Fruits</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <label for="delFruits">Select a fruit to delete</label>
                        <select name="delFruits" id="delFruits" class="form-control">
                            <option value=""></option>
                            <?php
                            foreach ($fruitSess as $fruit) {
                                echo "<option value='$fruit'>$fruit</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Delete" class="btn btn-danger">

                        <hr>
                        <?php
                        if (isset($_POST['delFruits'])) {
                            $fruit = $_POST['delFruits'];
                            if ($fruit <> "") {
                                echo "You have selected {$fruit}";
                                if (($key = array_search($fruit, $fruitSess)) !== false) {
                                    unset($fruitSess[$key]);
                                    $_SESSION['fruits'] = $fruitSess;

                                }
                                unset($_SESSION['errorDel']);
                                header('Location: form.php');
                            } else {
                                echo $_SESSION['errorDel'] = "Please select a fruit to delete.";
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
