<?php
    session_start();
    include("header.html");
    include("movie.php");
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
    HOME PAGE<br>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

        <input type="text" name="search_movie">
        <input type="submit" name="search" value="Search"><br>

        <input type="submit" name="logout" value="Logout"><br>
    </form>
</body>
</html>

<?php

    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: login.php");
    }
    if (isset($_POST["search"])) {
        $search = filter_input(INPUT_POST, "search_movie", FILTER_SANITIZE_SPECIAL_CHARS);

        $movie_list = get_movie_list($search);

        foreach ($movie_list as $movie) {
            echo $movie["title"];
            echo "<br>";
        }

    }

?>