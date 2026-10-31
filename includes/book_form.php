<?php
// Partial form: butuh $data dan $errors
$names = ['title', 'author', 'publisher', 'year', 'isbn', 'category'];
?>
<form method="POST" action="" novalidate>
  <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
  <?php foreach ($names as $n): ?>
    <label for="<?= $n ?>"><?= e(t($n)) ?></label>
    <input type="text" id="<?= $n ?>" name="<?= $n ?>" value="<?= e($data[$n] ?? '') ?>">
    <?php if (!empty($errors[$n])): ?><div class="err"><?= e($errors[$n]) ?></div><?php endif; ?>
  <?php endforeach; ?>
  <p style="margin-top:18px">
    <button class="btn" type="submit"><?= e(t('save')) ?></button>
    <a class="btn gray" href="index.php"><?= e(t('cancel')) ?></a>
  </p>
</form>
