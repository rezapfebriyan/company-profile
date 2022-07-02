<?php
session_start();

unset($_SESSION['namo']);
session_destroy();

header('Location: login.php');