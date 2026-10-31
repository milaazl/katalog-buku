<?php
require_once __DIR__ . '/includes/auth.php';
if (!empty($_SESSION['user'])) { header('Location: index.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = t('login_required');
    } else {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = $user['username'];
            header('Location: index.php');
            exit;
        }
        $error = t('login_failed');
    }
}
include __DIR__ . '/includes/header.php';
?>
<div class="card" style="max-width:380px;margin:40px auto">
  <h2><?= e(t('login')) ?></h2>
  <?php if ($error): ?><div class="bad"><?= e($error) ?></div><?php endif; ?>
  <form method="POST" novalidate>
    <label for="username"><?= e(t('username')) ?></label>
    <input type="text" id="username" name="username" value="<?= e($_POST['username'] ?? '') ?>">
    <label for="password"><?= e(t('password')) ?></label>
    <input type="password" id="password" name="password">
    <p><button class="btn" type="submit"><?= e(t('login')) ?></button></p>
  </form>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
