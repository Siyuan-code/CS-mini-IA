<?php
$teacherchoice = array(array('Teacher1','Teacher2','Teacher3'),// 1st row is name
                            array('math','science','art'),//2nd row is choice
                            array('art','math','science'),//3rd row is2nd choice
                            array(0,0,0)//4th qunaity
                          ); //5th-8th = student assigned


$studentchoice = array(array('Student1','Student2','Student3','Student4','Student5','Student6','Student7','Student8','Student9','Student10'),// 1st row is name
                       array('math','science','math','math','math','math','science','science','art'),// 2nd row is choice
                       array(0,0,0,0,0,0,0,0,0,0));  //3rd row = teacher assigned

//debuging display package remove in final version_______________________________________________
echo "<br>Displaying Teacher info - pre prossecing ----------------------------------------------------<br>";
echo "Teacher names - ";
for ($i=0; $i < count($teacherchoice[0]); $i++) {
  if(isset($teacherchoice[0][$i])){
    echo ' [' . $i . ']' . $teacherchoice[0][$i];
  }
}
echo "<br>Teacher subjects 1 - ";
for ($i=0; $i < count($teacherchoice[1]); $i++) {
  if(isset($teacherchoice[1][$i])){
    echo ' [' . $i . ']' . $teacherchoice[1][$i];
  }
}
echo "<br>Teacher subjects 2 - ";
for ($i=0; $i < count($teacherchoice[2]); $i++) {
  if(isset($teacherchoice[2][$i])){
    echo ' [' . $i . ']' . $teacherchoice[2][$i];
  }
}

echo "<br>";
echo "<br>Displaying Student info - pre prossecing --------------------------------------------------<br>";
echo "Student names - ";
for ($i=0; $i < count($studentchoice[0]); $i++) {
  if(isset($studentchoice[0][$i])){
    echo ' [' . $i . ']' . $studentchoice[0][$i];
  }
}
echo "Student subjects - ";
for ($i=0; $i < count($studentchoice[1]); $i++) {
  if(isset($studentchoice[1][$i])){
    echo ' [' . $i . ']' . $studentchoice[1][$i];
  }
}
  echo "<br>";
//_______________________________________________________________________________________________

for ($j=0; $j < count($studentchoice[0]); $j++) {
  if ($studentchoice[2][$j] == 0) { //Check whether the student has been assigned
    for ($i=0; $i < count($teacherchoice[0]); $i++) {

      if ($studentchoice[1][$j] == $teacherchoice[1][$i] && $teacherchoice[3][$i] < 4){
            $teacherchoice[3][$i] += 1; // increases quantity assigend to teacehr
            $studentchoice[2][$j] = $teacherchoice[0][$i]; // reccords teacher student assigned to

            for ($k=0; $k < 4; $k++) {
              if(!isset($teacherchoice[$k+4][$i])){
                $teacherchoice[$k+4][$i] = $studentchoice[0][$j];
                $k = 4;
              }
            }
            $i = count($teacherchoice[0]);

      }elseif ($studentchoice[1][$j] == $teacherchoice[2][$i] && $teacherchoice[3][$i] < 4){
        $teacherchoice[3][$i] += 1; // increases quantity assigend to teacher
        $studentchoice[2][$j] = $teacherchoice[0][$i]; // reccords teacher student assigned to

           for ($k=0; $k < 4; $k++) {
                if(!isset($teacherchoice[$k+4][$i])){
                  $teacherchoice[$k+4][$i] = $studentchoice[0][$j];
                  $k = 4;
                }
           }
           $i = count($teacherchoice[0]);

        }else{
          if ($studentchoice[2][$j] == 0) {
            $studentchoice[2][$j] = 'No teacher available please change subject';
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


?>
