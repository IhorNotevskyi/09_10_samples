<?php

/**
 * @var string $dir (Initiated in index.php file)
 * @var array $comment (Initiated in index.php file)
 * @var string $action (Initiated in index.php file)
 */

?>

<form action="<?= $action ?>" method="post">
    <input type="text"
           name="name"
           placeholder="Enter your name"
           value="<?= getArrayValue($comment, 'name') ?>"><br>
    <textarea name="comment" placeholder="Enter your comment"><?= getArrayValue($comment, 'comment') ?></textarea><br>
    <input type="submit" value="Submit">
</form>
