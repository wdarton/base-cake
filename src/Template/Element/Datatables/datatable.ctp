<script type="text/javascript">
	$(function () {
	  $("#<?= $tableId ?>").DataTable({
	    'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
	    <?php if (isset($sort)): ?>
		    "order": [[ <?= $sort['column'] ?>, "<?= $sort['direction']?>" ]],
	    <?php endif; ?>
	  });

	});
</script>