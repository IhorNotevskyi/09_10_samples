<?php

/**
 * @var string $dir (Initiated in index.php file)
 */

?>

<table width="100%" border="1">
    <tr>
        <th>Author</th>
        <th>Comment</th>
    </tr>
    <?php foreach (readDirectory($dir) as $file) : ?>
        <?php $content = readSerializedFile($file, $dir); ?>
        <tr>
            <td valign="top"><?= getArrayValue($content, 'name') ?></td>
            <td>
                <p><?= nl2br(getArrayValue($content, 'comment')) ?></p>
                <p>
                    <a href="/edit.php?file=<?= $file ?>">Edit</a>
                    <a href="/delete.php?file=<?= $file ?>">Delete</a>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
</table>