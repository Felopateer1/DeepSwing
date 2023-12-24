<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST["content"];

    $stmt = $conn->prepare("INSERT INTO posts (content) VALUES (?)");
    $stmt->bind_param("s", $content);

    if ($stmt->execute()) {
        echo "Post created";
    } else {
        echo "Error creating post: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>
