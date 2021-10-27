<?php
date_default_timezone_set('Asia/Jerusalem');

 if(isset($_GET['snd'])){
    include 'db_params.php';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_schema);

    include_once 'class_time_manager.php';
    $mngr=new class_time_manager($mysqli);
    $start=(!empty($_GET['start_time']))?$_GET['start_time']:"";
    $end=(isset($_GET['end_time']))?$_GET['end_time']:"";
    $date=(isset($_GET['date']))?$_GET['date']:"";
    $mngr->insertData($start, $end,$date);
    
    
}
if(isset($_GET['upd'])){
    include 'db_params.php';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_schema);

    include_once 'class_time_manager.php';
    $mngr=new class_time_manager($mysqli);
    $start1=(!empty($_GET['start_time1']))?$_GET['start_time1']:"";
    $end1=(isset($_GET['end_time1']))?$_GET['end_time1']:"";
    $mngr->UpdateAllDays($start1,$end1);
   
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>hello</title>
        <style>
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
            h1,h3{
                 font-family: Garamond, serif;
                color:#fed959;
            }
            body {
  background-image: url('https://wallpaperaccess.com/full/1635764.png');
}
            .form1{
           
              position: absolute;
              top: 5%;
             left: 60%;
             margin-top: -50px;
             margin-left: -50px;
             width: 100px;
             height: 100px;
            }
            .form2{
            
              position: absolute;
              top: 5%;
             left: 40%;
             margin-top: -50px;
             margin-left: -50px;
             width: 100px;
             height: 100px;
            }
            
        </style>
   </head>
    <body>
        <div class ="form1">
        <form action="" method="get">
        <h1>ONE DAY INSERT</h1>
        <h3>Please input date</h3>
        <input type="date" name="date">
        <h3>Define Start</h3>
        <input type="time" name="start_time">
        <h3>Define End</h3>
        
        <input type="time" name="end_time">
        <br>
        <br>
        <button name="snd" value="1">Send</button>    
        </form>
       
        </div>
        <div class="form2">
        <form action="" method="get">
            <h1>SET ALL DAYS</h1>
       
        <h3>Define Start</h3>
        <input type="time" name="start_time1">
        <h3>Define End</h3>
        <input type="time" name="end_time1">
        <br>
        <br>
        <button name="upd" value="1">Send</button>    
        </form>
        </div>
    </body>
</html>
