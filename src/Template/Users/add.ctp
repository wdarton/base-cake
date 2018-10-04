<?php

$this->element('Form/Templates/horiz-sm');
?>
<div class="row">
    <div class="col">
        <legend>Add User</legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6">
                    <?= $this->Form->create($user) ?>
                        <?php
                            echo $this->Form->control('username');
                            echo $this->Form->control('person_id', ['options' => $people]);
                            echo $this->Form->control('user_group_id', ['options' => $userGroups]);
                            echo $this->Form->control('user_role_id', ['options' => $userRoles]);

                            echo $this->element('Form/Components/Horiz/switch', [
                                'name' => 'locked',
                            ]);
                        ?>
                    <div class="text-center">
                        <?= $this->Form->button(__('Submit')) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>


