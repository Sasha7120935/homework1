<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
    header("Location: intropage.php");
}

if(isset($_POST["login"])) {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query ="SELECT * FROM users  WHERE username='".$username."' AND password='".$password."'";
        $result =mysqli_query($connection, $query); //or die(mysqli_error($connection));
        $count =mysqli_num_rows($result);

        if ($count != 0) {
            while ($row = mysqli_fetch_row($result)) {
                $dbusername = $row['username'];
                $dbpassword = $row['password'];
            }

            if ($username == $dbusername && $password == $dbpassword) {


                $_SESSION['session_username'] = $username;

                /* Redirect browser */
                header("Location: intropage.php");
            }
        } else {

            $message = "Invalid username or password!";
        }

    } else {
        $message = "All fields are required!";
   }
}


?>
<div class="container mlogin">
    <div id="login">
        <h1>Entrance</h1>
        <form action="" id="loginform" method="post" name="loginform">
            <p><label for="user_login">Username<br>
                    <input class="input" id="username" name="username" size="20"
                           type="text" value=""></label></p>
            <p><label for="user_pass">Password<br>
                    <input class="input" id="password" name="password" size="20"
                           type="password" value=""></label></p>
            <p class="submit"><input class="button" name="login" type="submit" value="Log In"></p>
            <p class="regtext">Not registered yet!<a href="register.php">Registration</a>!</p>
        </form>
    </div>
</div>
<?php include("includes/footer.php"); ?>
 <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

