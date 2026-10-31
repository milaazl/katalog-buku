<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_ok()) {
    flash('msg_csrf', 'bad');
} else {
    $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
    if ($id) {
        $stmt = $pdo->prepare('DELETE FROM books WHERE id = ?');
        $stmt->execute([$id]);
        flash('msg_deleted');
    } else {
        flash('msg_notfound', 'bad');
    }
}
header('Location: index.php');
exit;
