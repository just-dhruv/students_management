<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>

    <h1 class="text-bold text-center text-5xl text-gray-500 my-10">Welcome to Dashboard</h1>

    <?php if ($this->session->has_userdata('logged_in')): ?>
        <p class="text-center text-xl">Session is saved.</p>
    <?php endif ?>

    <a href="<?= site_url('logout') ?>" class="main-btn mb-4">Logout</a>

    <a href="<?=  site_url('students') ?>" class="main-btn">View all students</a>

    

</body>

</html>