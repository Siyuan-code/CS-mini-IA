<?php 

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$grade = $_POST['grades']; 

require_once 'link.php';

if(emptyInputStudent($name,$email,$subject,$grade) !== false){
        header("location: ../table.php?error=emptyinput");
        exit();
    }

if(invalidEmail($email) !== false){
        header("location: ../table.php?error=invalidemail");
        exit();
    }

if(invalidSubject($subject) !== false){
    header("location: ../table.php?error=invalidsubject");
    exit();
}
if(invalidGrade($grade) !== false){
    header("location: ../table.php?error=invalidgrade");
    exit();
}
RecordStudent($conn, $name, $email,$subject, $grade);
}


function emptyInputStudent($name,$email,$subject,$grade){
    $result;
    if(empty($name) || empty($email) || empty($subject) || empty($grade)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidGrade($grade){
    $result;
    if(!preg_match("/^[A-F]*$/", $grade)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidSubject($subject){
    $result;
    if($subject == "choose"){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function RecordStudent($conn,$name,$email,$subject,$grade){
   $sql = "INSERT INTO studentinfo (names, email, EE_subject, grade) VALUES (?,?,?,?);";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../table.php?error=stmtfailed");
        exit();
   }
   mysqli_stmt_bind_param($stmt,"ssss", $name,$email,$subject,$grade);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../table.php?error=none");
   exit();
}




?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's form</title>
    <link rel="stylesheet" href="table.css?rnd=5">
</head>
<body>
  <div class="background">
    
    </div>
    <h2 class="heading">Hello, enter your first and second choices here!</h2>
  <form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <label for="teacherName" class="label">Name:</label>
    <input type='text' name='teacherName' placeholder='Enter name' class="name">
    <label for="teacherEmail" class="label">Email:</label>
    <input type='text' name='teacherEmail' placeholder='Enter email adress' class="name">
    <label for="choiceFirst" class="label"> first choice:</label>
    <input type='text' name='choiceFirst' placeholder='Enter EE Subject 1st choice' class="name">
    <label for="choiceSecond" class="label"> second choice:</label>
    <input type='text' name='choiceSecond' placeholder='Enter EE Subject 2nd choice' class="name">
    <br>
    <input type='submit' name='submit' value='Submit' class="submit">
  </form>

</body>
</html>


