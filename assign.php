<?php
// echo "Hello";

require "link.php";

$query = "SELECT * FROM studentinfo ";

$result = mysqli_query($conn, $query);

$query1 = "SELECT * FROM teacher ";

$result1 = mysqli_query($conn, $query1);

$studentinfo = array(array(), array());

$teacherinfo = array(array(), array(), array());

$student = mysqli_fetch_assoc($result);

$teacher = mysqli_fetch_assoc($result1);

$assign = $teacher['no_assigned'];

// $count = 0;

while($student = mysqli_fetch_assoc($result)){
    array_push($studentinfo[0],$student['names']);
    array_push($studentinfo[1], $student['EE_subject']);
    array_push($studentinfo[2], $student['assign']);
    array_push($studentinfo[3], $student['advisor']);
    // echo $student['names'];
}

while($teacher = mysqli_fetch_assoc($result1)){
    array_push($teacherinfo[0], $teacher['names']);
    array_push($teacherinfo[1], $teacher['choiceF']);
    array_push($teacherinfo[2], $teacher['choiceS']);
    array_push($teacherinfo[3], $teacher['no_assigned']);
    array_push($teacherinfo[4], $teacher['student1']);
    array_push($teacherinfo[5], $teacher['student2']);
    array_push($teacherinfo[6], $teacher['student3']);
    array_push($teacherinfo[7], $teacher['student4']);
    // echo $teacher['names'];
}
// RecordAssign($conn, $count);
// print_r($teacherinfo);
for($i = 0; $i < count($studentinfo[0]); $i++){
    // echo "[".$i."]".$studentinfo[0][$i];
    // echo $studentinfo[0][$i]. " ". $studentinfo[1][$i]."<br>";
    // echo $teacherinfo[0][$i]. " ". $teacherinfo[1][$i]."<br>";
    // echo $studentinfo[2][$i];
    if($studentinfo[2][$i] == 0){
        // print_r($teacherinfo[0]);
        for($j = 0; $j < count($teacherinfo[0]); $j++){
            if($studentinfo[1][$i] == $teacherinfo[1][$j] && $teacherinfo[3][$j] < 4 ){
                // $teacherinfo[3][$j] += 1;
                // echo $teacherinfo[3][$j];
                // echo $teacherinfo[0][$i]. $studentinfo[1][$i]."<br>";
                $studentinfo[3][$i] = $teacherinfo[0][$j];
                // echo $student['advisor'];
                if($teacherinfo[4][$j] == 0){
                    $teacherinfo[4][$j]  = $studentinfo[0][$i];
                }
                if($teacherinfo[5][$j] == 0){
                    $teacherinfo[5][$j] = $studentinfo[0][$i];
                }
                if($teacherinfo[6][$j] == 0){
                    $teacherinfo[6][$j] = $studentinfo[0][$i];
                }
                if($teacherinfo[7][$j] == 0){
                    $teacherinfo[7][$j] = $studentinfo[0][$i];
                }
                $j = count($teacherinfo[0]);
                print_r($teacherinfo[4]);
            }
            elseif($studentinfo[1][$i] == $teacherinfo[2][$j] && $teacherinfo[3][$j] < 4){
                $teacherinfo[3][$j] += 3;
                $studentinfo[3][$i] = $teacherinfo[0][$j];
                // echo $student['advisor'];
                if($teacherinfo[4][$j] == 0){
                    $teacherinfo[4][$j] = $studentinfo[0][$i];
                }
                if($teacherinfo[5][$j] == 0){
                    $teachinfo[5][$j] = $studentinfo[0][$i];
                }
                if($teacherinfo[6][$j] == 0){
                    $teacherinfo[6][$j] = $studentinfo[0][$i];
                }
                if($teacherinfo[7][$j] == 0){
                    $teacherinfo[7][$j] = $studentinfo[0][$i];
                }
                // echo $teacher['student3'];
                $j = count($teacherchoice[0]);
            }
            else{
                if($studentinfo[3][$i]==0){
                    $studentinfo[3][$i] == "No teacher assigned";
                }
            }
        }
    }
}
// print_r($teacherinfo);
// print_r($studentinfo);
// for($i = 0; $i < count($teacherinfo); $i++){
//     for($j = 0; $j < count($teacherinfo[0]); $j++){
//         if(isset($teacherinfo[$i][$j])){
//         echo '[' .$j. ']'. $teacherinfo[$i][$j] . " ";
//         }
//     }
//     echo "<hr>";
// }
// echo "<br>";
// echo "<br>";
// for($i = 0; $i < count($studentinfo); $i++){
//     for($j = 0; $j < count($studentinfo[0]); $j++){
//         echo '['. $j . ']'. $studentinfo[$i][$j]. " ";
//     }
//     echo "<hr>";
// }

// function RecordAssign($conn,$count){
//    $sql = "INSERT INTO teacher (no_assigned) VALUES (?);";
//    $stmt = mysqli_stmt_init($conn);
//    if(!mysqli_stmt_prepare($stmt,$sql)){
//         header("location: ../assign.php?error=stmtfailed");
//         exit();
//    }
//    mysqli_stmt_bind_param($stmt,"s", $count);
//    mysqli_stmt_execute($stmt);
//    mysqli_stmt_close($stmt);
//    header("location: ../assign.php?error=none");
//    exit();
// }
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
    <div class="header2"><h2 class="student">Which advisor are you assigned to?</h2></div>
    <table>
<tr>
    <th>Advisor</th>
    <th>Subject1</th>
    <th>Subject2</th>
    <th>Student1</th>
    <th>Student2</th>
    <th>Student3</th>
    <th>Student4</th>
   
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</table>
</body>
</html>