<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host,$user,$pass,$db);
$sql = "update user_data set status=\"Not Active\"";
mysqli_query($conn, $sql);
header("Location: login_new.html");
mysqli_close($conn);
?>