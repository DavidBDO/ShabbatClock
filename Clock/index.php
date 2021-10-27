<?php
date_default_timezone_set('Asia/Jerusalem');

echo  "My Clock By Eden and David,"." The current time is: " . date("H:i:s")."  ";


if(isset($_GET['snd'])){
    $today=date("Y-m-d");
    include 'db_params.php';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_schema);
    include_once 'class_time_manager.php';
    $mngr=new class_time_manager($mysqli);
    $mngr->IsOn($today);
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MyClock</title>
        <style>
            div{
            font-family: Garamond, serif;
            border-radius: 20px;
            font-size:20px;
            color:#fed959;
            margin: auto;
            width: 50%;
            border: 3px solid #fed959;
  padding: 10px;
            }
            button{
                font-family: Garamond, serif;
                font-weight: bold;
                font-size:18px;
                border-radius: 12px;
                background-color: #fed959;
            }
   input[type="date"]::-webkit-calendar-picker-indicator {
   filter: invert(0.5) sepia(1) saturate(5) hue-rotate(175deg);
}
input[type="time"]::-webkit-calendar-picker-indicator {
   filter: invert(0.5) sepia(1) saturate(5) hue-rotate(175deg);
}
            h3,h2{
                 font-family: Garamond, serif;
                color:#fed959;
            }
            h1{
                
                font-family: Garamond, serif;
                color:#fed959;
                 position: absolute;
                bottom: 10px;
                width: 50%;
             
            }
            h5{
                
                font-family: Garamond, serif;
                color:#fed959;
                 position: absolute;
                bottom: -10px;
                width: 50%;
             
            }
            body {
  background-image: url('https://wallpaperaccess.com/full/1635764.png');
}
        </style>
        </head>
        <body>
        
            <div clas='1'>
        <button onclick="location.href='tableindex.php'" type="button">
         Table</button> Show the date that in the database.
            </div>
            <div clas='2'>
            <button onclick="location.href='timerindex.php'" type="button">
         Timer</button> One time timer.
             </div>
             <div class='3'> 
         <button onclick="location.href='deleteindex.php'" type="button">
         delete </button> Delete row by date.
             </div>
             <div class='4'>
         <button onclick="location.href='mainindex.php'" type="button">Main</button>Insert New Values / Update values that are exist.
         <form action="" method="get">
             </div>
         <div class='5'>
        <button name="snd" value="1">IsOn</button>Check if the device is on/off.
         </form>
         </div>
            
            <h1>Eden Afergan<br>
                            &<br>
                    David Ben Dahan</h1>
            <h5>©2021 Tel-Hai Academic College.</h5>
            
    </body>
</html>
