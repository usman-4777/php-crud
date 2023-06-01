<?php

session_start();
require_once('database_connection.php');

if (isset($_POST['ADD'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    if ($_POST['name'] != '' && $_POST['email'] != '' && $_POST['address'] != '') {
        $query = "INSERT INTO products (name, email, address)VALUES('$name', '$email', '$address');";
        $conn->exec($query);
        $_SESSION['massage'] = "Record add successfully";
        header('location:index.php');
    } else {
        $_SESSION['massage'] = "please fill the feild";
        header('location:index.php');
    }
}