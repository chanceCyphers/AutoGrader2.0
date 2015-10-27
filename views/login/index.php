<div id="loginDiv">
    <h2>Enter Login Information</h2>
    <form action="?controller=login&action=validateLogin" method="post">
        <div>
            <p>MyEmich Email Address</p>
            <input type="text" name="email" size="30">
        </div>
        <div>
            <p>Password</p>
            <input type="password" name="password" size="30">
        </div>
        <div>
            <input type="submit" value="submit">
        </div>

        <div>
            <a href="views/register/index.php"> Register a New Account </a>
            <a href="views/register/forgotpass.php"> Forgot Password? </a>
        </div>
    </form>
</div>