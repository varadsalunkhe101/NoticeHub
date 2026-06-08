<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

if(isset($_POST['add_notice']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO notices(title, description, date)
              VALUES('$title', '$description', CURDATE())";

    if(mysqli_query($conn, $query))
    {
        $success = "Notice Added Successfully!";
    }
    else
    {
        $error = "Failed to Add Notice!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Notice - NoticeHub</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<div class="form-container">

    <h2>Add Notice</h2>

    <?php
    if(isset($success))
        echo "<p class='success'>$success</p>";

    if(isset($error))
        echo "<p class='error'>$error</p>";
    ?>

    <form method="POST" onsubmit="return validateNoticeForm()">

        <input type="text"
               name="title"
               id="title"
               placeholder="Enter Notice Title">

        <textarea name="description"
                  id="description"
                  placeholder="Enter Notice Description"
                  rows="5"></textarea>

        <button type="submit" name="add_notice">
            Add Notice
        </button>

    </form>

    <br>

    <a href="dashboard.php" class="btn">
        Back to Dashboard
    </a>

</div>

</body>
</html>