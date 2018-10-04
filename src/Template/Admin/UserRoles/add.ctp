<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserRole $userRole
 */
$this->element('Form/Templates/horiz-sm');
?>
<div class="row">
    <div class="col">
        <legend>Add User Role</legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6">
                    <?= $this->Form->create($userRole) ?>
                    <fieldset>
                        <legend><?= __('Add User Role') ?></legend>
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
