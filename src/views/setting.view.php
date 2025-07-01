<html>
<?= App\View::make('components/common/_head') ?>

<body>
    <header>
        <?= App\View::make('components/common/admin_navbar'); ?>
    </header>
    <main class="container">
        <section>
            <label for="setting">Setting:</label>
            <select id="setting" required>
                <option selected disabled value="">
                    Select your settings...
                </option>
                <option>Branch</option>
                <option>Category</option>
                <option>Location</option>
                <option>Relation</option>
                <option>Administator</option>
            </select>
        </section>
        <hr />
        <section>
            <?= App\View::make('components/panels/adminPanel') ?>
            <?= App\View::make('components/panels/branchPanel') ?>
            <?= App\View::make('components/panels/categoryPanel') ?>
            <?= App\View::make('components/panels/locationPanel') ?>
        </section>
    </main>
</body>

</html>