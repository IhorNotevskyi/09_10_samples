<?php

$files = scandir(__DIR__ . '/data');
$images = array_filter($files, function ($file) {
    return !in_array($file, ['.', '..', '.gitignore']);
});

?>

<form action="/files/upload/save.php" method="post" enctype="multipart/form-data">
    <input type="file" name="example">
    <input type="submit" value="Submit">
</form>

<?php foreach ($images as $image) : ?>
    <img src="/files/upload/image.php?hash=<?= base64_encode($image) ?>" width="100px">
<?php endforeach; ?>
