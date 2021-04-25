<!DOCTYPE html>
<html>
<head>
  <h>Student Form</h>
</head>

<?php require 'config.php' ;?>

<body>
  <br>
  <br>
  <form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
    <input type='text' name='name' placeholder='Enter name'>
    <br>
    <input type='text' name='email' placeholder='Enter email adress'>
    <br>
    <input type='text' name='essaysubject' placeholder='Enter EE Subject'>
    <br>
    <input type='text' name='essaygrade' placeholder='Enter Subject Grade'>
    <br>
    <input type='submit' name='submit' value='Submit'>
  </form>

</body>
</html>

<?php

  if (isset($_POST['submit'])) {
    $studentinfo = array(
      'StudentName' => $_POST['name'],
      'StudentEmail' => $_POST['email'],
      'StudentEssaySubject' => $_POST['essaysubject'],
      'StudentSubjectGrade' => $_POST['essaygrade']
    );
  }

 ?>
