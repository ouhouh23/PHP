<?php require('partials/head.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>To do list</h1>

        <ul>
            <?php foreach ($list as $item) : ?>
                <li>
                    <?= $item['noun'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>

<?php require('partials/footer.php') ?>
