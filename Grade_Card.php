<?php
session_start();  
if(!$_SESSION['auth'])
    {
        echo '<script>alert("You are not logged in.Kindly please log in.")</script>';
        header('location:./index.php');
    }
    ?>
<html><a href="./user.php">Back</a>
<div>
<img class="avatar border-gray" src="./user_grade/gradecard.jpg" alt="..." style="width:100%;height:100%;">
</div>

</html>