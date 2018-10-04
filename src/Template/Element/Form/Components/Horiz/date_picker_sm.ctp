<?php
$idName = str_replace('_', '-', $name);
$visibleName = ucwords(str_replace('_', ' ', $name));
$controlSize = 'form-control-sm';

if (!$small) {
    $controlSize = '';
}

?>
<div class="form-group row">
    <label for="<?= $idName ?>" class="col-sm-4"><?= $visibleName ?></label>
    <div class="col-sm-8">
        <input type="text" class="form-control <?= $controlSize ?>"
            id="<?= $idName ?>"
            name="<?= $name ?>"
	        <?php if (isset($entity)) : ?>
	        	value="<?= $entity->$name ?>"
	        <?php endif; ?>
        >
    </div>
</div>

<script type="text/javascript">
    $('#birth-date').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true,
        clearBtn: true,
        orientation: 'bottom',
        todayHighlight: true,
    });
</script>