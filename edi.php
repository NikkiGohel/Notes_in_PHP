<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="website icon" href="pencil.png" type="ico">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

</head>
<?php

include("conflig.php");
session_start();
$up_id = $_REQUEST["id"];
?>

<?php
if (isset($_POST["update_btn"])) {
    $tit =mysqli_real_escape_string($conn, $_POST["title"]);
    $con =mysqli_real_escape_string($conn,$_POST["content"]);
    $sql = " UPDATE `notes` SET `title`='$tit',`notes`='$con' WHERE  id='$up_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">Note updated successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
header("Location: notes.php");
exit();

    } else {
        echo "Failed to update the note.";
    }
}
?>

<body>
    <div class="container">
        <form action="" method="post">
            <?php

            $t;
            $c;
            $sql = "SELECT * FROM `notes` WHERE id='$up_id'";
            $result = mysqli_query($conn, $sql);
            foreach ($result as $row) {
                $t = $row['title'];
                $c = $row['notes'];
            }

            ?>

            <h2>Add Notes</h2>
            <div class="mb-3">
                <span>Note Title</span>
                <input type="text" class="form-control" name="title" value="<?php echo $t; ?>" required>
            </div>

            <div class="mb-3">
                <span>Note Description</span>
                <input type="text" class="form-control" name="content" value="<?php echo $c; ?>" required>
            </div>
            <button type="submit" name="update_btn" class="btn btn-success" onclick="myFunction()">Update Note</button>

        </form>
    </div>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</body>

</html>