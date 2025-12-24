<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" href="pencil.png" type="ico">
    <title>sign up</title>
</head>
<body>
    
</body>
</html>
<?php 

include("conflig.php");
session_start();

$note_id = $_REQUEST["del"];



$sql="DELETE FROM `notes` where id=$note_id";
$result = mysqli_query($conn, $sql);

$_SESSION['message'] = '<div class="alert alert-dark alert-success fade show" role="alert"><storng>note delete</storng> successfully!
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
header("location: notes.php");
exit();
?>
