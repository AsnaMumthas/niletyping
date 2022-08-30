<?php

$name= $_POST["name"];
$email= $_POST["email"];
$phone= $_POST["phone"];
$subject= $_POST["subject"];
$message= $_POST["message"];

//Database Connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into formfilling(name, email, phone, subject, message) values(?, ?, ?, ?, ?,)");
    $stmt->bind_param("ssiss",$name, $email, $phone, $subject, $message);
    $stmt->execute();
    echo "Message Sent Successfully...";
    $stmt->close();
    $conn->close();
}
?>
