<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
session_start();
include('config.php');
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='".md5($password)."'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['username'] = $username;
        header('Location: home.php');
    }
    else{
        echo "Invalid username or password";
    }
}
?>




