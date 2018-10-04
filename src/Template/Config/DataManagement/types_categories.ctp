<?php

$this->element('Form/Templates/horiz-sm');
echo $this->Html->script('select2.min.js',['block' => 'css']);
echo $this->Html->css('select2.min.css',['block' => 'css']);
echo $this->Html->css('select2-bootstrap.css',['block' => 'css']);
?>
<div class="row">
    <div class="col">
        <legend>Types and Categories</legend>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
				<ul class="nav nav-tabs" id="tabs" role="tablist">
				    <li class="nav-item">
				        <a class="nav-link" id="clerical-tab" data-toggle="tab" role="tab" href="#clerical">Clerical</a>
				    </li>
				</ul>

				<div class="tab-content" id="tabsContent">
				    <div class="tab-pane fade" id="clerical" role="tabpanel">

				    	<?php if ($this->Acl->aclCheck('PersonEmployeeTypes')): ?>
				    	<div class="row">
							<div class="col">
								<strong>Employee Types</strong>
								<hr>
								<table class="table table-hover table-sm">
									<thead>
										<th>Label</th>
										<th>Employee</th>
										<th>Actions</th>
									</thead>
									<tbody>
										<?php foreach ($personEmployeeTypes as $personEmployeeType): ?>
											<tr>
												<td><?= h($personEmployeeType->label) ?></td>
												<td><?= $this->element('yes_no', ['boolean' => $personEmployeeType->employee]) ?></td>
												<td class="actions">
													<button class="btn btn-link" onclick="editEntity(<?= $personEmployeeType->id ?>, '/config/person-employee-types')">Edit</button>
													<button class="btn btn-link" onclick="openDeleteModal(<?= $personEmployeeType->id ?>, '/config/person-employee-types')">Delete</button>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
								<button class="btn btn-primary btn-sm" id="add-employee-type-btn">Add Employee Type</button>
							</div>
				    	</div>
						<br>
						<?php endif; ?>

				    </div> <!-- End Clerical Tab -->

				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->Element('Navigation/hash', ['default' => 'clerical']) ?>

<!-- Modals -->
<?= $this->Element('Modal/draggable'); ?>
<?= $this->Element('Modal/delete'); ?>


<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>



<script type="text/javascript">
//////////////
// CLERICAL //
//////////////

// Add Employee Type Button
$('#add-employee-type-btn').click(function() {
	$('#modal-label').html('Add Employee Type');
	$('#modal-body').load('/config/person-employee-types/add', function() {
		$("#modal").modal('show');
	});
});

</script>
<?= $this->Html->script('modals/entity_functions.js'); ?>
