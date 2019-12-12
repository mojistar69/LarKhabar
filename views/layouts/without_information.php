<body class="skin-blue sidebar-mini wysihtml5-supported">
<?php $this->beginBody() ?>
    <div class="wrapper">
			<?= $this->render('header.php') ?>
                        <?= $this->render('leftmenu.php') ?>


		<?= $this->render('content_without_information.php', ['content' => $content]) ?>
        </div>

     <?= $this->render('footer.php') ?>
<?php $this->endBody() ?>
</body>