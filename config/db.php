<?php
// Koneksi database (PDO + prepared statement)
$DB_HOST = 'localhost';
$DB_NAME = 'katalog_buku';
$DB_USER = 'root';
$DB_PASS = 'fadilganteng99';

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $ex) {
    die('Database connection failed.');
}
