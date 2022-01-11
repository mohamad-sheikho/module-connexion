<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>
    <?php if ($_SESSION['username'] == 'admin') {
        echo "<a href=\"admin.php\">admin</a>";
    } ?>
    <a href="profile.php">Modifier profile</a>

</body>

</html>