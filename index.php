<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sensors</title>                        
<meta http-equiv="pragma" content="no-cache" />
<h1>SRM Institute OF Science and Technology
    Kattankulathur 
    </h1>

<?php
$servername = "localhost";
$username = "id12797934_srmaqi";
$password = "srmaqi1234*";
$dbname = "id12797934_aqi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT aqi_value
FROM sensor_value ORDER BY timestamp DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $lulu = $row["aqi_value"];
    }
} else {
    echo "no data";
}

mysqli_close($conn);
?>
</head>
<body>
    
   <h2>
Air Quality Index :- <?php echo $lulu ?>
</h2>
<img src="Aqi_image.jpg" alt="sexyyy.com" width="1000" height="700">
</body>
</html>