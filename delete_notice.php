<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $query = "DELETE FROM notices WHERE id = $id";

    if(mysqli_query($conn, $query))
    {
        header("Location: view_notices.php");
        exit();
    }
    else
    {
        echo "Error deleting notice!";
    }
}
else
{
    header("Location: view_notices.php");
    exit();
}
?>