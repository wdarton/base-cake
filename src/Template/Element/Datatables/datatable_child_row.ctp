<script type="text/javascript">
	function format(value) {
	    return 'Entity data was changed to:<br><pre>' + value + '</pre>';
	}
	<?php
		$uniqueId = str_replace('-', '', $tableId);
	?>
	$(function () {
	  var table<?= $uniqueId ?> = $("#<?= $tableId ?>").DataTable({
	    'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
	    <?php if (isset($sort)): ?>
		    "order": [[ <?= $sort['column'] ?>, "<?= $sort['direction']?>" ]],
	    <?php endif; ?>
	  });

	  // Add event listener for opening and closing details
	  $('#<?= $tableId ?>').on('click', 'td.details-control', function () {
	      var tr = $(this).closest('tr');
	      var row = table<?= $uniqueId ?>.row(tr);
	      var td = $(this).closest('td');
	      if (row.child.isShown()) {
	          // This row is already open - close it
	          row.child.hide();
	          tr.removeClass('shown');
	          td.children().removeClass('fas fa-minus-circle text-danger');
	          td.children().addClass('fas fa-plus-circle text-success');
	      } else {
	          // Open this row
	          row.child(format(tr.data('child-value'))).show();
	          tr.addClass('shown');
	          td.children().removeClass('fas fa-plus-circle text-success');
	          td.children().addClass('fas fa-minus-circle text-danger');
	      }
	  });

	});
</script>