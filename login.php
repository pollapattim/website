<?php
    include("database.php");
    include("header.html");
    session_start();
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
        <input type="submit" name="login" value="Login">
    </form>
    <form action="register.php">
        <input type="submit" value="Register">
    </form>
</body>
</html>

<?php

    if (isset($_POST["login"])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($username)) {
            echo "Please enter a username";
        }
        elseif (empty($password)) {
            echo "Please enter a password";
        }
        else {
            //$hash_pass = password_hash($password, PASSWORD_DEFAULT) == password_verify($password, $hash_pass);
            $find_user_sql = "SELECT * FROM users WHERE user = '$username'";
            $result = mysqli_query($conn, $find_user_sql);
            
            if(mysqli_num_rows($result) > 0) {
                $user_info = mysqli_fetch_assoc($result);
                if($user_info["password"] == $password) {
                    echo "You are login" . "<br>";
                    echo "ID: " . $user_info["id"] . "<br>";
                    echo "Name: " . $user_info["user"] . "<br>";
                    
                    $_SESSION["user_id"] = $user_info["id"];
                    $_SESSION["username"] = $user_info["user"];

                    header("Location: home.php");
                 
                }
                else {

                    echo"Password is incorrect";

                } 
            }
            else {

                echo "This username is not registered";

            }
        }
    }
    mysqli_close($conn);
?>