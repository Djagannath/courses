<?php
/** @var $title string */
/** @var $model Object */
?>

<h2 class="text-center"><?= $title ?></h2>

<h3 class="text-center">
    <a href="/admin" class="btn bbtn-link">Curses</a>
</h3>

<div class="row">
    <div class="col-12">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <?= form_open(); ?>

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title"
                       required
                       placeholder="Enter a title..."
                       value="<?= set_value('title', $model->title ?? null); ?>"
                       class="form-control needs-validation">
            </div>

            <div class="form-group">
                <label>Start</label>
                <input type="date" name="start"
                       required
                       value="<?= set_value('start', $model->start ?? null); ?>"
                       class="form-control needs-validation">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>