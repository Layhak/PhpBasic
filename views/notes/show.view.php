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
                <form action="" class="mt-6" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id']?>">
                    <button class="text-red-500 text-sm">Delete</button>
                </form>
            </div>
        </main>
    </div>
<?php require base_path('views/partials/footer.php') ?>