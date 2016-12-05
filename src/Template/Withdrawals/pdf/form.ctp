<?php
$underscores = str_repeat('_', 30);
$separator = str_repeat('<br>', 2);
?>

<style>
@media print {
    .next-page {page-break-before: always;}
}

p {
    line-height: 2em;
}
</style>

<h1><?= __('Dispatch Guide') ?></h1>

<p>
    <b><?= __('ID: ') ?></b><?= h($withdrawal->id) ?><br>
    <b><?= __('Date: ') ?></b><?= h($withdrawal->datetime) ?><br>
    <b><?= __('Dispatching: ') ?></b><?= $underscores ?><br>
    <b><?= __('Receiving: ') ?></b><?= $underscores ?><br>
    <b><?= __('Consigned To: ') ?></b><?= $underscores ?><br>
    <b><?= __('Withdrawn By: ') ?></b><?= $underscores ?><br>
    <b><?= __('Vehicle No.: ') ?></b><?= $underscores ?><br>
</p>

<table>
    <tr>
        <th><?= __('Quantity') ?></th>
        <th><?= __('Unit') ?></th>
        <th><?= __('Article') ?></th>
        <th><?= __('Document No.') ?></th>
    </tr>
    <tr>
        <td><?= h($withdrawal->quantity) ?></td>
        <td><?= h($withdrawal->inventory->material->unit->name) ?></td>
        <td><?= h($withdrawal->inventory->material->name) ?></td>
        <td><?= $underscores ?></td>
    </tr>
</table>

<p>
    <div style="float:left">
        <b><?= __('Dispatched By (Name & Signature)') ?></b><?= $separator ?>
        <?= $underscores ?>
    </div>

    <div style="float:right">
        <b><?= __('Withdrawn By (Name & Signature)') ?></b><?= $separator ?>
        <?= $underscores ?>
    </div>
</p>
<?= str_repeat($separator, 2) ?>
<p>
    <div style="float:left">
        <b><?= __('Recieved at Place By (Name & Signature)') ?></b><?= $separator ?>
        <?= $underscores ?>
    </div>

    <div style="float:right">
        <b><?= __('Withdrawn at Place By (Name & Signature)') ?></b><?= $separator ?>
        <?= $underscores ?>
    </div>
</p>
<?= str_repeat($separator, 2) ?>
<p>
    <div>
        <b><?= __('Recieved Correctly (Name & Signature)') ?></b><?= $separator ?>
        <?= $underscores ?>
    </div>
</p>

<div class="next-page">
    <h1><?= __('Materials & Equipment Withdraw Authorization') ?></h1>

    <p>
        <b><?= __('Date: ') ?></b><?= h($withdrawal->datetime) ?><br>
        <b><?= __('Asset No.: ') ?></b><?= $underscores ?><br>
        <b><?= __('Employee Withdrawing: ') ?></b><?= $underscores ?><br>
        <b><?= __('Working Location: ') ?></b><?= $underscores ?><br>
        <b><?= __('Description of Material or Equipment: ') ?></b><?= h($withdrawal->inventory->material->name) ?><br>
        <b><?= __('Dispatch Guide No.: ') ?></b><?= h($withdrawal->id) ?><br>
        <b><?= __('Destiny: ') ?></b><?= $underscores ?><br>
        <b><?= __('Vehicle No.: ') ?></b><?= $underscores ?><br>

        <div style="float:left">
            <b><?= __('Manager Authorizing') ?></b><?= $separator ?>
            <?= __('Name: ') ?><?= $underscores ?><?= $separator ?>
            <?= __('Signature: ') ?><?= $underscores ?>
        </div>

        <div style="float:right">
            <b><?= __('Employee Withdrawing') ?></b><?= $separator ?>
            <?= __('Identification Number: ') ?><?= $underscores ?><?= $separator ?>
            <?= __('Signature: ') ?><?= $underscores ?>
        </div>
    </p>
</div>
