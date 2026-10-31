<?php
require_once __DIR__ . '/includes/lang.php';
$allowed = ['id', 'en'];
$pages = ['index.php', 'login.php', 'create.php'];  // whitelist halaman tujuan
if (isset($_GET['to']) && in_array($_GET['to'], $allowed, true)) {
    $_SESSION['lang'] = $_GET['to'];   // bahasa disimpan di $_SESSION
}
$back = $_GET['back'] ?? 'index.php';
header('Location: ' . (in_array($back, $pages, true) ? $back : 'index.php'));
exit;
