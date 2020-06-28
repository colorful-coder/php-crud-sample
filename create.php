<?php

require 'core/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $address = $_POST['address'] ?? '';
    $errors = [];

    if (! $name) {
        $errors[] = 'The name is required.';
    }

    if (! $age) {
        $errors[] = 'The age is required.';
    }

    if (! is_numeric($age)) {
        $errors[] = 'The age must be number.';
    }

    if (! $address) {
        $errors[] = 'The address is required.';
    }

    if (count($errors) === 0) {
        $sql = "INSERT INTO users (name, age, address) VALUES ('$name', '$age', '$address')";

        $result = mysqli_query($conn, $sql);

        if (! $result) {
            die('Error: ' . mysqli_error($conn));
        }

        $_SESSION['message'] = 'A user was created.';

        redirect('index.php');
    }
}

?>

<?php include 'layouts/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php include 'layouts/alert.php'; ?>
            <div class="card">
                <div class="card-header h4">
                    Create User
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="<?php echo $name ?? '' ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" value="<?php echo $age ?? '' ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control">
                                <?php echo $address ?? ''; ?>
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="index.php" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
  
        </div>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>