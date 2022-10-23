<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Library Database</title>
</head>
<body>

<div id="container">

<h2>Display Books</h2>

<div id="btn_add">

<a href="insertbooks.php">Insert A Book</a>

</div>


</div>


<div id="content">

<?php

require_once('config.php'); #calling the config file & passing the path as a parameter

$sql ="SELECT BookID,ISBN,booktitle,author, genre, publication FROM displaybooks";
$response = @mysqli_query($connection, $sql);

if($response){

    echo'<table>
    
    <tr>

    <th>BookID</th>
    <th>IBSN</th>
    <th>Book Title</th>
    <th>Author</th>
    <th>Genre</th>
    <th>Publication</th>
    <th>Delete</th>


    </tr>';

    while($row = mysqli_fetch_array($response)){
        echo '
            <tr>
            <td>'.$row['BookID'].'</td>
            <td>'.$row['IBSN'].'</td>
            <td>'.$row['booktitle'].'</td>
            <td>'.$row['author'].'</td>
            <td>'.$row['genre'].'</td>
            <td>'.$row['publication'].'</td>

		    <td><a href="delete.php?BookID='.$row['booktitle'].'">Delete</a></td>
           
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