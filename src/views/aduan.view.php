<header>
    <?= App\View::make('components/common/user_navbar'); ?>
</header>
<main class="container">
    <h2>Lodge Complaint</h2>
    <section style="width: fit-content;">
        <select name="favorite-cuisine" aria-label="Select your favorite cuisine..." required>
            <option selected disabled value="">
                Select user type...
            </option>
            <option>Staff</option>
            <option>Student</option>
            <option>Guest</option>
        </select>
    </section>
    <hr />
    <section>
        <form action="">
            <label for="staffId">Staff ID : </label>
            <input type="text" name="staffId" id="staffId" class="form-control" />
            <label for="studentId">Student ID : </label>
            <input type="text" name="studentId" id="studentId" class="form-control" />
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" class="form-control" required />
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" class="form-control" required />
            <label for="phone_no">Phone Number: </label>
            <input type="text" name="phone_no" id="phone_no" class="form-control" required />
    </section>
    <hr />
    <section>
        <h3 class="h3">Complaint Information</h3>
        <label for="branch">UiTM Branch: </label>
        <select name="branch" id="branch" class="form-control" required>
            <option value="" disabled selected>Choose Branch</option>
        </select>
        <label for="location">Location Details : </label>
        <select name="location" id="location" class="form-control" required>
            <option value="" disabled selected>Choose Location</option>
        </select>
        <label for="category">Category: </label>
        <select name="category" id="category" class="form-control" required>
            <option value="" disabled selected>Choose Category</option>
        </select>
    </section>
    <hr />
    <section>
        <label for="details">Details : </label>
        <textarea name="details" id="details" cols="30" rows="10" class="form-control textarea" required></textarea>
        <label for="attachment">Attachment : </label>
        <input type="file" name="fileToUpload" id="attachment" aria-describedby="file-helper">
        <small id="file-helpher">*Format PDF or Image(jpg, png, jpeg)only</small>
        <button class="button-remove">Remove</button>
        <div class="container" style="text-align:center;">
            <input type="submit" style="width: fit-content;">
            <input type="reset" value="Reset" style="width: fit-content;">
        </div>
        </form>
    </section>
</main>