<!DOCTYPE>

<?php
//var_dump($_POST);
//include 'auth.php';
//require 'db.php';
require 'dbconfig.php';
session_start();
$no = @$_SESSION['score'];
$username=$_SESSION['username'];
include("auth.php");
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="account.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: red;
}

.topnav a {
  float: left;
  color: #FFFFFF;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: red;
}

.topnav a.active {
  background-color: red;
  color: red;
}
</style>
</head>
<body style="background-color:#FFFFFF;">

  <div class="topnav">

    <a href="home.php">Home</a>
    <a href="logout.php">Logout</a>

  </div><br>

  <head>
  <title>QUIZ</title>
  <style>
  body {
    background: url("quiz.jpg");
  	background-size:100%;
  	background-repeat: no-repeat;
  	position: relative;
  	background-attachment: fixed;
  }
  /* button */
  .button {
    display: inline-block;
    border-radius: 4px;
    background-color: black;
    border: none;
    color: #FFFFFF;
    text-align: center;
    font-size: 28px;
    padding: 20px;
    width: 500px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
  }

  .button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
  }

  .button span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
  }

  .button:hover span {
    padding-right: 25px;
  }

  .button:hover span:after {
    opacity: 1;
    right: 0;
  }
  /*.title{
  	background-color: purple;
  	font-size: 28px;
    padding: 20px;

  }*/
  .button3 {
      border: none;
      color: white;
      padding: 10px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
      cursor: pointer;
  }
  .button3 {
      background-color: white;
      color: black;
      border: 2px solid purple;
  }

  .button3:hover {
      background-color: black;
      color: Black;
  }
  </style>
  </head>
  <body><center>
  <center><h2><div style="font-size:20px; color:black"><h4><?php echo "$username", "'s Fighting Quiz"  ?></h2></div></center>
  <p style="font-size:20px; color:red">There are 5 questions.  Each question is worth 2 points.<p>

    <a style="font-size:20px; color:red" href="http://localhost/StarWarsApp/quiz.php">Click Here To Restart The Quiz</a>

<?php
if (isset($_POST['click']) || isset($_GET['start'])) {
@$_SESSION['clicks'] += 1 ;
$c = $_SESSION['clicks'];
if(isset($_POST['userans'])) { $userselected = $_POST['userans'];

$fetchqry2 = "UPDATE `starwarsquiz` SET `userans`='$userselected' WHERE `id`=$c-1";
$result2 = mysqli_query($con,$fetchqry2);
}


} else {
  $_SESSION['clicks'] = 0;
}

//echo($_SESSION['clicks']);
?>
<div class="bump"><br><form><?php if($_SESSION['clicks']==0){ ?> <button style="color:red" class="button" name="start" float="left"><span>START QUIZ</span></button> <?php } ?></form></div>

<form action="" method="post">
<table><?php if(isset($c)) {   $fetchqry = "SELECT * FROM `starwarsquiz` where id='$c'";
$result=mysqli_query($con,$fetchqry);
$num=mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
?>
<tr><td><h3><br><?php echo @$row['que'];?></h3></td></tr> <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6){ ?>
<tr><td><input required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
<tr><td><input required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
<tr><td><input required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
<tr><td><input required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
<tr><td><button class="button3" name="click" >Next</button></td></tr> <?php }
?>

<form>
<?php
if($_SESSION['clicks']>5){
$qry3 = "SELECT `ans`, `userans` FROM `starwarsquiz`;";
$result3 = mysqli_query($con,$qry3);
$storeArray = Array();
while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
if($row3['ans']==$row3['userans']){
@$_SESSION['score'] += 1 ;
}
}
?>

<?php
if (@$_SESSION['score'] >= 5)
header ("Location: winner.php");
?>

<audio id="audio1" src="win.mp3"></audio>

<script>
if (['score'] >= 5) {
window.onload = function() {
document.getElementById("audio1").play();
}
}
</script>

<html>
  <head>
    <title>Title of the document</title>
    <style>
      .blink {
        animation: blinker 0.6s linear infinite;
        color: purple;
        font-size: 25px;
        font-weight: bold;
        font-family: sans-serif;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
      .blink-one {
        animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {
        0% {
          opacity: 0;
        }
      }
      .blink-two {
        animation: blinker-two 1.4s linear 5;
      }
      @keyframes blinker-two {
        100% {
          opacity: 0;
        }
      }
    </style>
  </head>
  <body>
    <p class="blink"></p>
    <p class="blink blink-one"></p>
    <p class="blink blink-two">RESULT</p>
  </body>
</html>

<?php
if (@$_SESSION['score'] >= 5)
echo "Perfect score! You are a Star Wars genius!";

if (@$_SESSION['score'] == 1)
echo "One correct.  That's a start!";

if (@$_SESSION['score'] == 2)
echo "Two correct. Not bad.";

if (@$_SESSION['score'] == 3)
echo "Three correct.  You know your stuff!";

if (@$_SESSION['score'] == 4)
echo "Four correct.  That's impressive!";

if (@$_SESSION['score'] <= 0)
echo "Oops! All wrong. Try again.";
?><br><br>

<span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score'];
//session_reset ( ); ?></span><br>
<span>Your Score:&nbsp<?php echo $no*2;
session_reset ();
?></span>

<?php } ?><br><br>



<!-- <script type="text/javascript">
function radioValidation(){
/* var useransj = document.getElementById('rd').value;
//document.cookie = "username = " + userans;
alert(useransj); */
var uans = document.getElementsByName('userans');
var tok;
for(var i = 0; i < uans.length; i++){
if(uans[i].checked){
tok = uans[i].value;
alert(tok);
}
}
}
</script> -->
</center>
</body>
</html>

<center><iframe width="560" height="315" src="https://www.youtube.com/embed/PKQHDEIK9kU?si=zrasWoeh45sQnqul?autoplay=1&mute=1&loop=1&controls=0″ title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><center>
