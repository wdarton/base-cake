<?php
$this->element('Form/Templates/horiz-sm');
?>
<?= $this->Form->create(null, ['id' => 'modal-form']) ?>
    <?php
        echo $this->Form->control('label');
        echo $this->element('Form/Components/Horiz/switch', [
            'name' => 'employee',
        ]);
    ?>
<?= $this->Form->end() ?>
