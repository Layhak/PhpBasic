<?php require base_path('views/partials/head.php') ?>


    <div class="min-h-full">
        <?php
        require base_path('views/partials/nav.php');
        require base_path('views/partials/banner.php');
        ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!--
                  This example requires some changes to your config:

                  ```
                  // tailwind.config.js
                  module.exports = {
                    // ...
                    plugins: [
                      // ...
                      require('@tailwindcss/forms'),
                    ],
                  }
                  ```
                -->
                <form method="post" action="/note">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?= $note['id']?>">
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="col-span-full">
                                    <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Note
                                        Body</label>
                                    <div class="mt-2">
                                        <textarea id="body" name="body" rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body'] ?></textarea>
                                        <?php if (isset($errors['body'])): ?>
                                            <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few note about you.</p>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="/notes"
                           class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                            Cancel
                        </a>

                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </main>
    </div>
<?php require base_path('views/partials/footer.php') ?>