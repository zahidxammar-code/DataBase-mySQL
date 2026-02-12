<?php
session_start();

//hapus semua session

session_unset();
session_destroy();

header("Location: login.admin");
exit;
?>