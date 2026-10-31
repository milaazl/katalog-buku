<?php
require_once __DIR__ . '/lang.php';
require_once __DIR__ . '/../config/db.php';

function require_login() {
    if (empty($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

function csrf_token() {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}

function csrf_ok() {
    return isset($_POST['csrf'], $_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $_POST['csrf']);
}

function flash($msgKey, $type = 'ok') { $_SESSION['flash'] = [$type, $msgKey]; }
