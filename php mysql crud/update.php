<?php

session_start();
require_once('database_connection.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    if ($name != '' && $email != '' && $address != '') {
        $query = "UPDATE products SET name='$name', email='$email', address='$address' where id='$id';";
        $conn->exec($query);
        $_SESSION['massage'] = "Record added successfully";
        header('location:index.php');
    } else {
        $_SESSION['massage'] = "Please fill all the fieilds";
        header('loacation:edit.php');
    }
}