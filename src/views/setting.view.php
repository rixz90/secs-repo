<html>

<?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/_head.php'); ?>

<body>
    <header>
        <?php include(BASE_ROOT . $_ENV['COMP_PATH'] . '/common/admin_navbar.php'); ?>
    </header>
    <main class="container-fluid">
        <nav>
            <ul>
                <li id="nav_bra"><a>Branch</a></li>
                <li id="nav_cat"><a>Category</a></li>
                <li id="nav_loc"><a>Location</a></li>
                <li id="nav_re"><a>Relation</a></li>
                <li id="nav_adm"><a>Administator</a></li>

            </ul>
        </nav>
        <div>
            <div id="branchPanel">
                <h1>Branch</h1>
                <table class="table">
                    <tr>
                        <th>Branch ID</th>
                        <th>Branch Name</th>
                    </tr>
                </table>
                <div class="panel">
                    <form class="registration-form f-table" action="./add.php" method="POST">
                        <input type="hidden" name="type" value="BRA">
                        <fieldset>
                            <button class="close">X</button>
                            <legend>Insert Branch:</legend>
                            <table>
                                <tr>
                                    <td><label for="branch_id">Branch ID: </td>
                                    <td><input type="text"
                                            id="branch_id"
                                            name="id"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><label for="branch_name">Branch Name: </td>
                                    <td><input type="text"
                                            id="branch_name"
                                            name="name"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="flex">
                                            <input type="submit"
                                                name="ADD_BRA"
                                                class="button-submit"
                                                value="ADD" />
                                            <input type="submit"
                                                name="UP_BRA"
                                                class="button-update"
                                                value="UPDATE" />
                                            <input type="submit"
                                                name="DEL_BRA"
                                                class="button-remove"
                                                value="DELETE" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="panel" id="categoryPanel">
                <h2>Categories</h2>
                <table class="table">
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                    </tr>
                </table>
                <div class="panel">
                    <form class="registration-form f-table" action="./add.php" method="POST">
                        <input type="hidden" name="type" value="CAT">
                        <fieldset>
                            <button class="close">X</button>
                            <legend>Insert Category:</legend>
                            <table>
                                <tr>
                                    <td><label for="cat_id">Category ID: </td>
                                    <td><input type="text"
                                            name="id"
                                            id="cat_id"
                                            class="form-control"
                                            required></td>
                                </tr>
                                <tr>
                                    <td><label for="cat_name">Category Name: </td>
                                    <td><input type="text"
                                            name="name"
                                            id="cat_name"
                                            class="form-control"
                                            required></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="flex">
                                            <input type="submit"
                                                name="ADD_CAT"
                                                class="button-submit"
                                                value="ADD" />
                                            <input type="submit"
                                                name="UP_CAT"
                                                class="button-update"
                                                value="UPDATE" />
                                            <input type="submit"
                                                name="DEL_CAT"
                                                class="button-remove"
                                                value="DELETE" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="panel" id="locationPanel">
                <h2>Location</h2>
                <table class="table">
                    <tr>
                        <th>Location ID</th>
                        <th>Location Name</th>
                    </tr>
                </table>
                <div class="panel">
                    <form class="registration-form f-table" action="./add.php" method="POST">
                        <input type="hidden" name="type" value="LOC">
                        <fieldset>
                            <button class="close">X</button>
                            <legend>Insert Location:</legend>
                            <table>
                                <tr>
                                    <td><label for="loc_id">Location ID: </td>
                                    <td><input type="text"
                                            name="id"
                                            id="loc_id"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><label for="loc_name">Location Name: </td>
                                    <td><input type="text"
                                            name="name"
                                            id="loc_name"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="flex">
                                            <input type="submit"
                                                name="ADD_LOC"
                                                class="button-submit"
                                                value="ADD" />
                                            <input type="submit"
                                                name="UP_LOC"
                                                class="button-update"
                                                value="UPDATE" />
                                            <input type="submit"
                                                name="DEL_LOC"
                                                class="button-remove"
                                                value="DELETE" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>


            <div class="panel" id="relationPanel">
                <h2>Relation</h2>
                <table class="table">
                    <tr>
                        <th>Branch ID</th>
                        <th>Branch Name</th>
                        <th>--></th>
                        <th>Location ID</th>
                        <th>Location Name</th>
                    </tr>
                </table>
                <div class="panel">
                    <form class="registration-form f-table" action="./add.php" method="POST">
                        <input type="hidden" name="type" value="REL">
                        <input type="hidden" name="init_loc_id" id="init_loc" value="">
                        <input type="hidden" name="init_bra_id" id="init_bra" value="">
                        <fieldset>
                            <button class="close">X</button>
                            <legend>Insert Relation:</legend>
                            <table>
                                <tr>
                                    <td><label for="bra_id">Branch Change: </td>
                                    <td>
                                        <select name="bra_id" id="rel_branch" class="form-control">
                                            <option value="0" disable selected>--</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="loc_id">Location Change: </td>
                                    <td>
                                        <select name="loc_id" id="rel_loc" class="form-control">
                                            <option value="0" disable selected>--</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="flex">
                                            <input type="submit"
                                                name="ADD_REL"
                                                class="button-submit"
                                                value="ADD" />
                                            <input type="submit"
                                                name="UP_REL"
                                                class="button-update"
                                                value="UPDATE" />
                                            <input type="submit"
                                                name="DEL_REL"
                                                class="button-remove"
                                                value="DELETE" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>


            <div class="panel" id="adminPanel">
                <h2>Administrator</h2>
                <table class="table">
                    <tr>
                        <th>Username</th>
                        <th>Access Type</th>
                        <th>Department</th>
                        <th>Name</th>
                        <th>Password</th>
                    </tr>
                </table>
                <div class="panel">
                    <form class="registration-form f-table" action="./add.php" method="POST">
                        <input type="hidden" name="type" value="ADM">
                        <fieldset>
                            <button class="close">X</button>
                            <legend>Insert Administrator:</legend>
                            <table>
                                <tr>
                                    <td><label for="admin_id">USERNAME: </td>
                                    <td><input type="text"
                                            name="id"
                                            id="admin_id"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><label for="admin_type">ACCESS TYPE: </td>
                                    <td><input type="text"
                                            name="access"
                                            id="admin_type"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><label for="admin_type">DEPARTMENT: </td>
                                    <td><input type="text"
                                            name="department"
                                            id="department"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><label for="admin_type">ADMIN NAME: </td>
                                    <td><input type="text"
                                            name="name"
                                            id="name"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><label for="pass">PASSWORD: </td>
                                    <td><input type="password"
                                            name="pass"
                                            autocomplete="new-password"
                                            id="pass"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td><label for="c_pass">CONFORM PASSWORD: </td>
                                    <td><input type="password"
                                            name="c_pass"
                                            autocomplete="new-password"
                                            id="c_pass"
                                            class="form-control"
                                            required /></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="flex">
                                            <input type="submit"
                                                name="ADD_ADMIN"
                                                class="button-submit"
                                                value="ADD" />
                                            <input type="submit"
                                                name="UP_ADMIN"
                                                class="button-update"
                                                value="UPDATE" />
                                            <input type="submit"
                                                name="DEL_ADMIN"
                                                class="button-remove"
                                                value="DELETE" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="/assets/scripts/admin_setting.js"></script>
</body>

</html>