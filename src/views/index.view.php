<!doctype html>
<html data-theme="dark">
<?= App\View::make('components/common/_head') ?>

<body>
    <header>
        <?= App\View::make('components/common/user_navbar'); ?>
    </header>
    <main class="container">
        <h3>Staff E-Complaint System(SECS)</h3>
        <div x-data="{ open: false }">
            <button @click="open = true">Expand</button>

            <span x-show="open">
                Content...
            </span>
        </div>
    </main>
    </main>
    <footer></footer>
</body>

</html>