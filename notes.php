<?php
include("conflig.php");
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="website icon" href="pencil.png" type="ico">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="Style.css">
</head>

<?php

$username=$_SESSION['username'];

if (isset($_POST["add"])) {
    $user_id=$_SESSION['user_id'];
    $u_title =mysqli_real_escape_string($conn, $_POST["title"]);
    $u_content =mysqli_real_escape_string($conn, $_POST["content"]);

    $sql="INSERT INTO `notes`( `user_id`, `title`, `notes`) VALUES ('$user_id','$u_title','$u_content')";
    $result = mysqli_query($conn, $sql);

    if ($result) {  
        echo "";
    } else {
        echo "";
    }
}
?>

<?php
if (!isset($_SESSION['username'])) {

    header("Location: login.php");
    exit();
}

?>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-size:30px;">My notes</a>
            <form class="d-flex" role="search" action="logout.php" method="post">
                <div class="conta" style="color:white" name="user">
                    <h3 style=" padding:10px font-size:20px;">Welcome, <?php echo ($_SESSION['username']); ?>!</h3>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-transparent me-md-2" type="submit" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@fat" name="logout_btn" style="height:80%; padding: 10px 24px 10px 20px; margin-top:7px;">Logout</button>
                </div>
            </form>
        </div>
    </nav>
    <?php 
     if (isset($_SESSION["message"])) {
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
     }
    ?>

    <div class="container my-3">
        <form method="POST" action="">
            <h2>Add Notes</h2>
            <div class="mb-3">
                <span>Note Title</span>
                <input type="text" class="form-control" name="title" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <span>Note Description</span>
                <textarea class="form-control" name="content" required></textarea>
            </div>
            <div class="user">

            </div>
            <button type="submit" name="add" class="btn btn-success " Style="margin-bottom: 20px" ;>Add Note</button>
        </form>
        <div class="container">
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">sr no.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                     $sql = "SELECT * FROM `notes` where `user_id`= '" . $_SESSION['user_id'] . "' ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td>
                                <a href="edi.php?id=<?php echo $row['id']; ?>">
                                    <button class="btn btn-success">Edit</button>
                                </a>
                                <a href="delete.php?del=<?php echo $row['id']; ?>">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>

                        <?php

                        $i++;
                    } ?>
             </div>
                </tbody>
            </table>
    </div>
    <!-- Notes Add End-->



    <!-- jQuery and DataTables Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "language": {
                    "info": "Showing entries _START_ to _END_ of _TOTAL_"
                }
            });

            function updateInfo() {
                var info = table.page.info();
                $('#info').text(`Showing ${info.start + 1} to ${info.end} of ${info.recordsTotal} entries`);
            }

            updateInfo();
            table.on('page.dt length.dt', function () {
                updateInfo();
            });
        });
    </script>
</body>

</html>