<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection here
    $con = new mysqli("localhost","root","","test");
    if($con->connect_error) {
        die("Failed to connect : ".$con->connect_error);
    } else {
        $stmt = $con->prepare("select * from registration where email = ?");
        $stmt->bind_param("s");
    }
?>