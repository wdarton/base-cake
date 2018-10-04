<?php
$idName = str_replace('_', '-', $name);
if (!isset($orientation)) {
	$orientation = 'bottom';
}
?>
<script type="text/javascript">
    $('#<?= $idName ?>').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true,
        clearBtn: true,
        orientation: '<?= $orientation ?>',
        todayHighlight: true,
    });
</script>