<?php
include 'common/views/header.php';
require_once 'common/services/auth.php';
$authService = new AuthService();

if ($authService->isUserLoggedIn()) {
    $authService->redirectUser();
}

?>

    <section class="container">
        <div class="row justify-content-center h-75 align-items-center">
            <div class="col-md-7 border shadow-sm p-3 mb-5 bg-white rounded">
                <h3 class="text-primary mb-4">Login</h3>
                <?php
                if (isset($_REQUEST['message']) && !empty($_REQUEST['message'])) {
                    ?>
                    <p class="text-danger"><?= htmlspecialchars(trim($_REQUEST['message'])) ?></p>

                <?php } ?>
                <form method="post" action="/actions.php?action=login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </section>

<?php
include 'common/views/footer.php';