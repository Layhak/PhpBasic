<?php require base_path('views/partials/head.php') ?>


    <div class="min-h-full">
        <?php
        require base_path('views/partials/nav.php');
        require base_path('views/partials/banner.php');
        ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <p class="mb-6">
                    <a href="/notes" class="text-blue-500 hover:underline "> Go Back</a>
                </p>
                <p class="text-blue-600 hover:text-blue-800 hover:underline">
                    <?= $note['body'] ?>
                </p>
                <footer class="mt-6">
                    <a href="/note/edit?id=<?= $note['id'] ?>"
                       class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                        Edit</a>
                    <form action="" class="mt-6" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $note['id'] ?>">
                        <button class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            Delete
                        </button>
                    </form>
                </footer>

            </div>
        </main>
    </div>
<?php require base_path('views/partials/footer.php') ?>