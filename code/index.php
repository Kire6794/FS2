<?php
    include "controller/BookController.php";
    session_start();

    $controller = new BookController();

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $controller->index();
    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        $controller->addBook();
    }else{
        $controller->index();
    }