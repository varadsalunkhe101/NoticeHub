<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM notices";
$result = mysqli_query($conn, $query);

$xml = new SimpleXMLElement('<notices/>');

while($row = mysqli_fetch_assoc($result))
{
    $notice = $xml->addChild('notice');

    $notice->addChild('id', $row['id']);
    $notice->addChild('title', htmlspecialchars($row['title']));
    $notice->addChild('description', htmlspecialchars($row['description']));
    $notice->addChild('date', $row['date']);
}

$xml->asXML('notices.xml');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Export XML - NoticeHub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="export-container">

    <h2>XML Export Successful</h2>

    <p>
        All notices have been exported successfully to XML format.
    </p>

    <div class="export-buttons">
        <a href="notices.xml" class="xml-btn">
            View XML File
        </a>

        <a href="dashboard.php" class="back-btn">
            Back to Dashboard
        </a>
    </div>

</div>

</body>
</html>