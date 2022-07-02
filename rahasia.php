<?php
include 'header.php';

if ($_SESSION['email_member'] == '') {
    header('Location: login.php');
    exit();
}
?>

<div style="background-color: red; font-size: large; padding: 40px; margin-top: 10px; margin-bottom: 10px; color: white;">
    Selamat Datang <b><?= $_SESSION['nama_member']?></b> di Halaman
</div>

<?php include 'footer.php' ?>