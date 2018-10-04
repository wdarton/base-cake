<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu[]|\Cake\Collection\CollectionInterface $menus
 */
?>
<div class="row">
    <div class="col">
        <legend>Menus</legend>
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
                            <th scope="col"><?= $this->Paginator->sort('sort_order') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('_plugin') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('prefix') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('controller') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('controller_action') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('literal') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('visible') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menus as $menu): ?>
                        <tr>
                            <td><?= $this->Number->format($menu->sort_order) ?></td>
                            <td><?= $this->Html->link(h($menu->label), ['action' => 'view', $menu->id]) ?></td>
                            <td><?= h($menu->_plugin) ?></td>
                            <td><?= h($menu->prefix) ?></td>
                            <td><?= h($menu->controller) ?></td>
                            <td><?= h($menu->controller_action) ?></td>
                            <td><?= $this->element('yes_no', ['boolean' => $menu->active]) ?></td>
                            <td><?= $this->element('yes_no', ['boolean' => $menu->literal]) ?></td>
                            <td><?= $this->element('yes_no', ['boolean' => $menu->visible]) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $menu->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

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