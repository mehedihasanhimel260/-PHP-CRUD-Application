<?php
include 'config.php';

// Assuming config.php establishes a database connection

$sql = 'SELECT `id`, `name`, `email`, `phone` FROM `user` WHERE 1';
$result = $conn->query($sql);

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL update query
    $sql = "UPDATE `user` SET `name`='$name', `email`='$email', `phone`='$phone' WHERE `id`='$id'";

    if ($conn->query($sql) === true) {
        header('Location: index.php');
    } else {
        echo 'Error updating record: ' . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD Application - Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                PHP CRUD Application - Edit
            </div>
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name"
                            value="<?php echo $row['name']; ?>" aria-describedby="NameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            value="<?php echo $row['email']; ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputNumber" class="form-label">Phone</label>
                        <input type="number" class="form-control" id="exampleInputNumber" name="phone"
                            value="<?php echo $row['phone']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
