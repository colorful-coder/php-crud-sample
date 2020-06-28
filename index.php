<?php 

require 'core/init.php';

$search = $_GET['name'] ?? '';

if($search) {
    $sql = "SELECT * FROM users WHERE name like'%$search%'";
} else {
    $sql = 'SELECT * FROM users';
}

$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<?php include 'layouts/header.php'?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <a href="create.php" class="btn btn-primary">
                Create
            </a>
        </div>
        <div class="col-md-4">
            <form>
                <div class="input-group mb-3">
                    <input type="text" name="name" value="<?php echo $search ?? '' ?>"
                     class="form-control" placeholder="Search by name...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php include 'layouts/alert.php'; ?>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>NAME</td>
                        <td>AGE</td>
                        <td>ADDRESS</td>
                        <td>DATE</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['age']; ?></td>
                        <td><?php echo $user['address']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($user['date'])); ?></td>
                        <td>
                            <a href="show.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $user['id']; ?>" id="delete-user" class="btn btn-danger btn-sm">Del</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'layouts/footer.php'?>
