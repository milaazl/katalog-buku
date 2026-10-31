<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$translations = [
  'id' => [
    'app_title' => 'Katalog Buku', 'login' => 'Masuk', 'logout' => 'Keluar',
    'username' => 'Nama Pengguna', 'password' => 'Kata Sandi',
    'login_failed' => 'Nama pengguna atau kata sandi salah.',
    'login_required' => 'Nama pengguna dan kata sandi wajib diisi.',
    'book_list' => 'Daftar Buku', 'add_book' => 'Tambah Buku', 'edit_book' => 'Ubah Buku',
    'no' => 'No', 'title' => 'Judul', 'author' => 'Penulis', 'publisher' => 'Penerbit',
    'year' => 'Tahun', 'isbn' => 'ISBN', 'category' => 'Kategori', 'action' => 'Aksi',
    'edit' => 'Ubah', 'delete' => 'Hapus', 'save' => 'Simpan', 'cancel' => 'Batal',
    'confirm_delete' => 'Yakin ingin menghapus buku ini?', 'empty' => 'Belum ada data buku.',
    'err_required' => 'wajib diisi.', 'err_year' => 'Tahun harus berupa angka 1000 sampai tahun ini.',
    'err_isbn' => 'ISBN harus 10 atau 13 digit angka.', 'err_length' => 'terlalu panjang (maks. 150 karakter).',
    'msg_created' => 'Buku berhasil ditambahkan.', 'msg_updated' => 'Buku berhasil diperbarui.',
    'msg_deleted' => 'Buku berhasil dihapus.', 'msg_notfound' => 'Data tidak ditemukan.',
    'msg_csrf' => 'Sesi formulir tidak valid, silakan coba lagi.', 'welcome' => 'Halo',
    'msg_isbn_dup' => 'ISBN sudah terdaftar.',
  ],
  'en' => [
    'app_title' => 'Book Catalog', 'login' => 'Login', 'logout' => 'Logout',
    'username' => 'Username', 'password' => 'Password',
    'login_failed' => 'Wrong username or password.',
    'login_required' => 'Username and password are required.',
    'book_list' => 'Book List', 'add_book' => 'Add Book', 'edit_book' => 'Edit Book',
    'no' => 'No', 'title' => 'Title', 'author' => 'Author', 'publisher' => 'Publisher',
    'year' => 'Year', 'isbn' => 'ISBN', 'category' => 'Category', 'action' => 'Actions',
    'edit' => 'Edit', 'delete' => 'Delete', 'save' => 'Save', 'cancel' => 'Cancel',
    'confirm_delete' => 'Are you sure you want to delete this book?', 'empty' => 'No books yet.',
    'err_required' => 'is required.', 'err_year' => 'Year must be a number from 1000 to the current year.',
    'err_isbn' => 'ISBN must be 10 or 13 digits.', 'err_length' => 'is too long (max 150 characters).',
    'msg_created' => 'Book added successfully.', 'msg_updated' => 'Book updated successfully.',
    'msg_deleted' => 'Book deleted successfully.', 'msg_notfound' => 'Record not found.',
    'msg_csrf' => 'Invalid form session, please try again.', 'welcome' => 'Hello',
    'msg_isbn_dup' => 'ISBN is already registered.',
  ],
];

if (!isset($_SESSION['lang']) || !isset($translations[$_SESSION['lang']])) {
    $_SESSION['lang'] = 'id';
}

function t($key) {
    global $translations;
    return $translations[$_SESSION['lang']][$key] ?? $key;
}

// Sanitasi output (cegah XSS)
function e($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}
