<section>
    <form action="">
        <h3>Administrator</h3>
        <label for="admin_id">Username:</label>
        <input type="text" name="id"
            id="admin_id"
            class="form-control"
            required />
        <label for="admin_type">Department:</label>
        <input type="text" name="department"
            id="department"
            class="form-control"
            required />
        <label for="admin_type">Name: </label>
        <input type="text" name="name"
            id="name"
            class="form-control"
            required />
        <label for="pass">Password:</label>
        <input type="password" name="pass"
            autocomplete="new-password"
            id="pass"
            class="form-control"
            required />
        <label for="c_pass">Conform password:</label>
        <input type="password" name="c_pass"
            autocomplete="new-password"
            id="c_pass"
            class="form-control"
            required />
        <div style="text-align:center;">
            <input type="submit" style="width: fit-content;">
            <input type="reset" value="Reset" style="width: fit-content;">
        </div>
    </form>
</section>
<hr />