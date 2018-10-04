<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Configure;

$cakeDescription = 'Reports';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap4.css') ?>
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.0.13/css/all.css') ?>


    <?= $this->Html->script('https://code.jquery.com/jquery-3.2.1.min.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="clearfix" id="main-body">

    <nav class="navbar navbar-expand-sm fixed-top bg-primary material">
        <?php if ($authUser && $currentUser) : ?>
            <a class="navbar-brand" href="#"><?= $currentUser->full_name ?></a>
        <?php endif; ?>
        <?= $this->Element('Navigation/navbar') ?>
    </nav>


    <nav class="side-nav">
        <!-- <?= $this->Html->image('gw_logo_cops_blue.png') ?> -->
        <?= $this->Html->image('gw_logo_blue2_dark.png') ?>
        <hr>
        <?= $this->element('Navigation/sidenav') ?>
        <?= $this->element('UserStatus/status') ?>
    </nav>

    <div class="content">
        <div class="row">
            <div class="col">
                <?php if (Configure::read('debug')): ?>
                    <div class="alert alert-dark text-center">
                        <i class="fas fa-cogs"></i>  Debug is enabled.
                    </div>

                <?php endif; ?>
                <?= $this->Flash->render() ?>
            </div>
        </div>

        <?= $this->fetch('content') ?>

        <div class="row">
            <div class="col text-center">
                <hr>
                <small>Copyright <?= date('Y') ?> Wesley Darton. Page Generated in <?= round(microtime(true) - TIME_START, 4); ?> seconds</small>
            </div>
        </div>
        <br>
    </div>

    <footer>
        <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') ?>
        <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js') ?>
        <?= $this->fetch('script') ?>
    </footer>
</body>
</html>
