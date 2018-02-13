<form class="form-signin" action="/guest/create-account" method="post">
    <h2 class="form-signin-heading">Create account</h2>

    <label for="inputLogin" class="sr-only">Login</label>
    <input type="text" name="login" id="inputLogin" class="form-control mb-2" placeholder="Login" required autofocus>

    <label for="inputName" class="sr-only">Name</label>
    <input type="text" name="name" id="inputName" class="form-control  mb-2" placeholder="Name" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <label for="inputRepeatPassword" class="sr-only">Repeat Password</label>
    <input type="password" name="repeat_password" id="inputRepeatPassword" class="form-control" placeholder="Repeat Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Registration</button>

    <p class="text-center">
        <a href="/guest/login">I have an account</a>
    </p>
</form>