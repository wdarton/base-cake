<?php

?>
<?= $this->Html->css('datatables/dataTables.bootstrap4.min.css') ?>
<div class="row">
    <div class="col">
        <legend>View - <?= h($user->person->full_name) ?></legend>
        <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
            	<ul class="nav nav-tabs" id="tabs" role="tablist">
            	    <li class="nav-item">
            	        <a class="nav-link" id="info-tab" data-toggle="tab" role="tab" href="#info">Info</a>
            	    </li>
            	    <li class="nav-item">
            	        <a class="nav-link" id="login-log-tab" data-toggle="tab" href="#login-log" role="tab" aria-controls="login-log" aria-selected="false">Recent Logins</a>
            	    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="recent-actions-tab" data-toggle="tab" role="tab" href="#recent-actions">Recent Actions</a>
                    </li>
            	</ul>

				<div class="tab-content" id="tabsContent">
				    <div class="tab-pane fade" id="info" role="tabpanel">
                        <?php
                            $lockedIcon = '';
                            $lockedIndicator = '';
                            if ($user->locked) {
                                $lockedIcon = '<i class="fas fa-lock text-warning"></i> ';
                                $lockedIndicator = ' <span class="text-warning">USER LOCKED</span>';
                            }
                        ?>
    	            	<h4><?= $lockedIcon.h($user->person->full_name).$lockedIndicator ?></h4>
    	            	<hr>
    	            	<table class="table table-hover table-sm">
    		            	<tr>
    		            	    <th scope="row"><?= __('Full Name') ?></th>
    		            	    <td><?= h($user->person->full_name) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('Username') ?></th>
    		            	    <td><?= h($user->username) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('User Group') ?></th>
    		            	    <td><?= h($user->user_group->name) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('User Role') ?></th>
    		            	    <td><?= h($user->user_role->name) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('Login Count') ?></th>
    		            	    <td><?= h($user->login_count) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('Last Logon') ?></th>
    		            	    <!-- <td><?= h($user->last_logon) ?></td> -->
    		            	    <td><?= $this->Element('Time/user_time', [
    		            	    		'time' => $user->last_logon,
    		            	    	]) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('Locked') ?></th>
    		            	    <td><?= $user->locked ? __('Yes') : __('No'); ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('Created By') ?></th>
    		            	    <td><?= h($user->created_by) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('Created') ?></th>
    		            	    <td><?= $this->Element('Time/user_time', [
                                        'time' => $user->created,
                                    ]) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('Modified By') ?></th>
    		            	    <td><?= h($user->modified_by) ?></td>
    		            	</tr>
    		            	<tr>
    		            	    <th scope="row"><?= __('Modified') ?></th>
    		            	    <td><?= $this->Element('Time/user_time', [
                                        'time' => $user->modified,
                                    ]) ?></td>
    		            	</tr>
    	            	</table>
    					<hr>
    					<div class="related">
    					    <h4><?= __('Related People') ?></h4>
    					    <?php if (!empty($user->person)): ?>
					            <table class="table table-striped table-hover table-sm">
					                <tr>
					                    <th scope="col"><?= __('Last Name') ?></th>
					                    <th scope="col"><?= __('First Name') ?></th>
					                    <th scope="col"><?= __('Work Phone') ?></th>
					                    <th scope="col"><?= __('Cellphone') ?></th>
					                    <th scope="col"><?= __('Work Email') ?></th>
					                    <th scope="col"><?= __('Supervisor') ?></th>
					                    <th scope="col" class="actions"><?= __('Actions') ?></th>
					                </tr>
					                <tr>
					                    <td><?= $this->Html->link(h($user->person->last_name),
                                            [
                                                'controller' => 'People',
                                                'prefix' => 'people',
                                                'action' => 'view',
                                                $user->person->id
                                            ]) ?></td>
					                    <td><?= $this->Html->link(h($user->person->first_name),
                                            [
                                                'controller' => 'People',
                                                'prefix' => 'people',
                                                 'action' => 'view',
                                                $user->person->id
                                             ]) ?></td>
					                    <td><?= h($user->person->work_phone) ?></td>
					                    <td><?= h($user->person->cellphone) ?></td>
					                    <td><?= h($user->person->work_email) ?></td>
					                    <td><?= h($user->person->supervisor) ?></td>
					                    <td class="actions">
					                        <?= $this->Html->link(__('View'),
                                                [
                                                    'controller' => 'People',
                                                    'prefix' => 'people',
                                                    'action' => 'view',
                                                    $user->person->id
                                                ]) ?>
					                        <?= $this->Html->link(__('Edit'),
                                                [
                                                    'controller' => 'People',
                                                    'prefix' => 'people',
                                                    'action' => 'edit',
                                                    $user->person->id
                                                ]) ?>
					                    </td>
					                </tr>
					            </table>
    					    <?php endif; ?>
    					</div>
				    </div>

				    <div class="tab-pane fade" id="login-log" role="tabpanel">
				    	<?= $this->Element('User/recent_logins') ?>
				    </div>

                    <div class="tab-pane fade" id="recent-actions" role="tabpanel">
                        <?= $this->Element('User/recent_actions') ?>
                    </div>
				</div>

        	</div>
        </div>
    </div>
</div>

<?= $this->Html->script('datatables/jquery.dataTables.min.js') ?>
<?= $this->Html->script('datatables/dataTables.bootstrap4.min.js') ?>

<?= $this->Element('Navigation/hash', ['default' => 'info']) ?>