<header>
    <?= App\View::make('components/common/admin_navbar'); ?>
</header>
<main class="container">
    <section class="flex flex-direction row-reverse">
        <form class="searchbox">
            <fieldset role="group">
                <input
                    type="search"
                    name="search"
                    placeholder="Search"
                    aria-label="Search" />
            </fieldset>
        </form>
    </section>
    <hr />
    <section>
        <div class="overflow-auto">
            <table class="striped ">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id(km)</th>
                        <th scope="col">Date</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Desc</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Mercury</th>
                        <td>4,880</td>
                        <td>0.39</td>
                        <td>88</td>
                        <td>88</td>
                        <td>88</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>