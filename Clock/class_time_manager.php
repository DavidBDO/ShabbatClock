<?php

class class_time_manager{
    
    private $mysqli;
    
    function __construct($conn) {
        $this->mysqli=$conn;
    }
    
    function insertData($start_time,$end_time,$date)
    {
        if($this->SameDay($date)){
            $this->UpdateData($start_time, $end_time, $date);
        }
        else {
            $this->insertNewLine($start_time, $end_time, $date);
        }
    }
    
    
    
    function insertNewLine($start_time,$end_time,$date){
        //$date=date("Y-m-d");
        $query="INSERT INTO `test` ";
        $query.="(`start_time`, `end_time`, `date`) ";
        $query.=" VALUES ";
        $query.="('$start_time','$end_time', '$date'); ";
        echo __CLASS__."(".__LINE__.") q=$query <br />";
        $result = mysqli_query($this->mysqli,$query);
        $lastId= ($result)?$this->mysqli->insert_id:false;
        return $lastId;
    }
    
   
   function UpdateData($start_time,$end_time,$date){
       $query="UPDATE `test` SET `start_time`='$start_time',`end_time`='$end_time' WHERE date='$date'";
       $result = mysqli_query($this->mysqli,$query);
       echo __CLASS__."(".__LINE__.") q=$query <br />";
   }
   
   
   
    function SameDay($date){
        
       $query="SELECT * FROM `test` WHERE date='$date'";
       $result = mysqli_query($this->mysqli,$query);
       $ret=false;
       if(mysqli_num_rows($result)>0){
           $ret=true;
       }
       return $ret;
            
    }
    
    
    function OneTime($end_time)
    {
        $current=date("H:i:s");
        $end=$end_time;
        if($current<$end)
        {
         $total      = strtotime($end) - strtotime($current);
         $hours      = floor($total / 60 / 60);
         $minutes    = round(($total - ($hours * 60 * 60)) / 60);

         echo "<h2>".$hours.'hours'.' '.$minutes.''.'minutes'.' '.'left'."</h2>";
         $image = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAjVBMVEUAAAD6+f+oqKoEBASrq6x5eXn////9/P/+/f8ICAj6+f2lpaehoaP5+P+srK4LCwvPz9Fubm9UVFXDw8YTExPV1dZOTk86OjpHR0hkZGSNjY/x8fLIyMuzs7Xo6Ok/Pz+SkpOEhIXd3N4mJicgIB+RkZOampw2NjctLDC8vL3k5OVycnN+foFcXFwaGhvk8ov8AAAENElEQVR4nO3c23aqOhiG4SA0ib+Ce6tVUbTSOru5/8tbCdBVBOyYCC67ku856Bj1SN8RYogAYwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFnPv/Qb+V1DrEreQxk1eK74KX2PIrXiNdf/r9/L7PT7tosWgkGsx3A8fDqyL0XVmGgfK0zY/urqHGRec70cYXefGQUfxNlE+15I7jkMiyTW457v7ZZZJLJWr9/Cc5XLZUcfSuWiyKM3/1nLZQxar0wl6o2lSq8t6aSxFys2CDZBLy8dSufpLnSuNJdJaxCl4xMJLO4/V8bzdIhlZ0vkmeBhj6mJJLK+T5wU7NY76PBdLz/SraIpcpVgqV+f9OT6LpXJJ2o9c29cRFbHU1BWvhVOopQ7G2djyZVdlrE5/VoyVjC4xsTtXjVh6HbHqHLJaNi6+6sUih8v+iz5jdG1cS9SLleQKn56tHFc1YxGl64h9ZOey60Ks4aWRpccWEZ+NuhbmuhRLXoyVzvRiPbdvs+vKWGrq4pOtbWeMV8bS85dceS/pfoQtyerPWblePDwObJq6GsTy9X7EKjrYk+vqwzAjpd55tuQ4bBrLJ8mHtvyu0WTOSqmZXpzGrGtBrjZiqXUEbV4tmLqax0pxCl6NPxarY/Vqx3KEDI+mnzG2FkuPrj/vZp8xthiL1PDaL6cGH4wXYpX24P8uF0m5Xtz7I91Oq7E0yfU64t4f6zZaj6WmrlX8bOaa/gaxSPDZ4d6f6ybaj0X6R7P11MRvxRuMLB2MXu/9wW6h7Vh+8lf8+TRxjr/JyBL0ZuQM33osn4iHo3t/rNtoO5b+EbZj5LBi7ceSfLIwdue03VjqbGds8M+JbcUS+giU+7euqac6WjuxSC9FeXg0/NrAC7EmNUcWEa1i4+9eaSmW5BsLbi5oGMvPUq3npn4D5jUeWXrDbz8yeX/0W5NYvtCXt/FVZPbO+7dGI8vXqWJ77iZodhhKOj2a/hWYc30s0qc2cyvmqi9XxqLkjgtbLgj5Uj8WpX94+GT6D9Al9WMJvcnOVzvLRpVWP5bvp3e3Gr9eL7tizpJyYuzPqD+rF4scEmK2NHof5gcXYp2qYvlEarIy/EqZn9SIRXpeP9pxFljt7w9DtQilzYvVTy2ojOX1+uVWydVE2TMyLFV1Q7kXHcbFS7v1vG5xplQ5VhA/MpaPlSxCw8jmySpTiJU+BMM9jyV4uLPu1KZKLpbX87w4uyY0H0tQsE0e1Gb5Qahjjf6N5fWzB/cwNqevVJyf5jae2lT7KD8SirnbVXLC7Ag5/LB+Xs/Zempo9YLcw8Zc1v2cSV/ofZj3Aeb1by5794LA06nyPjhX83pk4T7Mzz6X0WhbeECiy5anzVv2uAschgXFHsn/GFVllYsCLBUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+g38AAsBAx/4OEcMAAAAASUVORK5CYII=';
         $imageData = base64_encode(file_get_contents($image));
         echo '<img src="data:image/jpeg;base64,'.$imageData.'">';
        }
        else
        {
        echo "<h2>".'off'."</h2>";
        }
    }
    function Delete($date)
    {
       $query="DELETE FROM `test` WHERE date='$date'";
       $result = mysqli_query($this->mysqli,$query);
       echo __CLASS__."(".__LINE__.") q=$query <br />";
    }
      function UpdateAllDays($start_time,$end_time){
       $query="UPDATE `test` SET `start_time`='$start_time',`end_time`='$end_time' WHERE 1";
       $result = mysqli_query($this->mysqli,$query);
       echo __CLASS__."(".__LINE__.") q=$query <br />";
   }
     function IsOn($today)
    {
        $current=date("Y-m-d");
        $query="SELECT `start_time`, `end_time` FROM `test` WHERE `date`='$current'";
        $result = mysqli_query($this->mysqli,$query);
        $time=date("H:i:s");
        while ($row = $result->fetch_assoc()) {
         if($row['start_time']<$time and $row['end_time']>$time){
         $image = 'data:image/jpeg;base64,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';
         $imageData = base64_encode(file_get_contents($image));
         echo '<img src="data:image/jpeg;base64,'.$imageData.'">';
            }
        else{
            echo"<h2>"."OFF"."</h2>";
        }

        }
    }
            
            
    }
    
    