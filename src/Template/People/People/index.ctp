<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $persons
 */
?>
<?= $this->Html->css('datatables/dataTables.bootstrap4.min.css') ?>

<div class="row">
    <div class="col">
        <legend>People</legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover table-sm" id="people-index">
                    <thead>
                        <tr>
                            <th scope="col"><?= __('Last Name') ?></th>
                            <th scope="col"><?= __('First Name') ?></th>
                            <th scope="col"><?= __('Work Phone') ?></th>
                            <th scope="col"><?= __('Cellphone') ?></th>
                            <th scope="col"><?= __('Work Email') ?></th>
                            <th scope="col"><?= __('Supervisor') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($people as $person): ?>
                        <tr>
                            <td><?= $this->Html->link(__($person->last_name), ['action' => 'view', $person->id]) ?></td>
                            <td><?= $this->Html->link(__($person->first_name), ['action' => 'view', $person->id]) ?></td>
                            <td><?= h($person->work_phone) ?></td>
                            <td><?= h($person->cellphone) ?></td>
                            <td><?= h($person->work_email) ?></td>
                            <td><?= $this->element('yes_no', ['boolean' => $person->supervisor]) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('datatables/jquery.dataTables.min.js') ?>
<?= $this->Html->script('datatables/dataTables.bootstrap4.min.js') ?>

<?= $this->Element('Datatables/datatable', [
    'tableId' => 'people-index',
    ]) ?>