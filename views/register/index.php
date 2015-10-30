<div id="regDiv">
    <h2>Enter New Account Information</h2>
    <form action="?controller=register&action=validateReg" method="post">
        <div>
            <p>Desired Username:</p>
            <input type="text" name="username" size="30">
        </div>
        <div>
            <p>Email Address:</p>
            <input type="text" name="email" size="40">
        </div>
        <div>
            <input type="submit" value="submit">
        </div>
        <div>
            <p> If the credentials are accepted by the system, a randomized password
                will be emailed to the address provided. Once received, please log in
                with this information and personalize the password.</p>
        </div>
    </form>
</div>