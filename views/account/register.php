<div class="container centered-box">
    <h2>Enter New Account Information</h2>
    <form action="?controller=account&action=regNewUser" method="post">
        <div class="form-group">
            <label for="username"> Desired Username </label>
            <input class="form-control" type="text" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="email"> Email Address </label>
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input class="btn btn-default" type="submit" value="Register">
        </div>
    </form>
        <p> If the credentials are accepted by the system, a randomized password
        will be emailed to the address provided. Once received, please log in
        with this information and personalize the password.</p>
</div>