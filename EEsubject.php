<?php

require "link.php";

$count = 0;
$countP = 0;
$countS = 0;
$countE = 0;
$countG = 0;

$query = "SELECT EE_subject FROM studentinfo";

$result = $conn->query($query);

while ($temp = $result->fetch_assoc()){
    if($temp['EE_subject'] == "Math"){
        $count++;
    }
    elseif($temp['EE_subject'] == "Physics"){
        $countP++;
    }
    elseif($temp['EE_subject'] == "Psychology"){
        $countS++;
    }
    elseif($temp['EE_subject'] == "Economics"){
        $countE++;
    }
    elseif($temp['EE_subject'] == "English"){
        $countG++;
    }
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EEsubject</title>
    <link rel="stylesheet" href="table.css?rnd=6">
</head>
<body>
    <div class="header2"><h2 class="student">How many student are choosing each subject?</h2></div>

    <h3 class="subject">Math : <?php echo $count ?></h3>
    <h3 class="subject">English : <?php echo $countG ?></h3>
    <h3 class="subject">Physics : <?php echo $countP ?></h3>
    <h3 class="subject">Psychology : <?php echo $countS ?></h3>
    <h3 class="subject">Economics : <?php echo $countE ?></h3>

    <a href="home.php"><button class="back2">Back to homepage</button></a>
</body>
</html>