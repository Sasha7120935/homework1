<?php
session_start();
if(!isset($_SESSION["session_username"])) {
    header("location:login.php");
} else {
?>
<div id="welcome">
    <h2>Welcome, <span><?php echo $_SESSION['session_username'];?>!</span>!</h2>
    <p><a href="login.php">Log off</a>out of system</p>
</div>
    <?php include("includes/footer.php"); ?>


    <?php
}
?>
