<hr>
<div class="text-center">
    <?php if($authUser): ?>
        You are currently logged in as:
        <br>
        <strong><?= $currentUser->full_name ?></strong>
        <br>
        <br>
        <?= $this->Html->link('Logout', [
                'prefix' => false,
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'logout'
            ],
            ['class' => 'btn btn-light']
        ) ?>
    <?php else: ?>
        You are not currently logged in
        <br>
        <br>
        <?= $this->Html->link('Login', [
                'prefix' => false,
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'login',
            ],
            ['class' => 'btn btn-light']
        ) ?>
    <?php endif; ?>
</div>
<hr>