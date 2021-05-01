<?php
require 'link.php';

$query = "SELECT * FROM studentinfo WHERE grade = 'D' OR grade ='F'";

$result = mysqli_query($conn, $query);

$studentinfos = array(array(),array(),array(),array());


while($grade = mysqli_fetch_assoc($result)){
    if($grade['grade'] == 'D' || $grade['grade'] == 'F'){
        array_push($studentinfos[0], $grade['names']); 
        array_push($studentinfos[1], $grade['grade']);
        array_push($studentinfos[2], $grade['EE_subject']);
        array_push($studentinfos[3], $grade['email']);
    }
    // echo $grade['names']."<br>";
    // echo $grade['grade']."<br>";
    // echo $grade['EE_subject'];
    // echo $grade['email'];
    // echo $grade['names'];

}
// print_r($studentinfos);
// echo($studentinfos[1][2]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css?rnd=7">
</head>
<body>

<div class="header2"><h2 class="student">Student who got D or F in their chosen subject</h2></div>

<table>
<tr>
    <th>name</th>
    <th>subject</th>
    <th>grade</th>
</tr>
<tr>
    <td><?php for($i=0; $i<count($studentinfos[0]); $i++){
        echo $studentinfos[0][$i]."<br>"."<hr>";
        }?></td>
    <td><?php for($i=0; $i<count($studentinfos[2]); $i++){
        echo $studentinfos[2][$i]."<br>"."<hr>";
        }?></td>
    <td><?php for($i=0; $i<count($studentinfos[1]); $i++){
        echo $studentinfos[1][$i]."<br>"."<hr>";
    }?></td>
</tr>
</table>
    <a href="home.php"><button class="back2">Back to homepage</button></a>
</body>
</html>