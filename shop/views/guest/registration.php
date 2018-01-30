<form class="form-signin" action="/guest/create-account" method="post">
    <h2 class="form-signin-heading">Create account</h2>
    <label for="inputLogin" class="sr-only">Login</label>
    <input type="text" name="login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Registration</button>

    <p class="text-center">
        <a href="/guest/login">I have an account</a>
    </p>
</form>