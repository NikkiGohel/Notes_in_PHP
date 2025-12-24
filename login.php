<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
</body>
</html>
<?php
include("conflig.php");
session_start();

if (isset($_POST["login"])) {
    $u_email = $_POST['email'];
    $u_pass = $_POST['pass'];

    $sql = "SELECT * FROM `users` WHERE email='$u_email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_num_rows($result);
    

    if ($user) {
        while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($u_pass,$row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username']; 
            $_SESSION['message'] = '<div class="alert alert alert-success alert-dismissible fade show" role="alert">Login susccesfully!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
           header('location:notes.php');
            exit();
        } else {
            $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>In-coreect password ..</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          header("location: index.php");
          exit(); 
        }
      }
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div><strong>something went wrong </strong></div>
      </div>';
      header("location: index.php");
      exit();
    }

}
?>
