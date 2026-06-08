<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>NoticeHub Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">

    <h1>NoticeHub</h1>
    <h3>Welcome, <?php echo $_SESSION['admin']; ?></h3>

    <div class="menu">

        <a href="add_notice.php" class="btn">
            Add Notice
        </a>

        <a href="view_notices.php" class="btn">
            View Notices
        </a>

        <a href="export_xml.php" class="btn">
            Export XML
        </a>

        <a href="logout.php" class="btn logout">
            Logout
        </a>

    </div>

</div>

</body>
</html>