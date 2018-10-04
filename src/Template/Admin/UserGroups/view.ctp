<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserGroup $userGroup
 */
?>
<div class="row">
    <div class="col">
        <legend>View - <?= h($userGroup->name) ?></legend>
        <?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $userGroup->id]) ?>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4><?= h($userGroup->name) ?></h4>
                <hr>
                <table class="table table-hover table-sm">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($userGroup->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($userGroup->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($userGroup->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($userGroup->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
