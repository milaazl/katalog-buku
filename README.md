# Katalog Buku (PHP Murni + MySQL)

Sistem informasi manajemen data sederhana: CRUD buku, login berbasis `$_SESSION`, dan dua bahasa (ID/EN).

## Cara menjalankan
1. Install XAMPP/Laragon, jalankan Apache + MySQL.
2. Taruh folder proyek di `htdocs` (XAMPP) atau `www` (Laragon).
3. Import `database.sql` lewat phpMyAdmin.
4. Sesuaikan kredensial di `config/db.php` bila perlu.
5. Buka `http://localhost/katalog-buku/` lalu login: **admin / admin123**

## Fitur
- Form POST + validasi (if-else / switch) + sanitasi (`trim`, `strip_tags`, `filter_var`, `htmlspecialchars`)
- CRUD dengan PDO prepared statement
- Login/logout, halaman CRUD diproteksi `$_SESSION`
- Dual bahasa disimpan di `$_SESSION['lang']`
- Tambahan keamanan: CSRF token, `session_regenerate_id`, `password_hash`/`password_verify`

## Struktur
config/db.php | includes/ (lang, auth, validate, header, footer, book_form) | index, create, edit, delete, login, logout, set_lang | database.sql
