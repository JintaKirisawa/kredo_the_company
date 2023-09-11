<?php
session_start();

if(!isset($_SESSION['id'])){
    header ('location: index.php');
}

require "../classes/User.php";

$user_obj = new User;
$user = $user_obj->getUser($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Profile</title>

</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                The Company
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['fullname'] ?></span>
                <form action="../actions/logout.php" method="post"class="d-flex ms-2">
                    <button type="submit" class="bg-transparent text-danger border-0">Log out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4 text-center">
            <h2 class="mb-4">
                USER PROFILE
            </h2>

            <div class="mb-3">
                <?php
                    if ($user['photo']) {
                ?>
                    <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>"
                        class="d-block mx-auto rounded-circle edit-photo">
                <?php
                    } else {
                ?>
                    <i class="fa-solid fa-user-circle text-secondary d-block text-center edit-icon"></i>
                <?php
                    }
                ?>
            </div>

            <h3>
                <?= strtoupper($user['last_name']) . ", " . ucwords(strtolower($user['first_name'])) ?>
            </h3>

            <h5 class="text-secondary">
                <?= $user['username'] ?>
            </h5>

            <a href="edit-user.php" class="btn btn-warning btn-sm">Edit</a>

        </div>
    </main>
</body>
</html>