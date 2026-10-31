<?php
require_once __DIR__ . '/includes/lang.php';
$lang = $_SESSION['lang'];
$_SESSION = [];
session_destroy();
session_start();
$_SESSION['lang'] = $lang;   // pilihan bahasa tetap dipertahankan
header('Location: login.php');
exit;
