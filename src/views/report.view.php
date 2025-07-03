<header>
    <?= App\View::make('components/common/admin_navbar') ?>
</header>
<main class="container">
    <details>
        <summary role="button" class="outline secondary">Search Filter</summary>
        <section>
            <label for="date">Generate Date:</label>
            <input type="date" name="date" id="date">
            <label for="name">User ID:</label>
            <input type="text" name="user_id" id="user_id">
            <label for="branch">Branch:</label>
            <select name="branch" id="branch">
                <option value="" disabled selected>Choose Branch</option>
            </select>
            <label for="status">Status:</label>
            <fieldset class="flex">
                <select name="status" id="status">
                    <option disabled selected>Status</option>
                    <option value="IN PROCESS">In process</option>
                    <option value='REPORTED'>Report</option>
                    <option value='INVESTIGATION'>Investigate</option>
                    <option value='COMPLETE'>Complete</option>
                </select>
                <button name="submit" style="margin-left: 10px;">Generate</button>
            </fieldset>
        </section>
    </details>
    <hr />
    <div class="overflow-auto">
        <table class="table">
            <tr>
                <th>Complaint ID</th>
                <th>Name</th>
                <th>Branch</th>
                <th>Date Report</th>
                <th>Category</th>
                <th>Status</th>
                <th>Complete Date</th>
                <th>Detail</th>
            </tr>
            <tbody id=location>
            </tbody>
        </table>
    </div>
</main>