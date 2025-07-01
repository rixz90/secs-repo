<html data-theme="dark">

<?= App\View::make('components/common/_head') ?>

<body>
    <header>
        <?= App\View::make('components/common/user_navbar'); ?>
    </header>
    <main class="container">
        <section class="flex" style="flex-direction:row-reverse">
            <form role="search" style="width: fit-content;">
                <input name="search" type="search" placeholder="Search" />
                <input type="submit" value="Search" />
            </form>
        </section>
        <hr />
        <section>
            <div class="overflow-auto">
                <table class="striped">
                    <thead>
                        <tr>
                            <th scope="col">Complaint ID</th>
                            <th scope="col">Date Report</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/assets/scripts/semakan.js"></script>
</body>

</html>