<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRole[]|\Cake\Collection\CollectionInterface $userRoles
 */
?>
<div class="row">
    <div class="col">
        <legend>User Roles</legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('user_group_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userRoles as $userRole): ?>
                        <tr>
                            <td><?= $this->Number->format($userRole->id) ?></td>
                            <td><?= $this->Number->format($userRole->user_group_id) ?></td>
                            <td><?= h($userRole->name) ?></td>
                            <td><?= h($userRole->created) ?></td>
                            <td><?= h($userRole->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $userRole->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userRole->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRole->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
