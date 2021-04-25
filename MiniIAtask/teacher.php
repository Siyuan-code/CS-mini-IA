<!DOCTYPE html>
<html>
<head>
  <h>Teacher Form</h>
</head>

<?php require 'config.php' ;?>

<body>
  <br>
  <br>
  <form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <input type='text' name='teachername' placeholder='Enter name'>
    <br>
    <input type='text' name='teacheremail' placeholder='Enter email adress'>
    <br>
    <input type='text' name='teacheressaychoice' placeholder='Enter EE Subject 1st choice'>
    <br>
    <input type='text' name='teacheressaychoice2' placeholder='Enter EE Subject 2nd choice'>
    <br>
    <input type='submit' name='submit' value='Submit'>
  </form>

</body>
</html>

<?php

  if (isset($_POST['submit'])) {
    $teacherinfo = array(
        'TeacherName' => $_POST['teachername'],
        'TeacherEmail' => $_POST['teacheremail'],
        'TeacherEssayChoice1' => $_POST['teacheressaychoice'],
        'TeacherEssayChoice2' => $_POST['teacheressaychoice2']
    );
print_r($teacherinfo);
  }


 ?>
