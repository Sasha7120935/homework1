<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>



<?php

if(isset($_POST["register"])) {


    if (!empty($_POST['Full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['phone']) && !empty($_POST['password'])) {
        $full_name = $_POST['Full_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $con= mysqli_connect("localhost","root","","MyBD");
        $query = mysqli_query ($con,"SELECT * FROM users WHERE username='".$username."'");
        $numrows = mysqli_num_rows($query);


        if ($numrows == 0) {
            $sql = "INSERT INTO users (Full_name, email, username, phone, password) VALUES('$full_name', '$email', '$username', '$phone', '$password')";
            $result = mysqli_query($connection,$sql)or die(mysqli_error($connection));


            if ($result) {
                $message = "Account Successfully Created";

            } else {
                $message = "Failed to insert data information!";
            }

        } else {
            $message = "That username already exists! Please try another one!";
        }

    } else {
        $message = "All fields are required!";
    }

}
?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

    <div class="container mregister">
        <div id="login">
            <h1>REGISTER</h1>
            <form name="registerform" id="registerform" action="register.php" method="post">
                <p>
                    <label for="user_login">Full name<br />
                        <input type="text" name="Full_name" id="full_name" class="input" size="32" value=""  /></label>
                </p>


                <p>
                    <label for="user_pass">Email<br />
                        <input type="email" name="email" id="email" class="input" value="" size="32" /></label>
                </p>

                <p>
                    <label for="user_pass">Username<br />
                        <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
                </p>
                <p>
                    <label for="user_pass">Phone<br />
                        <input type="tel" name="phone" id="phone" class="input" value="" size="20" /></label>
                </p>

                <p>
                    <label for="user_pass">Password<br />
                        <input type="password" name="password" id="password" class="input" value="" size="32" /></label>
                </p>


                <p class="submit">
                    <input type="submit" name="register" id="register" class="button" value="Register" />
                </p>

                <p class="regtext">Already have an account? <a href="login.php" >Login Here</a>!</p>
            </form>

        </div>
    </div>



<?php include("includes/footer.php"); ?>