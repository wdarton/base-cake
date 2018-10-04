<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= $message ?>
	<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
