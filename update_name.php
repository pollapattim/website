<?php
    session_start();
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
        <label>New username:</label><br>
        <input type="text" name="username"><br>
        <input type="submit" name="submit" value="Upload Name">
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($username)) {
            echo "Please enter a username";
        }
        else {
            //$hash_pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password) VALUES ('$username', '$password')";
            try {
                $id = $_SESSION["user_id"];
                $update_name = "UPDATE users SET user = '$username' WHERE id = $id;";
                mysqli_query($conn, $update_name);
                echo "Name Updated";
            }
            catch (mysqli_sql_exception) {
                echo "That username is already taken";
            }
        }
    }
?>