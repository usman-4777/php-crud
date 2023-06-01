<?php
session_start();$_GET['id'];
require_once('database_connection.php');
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id=$id;";
$arr = $conn->query($query)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">

        <?php session_start(); if(isset($_SESSION['massage'])) {?>
            <div class="alert alert-success alert-dismissible">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             <strong>Success!</strong>
            </div>
            <?php
            $massage_show = $_SESSION['massage'];
            unset($_SESSION['massage']);
            echo $massage_show;
            ?>
        <?php }?>

        <form action="update.php" method="POST">
            <!-- hidden input -->
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

            <div class="form-group mb-4">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="<?= $arr[0]['name'] ?>">
            </div>
            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input name="email" type="text" class="form-control" id="email" value="<?= $arr[0]['email'] ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input name="address" type="text" class="form-control" id="address" value="<?= $arr[0]['address'] ?>">
            </div>
            <br/>
            <button name="update" type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</body>

</html>