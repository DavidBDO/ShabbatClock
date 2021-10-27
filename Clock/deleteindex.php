<?php
date_default_timezone_set('Asia/Jerusalem');
if(isset($_GET['del'])){
    include 'db_params.php';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_schema);

    include_once 'class_time_manager.php';
    $mngr=new class_time_manager($mysqli);
    $date=(isset($_GET['date']))?$_GET['date']:"";
    $mngr->Delete($date);
    
}
?>

<html>
<head>
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
            form{
           
              position: absolute;
              top: 20%;
             left: 50%;
             margin-top: -50px;
             margin-left: -50px;
             width: 100px;
             height: 100px;
            }   
    </style>
</head>
<body>
<form action="" method="get">
     <h1>Insert date </h1>
        <br>
        <input type="date" name="date">
         <br>
         <br>
         <button name="del" value="1" >Delete</button>
</form>
</body>
</html>