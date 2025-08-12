<?php
<!-- filepath: c:\laragon\www\my-second-git-training\admin_register.php -->
<?php
session_start();

if (!isset($_SESSION['attempt'])) {
    $_SESSION['attempt'] = 0;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Emel tidak sah.";
        $_SESSION['attempt']++;
    } elseif (empty($password)) {
        $error = "Kata laluan diperlukan.";
        $_SESSION['attempt']++;
    } else {
        // Registration logic here (e.g., save to database)
        $error = "Pendaftaran berjaya!";
        $_SESSION['attempt'] = 0;
    }

    if ($_SESSION['attempt'] >= 3) {
        $error = "Percubaan maksimum telah dicapai. Sila cuba lagi kemudian.";
    }
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Admin Register</title>
</head>
<body>
    <h2>Admin Register</h2>
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if ($_SESSION['attempt'] < 3 || $error === "Pendaftaran berjaya!"): ?>
    <form method="post" action="">
        <label for="email">Emel:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Kata Laluan:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Daftar masuk</button>
    </form>
    <?php endif;