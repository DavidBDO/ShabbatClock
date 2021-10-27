<?php
date_default_timezone_set('Asia/Jerusalem');
 if(isset($_GET['tmr'])){
    include 'db_params.php';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_schema);

    include_once 'class_time_manager.php';
    $mngr=new class_time_manager($mysqli);
    $one=(isset($_GET['one_time']))?$_GET['one_time']:"";
    $mngr->OneTime($one);
    
}
?>
<html>
<head>
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
            h3,h2,h1{
                 font-family: Garamond, serif;
                color:#fed959;
            }
           
            body {
                 position: absolute;
              top: 5%;
             left: 50%;
             margin-top: 50px;
             margin-left: -50px;
             width: 100px;
             height: 100px;
  background-image: url('https://wallpaperaccess.com/full/1635764.png');
}
        </style>
</head>
<body>
        <form action="" method="get">
        
        <h1>SET time to stop</h1>
        <br>
        <input type="time" name="one_time">
         <button name="tmr" value="1">Timer</button>
        </form>
        
</body>
</html>
