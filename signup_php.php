<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host,$user,$pass,$db);
$us_n = $_POST["user"];
$email = $_POST["email"];
$passwd = $_POST["password"];
$cnf_pass = $_POST["cnf_pass"];
$sql = "select * from user_data where email=\"" . $email . "\" and pass=\"" . $passwd . "\"";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $msg = "User Already Registered.";
    echo "<script>alert('$msg');</script>";
    echo("Please Login.Redirecting in 3 sec");
    header("refresh:3; url=login_new.html");
}
else {
    $sql = "select * from user_data";
    $result = mysqli_query($conn, $sql);
    $id = mysqli_num_rows($result) + 1;
    $sql = "insert into user_data values (" . $id . "," . "\"" . $email . "\"" . "," . "\"" . $passwd . "\"" . "," . "\"" . $us_n . "\"" . ",\"Not Active\")";
    mysqli_query($conn, $sql);
    header("Location: redirect.html");
}
mysqli_close($conn);
?>