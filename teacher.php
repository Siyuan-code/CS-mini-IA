<?php 

if(isset($_POST['submit'])){
$name = $_POST['teacherName'];
$email = $_POST['teacherEmail'];
$choiceF = $_POST['choiceFirst'];
$choiceS = $_POST['choiceSecond']; 

require_once 'link.php';

if(emptyInputTeacher($name,$email,$choiceF,$choiceS) !== false){
        header("location: ../teacher.php?error=emptyinput");
        exit();
    }

if(invalidEmail($email) !== false){
        header("location: ../teacher.php?error=invalidemail");
        exit();
    }

if(invalidSubject($choiceF, $choiceS) !== false){
    header("location: ../teacher.php?error=invalidsubject");
    exit();
}
RecordTeacher($conn, $name, $email,$choiceF, $choiceS);
}


function emptyInputTeacher($name,$email,$choiceF,$choiceS){
    $result;
    if(empty($name) || empty($email) || empty($choiceF) || empty($choiceS)){
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

function invalidSubject($choiceF, $choiceS){
    $result;
    if($choiceF == "choose" || $choiceS == "choose"){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function RecordTeacher($conn,$name,$email,$choiceF,$choiceS){
   $sql = "INSERT INTO teacher (names, email, choiceF, choiceS) VALUES (?,?,?,?);";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../teacher.php?error=stmtfailed");
        exit();
   }
   mysqli_stmt_bind_param($stmt,"ssss", $name,$email,$choiceF,$choiceS);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../teacher.php?error=none");
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
        <div>
            <select name="choiceFirst" class="select" id="">
                <option value="choose">Choose subjects</option>
                <option value="Math">Math</option>
                <option value="English">English</option>
                <option value="Physics">Physics</option>
                <option value="Psychology">Psychology</option>
                <option value="Economics">Economics</option>
            </select>
        </div>
    <label for="choiceSecond" class="label"> second choice:</label>
     <div>
            <select name="choiceSecond" class="select" id="">
                <option value="choose">Choose subjects</option>
                <option value="Math">Math</option>
                <option value="English">English</option>
                <option value="Physics">Physics</option>
                <option value="Psychology">Psychology</option>
                <option value="Economics">Economics</option>
            </select>
        </div>
    <input type='submit' name='submit' value='Submit' class="submit">
  </form>
<a href="home.php"><button class="back">Back to homepage</button></a>
</body>
</html>


