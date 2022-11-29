<?php
session_start();
$con = new mysqli('localhost', 'root', '', 'sunnyvale') or die(mysqli_error($con));
$result = $con->query("SELECT * FROM user WHERE user_id = '" . $_SESSION['user_id'] . "'");
$row = $result->fetch_assoc();
$sql1 = "INSERT INTO audit_trail(user, action, datetime) VALUES ('" . $row['full_name'] . "','logged out', NOW())";
mysqli_query($con, $sql1);
session_destroy();
header("Location:./index.php");
