<strong>Actions</strong>
<?php if (!empty($navPages)): ?>
	<ul class="nav nav-pills nav-fill flex-column">
		<?php foreach ($navPages as $navPage): ?>
			<li class="nav-item">
				<?php
					$icon = '';
					if ($navPage->icon) {
						$icon = '<i class="'.$navPage->icon.'"></i> ';
					}
				?>

				<?php if ($navPage->literal): ?>
				    <?= $this->Html->link($icon.$navPage->label,
				            ($navPage->prefix ? $navPage->prefix : '').'/'.$navPage->controller.'/'.$navPage->controller_action,
				            ['class' => 'nav-link', 'escape' => false,]
				        ); ?>
				<?php else: ?>
					<?= $this->Html->link($icon.$navPage->label, [
						'prefix' => $navPage->prefix ? $navPage->prefix : false,
						'controller' => $navPage->controller,
						'action' => $navPage->controller_action,
					],
						['class' => 'nav-link', 'escape' => false,]
					); ?>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<br>
	<div class="text-center">-- No Actions --</div>
<?php endif; ?>