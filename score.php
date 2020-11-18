<?php
session_start();
$i = 0;
$k = 0;
$row = array();
$a = array();
for ($i=0;$i<5;$i++) {
    $k = $i + 1;
    array_push($row,$_SESSION['r' . $k]);
    array_push($a,$_SESSION['a' . $k]);
}
$count = 0;
$total = 5;
$i = 0;
$k = 0;
for ($i=0;$i<5;$i++) {
    $k = $i + 1;
    if($_POST['a' . $k]==$row[$i]["answer"]) {
        $count = $count + 1;
    }
}
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host,$user,$pass,$db);
$sql = "select * from scores";
$result = mysqli_query($conn, $sql);
$id = mysqli_num_rows($result) + 1;
$sql = "select * from user_data where status=\"active\"";
$result = mysqli_query($conn, $sql);
$us_id = mysqli_fetch_assoc($result)["uid"];
$c_id = $_SESSION['c_id'];
$sql = "insert into scores values (\"" . $id . "\"," . "\"" . $us_id . "\"" . "," . "\"" . $c_id . "\"" . "," . "\"" . $count . "\"" . ")";
mysqli_query($conn, $sql);
?>
<html>
    <head>
        <title>Your Result</title>
        <style>
            #top {
    height: 55pt;
    width: 100%;
    background-color: lightgreen;
    border-style: double;
    border-radius: 2pt;
}
#title {
    padding-left: 10pt;
    line-height: 50pt;
    font-weight: bold;
    font-size: 20pt;
}
#nav {
    height:20pt;
    width:100%;
    background-color:lightgreen;
    border-style:solid;
    border-width:0.5pt;
    border-radius:50pt;
}
#hm {
    position:absolute;
    top:82pt;
    left:30pt;
    z-index:2;
}
body {
    background-image: url('bkgr.jpg');
    background-size: 100%;
}
#score {
    padding-left:100pt;
    padding-top:20pt;
    font-size:25pt;
    font-weight:bold;
}
#lb {
    position:absolute;
    top:82pt;
    left:80pt;
    z-index:2;
}
        </style>
    </head>
    <body>
    <div id="top">
            <label id="title">PrepView</label>
        </div>
        <br>
        <div id="nav">
            <a href="navigation_php.php" id="hm">HOME</a>
            <a href="leaderboard.php" id="lb">LEADERBOARD</a>
        </div>
        <p id="score">Your Score is : <?php echo($count . "/" . $total); ?></p>
    </body>
</html>