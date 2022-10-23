<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Added Books</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/main.css">

</head>

    <center><h2> Insert Book Details </h2></center>  
<div id="container">


<div id="content">

<?php

require_once('config.php');

if(isset($_POST['submit'])) {

    $null_fields = array();

    if(empty($_POST['b_isbn'])){
        $null_fields[] ='ISBN';

    }else{
        $isbn = trim($_POST['b_isbn']);
    }

    if(empty($_POST['b_title'])){
        $null_fields[] ='Book Title';

    }else{
        $booktitle = trim($_POST['b_title']);
    }

    if(empty($_POST['b_author'])){
        $null_fields[] ='Author';

    }else{
        $author = trim($_POST['b_author']);
    }

    if(empty($_POST['b_category'])){
        $null_fields[] ='Genre';

    }else{
        $genre = trim($_POST['b_category']);
    }

    if(empty($_POST['publication'])){
        $null_fields[] ='publication';

    }else{
        $publication = trim($_POST['publication']);
    }


    if(empty($null_fields)){

        $sql = "INSERT INTO displaybooks VALUES(NULL,'$ISBN', '$booktitle', '$author', '$genre', '$publication')";

        if(!mysqli_query($connection, $sql)){
            die('Error:'.mysqli_error($connection));
        }

        echo "Book has been Inserted";
        mysqli_close($connection);

    }
    else{
        echo "You need to enter the following missing data:<br>";

        foreach($null_fields as $null_field){
            echo $null_field."<br/>";
        }


    }



    }



?>
<div>

<form action="insertbooks.php" method="post">
<center><legend>Add New Book Details</legend></center>
<div id="header">

</div>

<div id="btn_add">

<a href="home.php">View Books</a>
</div>

<label for="b_isbn">ISBN</label>
<input type="text" id="b_isbn" name="b_isbn" placeholder="ISBN"maxlength="80">
<label for="b_title">Book Title</label>
 <input type="text" id="b_title" name="b_title" placeholder="Book Title"maxlength="80">

 <label for="b_author">Author</label>
<input type="text" id="b_author" name="b_author" placeholder="Author Name"maxlength="80">



<label for="fname">Genre</label>
<select name="b_category"id="b_category"required>
							<option>History</option>
							<option>Comics</option>
							<option>Fiction</option>
							<option>Non-Fiction</option>
							<option>Biography</option>
							<option>Medical</option>
							<option>Fantasy</option>
							<option>Education</option>
							<option>Sports</option>
							<option>Technology</option>
							<option>Literature</option>
</select>



<label for="fname">Publication</label>

<input type="text" id="publication"  name="publication"maxlength="80">
<input type="submit" value="Insert Book" name="submit">

</form>
<p align="center"><a href="index.php" style="text-decoration:none;">LogOut</a> </P>
</div>

</div>

</div>

</body>
</html>




