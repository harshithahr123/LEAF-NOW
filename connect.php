<?php
$username = $_POST['username'];
$number = $_POST['number'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('host','root','','project02');
if($conn->connect_error){
    echo "$conn->connect_error";
    die('Connection Failed : '. $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into signin(username, number, email, password) values(?, ?, ?, ?)");
    $stmt->bind_param("siss",$username, $number, $email, $password);
    $stmt->execute();
    echo "Signin successfully....";
    $stmt->close();
    $conn->close();
}
?>