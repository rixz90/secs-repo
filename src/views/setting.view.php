<html>
<?= App\View::make('components/common/_head') ?>

<body>
    <header>
        <?= App\View::make('components/common/admin_navbar'); ?>
    </header>
    <main class="container">
        <section>
            <div>
                <nav>
                    <ul>
                        <li id="nav_bra"><a class="secondary">Branch</a></li>
                        <li id="nav_cat"><a class="secondary">Category</a></li>
                        <li id="nav_loc"><a class="secondary">Location</a></li>
                        <li id="nav_adm"><a class="secondary">Admin</a></li>

                    </ul>
                </nav>
            </div>
        </section>
        <hr />
        <section>
            <?= App\View::make('components/panels/adminPanel') ?>
            <?= App\View::make('components/panels/branchPanel') ?>
            <?= App\View::make('components/panels/categoryPanel') ?>
            <?= App\View::make('components/panels/locationPanel') ?>
        </section>
        <hr />
        <section>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Planet</th>
                        <th scope="col">Diameter (km)</th>
                        <th scope="col">Distance to Sun (AU)</th>
                        <th scope="col">Orbit (days)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Mercury</th>
                        <td>4,880</td>
                        <td>0.39</td>
                        <td>88</td>
                    </tr>
                    <tr>
                        <th scope="row">Venus</th>
                        <td>12,104</td>
                        <td>0.72</td>
                        <td>225</td>
                    </tr>
                    <tr>
                        <th scope="row">Earth</th>
                        <td>12,742</td>
                        <td>1.00</td>
                        <td>365</td>
                    </tr>
                    <tr>
                        <th scope="row">Mars</th>
                        <td>6,779</td>
                        <td>1.52</td>
                        <td>687</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="row">Average</th>
                        <td>9,126</td>
                        <td>0.91</td>
                        <td>341</td>
                    </tr>
                </tfoot>
            </table>
        </section>
    </main>
</body>
<script src="/assets/scripts/index.js"></script>

</html>