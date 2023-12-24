<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST["content"];

    $post = json_encode(["content" => $content, "timestamp" => time()]);

    // Append the post to a file or use a separate file for posts
    file_put_contents("https://github.com/Felopateer1/DeepSwing/blob/main/api/posts.json", $post . PHP_EOL, FILE_APPEND);

    echo "Post created";
} else {
    echo "Invalid request";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<meta http-equiv="refresh" content="1; url=index.php">
</head>
<body>
    
</body>
</html>