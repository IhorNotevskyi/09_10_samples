<?php

/**
 * @var array $categories
 */

?>
<h1>Categories</h1>
<p><a href="/categories/create" class="btn btn-success">Create category</a></p>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Parent</th>
        <th></th>
    </tr>
    <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['title'] ?></td>
            <td></td>
            <td>
                <a href="/categories/update" class="btn btn-sm btn-primary">Edit</a>
                <a href="/categories/delete" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>