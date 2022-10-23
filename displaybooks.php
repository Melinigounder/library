<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Display Book</title>


</head>
<body>

<div id="container">

<h2>Display Books</h2>

<div id="btn_add">

<a href="searchbooks.php">Search</a>

</div>


</div>


<div id="content">

<?php

require_once('config.php'); 

$sql ="SELECT BookID,BookName,Year,Genre, AgeGroup FROM books";
$response = @mysqli_query($connection, $sql);

if($response){

    echo'<table>
    
    <tr>

    <th>BookID</th>
    <th>Book Name</th>
    <th>Year</th>
    <th>Genre</th>
    <th>AgeGroup</th>
    


    </tr>';

    while($row = mysqli_fetch_array($response)){
        echo '
            <tr>
            <td>'.$row['BookID'].'</td>
            <td>'.$row['BookName'].'</td>
            <td>'.$row['Year'].'</td>
            <td>'.$row['Genre'].'</td>
            <td>'.$row['AgeGroup'].'</td>
            </tr>';
    }
    
    
   echo '</table>';

}

else {
    echo "Could not get a response from database".mysqli_error($connection);
}

mysqli_close($connection);




?>

<p align="center"><a href="index.php" style="text-decoration:none;">LogOut</a> 
</div>
    
</body>
</html>