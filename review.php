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

        <label for="story_score">Story: </label>
        <input type="number" id="story_score" name="story_score" min="1" max="10"> /10<br>
        <label for="visual_score">Visual: </label>
        <input type="number" id="visual_score" name="visual_score" min="1" max="10"> /10<br>

        <label for="music_score">Music: </label>
        <input type="number" id="music_score" name="music_score" min="1" max="10"> /10<br>

        <label>review:</label><br>
        <input type="text" name="review"><br>

        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $review = filter_input(INPUT_POST, "review", FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (!empty($review)) {
            echo "review"."<br>";
        }

        if (!empty($_POST["story_score"])) {
            echo "story"."<br>";
        }
        if (!empty($_POST["visual_score"])) {
            echo "visual"."<br>";
        }
        if (!empty($_POST["music_score"])) {
            echo "music"."<br>";
        }
        
    }
    mysqli_close($conn);
?>