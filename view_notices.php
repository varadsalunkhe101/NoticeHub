<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM notices ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Notices - NoticeHub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="table-container">

    <h2>All Notices</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
                <a href="delete_notice.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirmDelete();"
                   class="delete-btn">
                   Delete
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

    <br>

    <a href="dashboard.php" class="btn">
        Back to Dashboard
    </a>

</div>

<script src="script.js"></script>

</body>
</html>