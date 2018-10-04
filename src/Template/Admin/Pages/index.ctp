<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page[]|\Cake\Collection\CollectionInterface $pages
 */
?>
<div class="row">
    <div class="col">
        <legend>Pages</legend>
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
                            <th scope="col"><?= $this->Paginator->sort('label') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('menu_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('_plugin') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('prefix') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('controller') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('controller_action') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('sort_order') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('literal') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pages as $page): ?>
                        <tr>
                            <td><?= $this->Html->link(h($page->label), ['action' => 'view', $page->id]) ?></td>
                            <td><?= $page->has('menu') ? $this->Html->link($page->menu->label, ['controller' => 'Menus', 'action' => 'view', $page->menu->id]) : '' ?></td>
                            <td><?= h($page->_plugin) ?></td>
                            <td><?= h($page->prefix) ?></td>
                            <td><?= h($page->controller) ?></td>
                            <td><?= h($page->controller_action) ?></td>
                            <td><?= $this->Number->format($page->sort_order) ?></td>
                            <td><?= $this->element('yes_no', ['boolean' => $page->literal]) ?></td>
                            <td><?= $this->element('yes_no', ['boolean' => $page->active]) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $page->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $page->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
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
