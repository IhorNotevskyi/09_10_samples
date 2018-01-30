<form class="form-signin" action="/guest/auth" method="post">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Login</label>
    <input type="text" name="login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <p class="text-center">
        <a href="/guest/registration">Create new account</a>
    </p>
</form>