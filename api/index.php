<?php
session_start();

// Process form submission (for chat)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (!empty($message)) {
        $timestamp = time();
        $newMessage = ['user' => 'User', 'message' => $message, 'timestamp' => $timestamp];

        $_SESSION['chat'][] = $newMessage;
    }
}

// Display chat messages
$chat = isset($_SESSION['chat']) ? $_SESSION['chat'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chat</title>
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

.chat-section {
    border-top: 1px solid #ddd;
    padding-top: 20px;
    margin-bottom: 20px;
}

.message-section {
    margin-bottom: 20px;
}

.message-form {
    display: flex;
    flex-direction: column;
}

.message-form label {
    font-weight: bold;
    margin-bottom: 5px;
}

.message-form textarea {
    resize: vertical;
    margin-bottom: 10px;
}

.message-form button {
    background-color: #1877f2;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.message-form button:hover {
    background-color: #1652a2;
}

.message {
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
            <h1>Simple Chat</h1>
        </header>

        <section class="chat-section">
            <?php
            if (!empty($chat)) {
                foreach ($chat as $message) {
                    echo "<div class='message'>";
                    echo "<p><strong>{$message['user']}:</strong> {$message['message']}</p>";
                    echo "<span class='timestamp'>" . date('Y-m-d H:i:s', $message['timestamp']) . "</span>";
                    echo "</div>";
                }
            } else {
                echo "<p>No messages yet.</p>";
            }
            ?>
        </section>

        <section class="message-section">
            <form action="" method="post" class="message-form">
                <label for="message-content">Type your message:</label>
                <textarea id="message-content" name="message" required></textarea>
                <br>
                <button type="submit">Send</button>
            </form>
        </section>
    </div>
</body>
</html>
