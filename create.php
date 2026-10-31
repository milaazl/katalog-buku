<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/validate.php';
require_login();

$data = []; $errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_ok()) {
        flash('msg_csrf', 'bad');
    } else {
        [$data, $errors] = validate_book($_POST);
        if (!$errors) {
            $chk = $pdo->prepare('SELECT COUNT(*) FROM books WHERE isbn = ?');
            $chk->execute([$data['isbn']]);
            if ($chk->fetchColumn() > 0) {
                $errors['isbn'] = t('msg_isbn_dup');
            } else {
                $stmt = $pdo->prepare('INSERT INTO books (title, author, publisher, year, isbn, category) VALUES (?,?,?,?,?,?)');
                $stmt->execute([$data['title'], $data['author'], $data['publisher'], $data['year'], $data['isbn'], $data['category']]);
                flash('msg_created');
                header('Location: index.php');
                exit;
            }
        }
    }
}
include __DIR__ . '/includes/header.php';
?>
<div class="card">
  <h2><?= e(t('add_book')) ?></h2>
  <?php include __DIR__ . '/includes/book_form.php'; ?>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
