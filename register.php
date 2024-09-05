<?php
    include("database.php");
    include("header.html");
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
        <label>username:</label><br>
        <input type="text" name="username"><br>
        <label>password:</label><br>
        <input type="text" name="password"><br>
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($username)) {
            echo "Please enter a username";
        }
        elseif (empty($password)) {
            echo "Please enter a password";
        }
        else {
            //$hash_pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password) VALUES ('$username', '$password')";
            try {
                mysqli_query($conn, $sql);
                echo "You are now resgistered!";
                header("Location: login.php");
            }
            catch (mysqli_sql_exception) {
                echo "That username is already taken";
            }
        }
    }
    mysqli_close($conn);
?>