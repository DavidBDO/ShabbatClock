<?php
date_default_timezone_set('Asia/Jerusalem');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Check your xampp " . $conn->connect_error);#בדיקת חיבור
}

$sql = "SELECT * FROM test ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Date</th><th>Start_Time</th><th>End_time</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["date"]. "</td><td>" . $row["start_time"]. "<td>" . $row["end_time"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nothing in the database";
}

$conn->close();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TABLE</title>
        <style>
             table, th, td {
   font-family: Garamond, serif;
            border-radius: 20px;
            font-size:20px;
            color:#fed959;
            margin: auto;
            width: 50%;
            border: 3px solid #fed959;
  padding: 10px;
    max-width: 100px;
             }
            body {
  background-image: url('https://wallpaperaccess.com/full/1635764.png');
}
        
        </style>
   </head>
    <body>


    </body>
</html>


