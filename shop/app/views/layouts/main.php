<?php

use helpers\SessionHelper;

$error = SessionHelper::getFlash('error');
$success = SessionHelper::getFlash('success');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>0910 Shop</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories/list">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products/list">Products</a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">0910 Shop</h3>
    </header>

    <main role="main">

        <?php if ($error) : ?>
            <p class="alert alert-danger"><?= $error ?></p>
        <?php endif; ?>
        <?php if ($success) : ?>
            <p class="alert alert-success"><?= $success ?></p>
        <?php endif; ?>

        <?= $content ?>

    </main>

    <footer class="footer">
        <p>&copy; PHP Academy <?= date('Y') ?></p>
    </footer>

</div> <!-- /container -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
