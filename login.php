
        <h2> LogIn</h2>
        <div class="border">
    <form method="post" action="checklogin.php" id="loginForm" name="loginForm" onsubmit="return validate()">
        <label>Username</label><input type="text" name="username" ></br>
        <label>Password</label><input type="password" name="password"></br>
        <input type="hidden" name="user" value="user"/>
        <input type="submit" value="LogIn"></br>
        <div id="error"><span>dont have a user name </span> <a href="index.php?p=register">register now!</a></br>
        <span>If you are a staff </span><a href="index.php?p=stafflogin">Login here</a>
        </div>
    </form>
    </div>
