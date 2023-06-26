<?php require view_path('partials/head.php') ?>
<?php require view_path('partials/nav.php') ?>
<?php require view_path('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">go back...</a>
        </p>

        <p><?= htmlspecialchars($note['body']) ?></p>

        <footer class="mt-6 inline-flex items-center justify-between">
            <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>

            <form method="POST">
                <input type="hidden" name="id" value="<?= $note['id'] ?>" />

                <button class="ml-4 rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm  hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" 
                type="submit">
                    Delete
                </button>
            </form>
        </footer>
    </div>
</main>

<?php require view_path('partials/footer.php') ?>
