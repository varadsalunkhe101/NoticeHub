<?php
session_start();
include("db.php");

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin 
              WHERE username='$username' 
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>NoticeHub Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>NoticeHub</h2>
    <h3>Admin Login</h3>

    <?php
    if(isset($error))
    {
        echo "<p class='error'>$error</p>";
    }
    ?>

    <form method="POST">
        <input type="text"
               name="username"
               placeholder="Enter Username"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit" name="login">
            Login
        </button>
    </form>
</div>

</body>
</html>