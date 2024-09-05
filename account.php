<?php
    session_start();
    include("header.html");
    echo "ID: " . $_SESSION["user_id"] . "<br>";
    echo "Name: " . $_SESSION["username"] . "<br>";
    echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

        <input type="submit" name="change_name" value="Change Name"> <br>
        <input type="submit" name="change_pass" value="Change Password"> <br>

    </form>
</body>
</html>

<?php
    if (isset($_POST["change_name"])) {
        header("Location: update_name.php");
    }
    elseif (isset($_POST["change_pass"])) {
        header("Location: update_pass.php");
    }
?>