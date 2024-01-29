<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    // Get the ID from the URL
    $id = $_GET['id'];

    // SQL delete query
    $sql = "DELETE FROM `user` WHERE `id`='$id'";

    if ($conn->query($sql) === true) {
        // Redirect to index.php after successful deletion
        header('Location: index.php');
        exit(); // Make sure to exit after redirection
    } else {
        echo 'Error deleting record: ' . $conn->error;
    }
}

?>
