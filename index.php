<!DOCTYPE html>
<html>
<head>
    <title>Simple Message Board</title>
</head>
<body>
    <h1>Simple Message Board</h1>
    
    <!-- Form to submit messages -->
    <form method="post" action="">
        <label for="message">Post a message:</label><br>
        <textarea name="message" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Process submitted messages
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
        $message = $_POST["message"];
        if (!empty($message)) {
            // Append the message to a text file
            file_put_contents("messages.txt", $message . PHP_EOL, FILE_APPEND);
        }
    }

    // Display messages from the text file
    if (file_exists("messages.txt")) {
        $messages = file("messages.txt", FILE_IGNORE_NEW_LINES);
        if (!empty($messages)) {
            echo "<h2>Messages:</h2>";
            echo "<ul>";
            foreach ($messages as $msg) {
                echo "<li>$msg</li>";
            }
            echo "</ul>";
        }
    }
    ?>
</body>
</html>
