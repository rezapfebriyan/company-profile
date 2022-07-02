<?php
session_start();
unset($_SESSION['nama_member']);
unset($_SESSION['email_member']);

session_destroy();

header('Location: index.php');
