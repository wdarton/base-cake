<?php
$this->element('Form/Templates/horiz-sm');
?>
<?= $this->Form->create($personEmployeeType, ['id' => 'modal-form']) ?>
    <?php
        echo $this->Form->control('label');
        echo $this->element('Form/Components/Horiz/switch', [
            'name' => 'employee',
            'entity' => $personEmployeeType,
        ]);
    ?>
<?= $this->Form->end() ?>
