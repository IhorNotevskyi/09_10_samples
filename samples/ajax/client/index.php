<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Siple AJAX Client</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<br/><br/>

<form action="../server/index.php" method="post">
    <input type="text" name="number1" placeholder="number 1">
    <input type="text" name="number2" placeholder="number 2">
    <input type="submit" value="multiply">
</form>
<div class="result"></div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="ajax.js" type="text/javascript"></script>

</body>
</html>