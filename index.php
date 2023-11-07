<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="contact.php" method = "POST">
        <label for="username">USERID:</label>
        <input type="text" name="username" id="username">
        <label for="password">PASSWORD:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="submit">
    </form>

    <button onclick = register()>REGISTER</button>
</body>
<?php
$servername = "localhost";
$username = "root";
$password = "anurag";
$database = "test";

$conn = mysqli_connect('localhost','root','anurag','anurag');

if (!$conn) {
    echo "error in connecting";
}
else{
    $userid_error = "";
    $password_error = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
    
        $query = "select * from user where userid = '$username'";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 0) {
            // Insert data into the database
            echo "userid not found";
        }
        else{
            $result = mysqli_fetch_array($result);
            if (password_verify($password,$result['password'])) {
                // Insert data into the database
                echo "connected successfully";
                // header("location: contact.php");
            }
            else{
                echo "Nooooo";
            }
        }
    }
    
    mysqli_close($conn);
}

?>
<script>
    function register(){
        window.location.href = "register.php";
    }

</script>
</html>