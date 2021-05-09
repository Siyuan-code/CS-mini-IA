<?php
// echo "Hello";

require "link.php";

$query = "SELECT * FROM studentinfo ";

$result = mysqli_query($conn, $query);

$query1 = "SELECT * FROM teacher ";

$result1 = mysqli_query($conn, $query1);

$studentchoice = array(array(), array(),array(),array());

$teacherchoice = array(array(), array(), array(),array());

$student = mysqli_fetch_assoc($result);

$teacher = mysqli_fetch_assoc($result1);

while($student = mysqli_fetch_assoc($result)){
    array_push($studentchoice[0],$student['id']);
    array_push($studentchoice[1], $student['EE_subject']);
    array_push($studentchoice[2], $student['assign']);
    array_push($studentchoice[3], $student['advisor']);
}

while($teacher = mysqli_fetch_assoc($result1)){
    array_push($teacherchoice[0], $teacher['id']);
    array_push($teacherchoice[1], $teacher['choiceF']);
    array_push($teacherchoice[2], $teacher['choiceS']);
    array_push($teacherchoice[3], $teacher['no_assigned']);
}

for ($j=0; $j < count($studentchoice[0]); $j++) {
  if ($studentchoice[2][$j] == 0) { //Check whether the student has been assigned
    for ($i=0; $i < count($teacherchoice[0]); $i++) {

      if ($studentchoice[1][$j] == $teacherchoice[1][$i] && $teacherchoice[3][$i] < 4){
            $teacherchoice[3][$i] += 1; // increases quantity assigend to teacehr
            $studentchoice[3][$j] = $teacherchoice[0][$i]; // reccords teacher student assigned to

            for ($k=0; $k < 4; $k++) {
              if(!isset($teacherchoice[$k+4][$i])){
                $teacherchoice[$k+4][$i] = $studentchoice[0][$j];
                $k = 4;
              }
            }
            $i = count($teacherchoice[0]);

      }
      elseif ($studentchoice[1][$j] == $teacherchoice[2][$i] && $teacherchoice[3][$i] < 4){
        $teacherchoice[3][$i] += 1; // increases quantity assigend to teacher
        $studentchoice[3][$j] = $teacherchoice[0][$i]; // reccords teacher student assigned to

           for ($k=0; $k < 4; $k++) {
                if(!isset($teacherchoice[$k+4][$i])){
                  $teacherchoice[$k+4][$i] = $studentchoice[0][$j];
                  $k = 4;
                }
           }
           $i = count($teacherchoice[0]);

        }else{
          if ($studentchoice[3][$j] == 0) {
            $studentchoice[3][$j] = 'No teacher available please change subject';
          }
      }
    }
  }
}

//debuging display package remove in final version_______________________________________________


echo "<br>Displaying Teacher info - post prossecing ----------------------------------------------------<br>";
for ($i=0; $i < count($teacherchoice); $i++) {
  echo '-' . $i;
  for ($j=0; $j < count($teacherchoice[0]); $j++) {
    if(isset($teacherchoice[$i][$j])){
      echo ' [' . $j . ']' . $teacherchoice[$i][$j];
    }
  }
  echo "<br>";
}
  echo "<br>Displaying Student info - post prossecing --------------------------------------------------<br>";
  for ($i=0; $i < count($studentchoice); $i++) {
    echo '-' . $i;
    for ($j=0; $j < count($studentchoice[0]); $j++) {
      if(isset($studentchoice[$i][$j])){
        echo ' [' . $j . ']' . $studentchoice[$i][$j];
      }
    }
    echo "<br>";
}


//_______________________________________________________________________________________________
if(isset($_POST['submit'])){
    // for($i = 0; $i < count($teacherchoice[4]); $i++){
    //     $teacher_id = $teacherchoice[4][$i];
    //     // echo $teacher_id;
    // }
 $teacher_id = $teacherchoice[0][8];
 $student_id = $teacherchoice[5][8];
RecordStudent($conn, $teacher_id, $student_id);
}

function RecordStudent($conn,$teacher_id, $student_id){
   $sql = "INSERT INTO assignment (teacher_id,student_id) VALUES (?,?);";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../assign.php?error=stmtfailed");
        exit();
   }
   mysqli_stmt_bind_param($stmt,"ss", $teacher_id, $student_id);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../assign.php?error=none");
   exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="table.css?rnd=6">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input type="submit" value="submit" name="submit">
</form>

<a href="home.php"><button class="back2">Back to homepage</button></a>

</body>
</html>