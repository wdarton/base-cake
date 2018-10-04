<?php
$idName = str_replace('_', '-', $name);
$visibleName = ucwords(str_replace('_', ' ', $name));

?>
<div class="form-group row">
	<div class="custom-control custom-checkbox offset-sm-4">
		<input type="checkbox" class="custom-control-input" id="<?= $idName ?>" name="<?= $name ?>" value="1">
		<label class="custom-control-label" for="<?= $idName ?>"><?= $visibleName ?></label>
	</div>
</div>