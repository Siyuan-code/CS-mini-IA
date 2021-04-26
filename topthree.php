<?php
// to work with IA insert all student choices into  array field of $database = array(___);

$database = array('a', 'b', 'b', 'b', 'b', 'a', 'c', 'a', 'b', 'b', 'b', 'b', 'c', 'e');
$place = array();
$talley = array();
$counter = 0;


for ($i=0; $i < count($database); $i++) {
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

echo "Top three<br>";
for ($i=0; $i < 3; $i++) {
  echo 'number ' . $i+1 . ' ' . $talley[$i][0] . ' with a total of ' . $talley[$i][1] . ' entries<br>';
}

?>
