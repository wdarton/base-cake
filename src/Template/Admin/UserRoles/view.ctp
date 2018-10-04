<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRole $userRole
 */
?>
<div class="row">
    <div class="col">
        <legend>View - <?= h($userRole->name) ?></legend>
        <?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $userRole->id]) ?>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4><?= h($userRole->name) ?></h4>
                <hr>
                <table class="table table-hover table-sm">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($userRole->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($userRole->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('User Group Id') ?></th>
                        <td><?= $this->Number->format($userRole->user_group_id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($userRole->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($userRole->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
