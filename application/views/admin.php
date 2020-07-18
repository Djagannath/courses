<?php
    /** @var $title string */
    /** @var $courses array */
?>

<h2 class="text-center"><?= $title ?></h2>

<div class="row">
    <div class="col-12 mb-4">
        <a href="/admin/courses/create" class="btn btn-success">Add new course</a>
    </div>

    <div class="col-12">
        <?php if (is_array($courses)): ?>
            <table class="table table-striped table-bordered">
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course->title ?></td>
                    <td><?= $course->start ?></td>
                    <td>
                        <a href="/admin/courses/<?= $course->id ?>/edit" class="btn btn-primary">Edit</a>
                        <a href="/admin/courses/<?= $course->id ?>/delete"
                           onclick="return confirm('Are you sure?')"
                           class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php else: ?>
            <div>Course list empty</div>
        <?php endif; ?>
    </div>
</div>

