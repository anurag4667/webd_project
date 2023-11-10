<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WELCOME</h1>

    <div id="messages">
        <!-- load messages -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['user1']) && isset($_GET['user2'])) {
            $conn = mysqli_connect("localhost", "root", "anurag", "anurag");
            $user1 = $_GET['user1'];
            $user2 = $_GET['user2'];
            if (!$conn) {
                echo "connection not successful";
            } else {
                $query = "select * from messages where (user1 = '$user1' and user2 = '$user2') or (user1 = '$user2' and user2 = '$user1') order by dateofmessage";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>".$row['user1']." : ".$row['message']."</p>";
                }
            }

            mysqli_close($conn);
        }
        ?>
    </div>

    <div id="inputmessage">
        <form method="post" action="message.php">
            <textarea name="message" id="message" cols="30" rows="10"><?php if (isset($_POST['message'])) echo $_POST['message']; ?></textarea>
            <input type="hidden" name="user1" value="<?php echo $user1; ?>">
            <input type="hidden" name="user2" value="<?php echo $user2; ?>">
            <button type="submit">send</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message']) && !empty($_POST['message'])) {
        $conn = mysqli_connect("localhost", "root", "anurag", "anurag");
        $message = $_POST['message'];
        $user1 = $_POST['user1'];
        $user2 = $_POST['user2'];

        $query = "INSERT INTO messages VALUES ('$user1', '$user2', '$message', NOW())";
        mysqli_query($conn, $query);

        // Redirect to refresh the page and show updated messages
        header("Location: message.php?user1=$user1&user2=$user2");
        exit();
    }
    ?>

    <script>
        setTimeout(function(){
            // Check if the message input is empty before refreshing the page
            if (document.getElementById('message').value.trim() === "") {
                window.location.href = "message.php?user1=<?php echo $user1; ?>&user2=<?php echo $user2; ?>";
            }
        }, 5000); // Refresh the page after 5 seconds if the message input is empty
        //this is a test
</script>
</body>
</html>
