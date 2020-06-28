<?php

require 'core/init.php';

$id = $_GET['id'] ?? '';

if (! $id) {
    redirect('index.php');
}

$sql = "DELETE FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if(! $result) {
    die("Error: " . mysqli_error($conn));
}

$_SESSION['message'] = 'A user was deleted.';

redirect('index.php');
