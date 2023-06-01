<?php

require_once('database_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM products where id=$id;";
    $conn->exec($query);
    header('location:index.php');
}