<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/validate.php';
require_login();

$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
if (!$id) { flash('msg_notfound', 'bad'); header('Location: index.php'); exit; }

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = ?');
$stmt->execute([$id]);
$data = $stmt->fetch();
if (!$data) { flash('msg_notfound', 'bad'); header('Location: index.php'); exit; }

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_ok()) {
        flash('msg_csrf', 'bad');
    } else {
        [$data, $errors] = validate_book($_POST);
        if (!$errors) {
            $chk = $pdo->prepare('SELECT COUNT(*) FROM books WHERE isbn = ? AND id <> ?');
            $chk->execute([$data['isbn'], $id]);
            if ($chk->fetchColumn() > 0) {
                $errors['isbn'] = t('msg_isbn_dup');
            } else {
                $up = $pdo->prepare('UPDATE books SET title=?, author=?, publisher=?, year=?, isbn=?, category=? WHERE id=?');
                $up->execute([$data['title'], $data['author'], $data['publisher'], $data['year'], $data['isbn'], $data['category'], $id]);
                flash('msg_updated');
                header('Location: index.php');
                exit;
            }
        }
    }
}
include __DIR__ . '/includes/header.php';
?>
<div class="card">
  <h2><?= e(t('edit_book')) ?></h2>
  <?php include __DIR__ . '/includes/book_form.php'; ?>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
