<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "acclook";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn)
    {
       // echo "<script> alert('Database Connected Successfully......')</script>";
    }
    else
    {
        die("connection failed because".mysqli_connect_errno());
    }

?>
