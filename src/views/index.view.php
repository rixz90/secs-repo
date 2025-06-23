<html lang="en">
<?php if (!(empty($id))): ?>
    <p><?= $id ?></p>
<?php endif ?>
<?php include($_ENV['COMP_PATH'] . '/common/_header.php'); ?>

<body>
    <?php include($_ENV['COMP_PATH'] . '/common/default_nav.php'); ?>
    <div class="content">
        <main class="home-view">
            <h1 class="title">Staff E-Complaint System(SECS)</h1>
        </main>
    </div>
</body>

</html>