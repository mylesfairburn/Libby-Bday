<?php
date_default_timezone_set("Europe/London");
//$target = strtotime('tomorrow 2:00');
$target = strtotime('today 11:10');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Libby Birthday</title>
  <style>
    body {
      background-color: pink;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .box {
        background: white;
        border-radius: 20px;
        padding: 40px 60px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        text-align: center; /* Center heading and timer */
    }

    .title {
        font-size: 2em;
        color: #333;
        margin: 0 0 20px 0; /* Add space below heading */
    }

    #countdown {
        font-size: 7em; /* Make timer much bigger */
        color: red;
        font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="box">
    <h1><u>Countdown to Libby's Birthday!!!!!!</u></h1>
    <div id="countdown">Loading...</div>
  </div>

  <script>
    const targetTime = <?= $target ?> * 1000;

    function updateCountdown() {
    const now = new Date().getTime();
    const diff = targetTime - now;

    if (diff <= 0) {
        document.getElementById("countdown").textContent = "It's Libby's Birthday!!";
        document.body.style.background = "url('Libby.png') no-repeat center center fixed";
        document.body.style.backgroundSize = "cover";
        document.querySelector('.box').style.display = 'none';  // Hide the box div
        clearInterval(interval);
        return;
    }

    const hours = Math.floor(diff / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    document.getElementById("countdown").textContent =
        `${hours}h ${minutes}m ${seconds}s`;
    }


    const interval = setInterval(updateCountdown, 1000);
    updateCountdown();
  </script>
</body>
</html>