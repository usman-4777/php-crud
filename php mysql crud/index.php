<?php
    session_start();
    require_once('database_connection.php');
    $query = "SELECT * FROM products;";
    $table = $conn->query($query)->fetchAll();
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

        <div>
            <a href="form.php" class="btn btn-primary">Add Record</a>
        </div>

        <?php if(isset($_SESSION['massage'])) {?>
            <div class="alert alert-success alert-dismissible">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             <strong>Success!</strong>
            <?php
                $massage_show = $_SESSION['massage'];
                unset($_SESSION['massage']);
                echo "$massage_show";
            ?>
            </div>

        <?php }?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($table as $data) {?>
                <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['address'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>

</html>