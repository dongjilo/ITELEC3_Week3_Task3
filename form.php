<?php
session_start();

$fruitSess =  $_SESSION['fruits'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fruit Manager</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            padding-top: 70px;
            padding-bottom: 70px;
            background-color: #eee;
        }

        .card {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="card-title">Manage Fruits</h3>
                    <form action="<?php $_PHP_SELF ?>" method="post">
                        <div class="form-floating my-2">
                            <select name="selFruits" id="selFruits" class="form-select">
                                <option value=""></option>
                                <?php
                                foreach ($fruitSess as $fruit) {
                                    echo "<option value='$fruit'>$fruit</option>";
                                }
                                ?>
                            </select>
                            <label for="selFruits">Select a fruit</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" name="addFruit" id="addFruit" class="form-control" placeholder="Add">
                            <label for="addFruit">Add a fruit</label>
                        </div>
                        <div class="form-floating my-2">
                            <select name="delFruits" id="delFruits" class="form-select">
                                <option value=""></option>
                                <?php
                                foreach ($fruitSess as $fruit) {
                                    echo "<option value='$fruit'>$fruit</option>";
                                }
                                ?>
                            </select>
                            <label for="delFruits">Delete a fruit</label>
                        </div>
                        <div class="form-group my-3">
                            <button type="submit" name="selectFruit" class="btn btn-success">Select</button>
                            <button type="submit" name="addFruitBtn" class="btn btn-primary">Add</button>
                            <button type="submit" name="deleteFruit" class="btn btn-danger">Delete</button>
                        </div>

                        <?php
                        if (isset($_POST['selectFruit'])) {
                            $fruit = $_POST['selFruits'];
                            if ($fruit <> "") {
                                echo '<div class="alert alert-success fade show" role="alert">
                                      You have selected ' . $fruit .'
                                      </div>';
                                unset($_SESSION['errorSel']);
                            } else {
                                echo $_SESSION['errorSel'] = '<div class="alert alert-danger fade show" role="alert">
                                      Please select a fruit.
                                      </div>';
                            }
                        }

                        if (isset($_SESSION['addMsg'])) {
                            echo '<div class="alert alert-warning fade show" role="alert">
                                  ' . $_SESSION['addMsg'] . '
                                  </div>';
                            unset($_SESSION['addMsg']);
                        }
                        if (isset($_SESSION['delMsg'])) {
                            echo '<div class="alert alert-danger fade show" role="alert">
                                  ' . $_SESSION['delMsg'] . '
                                  </div>';
                            unset($_SESSION['delMsg']);
                        }

                        if (isset($_POST['addFruitBtn'])) {
                            $newFruit = $_POST['addFruit'];
                            if ($newFruit <> "") {
                                $_SESSION['addMsg'] = "You have added {$newFruit}";
                                array_push($fruitSess, $newFruit);
                                $_SESSION['fruits'] = $fruitSess;
                                header('Location: form.php');
                                unset($_SESSION['errorAdd']);
                            } else {
                                echo $_SESSION['errorAdd'] = '<div class="alert alert-danger fade show" role="alert">
                                      Please enter a fruit to add.
                                      </div>';
                            }
                        }
                        if (isset($_POST['deleteFruit'])) {
                            $fruit = $_POST['delFruits'];
                            if ($fruit <> "") {
                                $_SESSION['delMsg'] = "You have deleted {$fruit}";
                                if (($key = array_search($fruit, $fruitSess)) !== false) {
                                    unset($fruitSess[$key]);
                                    $_SESSION['fruits'] = $fruitSess;

                                }
                                unset($_SESSION['errorDel']);
                                header('Location: form.php');
                            } else {
                                echo $_SESSION['errorDel'] = '<div class="alert alert-danger fade show" role="alert">
                                      Please select a fruit to delete.
                                      </div>';
                            }
                        }

                        ?>
                        <hr>
                        <h3 class="card-title">Available Fruits:</h3>
                        <ul>
                            <?php
                            foreach ($_SESSION['fruits'] as $fruit) {
                                echo "<li>{$fruit}</li>";
                            }
                            ?>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
