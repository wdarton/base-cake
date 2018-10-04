<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRole $userRole
 */
$this->element('Form/Templates/horiz-sm');
?>
<div class="row">
    <div class="col">
        <legend>Edit - <?= $userRole->name ?></legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6">
                    <h4><?= h($userRole->name) ?></h4>
                    <hr>
                    <?= $this->Form->create($userRole) ?>
                    <fieldset>
                        <legend><?= __('Edit User Role') ?></legend>
                        <?php
                            echo $this->Form->control('user_group_id');
                            echo $this->Form->control('name');
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
