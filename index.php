<?php
include 'config.php';

$sql = 'SELECT * FROM user';
$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <div class="row">

                    <div class="col justify-content-start">
                        PHP CRUD Application
                    </div>
                    <div class="col  justify-content-end">
                        <a href="create.php" class='btn btn-outline-primary'>create</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // Loop through each row of data
                                while ($row = $result->fetch_assoc()) {
                                    // Output data into table rows
                                    echo '<tr>';
                                    echo "<th scope='row'>" . $row['id'] . '</th>'; // Assuming 'id' is the primary key
                                    echo '<td>' . $row['name'] . '</td>';
                                    echo '<td>' . $row['email'] . '</td>';
                                    echo '<td>' . $row['phone'] . '</td>';
                                    echo '<td>';
                                    echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-outline-warning'>Edit</a> ";
                                    echo " <a href='delete.php?id=" . $row['id'] . "' class='btn btn-outline-danger'>Delete</a>";
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo "<tr><td colspan='5'>No records found</td></tr>";
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
