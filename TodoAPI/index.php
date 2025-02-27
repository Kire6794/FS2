<?php
include "controller/TaskController.php";
session_start();

$controller = new TaskController();

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $controller->index();
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
    $controller->addTask();
}else if($_SERVER["REQUEST_METHOD"] == "PUT"){
    $controller->updateTask();
}else if($_SERVER["REQUEST_METHOD"] == "DELETE"){
    $controller->deleteTask();
}else{
    $controller->index();
}