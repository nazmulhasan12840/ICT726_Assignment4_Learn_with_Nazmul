<?php
declare(strict_types=1);

// Update these values for XAMPP/WAMP or your hosting provider.
const DB_HOST = '127.0.0.1';
const DB_NAME = 'learn_with_nazmul';
const DB_USER = 'root';
const DB_PASS = '';
const BASE_URL = '/ICT726_Assignment4_Learn_with_Nazmul_final'; // Local XAMPP project path. Change this when deploying online.

function db(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    return $pdo;
}

function url(string $path = ''): string {
    return BASE_URL . '/' . ltrim($path, '/');
}
?>