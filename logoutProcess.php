<?php
session_start();
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$sqlAudit = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $_SESSION['full_name'] . "','Logged out', NOW())";
    mysqli_query($con, $sqlAudit);
session_destroy();
header("Location:./index.php");
