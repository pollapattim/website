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
        <label>New password:</label><br>
        <input type="text" name="password"><br>
        <input type="submit" name="submit" value="Update Password">
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    
        if (empty($password)) {
            echo "Please enter a new password";
        }
        else {
            $id = $_SESSION["user_id"];
            $update_name = "UPDATE users SET password = '$password' WHERE id = $id;";
            mysqli_query($conn, $update_name);
            echo "Password Updated";
        }
    }
?>