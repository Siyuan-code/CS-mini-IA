<?php
require 'link.php';

$query = "SELECT * FROM teacher WHERE choiceS ='Math' ";

$result = mysqli_query($conn, $query);

$teacherinfos = array(array(),array());


while($choice = mysqli_fetch_assoc($result)){
    if($choice['choiceS'] == 'Math'){
        array_push($teacherinfos[0], $choice['names']); 
        array_push($teacherinfos[1], $choice['choiceS']);
    }

}
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

<div class="header2"><h2 class="student">All teachers who choose math as their second choice</h2></div>

<table>
<tr>
    <th>Teacher name</th>
    <th>Second choice</th>
</tr>
<tr>
    <td><?php for($i=0; $i<count($teacherinfos[0]); $i++){
        echo $teacherinfos[0][$i]."<br>"."<hr>";
        }?></td>
    <td><?php for($i=0; $i<count($teacherinfos[1]); $i++){
        echo $teacherinfos[1][$i]."<br>"."<hr>";
        }?></td>
</tr>
</table>
    <a href="home.php"><button class="back2">Back to homepage</button></a>
</body>
</html>