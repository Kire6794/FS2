<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    echo "GET";
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo $username;
    echo $password;
}
?>