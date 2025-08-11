<?php
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Borang Permohonan</title>
</head>
<body>
    <h2>Borang Permohonan</h2>
    <form action="proses_permohonan.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Emel:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="tujuan">Tujuan Permohonan:</label>
        <textarea id="tujuan" name="tujuan" required></textarea><br><br>

        <button type="submit">Hantar Permohonan</button>
    </form>
</body>