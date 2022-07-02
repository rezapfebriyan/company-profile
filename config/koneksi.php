<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','company');

$konek = mysqli_connect( HOST, USER, PASS, DB) or die (mysqli_error($conn));