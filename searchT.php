<?php 

require 'link.php';

$query = "SELECT * FROM teacher ";

$result = mysqli_query($conn, $query);

$name = $_POST['name'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Teacher</title>
    <link rel="stylesheet" href="table.css?rnd=9">
</head>
<body>
    <div class="header2"><h2 class="student">Search for a particular teacher and display his or her first and second choice ?</h2></div>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="search">
    <input type="text" name="name" id="" class="search">
    <button class="search" name="searchb">Search</button>
    </form>

    <h3 class="result">
    <?php 
    
        if(isset($_POST['searchb'])){
            while($search = mysqli_fetch_assoc($result)){
                if($name == $search['names']){
                    echo "First choice : ". $search['choiceF'];
                    echo "<br>";
                    echo "<br>";
                    echo "Second choice : ". $search['choiceS'];
                }
         }
    }
    
    ?>
    
    </h3>
    <a href="home.php"><button class="back3">Back to homepage</button></a>
</body>
</html>