<?php
$idName = str_replace('_', '-', $name);
$visibleName = ucwords(str_replace('_', ' ', $name));

?>
<div class="form-group row">
    <label for="<?= $idName ?>" class="col-sm-4"><?= $visibleName ?></label>
    <div class="col-sm-8">
        <span class="switch">
            <input type="checkbox" class="switch" id="<?= $idName ?>" name="<?= $name ?>" value="1">
            <label for="<?= $idName ?>"></label>
        </span>
    </div>
</div>