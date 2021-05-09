<?php
require "link.php";



$test = 2;
$test1 = 1;

RecordStudent($conn, $test, $test1);

function RecordStudent($conn,$test, $test1){
   $sql = "INSERT INTO assignment (teacher_id,student_id) VALUES (?,?);";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../test.php?error=stmtfailed");
        exit();
   }
   mysqli_stmt_bind_param($stmt,"ss", $test, $test1);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../test.php?error=none");
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

    test: <input type="text" name="text"> 
    test1: <input type="text" name="text1"> 
    <input type="submit" value="submit" name="submit">
    
    </form>
</body>
</html>