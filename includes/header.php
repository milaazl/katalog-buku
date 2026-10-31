<?php $self = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="<?= e($_SESSION['lang']) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e(t('app_title')) ?></title>
<style>
  *{box-sizing:border-box} body{font-family:system-ui,Arial,sans-serif;background:#f4f6f8;margin:0;color:#222}
  nav{background:#1f3a5f;color:#fff;padding:12px 24px;display:flex;gap:16px;align-items:center;justify-content:space-between}
  nav a{color:#fff;text-decoration:none} nav .right{display:flex;gap:14px;align-items:center}
  .lang a{padding:2px 8px;border-radius:4px;border:1px solid #fff} .lang a.active{background:#fff;color:#1f3a5f}
  main{max-width:960px;margin:24px auto;padding:0 16px}
  .card{background:#fff;border-radius:8px;padding:20px;box-shadow:0 1px 4px rgba(0,0,0,.1)}
  table{width:100%;border-collapse:collapse} th,td{padding:10px;border-bottom:1px solid #e3e6ea;text-align:left}
  th{background:#eef2f7}
  .btn{display:inline-block;padding:7px 14px;border:0;border-radius:5px;background:#1f3a5f;color:#fff;text-decoration:none;cursor:pointer;font-size:14px}
  .btn.warn{background:#c0392b} .btn.gray{background:#7f8c8d}
  label{display:block;margin:12px 0 4px;font-weight:600} input[type=text],input[type=password]{width:100%;padding:9px;border:1px solid #bbb;border-radius:5px}
  .err{color:#c0392b;font-size:13px;margin-top:3px} .ok,.bad{padding:10px 14px;border-radius:5px;margin-bottom:14px}
  .ok{background:#d4edda;color:#155724} .bad{background:#f8d7da;color:#721c24}
  .top{display:flex;justify-content:space-between;align-items:center;margin-bottom:14px}
  form.inline{display:inline}
</style>
</head>
<body>
<nav>
  <a href="index.php"><strong>📚 <?= e(t('app_title')) ?></strong></a>
  <div class="right">
    <span class="lang">
      <a href="set_lang.php?to=id&back=<?= e($self) ?>" class="<?= $_SESSION['lang']==='id'?'active':'' ?>">ID</a>
      <a href="set_lang.php?to=en&back=<?= e($self) ?>" class="<?= $_SESSION['lang']==='en'?'active':'' ?>">EN</a>
    </span>
    <?php if (!empty($_SESSION['user'])): ?>
      <span><?= e(t('welcome')) ?>, <?= e($_SESSION['user']) ?></span>
      <a href="logout.php"><?= e(t('logout')) ?></a>
    <?php endif; ?>
  </div>
</nav>
<main>
<?php if (!empty($_SESSION['flash'])): [$ft, $fk] = $_SESSION['flash']; unset($_SESSION['flash']); ?>
  <div class="<?= $ft==='ok'?'ok':'bad' ?>"><?= e(t($fk)) ?></div>
<?php endif; ?>
