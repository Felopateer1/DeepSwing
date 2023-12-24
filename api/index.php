<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Social Network</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f2f5;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    text-align: center;
    margin-bottom: 20px;
}

.post-section {
    margin-bottom: 20px;
}

.post-form {
    display: flex;
    flex-direction: column;
}

.post-form label {
    font-weight: bold;
    margin-bottom: 5px;
}

.post-form textarea {
    resize: vertical;
    margin-bottom: 10px;
}

.post-form button {
    background-color: #1877f2;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.post-form button:hover {
    background-color: #1652a2;
}

.posts-section {
    border-top: 1px solid #ddd;
    padding-top: 20px;
}

.post {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
}

.timestamp {
    color: #555;
    font-size: 12px;
}

    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to DeepSwing Social App</h1>
        </header>

        <section class="post-section">
            <form action="post.php" method="post" class="post-form">
                <label for="post-content">What's on your mind?</label>
                <input id="post-content" style="padding:15px;font-size:1.6em;" name="content" required></input>
                <br>
                <button type="submit">Post</button>
            </form>
        </section>

        <section class="posts-section">
            <h2>Recent Posts:</h2>
            <?php
            $posts = file("https://github.com/Felopateer1/DeepSwing/blob/main/api/posts.json", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ($posts) {
                foreach ($posts as $post) {
                    $data = json_decode($post, true);
                    echo "<div class='post'>";
                    echo "<h3>{$data['content']}</h3>";
                    echo "<span class='timestamp'>" . date('Y-m-d H:i:s', $data['timestamp']) . "</span>";
                    echo "</div>";
                }
            } else {
                echo "<p>No posts yet.</p>";
            }
            ?>
        </section>
    </div>
</body>
</html>
