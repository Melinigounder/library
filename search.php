<?php
include("auth_session.php");
?>
<html>
<body>
<center>
<?php 
$search=$_GET['search'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search Books</title>
	<link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
	

<h1>Search A Book</h1>

<form action="">
<input type="text" name="search" value="<?php echo $search; ?>">
<input type="submit" value="Search">
</form>
 <h3>Search Book Data <?php echo $search; ?> </h3>
<table border='1' width="500px">
<tr>
<td>#</td>
<td>Book ID</td>
<td>Book Title</td>
<td>Genre</td>

</tr>
<?php
$search='%'.$search.'%';

require_once('config.php');

$sql='SELECT * FROM displaybooks WHERE booktitle LIKE "'.$search.'" or genre LIKE "'.$search.'" order by BookID';
$stm= mysqli_prepare($connection,$sql);
$a=1;
if(mysqli_stmt_execute($stm)){
	$result=mysqli_stmt_get_result($stm);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		echo '<tr>';
		echo '<td>'.$a++.'</td>';
		echo '<td>'.$row['BookID'].'</td>';
		echo '<td>'.$row['booktitle'].'</td>';
		echo '<td>'.$row['genre'].'</td>';
		
		echo '</tr>';
		}
	}	
}	
?>
</table>
<p align="center"><a href="index.php" style="text-decoration:none;">LogOut</a> 

</center>
</body>
</html>