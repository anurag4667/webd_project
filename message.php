<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WELCOME</h1>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo $_POST['user1']." wants to message ".$_POST['user2'];
    }
    ?>
</body>
</html>