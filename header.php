<?php
session_start();
include_once 'config/koneksi.php';
include_once 'config/function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lets Coding</title>
    <link rel="stylesheet" href="<?= urlDasar()?>/css/style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="<?= urlDasar() ?>">Lets Coding</a></div>
            <div class="menu">
                <ul>
                    <li><a href="<?= urlDasar() ?>#home">Home</a></li>
                    <li><a href="<?= urlDasar() ?>#courses">Courses</a></li>
                    <li><a href="<?= urlDasar() ?>#tutors">Tutors</a></li>
                    <li><a href="<?= urlDasar() ?>#partners">Partners</a></li>
                    <li><a href="<?= urlDasar() ?>#contact">Contact</a></li>
                    <li>
                        <?php
                        if (isset($_SESSION['nama_member'])) {
                            echo $_SESSION['nama_member'] . " <a href='".urlDasar()."/logout.php'>Logout</a>";
                        } else {
                        ?>
                            <a href="pendaftaran.php" class="tbl-biru">Sign Up</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">