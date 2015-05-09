<h2>Register Staff Memeber</h2>
<div class="border">
<form name="regstaff" action="checkreg.php" method="post" onsubmit="return checkstaff()">
    <label>firstname</label><input type="text" name="firstname"/><br>
    <label>lastname</label><input type="text" name="lastname"/><br>
    <label>username</label><input type="text" name="username"/><br>
    <label>password</label><input type="password" name="password"/><br>
    <label>confirm password</label><input type="password" name="password2"/><br> 
    <label>email</label><input type="text" name="email"/><br>
    <label>street</label><input type="text" name="street" placeholder="street"/><br>
    <label>surburb</label><input type="text" name="surburb" placeholder="surburb"/><br>
    <label>state</label><input type="text" name="state" placeholder="state"/><br>
    <label>postcode</label><input type="text" name="postcode" placeholder="postcode"/><br>
    <input type="hidden" name="staffreg" value="staffreg"/>
    <input type="submit" value="Register"/>
</form>
    </div>
