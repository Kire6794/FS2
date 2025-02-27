<?php
include "partials/header.php";
include "partials/navigation.php";
if(!isLoggedIn()){
    redirect("login.php");
}
?>

<h1>This is dashboard</h1>

<?php
include "partials/footer.php";
?>