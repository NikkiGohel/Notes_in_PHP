<?php
include("conflig.php");
session_start();

if (isset($_POST["signup"])) {
    $u_name = $_POST["name"];
    $u_email = $_POST["email"];
    $u_pass = $_POST["pass"];
    
    
    $hash= password_hash($u_pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$u_name','$u_email','$hash')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert"><storng>Sign up</storng>   susccesfully!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header("location: index.php");
        exit();
    } else {
        $_SESSION['message'] = '<div class="alert alert-dark alert-dismissible fade show" role="alert"><storng>Sign up not</storng> susccesfully!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header('location:index.php');
        exit();
    }
}
?>
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