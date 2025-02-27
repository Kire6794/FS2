<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $search_query = htmlspecialchars(trim($_POST["querty"]));
    echo $search_query;
}
?>