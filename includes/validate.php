<?php
// Validasi + sanitasi input buku. Mengembalikan [$data, $errors]
function validate_book(array $in): array {
    $fields = ['title', 'author', 'publisher', 'year', 'isbn', 'category'];
    $data = [];
    $errors = [];

    foreach ($fields as $f) {
        $data[$f] = trim(strip_tags($in[$f] ?? ''));   // sanitasi input

        switch ($f) {
            case 'title':
            case 'author':
            case 'publisher':
                if ($data[$f] === '') {
                    $errors[$f] = t($f) . ' ' . t('err_required');
                } elseif (mb_strlen($data[$f]) > 150) {
                    $errors[$f] = t($f) . ' ' . t('err_length');
                }
                break;

            case 'year':
                $y = filter_var($data[$f], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1000, 'max_range' => (int)date('Y')]]);
                if ($data[$f] === '') {
                    $errors[$f] = t($f) . ' ' . t('err_required');
                } elseif ($y === false) {
                    $errors[$f] = t('err_year');
                } else {
                    $data[$f] = $y;
                }
                break;

            case 'isbn':
                $data[$f] = preg_replace('/[\s-]/', '', $data[$f]);
                if ($data[$f] === '') {
                    $errors[$f] = t($f) . ' ' . t('err_required');
                } elseif (!preg_match('/^(\d{10}|\d{13})$/', $data[$f])) {
                    $errors[$f] = t('err_isbn');
                }
                break;

            default: // category (opsional)
                if (mb_strlen($data[$f]) > 150) $errors[$f] = t($f) . ' ' . t('err_length');
        }
    }
    return [$data, $errors];
}
