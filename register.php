
        <h2>Register for McFresh Online shopping</h2>
        <div class="border">
        <form method="post" action="checkreg.php" name="reg" onsubmit="return check()">
            <label>User Name</label><input type="text" name="username"></br>
            <label>Password</label><input type="password" name="password" placeholder="minimum 6 characters"></br>
            <label>Confirm Password</label><input type="password" name="password1" placeholder="minimum 6 characters"></br>
            <label>Email</label><input type="text" name="email"></br>
            <label>Address</label><input type="text" placeholder="street" name="street"></br>
            <label></label><input type="text" placeholder="city" name="city"></br>
            <label></label><input type="text" placeholder="state" name="state"></br>
            <label></label><input type="text" placeholder="post code" name="pcode"></br>
            <input type="hidden" name="userreg" value="userreg"/>
            <input type="submit" value="Register">
        </form>
            </div>
