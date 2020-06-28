<?php

require 'core/init.php';

$id = $_GET['id'] ?? '';

if(! $id) {
    header('location: index.php');
    die();
}
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if(! $user) {
    header('location: index.php');
    die();
}

?>
<?php include 'layouts/header.php'?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">User's Info</div>
                <div class="card-body">
                    <p><b>Name:</b> <?php echo $user['name']; ?></p>
                    <p><b>Age:</b> <?php echo $user['age']; ?></p>
                    <p><b>Address:</b> <?php echo $user['address']; ?></p>
                </div>
                <div class="card-footer">
                    <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="delete.php?id=<?php echo $user['id']; ?>" id="delete-user" class="btn btn-danger btn-sm">Del</a>
                    <a href="index.php" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'layouts/footer.php'?>
