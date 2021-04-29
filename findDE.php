<?php
require 'link.php';

$query = "SELECT * FROM studentinfo WHERE grade = 'D' OR grade ='F'";

$result = mysqli_query($conn, $query);

$studentinfos = array();

while($grade = mysqli_fetch_assoc($result)){
    if($grade['grade'] == 'D' || $grade['grade'] == 'F'){
        array_push($studentinfos[1], $grade['names']);
        array_push($studentinfos[2], $grade['grade']);
        array_push($studentinfos[3], $grade['EE_subject']);
        array_push($studentinfos[4], $grade['email']);
    }
    // print_r($studentinfos);
    echo $grade['names'];
    // echo $grade['grade'];
    // echo $grade['EE_subject'];
    // echo $grade['email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css?rnd=5">
</head>
<body>
    <!-- <a href="home.php"><button class="back2">Back to homepage</button></a> -->
</body>
</html>