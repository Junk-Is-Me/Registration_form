<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Image gallery</title>
</head>

<body>
    <div class="wrapper">
        <div class="content_part">
            <nav>
                <?php
                if (!isset($_COOKIE['user'])) {
                    include 'pages/nav_enter.php';
                } else {
                    include 'pages/nav_auth.php';
                }
                ?>
            </nav>

            <main>

                <?php
                if (isset($_GET['reg'])) {
                    include 'validation_forms/registration.php';
                }
                if (isset($_GET['auth'])) {
                    include 'validation_forms/authorization.php';
                }
                if (isset($_GET['auth_error'])) {
                    include 'pages/authorization_error.php';
                }
                if (isset($_GET['reg_error'])) {
                    include 'pages/registration_error.php';
                }
                if (isset($_COOKIE['user'])) {
                    include 'validation_forms/load_form.php';
                }
                ?>

                <?php
                include 'functions/show_img.php';
                ?>

            </main>
        </div>
    </div>

</body>

</html>