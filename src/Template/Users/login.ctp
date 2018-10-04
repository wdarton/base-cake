<?php
$this->element('Form/Templates/vert_full_width');
?>

<link href="https://fonts.googleapis.com/css?family=Iceland" rel="stylesheet">

<div class="row justify-content-sm-center align-self-center">
	<div class="col-sm-4">
		<h1 class="text-center cops">BASE-CAKE</h1>
		<h5 class="text-center"><em>Subtitle</em></h5>

		<?= $this->Form->create() ?>
		    <?php
		        echo $this->Form->control('username', [
		        	'autofocus' => 'autofocus',
		        	'placeholder' => 'Username',
		        ]);
		        echo $this->Form->control('password', [
		        	'placeholder' => 'Password'
		        ]);
		    ?>
			<div class="text-center">
			    <?= $this->Form->button(__('Submit')) ?>
			</div>
		<?= $this->Form->end() ?>
	</div>
</div>