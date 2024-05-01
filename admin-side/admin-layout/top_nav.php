<?php include"top_nav_read.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    <link rel="stylesheet" type="text/css" href="top_nav.css">

</head>
<body>
    <div class="top_div">
       <div class="clock">
           <p id="clock"></p><img src="../../icons/clock.png">
       </div>
       <div class="title1">
           <p><?php echo $res_title['System_Name']; ?></p>
       </div>
       <div class="user">
            <p><img src="../../icons/programmer.png"></p>
            <div class="type">
                <p style="margin-top:.8em; font-size: 1.3em;" class="usertype">
                Admin
                </p>
            </div>
           
       </div>
    </div>

</body>
<script type="text/javascript">
    setInterval(()=> { 
    const time = document.querySelector('#clock');
    let date = new Date();
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    let day_night = "AM";

    if (hours > 12 ){
        day_night = "PM";
        hours = hours - 12;
    }
    if (hours < 10 ){
        hours = "0" + hours;
    }
    if (minutes < 10 ) {
        minutes = "0" + minutes;
    }
    if (seconds < 10 ) {
        seconds = "0" + seconds;
    }

    time.textContent = hours + ":" + minutes +":" + seconds + " " + day_night;
});
</script>
</html>