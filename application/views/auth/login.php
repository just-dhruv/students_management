<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="w-100" style="max-width: 450px;">
        <div class="login-container bg-white rounded shadow-lg p-5">
            <h1 class="fs-2 fw-bold text-dark mb-2 text-center">Welcome Back</h1>
            <p class="text-secondary text-center mb-4">Sign in to your account.</p>

            <?php if ($this->session->flashdata('login_error')): ?>
                <div class="alert alert-danger text-center">
                    <?= $this->session->flashdata('login_error'); ?>
                </div>
            <?php endif; ?>

            <?= validation_errors('<div class="alert alert-danger text-center">', '</div>') ?>

            <form action="<?= site_url('login/authenticate') ?>" method="POST">
                <input type="hidden"
                    name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="input-block mb-3 d-block">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        value="<?= set_value('username') ?>"
                        placeholder="Enter username">
                </div>

                <div class="input-block mb-3 d-block">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Enter password">
                </div>

                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <label class="form-check d-flex align-items-center">
                        <input type="checkbox" name="remember" class="form-check-input checkbox-btn">
                        <span class="ms-2 text-dark">Remember me</span>
                    </label>

                    <a href="#" class="text-primary fw-semibold text-decoration-none">Forgot password</a>
                </div>

                <div class="main-btn">
                    <button type="submit" class="sm-btn">Sign In</button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <p class="text-secondary">
                    Don't have an account?x
                    <a href="#" class="text-primary fw-semibold text-decoration-none">Sign up here</a>
                </p>
            </div>
        </div>
    </div>
</div>