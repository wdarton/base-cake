<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
$this->element('Form/Templates/horiz-sm');
?>
<div class="row">
    <div class="col">
        <legend>Edit - <?= $menu->label ?></legend>
        <hr>
    </div>
</div>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-6">
                    <h4><?= h($menu->label) ?></h4>
                    <hr>

                    <?= $this->Form->create($menu) ?>
                    <?php
                        echo $this->Form->control('label');
                        echo $this->Form->control('_plugin');
                        echo $this->Form->control('prefix');
                        echo $this->Form->control('controller');
                        echo $this->Form->control('controller_action');
                        echo $this->Form->control('sort_order');
                        echo $this->element('Form/Components/Horiz/switch', [
                            'name' => 'active',
                            'entity' => $menu,
                        ]);
                        echo $this->element('Form/Components/Horiz/switch', [
                            'name' => 'literal',
                            'entity' => $menu,
                        ]);
                        echo $this->element('Form/Components/Horiz/switch', [
                            'name' => 'visible',
                            'entity' => $menu,
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
