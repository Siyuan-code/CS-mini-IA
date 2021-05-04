<?php
$teacherchoice = array(array('Teacher1','Teacher2','Teacher3'),
                            array('math','science','art'),
                            array('art','math','science'),
                            array(0,0,0)
                          );// 1st row is name 2nd row is choice 3rd row is 2nd choice 4th qunaity. 5th-8th = student assigned


$studentchoice = array(array('Student1','Student2','Student3','Student4','Student5','Student6','Student7','Student8','Student9'),
                       array('math','math','math','math','math','math','science','science','art'),
                       array(0,0,0,0,0,0,0,0,0));
                           // 1st row is name 2nd row is choice 3rd row = teacher assigned
// echo "Hello";
for ($j=0; $j < count($studentchoice[0]); $i++) {
  if ($studentchoice[2][$i] == 0) {
    // echo "Hello";
    for ($i=0; $i < count($teacherchoice[0]); $i++) {
      if ($studentchoice[1][$i] == $teacherchoice[1][$i] && $teacherchoice[3][$i] < 4){
          $teacherchoice[3][$i] += 1; // increases quantity assigend to teacehr
          $studentchoice[2][$i] = $teacherchoice[0][$i]; // reccords teacher student assigned to
            if (!isset($teacherchoice[3][$i])) { // if statement to reccord students assigned to teacher
              $teacherchoice[4][$i] = $studentchoice[0][$i];
            }elseif (!isset($teacherchoice[4][$i])) {
              $teacherchoice[5][$i] = $studentchoice[0][$i];
            }elseif (!isset($teacherchoice[5][$i])) {
              $teacherchoice[6][$i] = $studentchoice[0][$i];
            }elseif (!isset($teacherchoice[6][$i])) {
              $teacherchoice[7][$i] = $studentchoice[0][$i]; 
            }
          $i = count($teacherchoice[0]); 
      }elseif ($studentchoice[1][$i] == $teacherchoice[2][$i] && $teacherchoice[3][$i] < 4){
          $teacherchoice[3][$i] += 1; // increases quantity assigend to teacehr
          $studentchoice[2][$i] = $teacherchoice[0][$i]; // reccords teacher student assigned to
            if (!isset($teacherchoice[3][$i])) { // if statement to reccord students assigned to teacher
              $teacherchoice[4][$i] = $studentchoice[0][$i];
            }elseif (!isset($teacherchoice[4][$i])) {
              $teacherchoice[5][$i] = $studentchoice[0][$i];
            }elseif (!isset($teacherchoice[5][$i])) {
              $teacherchoice[6][$i] = $studentchoice[0][$i];
            }elseif (!isset($teacherchoice[6][$i])) {
              $teacherchoice[7][$i] = $studentchoice[0][$i];
            }
          $i = count($teacherchoice[0]); 
      }else {
        $studentchoice[2][$i] = 'No teacher available please change subject'; 
      }
        
    }
    
  }
}
echo "Hello";
?>
