<?php
include "partials/header.php";
include "partials/navigation.php";

if(isLoggedIn()){
    redirect("dashboard.php");
}

$error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    


    if(mysqli_num_rows($result)===1){
        $user = mysqli_fetch_assoc($result);
        if(password_verify($password, $user["password"])){
            $_SESSION["logged_in"]= true;
            $_SESSION["username"]=$user["username"];
            header("Location: dashboard.php");
            exit;
        }else{
            $error = "Invalid Password";
        }                
    }else{
        $error = "Invalid Username";
    }
}
?>

<div class="container">
        <h2>Login</h2>
        <p style="color:red"><?php echo $error; ?></p>
        <form method="POST">
            <div>
                <label for="username">Username:</label>
                <input type="text" placeholder="Enter your username" name="username" required>
            </div>
            
            <div>
                <label for="password">Password:</label>
                <input type="password" placeholder="Enter your password" name="password" required>
            </div>
           
            <button type="submit">Login</button>
        </form>
    </div>


<?php
include "partials/footer.php";
mysqli_close($conn);
?>