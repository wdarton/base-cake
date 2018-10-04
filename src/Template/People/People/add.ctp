<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */

$this->element('Form/Templates/horiz-sm');

echo $this->Html->css('bootstrap-datepicker3.min.css',['block' => 'css']);
echo $this->Html->script('bootstrap-datepicker.min.js',['block' => 'css']);
?>
<div class="row">
    <div class="col">
        <legend>Add Person</legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6">
                    <?= $this->Form->create($person) ?>
                        <?php
                            echo $this->Form->control('first_name');
                            echo $this->Form->control('middle_name');
                            echo $this->Form->control('last_name');
                            echo $this->Form->control('crd_number');
                            echo $this->element('Form/Components/Horiz/date_picker', [
                                'name' => 'birth_date',
                                'entity' => $person,
                                'small' => true,
                            ]);

                            echo $this->Form->control('work_phone');
                            echo $this->Form->control('home_phone');
                            echo $this->Form->control('cellphone');
                            echo $this->Form->control('fax');
                            echo $this->Form->control('work_email');
                            echo $this->Form->control('personal_email');
                            echo $this->Element('Form/Components/Horiz/address_fields', [
                                'entity' => $person
                            ]);
                            echo $this->element('Form/Components/Horiz/default_timezone_input');

                            echo $this->element('Form/Components/Horiz/switch', [
                                'name' => 'supervisor',
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


