<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host,$user,$pass,$db);
$email = $_POST["email"];
$passwd = $_POST["password"];
$sql = "select * from user_data where email=\"" . $email . "\" and pass=\"" . $passwd . "\"";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $sql = "update user_data set status=\"active\" where email=\"" . $email . "\"";
    mysqli_query($conn, $sql);
    $sql = "update user_data set status=\"Not Active\" where email!=\"" . $email . "\"";
    mysqli_query($conn, $sql);
    header("Location: navigation_php.php");
}
else {
    $msg = "Invalid username or password";
    echo "<script>alert('$msg');</script>";
    echo("Redirecting in 3 sec");
    header("refresh:3; url=login_new.html");
}
mysqli_close($conn);
?>