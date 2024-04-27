
<html>
<head>
<br><br><br><br>

  <style>
  body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .topnav {
    overflow: hidden;
    background-color: white;
  }

  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }

  .topnav a.active {
    background-color: #8f24ff;
    color: white;
  }

  </style>
  </head>
  </html>

  <html>
  <body>

  <style>
        .blink {
          animation: blinker 0.6s linear infinite;
          color: #1c87c9;
          font-size: 30px;
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
  </style>

<center><h2 style="font-size:45px; color:red" class="blink" >YOU GOT A PERFECT SCORE!!!</h2>

<img src="winner.webp" alt="" width="900" height="500"><br><br><br>

<center><h2 style="font-size:45px; color:red">ROGER ROGER!</h2>

<h1>Redirecting in 10 seconds...</h1>

</body>
</html>

<?php
header( "refresh:10;url=quiz.php" );
?>

<html>
<body>

  <audio id="my_audio" src="fatality.mp3"></audio>

  <!--Play Song-->
  <script>
  window.onload = function() {
      document.getElementById("my_audio").play();
  }
  </script>

  </body>
  </html>
