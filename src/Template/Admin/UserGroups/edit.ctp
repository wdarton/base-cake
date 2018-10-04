<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserGroup $userGroup
 */
$this->element('Form/Templates/horiz-sm');
?>
<div class="row">
    <div class="col">
        <legend>Edit - <?= $userGroup->name ?></legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6">
                    <h4><?= h($userGroup->name) ?></h4>
                    <hr>
                    <?= $this->Form->create($userGroup) ?>
                    <fieldset>
                        <legend><?= __('Edit User Group') ?></legend>
                        <?php
                            echo $this->Form->control('name');
                        ?>
                    </fieldset>
                    <div class="text-center">
                        <?= $this->Form->button(__('Submit')) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
