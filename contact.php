<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "welcome";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "WELCOME ";
        echo $_POST['username']." ".$_POST['password'];
    }
    ?>

    <button onclick = "redirectlogin()">BACK</button>
</body>
<script>

function redirectlogin(){
    window.location.href = "index.php";
}
</script>
</html>