<?php
include("db.php");

$query = "SELECT * FROM notices ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>NoticeHub - Student Notice Board</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="notice-board">

    <div class="header">
        <h1>NoticeHub</h1>
        <p>Student Notice Board</p>
    </div>

    <?php
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
    ?>

    <div class="notice-card">

        <div class="notice-date">
            <?php echo date("d M Y", strtotime($row['date'])); ?>
        </div>

        <h2><?php echo $row['title']; ?></h2>

        <p>
            <?php echo $row['description']; ?>
        </p>

    </div>

    <?php
        }
    }
    else
    {
        echo "<div class='no-notice'>No notices available.</div>";
    }
    ?>

</div>

</body>
</html>