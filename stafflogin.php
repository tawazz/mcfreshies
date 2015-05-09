<?php
    echo"<h2>Staff LogIn</h2>";

?>

    <div >
    <form method="post" action="checklogin.php" id="loginForm" name="loginForm" onsubmit="return validate()">
        <label>Username</label><input type="text" name="username" ></br>
        <label>Password</label><input type="password" name="password"></br>
        <input type="hidden" name="staff" value="staff"/>
        <input type="submit" value="LogIn"></br>
        <div id="error">dont have a user name Ask admin to <a href="index.php?p=register">Register!</a></div>
    </form>
    </div>