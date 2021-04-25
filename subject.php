<?php

require_once "link.php";

$count = 0;
$query = "SELECT * FROM studentinfo WHERE EE_subject= 'Math' ";
$result = mysqli_query($conn, $query);
$subject = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);

if ($subject['EE_subject'] == "Math") {
    $count++;
}
else {
    $count +=0;
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
    <?php
echo "<h3>There is $count student who have chosen Math.</h3>";
?>
</body>
</html>