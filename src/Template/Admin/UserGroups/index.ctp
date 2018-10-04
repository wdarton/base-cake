<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserGroup[]|\Cake\Collection\CollectionInterface $userGroups
 */
?>
<div class="row">
    <div class="col">
        <legend>User Groups</legend>
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
                            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userGroups as $userGroup): ?>
                        <tr>
                            <td><?= $this->Number->format($userGroup->id) ?></td>
                            <td><?= h($userGroup->name) ?></td>
                            <td><?= h($userGroup->created) ?></td>
                            <td><?= h($userGroup->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $userGroup->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userGroup->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userGroup->id)]) ?>
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
