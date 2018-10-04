<?= $this->Html->css('datatables/dataTables.bootstrap4.min.css') ?>

<div class="row">
    <div class="col">
        <legend>Users</legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover table-sm" id="users-index">
                    <thead>
                        <tr>
                            <th scope="col"><?= __('Full Name') ?></th>
                            <th scope="col"><?= __('Username') ?></th>
                            <th scope="col"><?= __('User Group') ?></th>
                            <th scope="col"><?= __('User Role') ?></th>
                            <th scope="col"><?= __('Login Count') ?></th>
                            <th scope="col"><?= __('Last Logon') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Html->link(__($user->person->full_name), ['action' => 'view', $user->id]) ?></td>
                            <td><?= $this->Html->link(__($user->username), ['action' => 'view', $user->id]) ?></td>
                            <td><?= h($user->user_group->name) ?></td>
                            <td><?= h($user->user_role->name) ?></td>
                            <td><?= h($user->login_count) ?></td>
                            <td><?= h($user->last_logon) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
    'tableId' => 'users-index',
    ]) ?>