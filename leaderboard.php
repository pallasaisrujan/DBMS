<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host,$user,$pass,$db);
$sql = "select * from scores natural join user_data natural join courses order by score DESC";
$result = mysqli_query($conn,$sql);
$n = mysqli_num_rows($result);
$i = 0;
$row = array();
for ($i=0;$i<$n;$i++) {
    array_push($row,mysqli_fetch_assoc($result));
}
$i=0;
$temp = array();
for ($i=0;$i<$n;$i++) {
    array_push($temp,array($i+1,$row[$i]["user_name"],$row[$i]["c_name"],$row[$i]["score"]));
}
?>
<html>
    <head>
        <title>LeaderBoard</title>
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
#board {
    height:20pt;
    width:28%;
    background-color:lightgreen;
    border-style:solid;
    border-width:0.5pt;
    border-radius:50pt;
}
#heading {
    position:absolute;
    top:117pt;
    left:150pt;
    font-size:13pt;
    z-index:3;
}
#board2 {
    position:absolute;
    top:140pt;
    width:28%;
    height:100%;
    background-color: lightgreen;
    border-style: double;
    border-radius: 2pt;
}
#board,#board2 {
    margin-left:150pt;
}
#content {
    position:absolute;
    left:20pt;
    font-size:15pt;
    width:28%;
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
        </div>
        <br>
        <div id="board">
            <table id="heading" style="width:28%">
            <tr>
                <th>Position</th>
                <th>User Name</th>
                <th>Course</th>
                <th>Score</th>
            </tr>
            </table>
        </div>
        <div id="board2">
            <table id="content" style="width:85%">
            <?php
                $i = 0;
                $j = 0;
                for ($i=0;$i<$n;$i++) {
                    echo '<tr>';
                    for ($j=0;$j<4;$j++) {
                        echo '<td>';
                        echo($temp[$i][$j]);
                        if ($j==0 || $j==2) {
                            echo '&emsp;';
                            echo '&emsp;';
                        }
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            ?>
            </table>
        </div>
    </body>
</html>