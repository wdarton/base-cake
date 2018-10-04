<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
    </ul>
</nav> -->

<div class="row">
    <div class="col">
        <legend>View - <?= h($person->full_name) ?></legend>
        <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id]) ?>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="info-tab" data-toggle="tab" role="tab" href="#info">Info</a>
                    </li>
                </ul>

                <div class="tab-content" id="tabsContent">
                    <div class="tab-pane fade show" id="info" role="tabpanel">
                        <h4><?= h($person->full_name) ?></h4>
                        <div class="row">
                            <div class="col">
                                <strong>Info</strong>
                                <table class="table table-hover table-sm">
                                    <tr>
                                        <th scope="row"><?= __('First Name') ?></th>
                                        <td><?= h($person->first_name) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Middle Name') ?></th>
                                        <td><?= h($person->middle_name) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Last Name') ?></th>
                                        <td><?= h($person->last_name) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Crd Number') ?></th>
                                        <td><?= h($person->crd_number) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Birth Date') ?></th>
                                        <td><?= h($person->birth_date) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Work Phone') ?></th>
                                        <td><?= h($person->work_phone) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Home Telephone') ?></th>
                                        <td><?= h($person->home_telephone) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Home Cellphone') ?></th>
                                        <td><?= h($person->home_cellphone) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Fax') ?></th>
                                        <td><?= h($person->fax) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Personal Email') ?></th>
                                        <td><?= h($person->personal_email) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Work Email') ?></th>
                                        <td><?= h($person->work_email) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Default Timezone') ?></th>
                                        <td><?= h($person->default_timezone) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Person Private Equity') ?></th>
                                        <?php if (!is_null($person->person_private_equity)): ?>
                                            <td><?= h($person->person_private_equity->rating_description) ?></td>
                                        <?php else: ?>
                                            <td></td>
                                        <?php endif;?>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Created By') ?></th>
                                        <td><?= h($person->created_by) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Created') ?></th>
                                        <td><?= $this->Element('Time/user_time', [
                                                'time' => $person->created,
                                            ]) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Modified By') ?></th>
                                        <td><?= h($person->modified_by) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Modified') ?></th>
                                        <td><?= $this->Element('Time/user_time', [
                                                'time' => $person->modified,
                                            ]) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Supervisor') ?></th>
                                        <td><?= $this->element('yes_no', ['boolean' => $person->supervisor]) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Archived') ?></th>
                                        <td><?= $this->element('yes_no', ['boolean' => $person->archived]) ?></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col">
                                <strong>Address</strong>
                                <table class="table table-hover table-sm">
                                    <tr>
                                        <th scope="row"><?= __('Line1') ?></th>
                                        <td><?= h($person->address->line_1) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Line2') ?></th>
                                        <td><?= h($person->address->line_2) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Line3') ?></th>
                                        <td><?= h($person->address->line_3) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Municipality') ?></th>
                                        <td><?= h($person->address->municipality) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Region') ?></th>
                                        <td><?= h($person->address->region) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Postal Code') ?></th>
                                        <td><?= h($person->address->postal_code) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Country') ?></th>
                                        <td><?= h($person->address->country->label) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<?= $this->Element('Navigation/hash', ['default' => 'info']) ?>

<?= $this->Element('Modal/draggable'); ?>
<?= $this->Element('Modal/delete'); ?>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<?= $this->Html->script('modals/entity_functions.js'); ?>
