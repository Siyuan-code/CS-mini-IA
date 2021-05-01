<?php

require "link.php";

$count = 0;
$countP = 0;
$countS = 0;
$countE = 0;
$countG = 0;

$database = array();

$result = mysqli_query($conn, $query);

mysqli_free_result($result);

mysqli_close($conn);

require "link.php";
$query = "SELECT EE_subject FROM studentinfo";

$result = $conn->query($query);

$place = array();
$talley = array();
$counter = 0;

while ($subject = mysqli_fetch_assoc($result)){
  if($subject['EE_subject'] == "Math"){
        array_push($database, 'Math');
        $count++;
    }
    elseif($subject['EE_subject'] == "Physics"){
        array_push($database, 'Physics');
        $countP++;
    }
    elseif($subject['EE_subject'] == "Psychology"){
        array_push($database, 'Psychology');
        $countS++;
    }
    elseif($subject['EE_subject'] == "Economics"){
        array_push($database, 'Economics');
        $countE++;
    }
    elseif($subject['EE_subject'] == "English"){
        array_push($database, 'English');
        $countG++;
    }
// echo gettype($subject['EE_subject']);
// echo $subject['EE_subject'];
}
//__________________________________________________________________________________

for ($i=0; $i < count($database); $i++)
{
$counter = 0;
  for ($j=0; $j < count($place); $j++) {
    if ($database[$i] == $place[$j]) {
      $counter += 1;
    }
  }
  if($counter == 0){
    array_push($place, $database[$i]);
}
}
//---------------------------------------------------------------
for ($i=0; $i < count($place); $i++) {
  $talley[$i][0] = $place[$i];
  $talley[$i][1] = 0;
}
//--------------------------------------------------------------------

for ($i=0; $i < count($database); $i++) {
$counter = 0;

    for ($j=0; $j < count($place); $j++) {
        if ($database[$i] == $place[$j]) {
        $counter = 1;
        $zz = $j;
      }
  }
  if ($counter > 0) {
    $talley[$zz][1] += 1;
  }
}


$counter = 1;
while($counter != 0){

$counter = 1;

  while ($counter != 0) {
    $counter = 0;
      for ($i=0; $i < count($talley)-1; $i++) {
         if ($talley[$i][1] < $talley[$i+1][1]) {
           $x1 = $talley[$i][0];
           $y1 = $talley[$i+1][0];
           $x2 = $talley[$i][1];
           $y2 = $talley[$i+1][1];

           $talley[$i][0] = $y1;
           $talley[$i+1][0] = $x1;
           $talley[$i][1] = $y2;
           $talley[$i+1][1] = $x2;

           $counter += 1;
         }
      }
  }


}

//__________________________________________________________________________________

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

<h3 class="topThree">
    <?php 
    echo "Top three popular subjects that students have chosen<br>";
for ($i=0; $i < 3; $i++) {
  echo $talley[$i][0]."<br>";
}
    
    ?>
    </h3>

    <a href="home.php"><button class="back2">Back to homepage</button></a>
</body>
</html>
