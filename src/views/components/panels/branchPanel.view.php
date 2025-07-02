<section>
    <h3>Branch</h3>
    <label for=" code">Code:</label>
    <input type="text" name="code" id="code" required />
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required />
    <div>
        <label for="location">Location: </label>
        <details class="dropdown" id="location">
            <summary> Select address... </summary>
            <ul>
                <li>
                    <label>
                        <input type="checkbox" name="solid" />Solid
                    </label>
                </li>
            </ul>
        </details>
    </div>
    <div class="container" style="text-align:center;">
        <input type="submit" style="width: fit-content;">
        <input type="reset" value="Reset" style="width: fit-content;">
    </div>
</section>