<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host,$user,$pass,$db);
$sql = "select user_name from user_data where status=\"active\"";
$result = mysqli_query($conn, $sql);
$un = mysqli_fetch_assoc($result)["user_name"];
?>
<html>
    <head>
        <title>Welcome</title>
<style>
body {
    background-image: url('bkgr.jpg');
    background-size: 100%;
}
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
#hello {
    padding-left: 850pt;
    font-weight: bold;
}
#logout {
    position: absolute;
    top: 28px;
    left: 1070pt;
    background-image: url("logout3.jpg");
    height: 30pt;
    width: 30pt;
    background-size: 100%;
    z-index: 2;
}
#quick {
    padding-left: 10pt;
    font-weight: bold;
    font-size: 30pt;
}
#C {
    width: 80pt;
    height: 50pt;
    border-style: solid;
    margin-top: 10pt;
    margin-left: 50pt;
    border-width: 0.5pt;
    border-color: black;
    border-radius: 5pt;
    font-size: 12pt;
    font-weight: bold;
    background-color: lightgreen;
}
#cpp,#java,#python {
    width: 80pt;
    height: 50pt;
    border-style: solid;
    margin-top: 10pt;
    margin-left: 20pt;
    border-width: 0.5pt;
    border-color: black;
    border-radius: 5pt;
    font-size: 12pt;
    font-weight: bold;
    background-color: lightgreen;
}
#C:hover,#cpp:hover,#java:hover,#python:hover {
    background-color: teal;
    border-width: 2pt;
}
#nav {
    position:absolute;
    top:70pt;
    height:20pt;
    width:100%;
    background-color:lightgreen;
    border-style:solid;
    border-width:0.5pt;
    border-radius:50pt;
}
#hm {
    position:absolute;
    top:2pt;
    left:20pt;
    z-index:2;
}
#lb {
    position:absolute;
    top:2pt;
    left:80pt;
    z-index:2;
}
</style>
<script>
function c()
{
    document.location.href = "ques_c.php";
}
function cpp()
{
    document.location.href = "ques_cpp.php";
}
function java()
{
    document.location.href = "ques_java.php";
}
function py()
{
    document.location.href = "ques_py.php";
}
</script>
    </head>
    <body>
        <form action="logout.php" method="POST">
        <div id="top">
            <label id="title">PrepView</label>
            <label id="hello">Hello,<?php echo($un) ?></label>
            <button id="logout" type="submit"></button>
        </div>
        <div id="nav">
            <a href="navigation_php.php" id="hm">HOME</a>
            <a href="leaderboard.php" id="lb">LEADERBOARD</a>
        </div>
        </form>
        <div id="quick">
            <br>
            <label id="qa">Quick Access</label>
            <br><br>
            <button id="C" type="submit" onclick="c()">C</button>
            <button id="cpp" type="submit" onclick="cpp()">C++</button>
            <button id="java" type="submit" onclick="java()">Java</button>
            <button id="python" type="submit" onclick="py()">Python</button>
        </div>
    </body>
</html>