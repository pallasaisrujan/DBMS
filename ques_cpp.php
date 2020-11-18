<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host,$user,$pass,$db);
$sql = "select * from ques_data where c_no=2 order by rand() limit 5";
$result = mysqli_query($conn,$sql);
$i = 0;
$j = 0;
$k = 0;
$row = array();
$que = array();
$opt = array();
for ($i=0;$i<5;$i++) {
    array_push($row,mysqli_fetch_assoc($result));
    array_push($que,$row[$i]["question"]);
}
$i = 0;
for ($i=0;$i<5;$i++) {
    $temp = array();
    for ($j=0;$j<3;$j++) {
        $k = $j + 1;
        array_push($temp,$row[$i]["option" . $k]);
    }
    array_push($temp,$row[$i]["answer"]);
    array_push($opt,$temp);
    shuffle($opt[$i]);
}
?>
<html>
    <head>
        <title>C++ Preperation Kit</title>
        <style>
form {
    margin-left:50pt;
    font-size:15pt;
}
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
        <form action="score.php" method="post">
        <br>
        <label id="q1">1.<?php echo($que[0]); ?></label>
        <br>
        <br>
        <input type="radio" name="a1" value="<?= $opt[0][0]; ?>"><?php echo($opt[0][0]); ?></input>
        <br>
        <input type="radio" name="a1" value="<?= $opt[0][1]; ?>"><?php echo($opt[0][1]); ?></input>
        <br>
        <input type="radio" name="a1" value="<?= $opt[0][2]; ?>"><?php echo($opt[0][2]); ?></input>
        <br>
        <input type="radio" name="a1" value="<?= $opt[0][3]; ?>"><?php echo($opt[0][3]); ?></input>
        <br><br>
        <label id="q2">2.<?php echo($que[1]); ?></label>
        <br>
        <br>
        <input type="radio" name="a2" value="<?= $opt[1][0]; ?>"><?php echo($opt[1][0]); ?></input>
        <br>
        <input type="radio" name="a2" value="<?= $opt[1][1]; ?>"><?php echo($opt[1][1]); ?></input>
        <br>
        <input type="radio" name="a2" value="<?= $opt[1][2]; ?>"><?php echo($opt[1][2]); ?></input>
        <br>
        <input type="radio" name="a2" value="<?= $opt[1][3]; ?>"><?php echo($opt[1][3]); ?></input>
        <br>
        <br>
        <label id="q3">3.<?php echo($que[2]); ?></label>
        <br>
        <br>
        <input type="radio" name="a3" value="<?= $opt[2][0]; ?>"><?php echo($opt[2][0]); ?></input>
        <br>
        <input type="radio" name="a3" value="<?= $opt[2][1]; ?>"><?php echo($opt[2][1]); ?></input>
        <br>
        <input type="radio" name="a3" value="<?= $opt[2][2]; ?>"><?php echo($opt[2][2]); ?></input>
        <br>
        <input type="radio" name="a3" value="<?= $opt[2][3]; ?>"><?php echo($opt[2][3]); ?></input>
        <br><br>
        <label id="q4">4.<?php echo($que[3]); ?></label>
        <br>
        <br>
        <input type="radio" name="a4" value="<?= $opt[3][0]; ?>"><?php echo($opt[3][0]); ?></input>
        <br>
        <input type="radio" name="a4" value="<?= $opt[3][1]; ?>"><?php echo($opt[3][1]); ?></input>
        <br>
        <input type="radio" name="a4" value="<?= $opt[3][2]; ?>"><?php echo($opt[3][2]); ?></input>
        <br>
        <input type="radio" name="a4" value="<?= $opt[3][3]; ?>"><?php echo($opt[3][3]); ?></input>
        <br><br>
        <label id="q1">5.<?php echo($que[4]); ?></label>
        <br>
        <br>
        <input type="radio" name="a5" value="<?= $opt[4][0]; ?>"><?php echo($opt[4][0]); ?></input>
        <br>
        <input type="radio" name="a5" value="<?= $opt[4][1]; ?>"><?php echo($opt[4][1]); ?></input>
        <br>
        <input type="radio" name="a5" value="<?= $opt[4][2]; ?>"><?php echo($opt[4][2]); ?></input>
        <br>
        <input type="radio" name="a5" value="<?= $opt[4][3]; ?>"><?php echo($opt[4][3]); ?></input>
        <br><br>
        <button type="submit" id="sub" onclick="<?php $i=0;$k=0;for ($i=0;$i<5;$i++){$k = $i + 1;$_SESSION['r' . $k] = $row[$i];$_SESSION['a' . $k] = $_POST['a' . $k];}$_SESSION['c_id'] = 2; ?>">Submit</button>
        </form>
    </body>
</html>