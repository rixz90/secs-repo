<!doctype html>
<html data-theme="dark">
<?= App\View::make('components/common/_head') ?>

<body>
    <header>
        <?= App\View::make('components/common/user_navbar'); ?>
    </header>
    <main class="container">
        <h3>Staff E-Complaint System(SECS)</h3>

        <div x-data="dropdown">
            <button @click="toggle">...</button>

            <div x-show="open">...</div>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('dropdown', () => ({
                    open: false,

                    toggle() {
                        this.open = !this.open
                    }
                }))
            })
        </script>
    </main>
    </main>
    <footer></footer>
</body>

</html>