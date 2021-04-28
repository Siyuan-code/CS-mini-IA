<?php
$result = mysqli_query($conn, $query);

mysqli_free_result($result);

mysqli_close($conn);




?>