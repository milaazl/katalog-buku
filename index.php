<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

$books = $pdo->query('SELECT * FROM books ORDER BY id DESC')->fetchAll();
include __DIR__ . '/includes/header.php';
?>
<div class="card">
  <div class="top">
    <h2 style="margin:0"><?= e(t('book_list')) ?></h2>
    <a class="btn" href="create.php">+ <?= e(t('add_book')) ?></a>
  </div>
  <div style="overflow-x:auto">
  <table>
    <thead><tr>
      <th><?= e(t('no')) ?></th><th><?= e(t('title')) ?></th><th><?= e(t('author')) ?></th>
      <th><?= e(t('publisher')) ?></th><th><?= e(t('year')) ?></th><th><?= e(t('isbn')) ?></th>
      <th><?= e(t('category')) ?></th><th><?= e(t('action')) ?></th>
    </tr></thead>
    <tbody>
    <?php if (!$books): ?>
      <tr><td colspan="8"><?= e(t('empty')) ?></td></tr>
    <?php endif; ?>
    <?php foreach ($books as $i => $b): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= e($b['title']) ?></td><td><?= e($b['author']) ?></td>
        <td><?= e($b['publisher']) ?></td><td><?= e($b['year']) ?></td>
        <td><?= e($b['isbn']) ?></td><td><?= e($b['category']) ?></td>
        <td>
          <a class="btn" href="edit.php?id=<?= (int)$b['id'] ?>"><?= e(t('edit')) ?></a>
          <form class="inline" method="POST" action="delete.php" onsubmit="return confirm('<?= e(t('confirm_delete')) ?>')">
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="id" value="<?= (int)$b['id'] ?>">
            <button class="btn warn" type="submit"><?= e(t('delete')) ?></button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  </div>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
